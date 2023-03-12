var cartCount = 0;
var bottle = [];
var liquidCount = 0;
getProgress();

function getProgress() {
    axios.get('/cart/count')
        .then(response => {
            cartCount = response.data.cartCount;
            bottle = response.data.bottle;
            liquidCount = response.data.liquidCount;
            setNewProgress();
            setNewSizeCounter();
        })
}

function setNewProgress() {
    const progressbar = document.getElementById("progressbar");
    if (bottle.amount > 0) {
        const width = cartCount * 100 / bottle.amount;
        progressbar.style.width = `${width}%`;
    } else {
        progressbar.style.width = '0%';
    }
};

function addToCart(ingredientId, amount) {
    axios.post(`/addCart/${ingredientId}`, { amount }).then((response) => {
        if (response.data.stored) {
         setImg(response.data.image, amount);
         getProgress();
        } else {
            showAlertTooMany();
        }
    }); 
}
function getAktLiquid(){
    axios.get("/getCurrentLiquid").then((response) => {
    if (Object.keys(response.data).length === 0) {
      return;
    }
    var response = response.data.liquidItems;  
    Object.keys(response).forEach((key) => {
      this.liquid = response[key];
      this.$refs.mixerComponent.liquidAnimation(this.liquid.options.image);
    });
  });
  }

function removeAllFromCart() {
    removeCartItems(); 
    getProgress();
    clearSessionStorage();
}
function removeCartItems() {
    axios.get("/removeAll");
  /*   getCartContent();
   this.$refs.mixerComponent.removeAll(); */
}
function removeSpecificCart(cartId) {
    axios.post(`/deleteCart/${cartId}`).then((response) => {
        console.log(response);
        const { wasLiquid, image } = response.data;
        if (wasLiquid) {
         /* this.$refs.mixerComponent.clearLiquid(); */
        }
        /* this.$refs.mixerComponent.removeSpecificAll(image);
        getCartContent(); */
        getProgress();
    }); 
  }
  function addSpecificOne(cartId) {
    const response = axios.post("/increaseCardQty/" + cartId, {
      amount: 1,
    });
    const { stored, image } = response.data;
    if (stored) {
      /* this.$refs.mixerComponent.setImg(image, 1); */
      getProgress();
      getCartTotal();
    } else {
      showAlertError("Du hast zu viele Zutaten ausgewählt!", "");
    }
  }
  function removeSpecificOne(cartId) {
    const response = axios.post("/decreaseCardQty/" + cartId, {
      amount: 1,
    });
    const {newqty, image} = response.data;
    if (newqty > 0) {
      getProgress();
      getCartTotal();
    } else {
     /* this.getCartContent(); */
    }
    /* this.$refs.mixerComponent.removeSpecificOne(image);*/
  }

function clearSessionStorage() {
    sessionStorage.clear();
}

function removeAllAlert() {
    Swal.fire({
      title: "Bist du Dir sicher?",
      text: "Deine komplette Zusammenstellung wird unwiederruflich gelöscht!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#6D9E1F",
      cancelButtonColor: "#d33",
      confirmButtonText: "Zusammenstellung löschen!",
      cancelButtonText: "Abbrechen!",
    }).then((result) => {
      if (result.isConfirmed) {
        this.removeAllFromCart();
      }
    });
}
function showAlertTooMany() {
    Swal.fire({
        title: 'Du hast zu viele Zutaten ausgewählt!',
        text: "",
        icon: 'error',
        showCancelButton: false,
        confirmButtonColor: '#6D9E1F',
        confirmButtonText: 'Okay!',
    });
}
function setNewSizeCounter() {
    $(".cart-count").html(cartCount);
    $(".liquid-count").html(liquidCount);
    $(".bottle-name").html(bottle.name);
    $(".bottle-amount").html(bottle.amount);
}