<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Displaying Text Directions With setPanel()</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }
      @media print {
        #map {
          height: 500px;
          margin: 0;
        }
      }

    </style>
  </head>
  <body>
@php
    $order = ($getService->order_id);
    $res_name = ($getService->customer_name);
    $cus_name = ($getService->restaurant_name);
    $address_res = ($getService->address);
    $address_cus = ($getService->address_res);
@endphp
    <div id="floating-panel">
      <input id="start" type="hidden" value="{{ $address_res}}" style="width: 300px;">
      <input id="end" type="hidden" value="{{ $address_cus}}" style="width: 300px">
      <input id="submit" type="submit" onclick="document.getElementById('submit2').style.visibility = 'visible'" value="Xem vị trí shipper">
      <br>
      <input id="submit2" type="submit" value="Xem khoảng cách shipper" style="visibility: hidden;">
    </div>
    <div id="map"></div>
  </body>
    <script>
      var map, infoWindow, marker;
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 16.0544068, lng: 108.2021667},
          disableDefaultUI: true
        });
        
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));
        
        var control = document.getElementById('floating-panel');
        control.style.display = 'block';
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
          //test(directionsService, directionsDisplay);
        };
        document.getElementById('submit').addEventListener('click', onChangeHandler);
        document.getElementById('submit2').addEventListener('click', onChangeHandler);
        //document.getElementById('start').addEventListener('click', onChangeHandler);
        //document.getElementById('end').addEventListener('click', onChangeHandler);
      }
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;
        directionsService.route({
          origin: start,
          destination: end,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var m = Math.ceil((response.routes[0].overview_path.length)/2);
            var s = Math.ceil((response.routes[0].overview_path.length)/2)-Math.ceil((response.routes[0].overview_path.length)/3);
            var middle = response.routes[0].overview_path[m];
            var middleS = response.routes[0].overview_path[s];
            var service = new google.maps.DistanceMatrixService;
            service.getDistanceMatrix({
              origins: [start],
              destinations: [end],
              travelMode: 'DRIVING',
              //unitSystem: google.maps.UnitSystem.METRIC,
              //avoidHighways: false,
              //avoidTolls: false
        }, function(response, status) {
          if (status === 'OK') {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              for (var j = 0; j < results.length; j++){
                var element = results[j];
                var dt = element.distance.text;
                var dr = element.duration.text;
              }
            }
            var contentS ='Shipper';
            infoWindow = new google.maps.InfoWindow({
                content: contentS
            });
            var image = '/files/shipper/scooter.png';
            marker = new google.maps.Marker({
                position: middleS,
                map: map,
                icon: image
            });
            infoWindow.open(map, marker);
            var i = new google.maps.InfoWindow();
          }
        })
            service.getDistanceMatrix({
              origins: [marker.getPosition()],
              destinations: [end],
              travelMode: 'DRIVING',
              //unitSystem: google.maps.UnitSystem.METRIC,
              //avoidHighways: false,
              //avoidTolls: false
        }, function(response, status) {
          if (status === 'OK') {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              for (var j = 0; j < results.length; j++){
                var element = results[j];
                var dt = element.distance.text;
                var dr = element.duration.text;
              }
            }
            var i = new google.maps.InfoWindow();
            var content = '<div>'+dt+
            '<br>'+dr+
            '</div>';
            //alert(content);
            i.setContent(content);
            i.setPosition(middle);
            i.open(map);
          }
        })

          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVq1eRO3SMYnmnXu213mAa9hTj_B7EMcI&language=vi&callback=initMap">
    </script>

</html>
