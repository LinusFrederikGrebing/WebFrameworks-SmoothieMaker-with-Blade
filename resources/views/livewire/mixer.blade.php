<script>
	$(document).ready(function() {
		setup();
	});
</script>
<div class="containerMixer max-w-none">
    <canvas class="mx-8" id="myCanvas" width="240" height="330"></canvas>
    <img id="mixerLogo" src="/images/mixer2.png" class="mixer mt-2 max-w-none" />
    <img id="becherLogo" src="/images/becher.png" class="mixer mt-2 max-w-none" />
    <div class="becherWrapper">
      <object
        id="liquidImage"
        type="image/svg+xml"
        data="/images/liquid.svg"
        class="inner-image"
      ></object>
    </div>
    <div class="becherWrapper">
      <object
        id="innerImage"
        type="image/svg+xml"
        data="/images/smoothie-juice.svg"
        class="inner-image"
      ></object>
    </div>
    <img id="mlZahlLogo" src="/images/mlzahl.png" class="mixer mt-2 max-w-none" />
  </div>
		
<script src="{{ asset('js/mixer.js') }}"></script>