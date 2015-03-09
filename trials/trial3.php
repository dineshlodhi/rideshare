
<script type="text/javascript">
$(document).ready(function () {
function initialize() {

// Define the latitude and longitude positions
var latitude = parseFloat("<?php echo $lat; ?>"); // Latitude get from above variable
var longitude = parseFloat("<?php echo $long; ?>"); // Longitude from same
var latlngPos = new google.maps.LatLng(latitude, longitude);

// Set up options for the Google map
var myOptions = {
zoom: 13,
center: latlngPos,
mapTypeId: google.maps.MapTypeId.ROADMAP,
zoomControlOptions: true,
zoomControlOptions: {
style: google.maps.ZoomControlStyle.LARGE
}
};
// Define the map
map = new google.maps.Map(document.getElementById("display_map"), myOptions);

// // Add the marker
// var marker = new google.maps.Marker({
// position: latlngPos,
// map: map,
// draggable: true,
// //icon:'pinkball.png',
// title: "<?php echo $loc; ?>"
// });


// var infowindow = new google.maps.InfoWindow({
  // content:"<?php echo $loc; ?>"
  // });
  addMarker(latlngPos, 'Default Marker', map);
  
  google.maps.event.addListener(map, 'dragstart', function(event) {
  //infowindow.open(map,marker);
      addMarker(event.latlngPos, 'Click Generated Marker', map);
    
     var lat, lng, address;
                    
  });

   
}
  function addMarker(latlng,title,map) {
    var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: title,
      icon:'map-red.png',
            draggable:true,
       animation: google.maps.Animation.DROP
    });

    google.maps.event.addListener(marker,'drag',function(event) {
     ++.......


        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value= event.latLng.lng();
    });

    google.maps.event.addListener(marker,'dragend',function(event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
    alert(marker.getPosition());
    });
     google.maps.event.addListener(map, 'zoom_changed', function () {
      document.getElementById('zoom').value =map.getZoom();
    });
  
}
google.maps.event.addDomListener(window, 'load', initialize);
});
</script>
<?php } ?>

<div id="display_map" style="width:450px;height:350px; "></div> 