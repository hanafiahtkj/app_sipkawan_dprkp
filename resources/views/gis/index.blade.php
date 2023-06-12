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

    <script src="{{ mix('/bootstrap.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/admin-lte.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/boilerplate.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script>$.ajaxSetup({headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}});</script>
    <script>
        var tiled = new ol.layer.Tile({
            // visible: false,
            source: new ol.source.TileWMS({
            url: 'http://103.178.83.101:8080/geoserver/geo_dprkp/wms',
            params: {'FORMAT': 'image/png',
                    'VERSION': '1.1.1',
                    tiled: true,
                    "STYLES": '',
                    "LAYERS": 'geo_dprkp:gis_osm_landuse_a_free_1',
                    "exceptions": 'application/vnd.ogc.se_inimage',
                tilesOrigin: 105.05850982666016 + "," + -4.132193565368652
            }
            })
        });

        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                tiled,
            ],
            view: new ol.View({
                center: [0, 0],
                zoom: 2
            })
        });
    </script>
</body>
</html>
