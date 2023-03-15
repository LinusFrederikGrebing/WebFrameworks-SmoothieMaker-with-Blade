var cartCount = 0;
var bottle = [];
var liquidCount = 0;
var liquid = [];

var dropdownBtn = document.getElementById('dropdown-btn');
var dropdownMenu = dropdownBtn.nextElementSibling;

dropdownBtn.addEventListener('click', function() {
  dropdownMenu.classList.toggle('hidden');
});

getProgress();
getActLiquid();
function getProgress() {
    axios.get("/cart/count").then((response) => {
        cartCount = response.data.cartCount;
        bottle = response.data.bottle;
        liquidCount = response.data.liquidCount;
        setNewProgress();
        setNewSizeCounter();
    });
}

function setNewProgress() {
    const progressbar = document.getElementById("progressbar");
    if (bottle.amount > 0) {
        const width = (cartCount * 100) / bottle.amount;
        progressbar.style.width = `${width}%`;
    } else {
        progressbar.style.width = "0%";
    }
}

function addIngredienteToCart(ingredientId, amount) {
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

function getCartContent(bottle) {
    axios.get("/cartContent").then((response) => {
        var cartContent = Object.values(response.data.cart);
        liquidContent = cartContent.filter(
            (cartItem) => cartItem.options.type === "liquid"
        );
        ingredienteContent = cartContent.filter(
            (cartItem) => cartItem.options.type !== "liquid"
        );
        checkResult(bottle);
    });
}
function getCartTotal() {
    axios.get("/cartTotal").then((response) => {
        $("#total").html(response.data.cartTotal);
        $("#subTotal").html(response.data.cartSubTotal);
    });
}

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

function showStep3afterLiquid() {
    if (Object.keys(liquid).length !== 0) {
        addLiquidToCart(liquid, 1);
    }
    location.href = "/showCard";
}

function removeAllFromCart() {
    removeCartItems();
    getProgress();
    clearSessionStorage();
}
function removeCartItems() {
    axios.get("/removeAll");
    removeAll();
    location.reload();
}
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

function clearSessionStorage() {
    sessionStorage.clear();
}

function setnewAmount(newCounter, id) {
    $('#qty' + id).html(newCounter);
}
function setNewSizeCounter() {
    $(".cart-count").html(cartCount);
    $(".liquid-count").html(liquidCount);
    $(".bottle-name").html(bottle.name);
    $(".bottle-amount").html(bottle.amount);
}
