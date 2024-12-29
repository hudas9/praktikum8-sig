<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gempa Terkini</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <style>
    #map {
      height: 500px;
    }

    footer {
      margin-top: 20px;
      text-align: center;
    }
  </style>
</head>

<body>
  <h1>Gempa Terkini</h1>

  <div id="map"></div>

  <footer>
    Data sumber: <a href="https://data.bmkg.go.id/gempabumi/" target="_blank">BMKG (Badan Meteorologi, Klimatologi, dan
      Geofisika)</a>
  </footer>

  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

  <script>
    var map = L.map('map').setView([-2.548926, 118.0148634], 5.4);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var earthquakes = @json($earthquakes);

    earthquakes.forEach(function(earthquake) {
      var latitude = parseFloat(earthquake.Coordinates.split(',')[0]);
      var longitude = parseFloat(earthquake.Coordinates.split(',')[1]);

      var circle = L.circle([latitude, longitude], {
        color: 'red',
        fillColor: '#FC0000',
        fillOpacity: 0.5,
        radius: 50000
      }).addTo(map);

      var popupContent = `
        <strong>Wilayah:</strong> ${earthquake.Wilayah}<br>
        <strong>Magnitude:</strong> ${earthquake.Magnitude}<br>
        <strong>Kedalaman:</strong> ${earthquake.Kedalaman}<br>
        <strong>Potensi:</strong> ${earthquake.Potensi}<br>
        <strong>Tanggal:</strong> ${earthquake.Tanggal}<br>
        <strong>Jam:</strong> ${earthquake.Jam}
      `;

      circle.bindPopup(popupContent);
    });
  </script>
</body>

</html>