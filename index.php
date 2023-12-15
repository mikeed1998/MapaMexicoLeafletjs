<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapas</title>
    <link rel="stylesheet" href="vendor/leaflet/leaflet.css">
    <style>
        #map { 
            height: 680px; 
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script src="vendor/leaflet/leaflet.js"></script>
    <script>
        // Coordenadas aproximadas del centro de Guadalajara (ZMG)
        var latitudGuadalajara = 20.642161573480585;
        var longitudGuadalajara = -103.39664001629723;

        // Coordenadas para "Wozial Marketing Lovers"
        var latitudWozial = 20.642161573480585;
        var longitudWozial = -103.39664001629723;

        // Coordenadas para "Codenation"
        var latitudCodenation = 20.63931383536029;
        var longitudCodenation = -103.40333235310447;

        // Inicializa el mapa
        var mymap = L.map('map').setView([latitudGuadalajara, longitudGuadalajara], 13);

        // Crea un ícono personalizado
        var customIcon = L.icon({
            iconUrl: 'icons/home.png',
            iconSize: [32, 32], // Ajusta el tamaño de acuerdo a tus necesidades
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        // Agrega un mapa base de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mymap);

        // Agrega marcadores con íconos personalizados
        L.marker([latitudWozial, longitudWozial], { icon: customIcon }).addTo(mymap)
            .bindPopup('Wozial Marketing Lovers')
            .openPopup();

        L.marker([latitudCodenation, longitudCodenation], { icon: customIcon }).addTo(mymap)
            .bindPopup('Codenation')
            .openPopup();
    </script>
</body>
</html>