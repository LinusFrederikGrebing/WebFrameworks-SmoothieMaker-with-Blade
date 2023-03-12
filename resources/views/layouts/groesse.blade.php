<div class="mt-3">
    <div class="d-flex">
      <h5 class="font-weight-bold">Smoothie-Größe: <span class="bottle-name"></span></h5>
      <button class="showBottleSizes" onclick="showBottleSizes()">
        <v-icon small class="ml-3 mb-1">mdi-pencil</v-icon>
      </button>
    </div>

    <p>
      Aktuell hast du <b><span class="cart-count"></span> </b> von
      <b><span class="bottle-amount"></span></b> benötigte Zutaten
      und <b><span class="liquid-count"></span></b> von <b>1</b> benötigte Flüssigkeit für Größe <b><span class="bottle-name"></span></b> ausgewählt.
    </p>
  </div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
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
          location.href = "/chooseBottleSize";
        }
      });
    }
</script>
