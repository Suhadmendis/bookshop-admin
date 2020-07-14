<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClBKRU9iKfSLnXVTvdv11RvKwpCrfdoQI&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
    var marker;
      (function(exports) {
        "use strict";

        function initMap() {
          exports.map = new google.maps.Map(document.getElementById("map"), {
            center: {
              lat: 6.929370, 
              lng: 79.864398
            },
            zoom: 12
          });

          var location = { lat: 6.929370, lng: 79.864398 };
          marker = new google.maps.Marker({
            position: location,
            map: exports.map,
            draggable: true,
        });

        if (opener.document.getElementById("loctaion_point_lat").value != "") {
            var pos = {
              lat: parseFloat(opener.document.getElementById("loctaion_point_lat").value),
              lng: parseFloat(opener.document.getElementById("loctaion_point_lng").value),
            };
            marker.setPosition(pos);
        }

        }

        exports.initMap = initMap;
      })((this.window = this.window || {}));
    </script>
  </head>
  <body>
    <div style="
    font-size: 20px;
    background-color: darkgray;
    text-align: center;
    color: white;
    padding: 9px;
    " onClick="setLocation();">Set Lcation</div>
    <div id="map"></div>



    <script>
    function setLocation() {
        // console.log(marker);
        opener.document.getElementById("loctaion_point_lat").value = marker.getPosition().lat();
        opener.document.getElementById("loctaion_point_lng").value = marker.getPosition().lng();
        self.close();
    }
    </script>


  </body>
</html>