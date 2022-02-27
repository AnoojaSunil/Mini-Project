<div id="mapon" style="width: 500px;height:500px"></div>



<script type="text/javascript">
        function initMap() {

  const myLatlng = { lat: 10.113956869232098, lng: 76.71621858189178 };
  const map = new google.maps.Map(document.getElementById("mapon"), {
    zoom: 7,
    center: myLatlng,
  });
  var latitude = document.getElementById('latitude');
  // Create the initial InfoWindow.
  // let infoWindow = new google.maps.InfoWindow({
  //   content: "Click the map to get Lat/Lng!",
  //   position: myLatlng,
  // });

  // infoWindow.open(map);
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {

    var latitude = document.getElementById('latitude');

    // alert(mapsMouseEvent.latLng,null,1);

    latitude.value = JSON.stringify(mapsMouseEvent.latLng, null, 2);
    alert('Location selected Success..');
    return false;
    // Close the current InfoWindow.
    // infoWindow.close();
    // // Create a new InfoWindow.
    // infoWindow = new google.maps.InfoWindow({
    //   position: mapsMouseEvent.latLng,
    // });
    // infoWindow.setContent(
    //   JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
    // );
    // infoWindow.open(map);
  });
}
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7tc_GW33VVRccZlpKEdIlBdhUaRMV6nM&callback=initMap&v=weekly" async="false" defer></script>
<!-- 
<script src="https://code.jquery.com/jquery.js"></script> 
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&callback=initMap"></script> -->

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>