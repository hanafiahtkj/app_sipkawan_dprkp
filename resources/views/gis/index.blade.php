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
            /* font-size: 1rem; */
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
        .control-sidebar-dark {
            background-color: #343a40ad;
        }
    </style>
</head>
<body class="sidebar-mini layout-fixed control-sidebar-slide-open">
<div id="app">

    <nav class="navbar navbar-expand-md fixed-top bg-transparent">
        <a class="navbar-brand text-white" href="{{ route('boilerplate.gis') }}">
            <img src="{{ asset('images/LOGO1.png') }}" alt="Logo" class="brand-image mr-1" style="height:30px;">
            SIP-KAWAN (WebGIS)
        </a>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a class="btn btn-dark border" data-widget="control-sidebar" data-slide="true" href="#" role="button">
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
                    <i class="fa-solid fa-xmark"></i>
                  </a>
                </div>
              </div>
           <hr class="mb-2">
           <h6>Kecamatan</h6>
           <div class="mb-1"><input type="checkbox" id="wfsLayerVisibleBanjarmasinUtara" v-model="wfsLayerVisibleBanjarmasinUtara" class="mr-1">
                <label for="wfsLayerVisibleBanjarmasinUtara" class="form-check-label"><span>Banjarmasin Utara</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(193 177 148); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
            <div class="mb-1"><input type="checkbox" id="wfsLayerVisibleBanjarmasinSelatan" v-model="wfsLayerVisibleBanjarmasinSelatan" class="mr-1">
                <label for="wfsLayerVisibleBanjarmasinSelatan" class="form-check-label"><span>Banjarmasin Selatan</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(248 104 58); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
            <div class="mb-1"><input type="checkbox" id="wfsLayerVisibleBanjarmasinTimur" v-model="wfsLayerVisibleBanjarmasinTimur" class="mr-1">
                <label for="wfsLayerVisibleBanjarmasinTimur" class="form-check-label"><span>Banjarmasin Timur</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(150 87 157); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
            <div class="mb-1"><input type="checkbox" id="wfsLayerVisibleBanjarmasinBarat" v-model="wfsLayerVisibleBanjarmasinBarat" class="mr-1">
                <label for="wfsLayerVisibleBanjarmasinBarat" class="form-check-label"><span>Banjarmasin Barat</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(186 208 47); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
            <div class="mb-1"><input type="checkbox" id="wfsLayerVisibleBanjarmasinTengah" v-model="wfsLayerVisibleBanjarmasinTengah" class="mr-1">
                <label for="wfsLayerVisibleBanjarmasinTengah" class="form-check-label"><span>Banjarmasin Tengah</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(255 152 0); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
            <hr class="mb-2">
            <h6>Lainnya</h6>
            <div class="mb-1"><input type="checkbox" id="wfsLayerVisiblePerairan" v-model="wfsLayerVisiblePerairan" class="mr-1">
                <label for="wfsLayerVisiblePerairan" class="form-check-label"><span>Perairan</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(14 175 234); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
            <div class="mb-1"><input type="checkbox" id="wfsLayerVisibleSebaranPerumahan" v-model="wfsLayerVisibleSebaranPerumahan" class="mr-1">
                <label for="wfsLayerVisibleSebaranPerumahan" class="form-check-label"><span>Sebaran Perumahan</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(122 140 144); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
            <div class="mb-1"><input type="checkbox" id="wfsLayerVisibleTransportasi" v-model="wfsLayerVisibleTransportasi" class="mr-1">
                <label for="wfsLayerVisibleTransportasi" class="form-check-label"><span>Transportasi</span></label>
                <span style="float: right; border: 2px solid rgb(52 51 48); background-color: rgb(255 255 255); width: 25px; height: 20px; display: inline-block; margin-left: 5px;"></span>
            </div>
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
                    wfsLayerBanjarmasinUtara: null,
                    wfsLayerVisibleBanjarmasinUtara: true,
                    wfsLayerBanjarmasinSelatan: null,
                    wfsLayerVisibleBanjarmasinSelatan: true,
                    wfsLayerBanjarmasinTimur: null,
                    wfsLayerVisibleBanjarmasinTimur: true,
                    wfsLayerBanjarmasinBarat: null,
                    wfsLayerVisibleBanjarmasinBarat: true,
                    wfsLayerBanjarmasinTengah: null,
                    wfsLayerVisibleBanjarmasinTengah: true,
                    wfsLayerPerairan: null,
                    wfsLayerVisiblePerairan: true,
                    wfsLayerSebaranPerumahan: null,
                    wfsLayerVisibleSebaranPerumahan: true,
                    wfsLayerTransportasi: null,
                    wfsLayerVisibleTransportasi: true,
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
                    var wfsSourceBanjarmasinUtara = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABanut&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerBanjarmasinUtara = new ol.layer.Vector({
                        source: wfsSourceBanjarmasinUtara,
                        style: new ol.style.Style({
                            // stroke: new ol.style.Stroke({
                            //     color: 'rgb(52 51 48)',
                            //     width: 1
                            // }),
                            fill: new ol.style.Fill({
                                color: 'rgb(193 177 148)'
                            })
                        })
                    });

                    this.map.addLayer(this.wfsLayerBanjarmasinUtara);
                    this.setupFeatureSelection(this.wfsLayerBanjarmasinUtara);

                    var wfsSourceBanjarmasinSelatan = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABansel&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerBanjarmasinSelatan = new ol.layer.Vector({
                        source: wfsSourceBanjarmasinSelatan,
                        style: new ol.style.Style({
                            // stroke: new ol.style.Stroke({
                            //     color: 'rgb(52 51 48)',
                            //     width: 1
                            // }),
                            fill: new ol.style.Fill({
                                color: 'rgb(248 104 58)'
                            })
                        })
                    });

                    this.map.addLayer(this.wfsLayerBanjarmasinSelatan);
                    this.setupFeatureSelection(this.wfsLayerBanjarmasinSelatan);

                    var wfsSourceBanjarmasinTimur = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABantim&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerBanjarmasinTimur = new ol.layer.Vector({
                        source: wfsSourceBanjarmasinTimur,
                        style: new ol.style.Style({
                            // stroke: new ol.style.Stroke({
                            //     color: 'rgb(52 51 48)',
                            //     width: 1
                            // }),
                            fill: new ol.style.Fill({
                                color: 'rgb(150 87 157)'
                            })
                        })
                    });

                    this.map.addLayer(this.wfsLayerBanjarmasinTimur);
                    this.setupFeatureSelection(this.wfsLayerBanjarmasinTimur);

                    var wfsSourceBanjarmasinBarat = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABanbar&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerBanjarmasinBarat = new ol.layer.Vector({
                        source: wfsSourceBanjarmasinBarat,
                        style: new ol.style.Style({
                            // stroke: new ol.style.Stroke({
                            //     color: 'rgb(52 51 48)',
                            //     width: 1
                            // }),
                            fill: new ol.style.Fill({
                                color: 'rgb(186 208 47)'
                            })
                        })
                    });

                    this.map.addLayer(this.wfsLayerBanjarmasinBarat);
                    this.setupFeatureSelection(this.wfsLayerBanjarmasinBarat);

                    var wfsSourceBanjarmasinTengah = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABanteng&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerBanjarmasinTengah = new ol.layer.Vector({
                        source: wfsSourceBanjarmasinTengah,
                        style: new ol.style.Style({
                            // stroke: new ol.style.Stroke({
                            //     color: 'rgb(52 51 48)',
                            //     width: 1
                            // }),
                            fill: new ol.style.Fill({
                                color: 'rgb(255 152 0)'
                            })
                        })
                    });

                    this.map.addLayer(this.wfsLayerBanjarmasinTengah);
                    this.setupFeatureSelection(this.wfsLayerBanjarmasinTengah);



                    var wfsSourcePerairan = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3APERAIRAN_AR&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerPerairan = new ol.layer.Vector({
                        source: wfsSourcePerairan,
                        style: new ol.style.Style({
                            fill: new ol.style.Fill({
                                color: 'rgb(14 175 234)'
                            })
                        })
                    });

                    this.map.addLayer(this.wfsLayerPerairan);
                    this.setupFeatureSelection(this.wfsLayerPerairan);

                    var wfsSourceSebaranPerumahan = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Perumahan&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerSebaranPerumahan = new ol.layer.Vector({
                        source: wfsSourceSebaranPerumahan,
                        style: new ol.style.Style({
                            // stroke: new ol.style.Stroke({
                            //     color: 'rgb(52 51 48)',
                            //     width: 1
                            // }),
                            fill: new ol.style.Fill({
                                color: 'rgb(122 140 144)'
                            })
                        })
                    });

                    this.map.addLayer(this.wfsLayerSebaranPerumahan);
                    this.setupFeatureSelection(this.wfsLayerSebaranPerumahan);

                    var wfsSourceTransportasi = new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: function(extent) {
                            return 'https://mapping-dprkp.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ATransportasi_LN&outputFormat=application%2Fjson';
                        },
                        strategy: ol.loadingstrategy.bbox,
                    });

                    this.wfsLayerTransportasi = new ol.layer.Vector({
                        source: wfsSourceTransportasi,
                        style: new ol.style.Style({
                            stroke: new ol.style.Stroke({
                                color: 'rgb(255 255 255)',
                                width: 1
                            }),
                        })
                    });

                    this.map.addLayer(this.wfsLayerTransportasi);
                    this.setupFeatureSelection(this.wfsLayerTransportasi);
                },
                setupFeatureSelection(layer) {
                    var selectInteraction = new ol.interaction.Select({
                        layers: [layer],
                        condition: ol.events.condition.singleClick,
                        style: function(feature) {
                            var layerStyle = layer.getStyle();
                            var layerFill = layerStyle.getFill();

                            return new ol.style.Style({
                                stroke: new ol.style.Stroke({
                                    color: 'rgb(52 51 48)',
                                    width: 1
                                }),
                                fill: new ol.style.Fill({
                                    color: layerFill.getColor()
                                })
                            });
                        }
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
                    //
                }
            },
            watch: {
                wfsLayerVisibleBanjarmasinUtara() {
                    var layer = this.wfsLayerBanjarmasinUtara;
                    if (this.wfsLayerVisibleBanjarmasinUtara) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
                wfsLayerVisibleBanjarmasinSelatan() {
                    var layer = this.wfsLayerBanjarmasinSelatan;
                    if (this.wfsLayerVisibleBanjarmasinSelatan) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
                wfsLayerVisibleBanjarmasinTimur() {
                    var layer = this.wfsLayerBanjarmasinTimur;
                    if (this.wfsLayerVisibleBanjarmasinTimur) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
                wfsLayerVisibleBanjarmasinBarat() {
                    var layer = this.wfsLayerBanjarmasinBarat;
                    if (this.wfsLayerVisibleBanjarmasinBarat) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
                wfsLayerVisibleBanjarmasinTengah() {
                    var layer = this.wfsLayerBanjarmasinTengah;
                    if (this.wfsLayerVisibleBanjarmasinTengah) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
                wfsLayerVisiblePerairan() {
                    var layer = this.wfsLayerPerairan;
                    if (this.wfsLayerVisiblePerairan) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
                wfsLayerVisibleSebaranPerumahan() {
                    var layer = this.wfsLayerSebaranPerumahan;
                    if (this.wfsLayerVisibleSebaranPerumahan) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
                wfsLayerVisibleTransportasi() {
                    var layer = this.wfsLayerTransportasi;
                    if (this.wfsLayerVisibleTransportasi) {
                        layer.setVisible(true);
                    } else {
                        layer.setVisible(false);
                    }
                },
            }
        });
    </script>
</body>
</html>
