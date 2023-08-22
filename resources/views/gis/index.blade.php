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
        #app {
            width: 100%;
            height: 100%;
        }
        #map {
            height: 100%!important;
            /* margin-top: 55px!important; */
        }
        .ol-zoom {
            top: 65px;
        }
        .navbar-brand {
            background-color: #343a40;
            padding: 5px 15px;
            border-radius: 10px;
        }
        .layout-fixed .control-sidebar, .layout-fixed .main-sidebar {
            top: 65px;
            right: 10px;
            bottom: 10px;
            overflow: hidden;
        }
        .control-sidebar:before {
            top: 65px;
            right: 10px;
            bottom: 15px;
        }
        .control-sidebar-slide-open .control-sidebar, .control-sidebar-slide-open .control-sidebar:before {
            right: 10px;
            bottom: 10px;
        }
        .control-sidebar {
            border-radius: 10px;
        }

    </style>
</head>
<body class="sidebar-mini layout-fixed">
<div id="app">

    <nav class="navbar navbar-expand-md fixed-top bg-transparent">
        <a class="navbar-brand text-white" href="{{ route('boilerplate.gis') }}">
            <img src="{{ asset('images/LOGO1.png') }}" alt="Logo" class="brand-image mr-1" style="height:30px;">
            SIP-KAWAN (WebGIS)
        </a>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a class="btn btn-light border" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="control-sidebar control-sidebar-dark" style="display: none;">
        <div class="p-3 control-sidebar-content" style="">
            <div class="row">
                <div class="col">
                  <h5 class="mb-0 mt-1">Control Panel</h5>
                </div>
                <div class="col-auto">
                  <a class="btn btn-dark btn-sm" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    {{-- <i class="fa-solid fa-forward"></i> --}}
                    <i class="fa-solid fa-xmark"></i>
                  </a>
                </div>
              </div>
           <hr class="mb-2">
           <h6>Layers</h6>
           <div class="mb-1"><input type="checkbox" v-model="wfsLayerVisibleSebaranPerumahan" class="mr-1"><span>Sebaran Perumahan</span></div>
           {{-- <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Dropdown Legacy Offset</span></div> --}}
           <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Layer 2</span></div>
           <h6>Sidebar Options</h6>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Collapsed</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini MD</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini XS</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Flat Style</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Legacy Style</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Compact</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Indent</span></div>
           <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Hide on Collapse</span></div>
           <hr class="mb-2">

        </div>
    </aside>

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

</div>

    <script src="{{ mix('/bootstrap.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/admin-lte.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script src="{{ mix('/boilerplate.min.js', '/assets/vendor/boilerplate') }}"></script>
    <script>$.ajaxSetup({headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}});</script>
    <script src="{{ asset('assets/js/vue.min.js') }}"></script>
    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    map: null,
                    banjarmasinCoordinates: [114.5920, -3.3199],
                    wfsLayerSebaranPerumahan: null,
                    wfsLayerVisibleSebaranPerumahan: true,
                };
            },
            mounted() {
                this.initMap();
            },
            methods: {
                initMap() {
                    this.map = new ol.Map({
                        target: 'map',
                        layers: [
                            new ol.layer.Tile({
                                source: new ol.source.OSM()
                            })
                        ],
                        view: new ol.View({
                            center: ol.proj.fromLonLat(this.banjarmasinCoordinates),
                            zoom: 13,
                        }),
                    });

                    this.createWfsLayer();
                },
                createWfsLayer() {
                    var wfsSourceSebaranPerumahan = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'http://103.178.83.101:8080/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Perumahan&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerSebaranPerumahan = new ol.layer.Vector({
                        source: wfsSourceSebaranPerumahan,
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

                    this.setupFeatureSelection(this.wfsLayerSebaranPerumahan);

                    this.updateMapLayers();
                },
                setupFeatureSelection(layer) {
                    var selectInteraction = new ol.interaction.Select({
                        layers: [layer],
                        condition: ol.events.condition.singleClick,
                        style: new ol.style.Style({
                            stroke: new ol.style.Stroke({
                                color: 'rgba(0, 0, 255, 1.0)',
                                width: 2
                            })
                        })
                    });

                    this.map.addInteraction(selectInteraction);

                    selectInteraction.on('select', (event) => {
                        var selectedFeatures = event.selected;
                        if (selectedFeatures.length > 0) {
                            var properties = selectedFeatures[0].getProperties();
                            this.showLayerProperties(properties);
                        }
                    });
                },
                showLayerProperties(properties) {
                    var propertiesList = document.getElementById('layerPropertiesList');
                    propertiesList.innerHTML = '';
                    for (var key in properties) {
                        var listItem = document.createElement('li');
                        listItem.classList.add('list-group-item');
                        listItem.innerHTML = '<strong>' + key + ':</strong> ' + properties[key];
                        propertiesList.appendChild(listItem);
                    }
                    $('#layerPropertiesModal').modal('show');
                },
                updateMapLayers() {
                    var map = this.map;

                    var layer = this.wfsLayerSebaranPerumahan;
                    if (this.wfsLayerVisibleSebaranPerumahan) {
                        map.addLayer(layer);
                    } else {
                        map.removeLayer(layer);
                    }
                }
            },
            watch: {
                wfsLayerVisibleSebaranPerumahan() {
                    this.updateMapLayers();
                }
            }
        });
    </script>
</body>
</html>
