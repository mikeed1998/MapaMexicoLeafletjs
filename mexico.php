<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapas</title>
    <link rel="stylesheet" href="vendor/leaflet/leaflet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #map { 
            height: 800px; 
            background-image: url('fondo_mapa.png'); /* Fondo transparente */
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
        }

        .modal-content {
            background-color: rgba(255, 255, 255, 0.9); /* Color de fondo del modal con opacidad */
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="vendor/leaflet/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        var map = L.map('map',  { attributionControl: false }).setView([23.6345, -102.5528], 5);

        // Cargar el archivo GeoJSON y agregarlo al mapa con un estilo personalizado
        $.getJSON('mexico.geojson', function (data) {
            var geojsonLayer = L.geoJson(data, {
                style: {
                    color: 'white',  // Color del borde
                    fillColor: 'black',  // Color de relleno
                    fillOpacity: 0.8  // Opacidad del relleno
                }
            }).addTo(map);

            // Añadir efecto de hover para todos los estados
            geojsonLayer.on('mouseover', function (e) {
                var layer = e.layer;
                layer.setStyle({
                    fillColor: '#FFC000',  // Cambia el color de relleno en hover
                    fillOpacity: 1  // Ajusta la opacidad en hover
                });
            });

            geojsonLayer.on('mouseout', function (e) {
                var layer = e.layer;
                layer.setStyle({
                    fillColor: 'black',  // Restaura el color de relleno
                    fillOpacity: 0.8  // Restaura la opacidad
                });
            });

            geojsonLayer.on('click', function (e) {
                var stateName = e.layer.feature.properties.state_name;
                var modalBody = $('.modal-body');
                
                // Set the content of the modal body
                modalBody.html('<p style="font-size: 2rem; font-weight: 500;">' + stateName + '</p>');

                // Show the modal
                $('#exampleModal').modal('show');
            });
        });

    </script>
</body>
</html>
