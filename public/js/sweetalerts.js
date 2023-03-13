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
        title: "Du hast zu viele Zutaten ausgewählt!",
        text: "",
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "#6D9E1F",
        confirmButtonText: "Okay!",
    });
}
function showBottleSizes() {
    Swal.fire({
        title: "Bist du Dir sicher?",
        text: "Deine komplette Zusammenstellung wird bei Größenänderung unwiederruflich gelöscht!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#6D9E1F",
        cancelButtonColor: "#d33",
        confirmButtonText: "Andere Größe wählen!",
        cancelButtonText: "Abbrechen!",
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = "/custom/bottleSize";
        }
    });
}
