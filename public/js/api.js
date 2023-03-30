var cartCount = 0;
var bottle = [];
var liquidCount = 0;
var liquid = [];

getProgress();
getActLiquid();

// fetches the cart count and bottle information from the server and sets the progress bar accordingly
function getProgress() {
    axios.get("/cart/count").then((response) => {
        cartCount = response.data.cartCount;
        bottle = response.data.bottle;
        liquidCount = response.data.liquidCount;
        setNewProgress();
        setNewSizeCounter();
    });
}
// calculates the width of the progress bar based on the cart count and the bottle amount.
function setNewProgress() {
    const progressbar = document.getElementById("progressbar");
    if (bottle.amount > 0) {
        const width = (cartCount * 100) / bottle.amount;
        progressbar.style.width = `${width}%`;
    } else {
        progressbar.style.width = "0%";
    }
}
// If the response indicates that the ingredient was successfully added to the cart, it calls setImg Function from the Mixer and updated the Progressbar
// Otherwise, it displays an error message using the showAlertError function.
function addIngredientToCart(ingredientId, amount) {
    axios.post(`/addCart/${ingredientId}`, { amount }).then((response) => {
        if (response.data.stored) {
            setImg(response.data.image, amount);
            getProgress();
        } else {
            showAlertTooMany();
        }
    });
}
function addLiquidToCart(ingredient, amount) {
    axios.post(`/addCart/${ingredient.id}`, { amount });
}
 // get the current liquid in the mixer, sets the liquid object to the response data, and calls a method on the mixerComponent child component to animate the liquid using the provided image.
function getActLiquid() {
    axios.get("/getCurrentLiquid").then((response) => {
        if (Object.keys(response.data).length === 0) {
            return;
        }
        var response = response.data.liquidItems;
        Object.keys(response).forEach((key) => {
            liquid = response[key];
            liquidAnimation(liquid.options.image);
            if (location.pathname == "/custom/liquids") {
                selectCard(liquid);
            }
        });
    });
}
// get the content of the cart, sets the response to the cartContent variable and check for Result
function getCartContent(bottle) {
    axios.get("/cartContent").then((response) => {
        var cartContent = Object.values(response.data.cart);
        liquidContent = cartContent.filter(
            (cartItem) => cartItem.options.type === "liquid"
        );
        ingredientContent = cartContent.filter(
            (cartItem) => cartItem.options.type !== "liquid"
        );
        checkResult(bottle);
    });
}
// retrieve the total price and subtotal of items in the cart and updates the corresponding HTML elements with the retrieved values.
function getCartTotal() {
    axios.get("/cartTotal").then((response) => {
        $("#total").html(response.data.cartTotal);
        $("#subTotal").html(response.data.cartSubTotal);
    });
}
// selects a liquid card from the list of available options and displays a liquid animation for the selected liquid, while updating the corresponding HTML element with the selected liquid.
function selectCard(liquidObj) {
    liquidAnimation(liquidObj.image);
    liquid = liquidObj;
    const selectedCard = document.querySelectorAll(".selected-card");
    for (let i = 0; i < selectedCard.length; i++) {
        let card = selectedCard[i];
        card.classList.remove("selected-card");
    }
    var element = document.getElementById("liquid_" + liquidObj.id);
    element.classList.add("selected-card");
}
//  adds the selected liquid to the cart and redirects to the "Show Card" page if a liquid has been selected.
function showStep3afterLiquid() {
    if (Object.keys(liquid).length !== 0) {
        addLiquidToCart(liquid, 1);
    }
    location.href = "/showCard";
}
// removes all items from the cart, updates the progress bar, and clears the session storage.
function removeAllFromCart() {
    removeCartItems();
    getProgress();
    clearSessionStorage();
}
// remove all items from the cart, clears the cart UI, and reloads the page.
function removeCartItems() {
    axios.get("/removeAll");
    removeAll();
    location.reload();
}
// remove a specific item from the cart with the given cartId, updates the cart UI and progress bar accordingly, clears the selected liquid if the removed item was a liquid, and reloads the page.
function removeSpecificCart(cartId) {
    axios.post(`/deleteCart/${cartId}`).then((response) => {
        const { wasLiquid, image } = response.data;
        if (wasLiquid) {
            clearLiquid();
        }
        removeSpecificAll(image);
        getProgress();
        location.reload();
    });
}
// Increases the quantity of a specific item in the cart by 1.
function addSpecificOne(cartId, id) {
    axios.post(`/increaseCardQty/${cartId}`, { amount: 1 }).then((response) => {
        const { stored, image, newqty } = response.data;
        if (stored) {
            setImg(image, 1);
            getProgress();
            setnewAmount(newqty, id);
            getCartTotal();
        } else {
            showAlertError("Du hast zu viele Zutaten ausgewählt!", "");
        }
    });
}
// Decreases the quantity of a specific item in the cart by 1.
function removeSpecificOne(cartId, id) {
    axios.post(`/decreaseCardQty/${cartId}`, { amount: 1 }).then((response) => {
        const { newqty, image } = response.data;
        if (newqty > 0) {
            getProgress();
            setnewAmount(newqty, id);
            removeMixerSpecificOne(image);
            getCartTotal();
        } else {
            removeMixerSpecificOne(image);
            location.reload();
        }
    });
}
// clears the session storage.
function clearSessionStorage() {
    sessionStorage.clear();
}
// Updates the displayed quantity of a specific item in the cart.
function setnewAmount(newCounter, id) {
    $("#qty" + id).html(newCounter);
}
// Updates the displayed cart count, liquid count, bottle name, and bottle amount.
function setNewSizeCounter() {
    $(".cart-count").html(cartCount);
    $(".liquid-count").html(liquidCount);
    $(".bottle-name").html(bottle.name);
    $(".bottle-amount").html(bottle.amount);
}
// loads a saved preset with the given name on the "showCard" page.
function choosePreset(presetName) {
    axios.get(`/checkPreset/${presetName}`).then((location.href = "/showCard"));
}
// Deletes a saved preset with the given name.
function deletePreset(presetName) {
    axios.get(`/deletePreset/${presetName}`).then((location.href = "/customer"));
}
// store an existing preset with the specified presetName. It displays an error message if the user is not authenticated or if the preset name already exists.
function storeExistingPreset(presetName) {
    axios.get(`/storeExistingPreset/${presetName}`)
    .then((response) => {
        if (response.data.auth == false) {
            this.showAlertError("Du must angemeldet sein, um dir das Preset abspeichern zu können!", "");
        } else {
            this.showAlertSuccess("Das Preset wurde erfolgreich gespeichert!", "Wenn du auf dein Profilnamen klickst und zur Homepage gehst, kannst du das Preset auswählen und deine Zusammenstellung abfrufen!");
        }
    })
    .catch(() => {
        this.showAlertError("Den Namen für das Preset gibt es bereits!", "Wähle einen anderen Namen, oder lösche das bestehende Preset!");
    });
}
// store a new preset with the specified presetName. It displays an error message if the user is not authenticated or if the preset name already exists.
function storeAsPreset(presetName) {
    axios.post(`/storeAsPreset`, { name: presetName })
    .then((response) => {
        if (response.data.auth == false) {
            this.showAlertError("Du must angemeldet sein, um dir das Preset abspeichern zu können!", "");
        } else {
            this.showAlertSuccess("Das Preset wurde erfolgreich gespeichert!", "Wenn du auf dein Profilnamen klickst und zur Homepage gehst, kannst du das Preset auswählen und deine Zusammenstellung abfrufen!");
        }
    })
    .catch(() => {
        this.showAlertError(
            "Den Namen für das Preset gibt es bereits!",
            "Wähle einen anderen Namen, oder lösche das bestehende Preset!"
        );
    });
}
