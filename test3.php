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
      (function(exports) {
        "use strict";

        function initMap() {
          exports.map = new google.maps.Map(document.getElementById("map"), {
            center: {
              lat: -34.397,
              lng: 150.644
            },
            zoom: 8
          });
        }

        exports.initMap = initMap;
      })((this.window = this.window || {}));
    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>