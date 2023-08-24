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

            wfsLayerVisibleSebaranRumahSewa2021: true,

            wfsLayerSebaranRumahSewaBanbar2021: null,
            wfsLayerVisibleSebaranRumahSewaBanbar2021: true,
            wfsLayerSebaranRumahSewaBanteng2021: null,
            wfsLayerVisibleSebaranRumahSewaBanteng2021: true,
            wfsLayerSebaranRumahSewaBantim2021: null,
            wfsLayerVisibleSebaranRumahSewaBantim2021: true,
            wfsLayerSebaranRumahSewaBanut2021: null,
            wfsLayerVisibleSebaranRumahSewaBanut2021: true,

            wfsLayerVisibleSebaranRumahSewa2022: true,

            wfsLayerSebaranRumahSewaBanbar2022: null,
            wfsLayerVisibleSebaranRumahSewaBanbar2022: true,
            wfsLayerSebaranRumahSewaBanSel2022: null,
            wfsLayerVisibleSebaranRumahSewaBansel2022: true,
            wfsLayerSebaranRumahSewaBanteng2022: null,
            wfsLayerVisibleSebaranRumahSewaBanteng2022: true,
            wfsLayerSebaranRumahSewaBantim2022: null,
            wfsLayerVisibleSebaranRumahSewaBantim2022: true,
            wfsLayerSebaranRumahSewaBanut2022: null,
            wfsLayerVisibleSebaranRumahSewaBanut2022: true,
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
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABanut&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinUtara = new ol.layer.Vector({
                source: wfsSourceBanjarmasinUtara,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: 'rgb(177 173 173)',
                        width: 1
                    }),
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
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABansel&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinSelatan = new ol.layer.Vector({
                source: wfsSourceBanjarmasinSelatan,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: 'rgb(177 173 173)',
                        width: 1
                    }),
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
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABantim&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinTimur = new ol.layer.Vector({
                source: wfsSourceBanjarmasinTimur,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: 'rgb(177 173 173)',
                        width: 1
                    }),
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
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABanbar&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinBarat = new ol.layer.Vector({
                source: wfsSourceBanjarmasinBarat,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: 'rgb(177 173 173)',
                        width: 1
                    }),
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
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ABanteng&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinTengah = new ol.layer.Vector({
                source: wfsSourceBanjarmasinTengah,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: 'rgb(177 173 173)',
                        width: 1
                    }),
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
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3APERAIRAN_AR&outputFormat=application%2Fjson';
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
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Perumahan&outputFormat=application%2Fjson';
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

            var wfsSourceSebaranRumahSewaBanbar2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Banbar_2021&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanbar2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanbar2021,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanbar2021);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanbar2021);

            var wfsSourceSebaranRumahSewaBanteng2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Banteng_2021&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanteng2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanteng2021,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanteng2021);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanteng2021);

            var wfsSourceSebaranRumahSewaBantim2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Bantim_2021&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBantim2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBantim2021,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBantim2021);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBantim2021);

            var wfsSourceSebaranRumahSewaBanut2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Banut_2021&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanut2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanut2021,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanut2021);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanut2021);

            var wfsSourceSebaranRumahSewaBanbar2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Banbar_2022&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanbar2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanbar2022,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanbar2022);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanbar2022);

            var wfsSourceSebaranRumahSewaBansel2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Bansel_2022&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBansel2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBansel2022,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBansel2022);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBansel2022);

            var wfsSourceSebaranRumahSewaBanteng2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Banteng_2022&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanteng2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanteng2022,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanteng2022);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanteng2022);

            var wfsSourceSebaranRumahSewaBantim2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Bantim_2022&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBantim2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBantim2022,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBantim2022);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBantim2022);

            var wfsSourceSebaranRumahSewaBanut2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ASebaran_Rumah_Sewa_Banut_2022&outputFormat=application%2Fjson';
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanut2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanut2022,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: 'rgb(34 86 98)'
                    })
                })
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanut2022);
            this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanut2022);

            var wfsSourceTransportasi = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function(extent) {
                    return 'https://geoserver.banjarmasinkota.go.id/geoserver/geo_dprkp/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geo_dprkp%3ATransportasi_LN&outputFormat=application%2Fjson';
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
        wfsLayerVisibleSebaranRumahSewa2021() {
            var layer = this.wfsLayerSebaranRumahSewaBanbar2021;
            if (this.wfsLayerVisibleSebaranRumahSewa2021) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }

            var layer = this.wfsLayerSebaranRumahSewaBanteng2021;
            if (this.wfsLayerVisibleSebaranRumahSewa2021) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }

            var layer = this.wfsLayerSebaranRumahSewaBantim2021;
            if (this.wfsLayerVisibleSebaranRumahSewa2021) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }

            var layer = this.wfsLayerSebaranRumahSewaBanut2021;
            if (this.wfsLayerVisibleSebaranRumahSewa2021) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }
        },
        wfsLayerVisibleSebaranRumahSewa2022() {
            var layer = this.wfsLayerSebaranRumahSewaBanbar2022;
            if (this.wfsLayerVisibleSebaranRumahSewa2022) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }

            var layer = this.wfsLayerSebaranRumahSewaBansel2022;
            if (this.wfsLayerVisibleSebaranRumahSewa2022) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }

            var layer = this.wfsLayerSebaranRumahSewaBanteng2022;
            if (this.wfsLayerVisibleSebaranRumahSewa2022) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }

            var layer = this.wfsLayerSebaranRumahSewaBantim2022;
            if (this.wfsLayerVisibleSebaranRumahSewa2022) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }

            var layer = this.wfsLayerSebaranRumahSewaBanut2022;
            if (this.wfsLayerVisibleSebaranRumahSewa2022) {
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
