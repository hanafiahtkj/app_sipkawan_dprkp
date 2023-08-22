<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="@lang('boilerplate::layout.direction')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WebGIS | {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ config('boilerplate.theme.favicon') ?? mix('favicon.svg', '/assets/vendor/boilerplate') }}">
    <link rel="stylesheet" href="{{ mix('/plugins/fontawesome/fontawesome.min.css', '/assets/vendor/boilerplate') }}">
    <link rel="stylesheet" href="{{ mix('/adminlte.min.css', '/assets/vendor/boilerplate') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/ol@v7.3.0/dist/ol.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.3.0/ol.css">

    <style>
        html, body {
            height: 100%!important;
        }
        #map {
            height: 100%!important;
            margin-top: 55px!important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-light">
        <a class="navbar-brand" href="{{ route('boilerplate.gis') }}">
            <img src="{{ asset('images/LOGO1.png') }}" alt="Logo" class="brand-image mr-1" style="height:30px;">
            WebGIS
        </a>
    </nav>

    <div id="map"></div>

    <div class="modal fade" id="layerPropertiesModal" tabindex="-1" aria-labelledby="layerPropertiesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="layerPropertiesModalLabel">Layer Properties</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Content to display layer properties -->
              <ul id="layerPropertiesList" class="list-group">
                <!-- Properties will be added here -->
              </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <script src="{{ mix('/bootstrap.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/admin-lte.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/boilerplate.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script>$.ajaxSetup({headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}});</script>
    <script>
        var banjarmasinCoordinates = [114.5920, -3.3199];

        var tiled = new ol.layer.Tile({
            // visible: false,
            source: new ol.source.TileWMS({
                url: 'http://103.178.83.101:8080/geoserver/geo_dprkp/wms',
                params: {
                    'FORMAT': 'image/png',
                    'VERSION': '1.1.1',
                    tiled: true,
                        "STYLES": '',
                        "LAYERS": 'geo_dprkp:Sebaran_Perumahan',
                        "exceptions": 'application/vnd.ogc.se_inimage',
                    tilesOrigin: 228089.140625 + "," + 9626074
                }
            })
        });

        var wfsSource = new ol.source.Vector({
            format: new ol.format.GeoJSON(),
            url: function(extent) {
                return 'http://103.178.83.101:8080/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Perumahan&outputFormat=application%2Fjson';
            },
            strategy: ol.loadingstrategy.bbox,
            // projection: 'EPSG:3857',
        });

        var wfsLayer = new ol.layer.Vector({
            source: wfsSource,
            style: new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'rgba(0, 0, 255, 1.0)',
                    width: 2
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(0, 0, 255, 0.2)'
                })
            })
        });

        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                // tiled,
                wfsLayer
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat(banjarmasinCoordinates),
                zoom: 13,
                // projection: 'EPSG:3857',
            })
        });

        wfsSource.once('change', function(event) {
            if (wfsSource.getState() === 'ready') {
                var features = wfsSource.getFeatures();
                if (features.length > 0) {
                    var geometry = features[0].getGeometry();
                    var extent = geometry.getExtent();
                    var center = ol.extent.getCenter(extent);
                    map.getView().setCenter(center);
                }
            }
        });

        var selectInteraction = new ol.interaction.Select({
            layers: [wfsLayer],
            condition: ol.events.condition.singleClick, // Default condition
            style: new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'rgba(0, 0, 255, 1.0)',
                    width: 2
                })
            })
        });

        map.addInteraction(selectInteraction);

        selectInteraction.on('select', function(event) {
            var selectedFeatures = event.selected;
            if (selectedFeatures.length > 0) {
                var properties = selectedFeatures[0].getProperties();
                console.log(properties);
                showLayerProperties(properties);
            }
        });

        function showLayerProperties(properties) {
            var propertiesList = document.getElementById('layerPropertiesList');
            propertiesList.innerHTML = '';
            for (var key in properties) {
                var listItem = document.createElement('li');
                listItem.classList.add('list-group-item');
                listItem.innerHTML = '<strong>' + key + ':</strong> ' + properties[key];
                propertiesList.appendChild(listItem);
            }
            $('#layerPropertiesModal').modal('show');
        }
    </script>
</body>
</html>
