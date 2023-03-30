
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
            location.href = "/bottleSize";
        }
    });
}

function showAlertError(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "#6D9E1F",
        confirmButtonText: "Okay!",
    });
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
            removeAllFromCart();
        }
    });
}
function showAlertError(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "#6D9E1F",
        confirmButtonText: "Okay!",
    });
}
function showAlertSuccess(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#6D9E1F",
        confirmButtonText: "Okay!",
    });
}

function showInfo(ingredientId, ingredintName, isAdmin = false) {
    // Implementierung der showInfo-Methode
    axios.get(`/getIngredientInfo/${ingredientId}`, {}).then((response) => {
        var exists = true;
        var ingredientInfo = response.data.ingredientInfo;
        // Build the table HTML
        if (ingredientInfo == null) {
            exists = false;
            var tableHTML =
                "<p>Zu dieser Zutat gibt es keine Inhaltstoff-Informationen</p>";
        } else {
            var tableHTML =
                `
          <table class="alert-table">
          <tbody>
              <tr>
                  <th class="test"><p>Info</p></th>
                  <td>` +
                ingredientInfo.info +
                `</td>
              </tr>
              <tr>
                  <th  class="test"><p>Energie</p></th>
                  <td>` +
                ingredientInfo.energie +
                `</td>
              </tr>
              <tr>
                  <th  class="test">Fett</th>
                  <td>` +
                ingredientInfo.fett +
                `</td>
              </tr>
              <tr>
                  <td  class="test">davon Fettsäuren:</td>
                  <td>` +
                ingredientInfo.fattyacids +
                `</td>
              </tr>
              <tr>
                  <th class="test">Kohlenhydrate</th>
                  <td>` +
                ingredientInfo.carbohydrates +
                `</td>
              </tr>
              <tr>
                  <td  class="test">davon Fruchtzucker:</td>
                  <td>` +
                ingredientInfo.fruitscarbohydrates +
                `</td>
              </tr>
              <tr>
                  <th  class="test"><p>Protein</p></th>
                  <td>` +
                ingredientInfo.protein +
                `</td>
              </tr>
              <tr>
                  <th  class="test"><p>Salz</p></th>
                  <td>` +
                ingredientInfo.salt +
                `</td>
              </tr>
          </tbody>
          </table>
        `;
        }
        // Show the SweetAlert with the table
        Swal.fire({
            title: "Inhaltsstoffe - " + ingredintName,
            html: tableHTML,
            showCloseButton: true,
            showConfirmButton: isAdmin,
            confirmButtonColor: "#000000",
            confirmButtonText: "Bearbeiten!",
        }).then((result) => {
            if (result.isConfirmed) {
                if (exists) {
                    window.location.href =
                        "/showUpdate/ingredientInfo/" + ingredientId;
                } else {
                    // Redirect zur Create-Route
                    window.location.href = "/create-ingredient/" + ingredientId;
                }
            }
        });
    });
}

function showAlertSuccess(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#6D9E1F",
        confirmButtonText: "Weiter!",
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = "/";
        }
    });
}
