<style>
  
  .container-address{
    border: 3px;
    border-radius: 20px;
    border-style: solid;
    background-color: rgba(102, 153, 255, 0.8);
    border-color: rgba(102, 153, 255, 1);
  }
  
</style>

<section class="wrapper">

	<div class="home-background">
    
    <br>
    <img alt="" class="center" src="<?php echo base_url();?>static/img/logo.png" width="250" height="150">
    <br>
    <h1 class="color-blue jauservice-text" style="text-align: center;">Soluciones a tu hogar y tu vida</h1>
    <br>
		<div class="container">
      
      <div class="row">
        <div class="form-group col-md-12 form container-address">
          <br>
          <h3 for="address" class="color-white">Busca tu dirección</h3>
          <p id="emailHelp" class="form-text color-white">Ejemplo: Oriente 3 104, Centro</p>
					<input type="text" class="form-control" id="address" name="address" placeholder="Oriente 3 104">
          <br>
				</div>
      </div>
			
    </div>
    <br>
    <div class="container" id="form">
      <form action="<?php echo base_url();?>index.php/service" method="POST">
        <input type="hidden" id="address_input" name="address">
        <input type="hidden" id="latitude_input" name="latitude">
        <input type="hidden" id="longitude_input" name="longitude">
        <input class="btn btn-secondary w-100 background-blue" type="submit" id="submit" value="Buscar servicios en mi zona"/>
        <div id="map" class="">
        </div>
        <input class="btn btn-secondary w-100 background-blue" type="submit" id="submit" value="Buscar servicios en mi zona"/>
      </form>
    </div>
    
	</div>



	


</section>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDw5YEj8ZuzNIY2NqVGfEyyg6p6R879MAU"></script>
<!--
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW7XIleTM9wQawhDX5uRNbSsO6TunY7Yc&libraries=places&callback=initMap" async defer></script>
-->

<script>

    var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 18.847, lng: -97.106},
          zoom: 14
        });
      }

$(document).ready(function(){
initMap();
    $('#form').hide();
var address = 'address';

    var autocomplete;
    

    autocomplete = new google.maps.places.Autocomplete((document.getElementById('address')), {
        types: ['address'],
        componentRestrictions: {
        country: "MX"
    }
    });
	
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        $('#map').addClass('map');
        console.log(near_place);
    
    $('#form').show();
    $('#address_input').val( $('#address').val() );
    $('#longitude_input').val(near_place.geometry.location.lng());
    $('#latitude_input').val(near_place.geometry.location.lat());

    map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: near_place.geometry.location.lat(), lng: near_place.geometry.location.lng()},
          zoom: 18
        });

    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(near_place.geometry.location.lat(), near_place.geometry.location.lng()),
      map: map
    });

    console.log('va');
    });
});

	
$(document).on('change', '#address', function () {

});
</script>