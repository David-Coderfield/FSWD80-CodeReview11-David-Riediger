<?php
  $loc='lat: 48.2030463, lng: 16.3256411';
?>
<!DOCTYPE html>
<html>

<head>
  <?php require_once 'components/head.php'; ?>
</head>

<body>
  <div class="container">
    <?php require_once 'components/nav.php' ?>
  </div>
  <div class="mt-3" id="map">MAP GOES HERE</div>
</body>
<script>
initMap();

function initMap() {
  let map;
  var pos = { <?= $loc ?> }
  map = new google.maps.Map(document.getElementById('map'), {
    center: pos,
    zoom: 20,
    mapTypeId: 'hybrid'
  });
  var marker = new google.maps.Marker({ position: pos, map: map });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
</body>

</html>