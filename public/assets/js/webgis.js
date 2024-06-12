new Vue({
    el: "#app",
    data() {
        return {
            map: null,
            banjarmasinCoordinates: [114.592, -3.3199],

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

            wfsLayerVisibleSebaranRumahSewa2021: false,

            wfsLayerSebaranRumahSewaBanbar2021: null,
            wfsLayerVisibleSebaranRumahSewaBanbar2021: true,
            wfsLayerSebaranRumahSewaBanteng2021: null,
            wfsLayerVisibleSebaranRumahSewaBanteng2021: true,
            wfsLayerSebaranRumahSewaBantim2021: null,
            wfsLayerVisibleSebaranRumahSewaBantim2021: true,
            wfsLayerSebaranRumahSewaBanut2021: null,
            wfsLayerVisibleSebaranRumahSewaBanut2021: true,

            wfsLayerVisibleSebaranRumahSewa2022: false,

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

            wfsLayerVisibleSebaranRumahSewaPoint2021: false,

            wfsLayerSebaranRumahSewaPointBanbar2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBanbar2021: true,
            wfsLayerSebaranRumahSewaPointBansel2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBansel2021: true,
            wfsLayerSebaranRumahSewaPointBanteng2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBanteng2021: true,
            wfsLayerSebaranRumahSewaPointBantim2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBantim2021: true,
            wfsLayerSebaranRumahSewaPointBanut2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBanut2021: true,

            wfsLayerVisibleSebaranRumahSewaPoint2022: false,

            wfsLayerSebaranRumahSewaPointBanbar2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBanbar2022: true,
            wfsLayerSebaranRumahSewaPointBansel2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBansel2022: true,
            wfsLayerSebaranRumahSewaPointBanteng2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBanteng2022: true,
            wfsLayerSebaranRumahSewaPointBantim2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBantim2022: true,
            wfsLayerSebaranRumahSewaPointBanut2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBanut2022: true,

            wfsLayerPPDLBFPBanbar: null,
            wfsLayerPPDLBFPBansel: null,
            wfsLayerPPDLBFPBanteng: null,
            wfsLayerPPDLBFPBantim: null,
            wfsLayerPPDLBFPBanut: null,
            wfsLayerVisiblePPDLBFP: false,
        };
    },
    mounted() {
        this.initMap();
    },
    methods: {
        initMap() {
            this.map = new ol.Map({
                target: "map",
                layers: [
                    new ol.layer.Tile({
                        source: new ol.source.OSM(),
                    }),
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
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ABanut&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinUtara = new ol.layer.Vector({
                source: wfsSourceBanjarmasinUtara,
                visible: this.wfsLayerVisibleBanjarmasinUtara,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: "rgb(177 173 173)",
                        width: 1,
                    }),
                    fill: new ol.style.Fill({
                        color: "rgb(193 177 148)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerBanjarmasinUtara);
            this.setupFeatureSelection(this.wfsLayerBanjarmasinUtara);

            var wfsSourceBanjarmasinSelatan = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ABansel&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinSelatan = new ol.layer.Vector({
                source: wfsSourceBanjarmasinSelatan,
                visible: this.wfsLayerVisibleBanjarmasinSelatan,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: "rgb(177 173 173)",
                        width: 1,
                    }),
                    fill: new ol.style.Fill({
                        color: "rgb(248 104 58)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerBanjarmasinSelatan);
            this.setupFeatureSelection(this.wfsLayerBanjarmasinSelatan);

            var wfsSourceBanjarmasinTimur = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ABantim&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinTimur = new ol.layer.Vector({
                source: wfsSourceBanjarmasinTimur,
                visible: this.wfsLayerVisibleBanjarmasinTimur,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: "rgb(177 173 173)",
                        width: 1,
                    }),
                    fill: new ol.style.Fill({
                        color: "rgb(150 87 157)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerBanjarmasinTimur);
            this.setupFeatureSelection(this.wfsLayerBanjarmasinTimur);

            var wfsSourceBanjarmasinBarat = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ABanbar&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinBarat = new ol.layer.Vector({
                source: wfsSourceBanjarmasinBarat,
                visible: this.wfsLayerVisibleBanjarmasinBarat,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: "rgb(177 173 173)",
                        width: 1,
                    }),
                    fill: new ol.style.Fill({
                        color: "rgb(186 208 47)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerBanjarmasinBarat);
            this.setupFeatureSelection(this.wfsLayerBanjarmasinBarat);

            var wfsSourceBanjarmasinTengah = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ABanteng&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerBanjarmasinTengah = new ol.layer.Vector({
                source: wfsSourceBanjarmasinTengah,
                visible: this.wfsLayerVisibleBanjarmasinTengah,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: "rgb(177 173 173)",
                        width: 1,
                    }),
                    fill: new ol.style.Fill({
                        color: "rgb(255 152 0)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerBanjarmasinTengah);
            this.setupFeatureSelection(this.wfsLayerBanjarmasinTengah);

            var wfsSourcePerairan = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3APERAIRAN_AR&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerPerairan = new ol.layer.Vector({
                source: wfsSourcePerairan,
                visible: this.wfsLayerVisiblePerairan,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(14 175 234)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerPerairan);
            this.setupFeatureSelection(this.wfsLayerPerairan);

            var wfsSourceSebaranPerumahan = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Perumahan&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranPerumahan = new ol.layer.Vector({
                source: wfsSourceSebaranPerumahan,
                visible: this.wfsLayerVisibleSebaranPerumahan,
                style: new ol.style.Style({
                    // stroke: new ol.style.Stroke({
                    //     color: 'rgb(52 51 48)',
                    //     width: 1
                    // }),
                    fill: new ol.style.Fill({
                        color: "rgb(122 140 144)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranPerumahan);
            this.setupFeatureSelection(this.wfsLayerSebaranPerumahan);

            // var wfsSourceSebaranRumahSewaBanbar2021 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banbar_2021&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBanbar2021 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBanbar2021,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2021,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBanbar2021);
            // this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanbar2021);

            // var wfsSourceSebaranRumahSewaBanteng2021 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banteng_2021&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBanteng2021 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBanteng2021,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2021,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBanteng2021);
            // this.setupFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaBanteng2021
            // );

            // var wfsSourceSebaranRumahSewaBantim2021 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Bantim_2021&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBantim2021 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBantim2021,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2021,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBantim2021);
            // this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBantim2021);

            // var wfsSourceSebaranRumahSewaBanut2021 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banut_2021&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBanut2021 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBanut2021,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2021,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBanut2021);
            // this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanut2021);

            // var wfsSourceSebaranRumahSewaBanbar2022 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banbar_2022&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBanbar2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBanbar2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2022,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBanbar2022);
            // this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanbar2022);

            // var wfsSourceSebaranRumahSewaBansel2022 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Bansel_2022&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBansel2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBansel2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2022,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBansel2022);
            // this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBansel2022);

            // var wfsSourceSebaranRumahSewaBanteng2022 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banteng_2022&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBanteng2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBanteng2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2022,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBanteng2022);
            // this.setupFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaBanteng2022
            // );

            // var wfsSourceSebaranRumahSewaBantim2022 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Bantim_2022&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBantim2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBantim2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2022,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBantim2022);
            // this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBantim2022);

            // var wfsSourceSebaranRumahSewaBanut2022 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banut_2022&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaBanut2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaBanut2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewa2022,
            //     style: new ol.style.Style({
            //         // stroke: new ol.style.Stroke({
            //         //     color: 'rgb(52 51 48)',
            //         //     width: 1
            //         // }),
            //         fill: new ol.style.Fill({
            //             color: "rgb(34 86 98)",
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaBanut2022);
            // this.setupFeatureSelection(this.wfsLayerSebaranRumahSewaBanut2022);

            var wfsSourceTransportasi = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ATransportasi_LN&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerTransportasi = new ol.layer.Vector({
                source: wfsSourceTransportasi,
                visible: this.wfsLayerVisibleTransportasi,
                style: new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: "rgb(255 255 255)",
                        width: 1,
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerTransportasi);
            this.setupFeatureSelection(this.wfsLayerTransportasi);

            // // var wfsSourceSebaranRumahSewaPointBansel2021 = new ol.source.Vector({
            // //     format: new ol.format.GeoJSON(),
            // //     url: function(extent) {
            // //         return 'https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Bansel_2021&outputFormat=application%2Fjson';
            // //     },
            // //     strategy: ol.loadingstrategy.bbox,
            // // });

            // // this.wfsLayerSebaranRumahSewaPointBansel2021 = new ol.layer.Vector({
            // //     source: wfsSourceSebaranRumahSewaPointBansel2021,
            // //     style: new ol.style.Style({
            // //         image: new ol.style.Icon({
            // //             anchor: [0.5, 1],
            // //             src: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png', // Ganti dengan path gambar Anda
            // //             scale: 0.25, // Ukuran gambar
            // //         }),
            // //     })
            // // });

            // // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBansel2021);
            // // this.setupPointFeatureSelection(this.wfsLayerSebaranRumahSewaPointBansel2021);

            // var wfsSourceSebaranRumahSewaPointBantim2021 = new ol.source.Vector(
            //     {
            //         format: new ol.format.GeoJSON(),
            //         url: function (extent) {
            //             return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Bantim_2021&outputFormat=application%2Fjson";
            //         },
            //         strategy: ol.loadingstrategy.bbox,
            //     }
            // );

            // this.wfsLayerSebaranRumahSewaPointBantim2021 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaPointBantim2021,
            //     visible: this.wfsLayerVisibleSebaranRumahSewaPoint2021,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBantim2021);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBantim2021
            // );

            // var wfsSourceSebaranRumahSewaPointBanbar2021 = new ol.source.Vector(
            //     {
            //         format: new ol.format.GeoJSON(),
            //         url: function (extent) {
            //             return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Banbar_2021&outputFormat=application%2Fjson";
            //         },
            //         strategy: ol.loadingstrategy.bbox,
            //     }
            // );

            // this.wfsLayerSebaranRumahSewaPointBanbar2021 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaPointBanbar2021,
            //     visible: this.wfsLayerVisibleSebaranRumahSewaPoint2021,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBanbar2021);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBanbar2021
            // );

            // var wfsSourceSebaranRumahSewaPointBanteng2021 =
            //     new ol.source.Vector({
            //         format: new ol.format.GeoJSON(),
            //         url: function (extent) {
            //             return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Banteng_2021&outputFormat=application%2Fjson";
            //         },
            //         strategy: ol.loadingstrategy.bbox,
            //     });

            // this.wfsLayerSebaranRumahSewaPointBanteng2021 = new ol.layer.Vector(
            //     {
            //         source: wfsSourceSebaranRumahSewaPointBanteng2021,
            //         visible: this.wfsLayerVisibleSebaranRumahSewaPoint2021,
            //         style: new ol.style.Style({
            //             image: new ol.style.Icon({
            //                 anchor: [0.5, 1],
            //                 src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //                 scale: 0.25, // Ukuran gambar
            //             }),
            //         }),
            //     }
            // );

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBanteng2021);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBanteng2021
            // );

            // var wfsSourceSebaranRumahSewaPointBanut2021 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Banut_2021&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaPointBanut2021 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaPointBanut2021,
            //     visible: this.wfsLayerVisibleSebaranRumahSewaPoint2021,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBanut2021);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBanut2021
            // );

            // var wfsSourceSebaranRumahSewaPointBansel2022 = new ol.source.Vector(
            //     {
            //         format: new ol.format.GeoJSON(),
            //         url: function (extent) {
            //             return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Bansel_2022&outputFormat=application%2Fjson";
            //         },
            //         strategy: ol.loadingstrategy.bbox,
            //     }
            // );

            // this.wfsLayerSebaranRumahSewaPointBansel2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaPointBansel2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewaPoint2022,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBansel2022);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBansel2022
            // );

            // var wfsSourceSebaranRumahSewaPointBantim2022 = new ol.source.Vector(
            //     {
            //         format: new ol.format.GeoJSON(),
            //         url: function (extent) {
            //             return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Bantim_2022&outputFormat=application%2Fjson";
            //         },
            //         strategy: ol.loadingstrategy.bbox,
            //     }
            // );

            // this.wfsLayerSebaranRumahSewaPointBantim2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaPointBantim2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewaPoint2022,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBantim2022);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBantim2022
            // );

            // var wfsSourceSebaranRumahSewaPointBanbar2022 = new ol.source.Vector(
            //     {
            //         format: new ol.format.GeoJSON(),
            //         url: function (extent) {
            //             return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Banbar_2022&outputFormat=application%2Fjson";
            //         },
            //         strategy: ol.loadingstrategy.bbox,
            //     }
            // );

            // this.wfsLayerSebaranRumahSewaPointBanbar2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaPointBanbar2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewaPoint2022,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBanbar2022);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBanbar2022
            // );

            // var wfsSourceSebaranRumahSewaPointBanteng2022 =
            //     new ol.source.Vector({
            //         format: new ol.format.GeoJSON(),
            //         url: function (extent) {
            //             return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Banteng_2022&outputFormat=application%2Fjson";
            //         },
            //         strategy: ol.loadingstrategy.bbox,
            //     });

            // this.wfsLayerSebaranRumahSewaPointBanteng2022 = new ol.layer.Vector(
            //     {
            //         source: wfsSourceSebaranRumahSewaPointBanteng2022,
            //         visible: this.wfsLayerVisibleSebaranRumahSewaPoint2022,
            //         style: new ol.style.Style({
            //             image: new ol.style.Icon({
            //                 anchor: [0.5, 1],
            //                 src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //                 scale: 0.25, // Ukuran gambar
            //             }),
            //         }),
            //     }
            // );

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBanteng2022);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBanteng2022
            // );

            // var wfsSourceSebaranRumahSewaPointBanut2022 = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Point_Banut_2022&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerSebaranRumahSewaPointBanut2022 = new ol.layer.Vector({
            //     source: wfsSourceSebaranRumahSewaPointBanut2022,
            //     visible: this.wfsLayerVisibleSebaranRumahSewaPoint2022,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerSebaranRumahSewaPointBanut2022);
            // this.setupPointFeatureSelection(
            //     this.wfsLayerSebaranRumahSewaPointBanut2022
            // );

            // var wfsSourcePPDLBFPBanbar = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3APPDLBFP_BJM_BARAT&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerPPDLBFPBanbar = new ol.layer.Vector({
            //     source: wfsSourcePPDLBFPBanbar,
            //     visible: this.wfsLayerVisiblePPDLBFP,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerPPDLBFPBanbar);
            // this.setupPointFeatureSelection(this.wfsLayerPPDLBFPBanbar);

            // var wfsSourcePPDLBFPBansel = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3APPDLBFP_BJM_SELATAN&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerPPDLBFPBansel = new ol.layer.Vector({
            //     source: wfsSourcePPDLBFPBansel,
            //     visible: this.wfsLayerVisiblePPDLBFP,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerPPDLBFPBansel);
            // this.setupPointFeatureSelection(this.wfsLayerPPDLBFPBansel);

            // var wfsSourcePPDLBFPBanteng = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3APPDLBFP_BJM_TENGAH&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerPPDLBFPBanteng = new ol.layer.Vector({
            //     source: wfsSourcePPDLBFPBanteng,
            //     visible: this.wfsLayerVisiblePPDLBFP,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerPPDLBFPBanteng);
            // this.setupPointFeatureSelection(this.wfsLayerPPDLBFPBanteng);

            // var wfsSourcePPDLBFPBantim = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3APPDLBFP_BJM_TIMUR&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerPPDLBFPBantim = new ol.layer.Vector({
            //     source: wfsSourcePPDLBFPBantim,
            //     visible: this.wfsLayerVisiblePPDLBFP,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerPPDLBFPBantim);
            // this.setupPointFeatureSelection(this.wfsLayerPPDLBFPBantim);

            // var wfsSourcePPDLBFPBanut = new ol.source.Vector({
            //     format: new ol.format.GeoJSON(),
            //     url: function (extent) {
            //         return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3APPDLBFP_BJM_UTARA&outputFormat=application%2Fjson";
            //     },
            //     strategy: ol.loadingstrategy.bbox,
            // });

            // this.wfsLayerPPDLBFPBanut = new ol.layer.Vector({
            //     source: wfsSourcePPDLBFPBanut,
            //     visible: this.wfsLayerVisiblePPDLBFP,
            //     style: new ol.style.Style({
            //         image: new ol.style.Icon({
            //             anchor: [0.5, 1],
            //             src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
            //             scale: 0.25, // Ukuran gambar
            //         }),
            //     }),
            // });

            // this.map.addLayer(this.wfsLayerPPDLBFPBanut);
            // this.setupPointFeatureSelection(this.wfsLayerPPDLBFPBanut);
        },
        setupFeatureSelection(layer) {
            var selectInteraction = new ol.interaction.Select({
                layers: [layer],
                condition: ol.events.condition.singleClick,
                style: function (feature) {
                    var layerStyle = layer.getStyle();
                    var layerFill = layerStyle.getFill();

                    return new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: "rgb(52 51 48)",
                            width: 1,
                        }),
                        fill: new ol.style.Fill({
                            color: layerFill.getColor(),
                        }),
                    });
                },
            });

            this.map.addInteraction(selectInteraction);

            selectInteraction.on("select", (event) => {
                var selectedFeatures = event.selected;
                if (selectedFeatures.length > 0) {
                    var properties = selectedFeatures[0].getProperties();
                    this.showLayerProperties(properties);
                }
            });
        },
        setupPointFeatureSelection(layer) {
            var selectInteraction = new ol.interaction.Select({
                layers: [layer],
                condition: ol.events.condition.singleClick,
                style: function (feature) {
                    var layerStyle = layer.getStyle();
                    var layerFill = layerStyle.getFill();

                    return new ol.style.Style({
                        image: new ol.style.Icon({
                            anchor: [0.5, 1],
                            src: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png", // Ganti dengan path gambar Anda
                            scale: 0.25, // Ukuran gambar
                        }),
                    });
                },
            });

            this.map.addInteraction(selectInteraction);

            selectInteraction.on("select", (event) => {
                var selectedFeatures = event.selected;
                if (selectedFeatures.length > 0) {
                    var properties = selectedFeatures[0].getProperties();
                    this.showLayerProperties(properties);
                }
            });
        },
        showLayerProperties(properties) {
            var propertiesList = document.getElementById("layerPropertiesList");
            propertiesList.innerHTML = "";
            for (var key in properties) {
                var listItem = document.createElement("li");
                listItem.classList.add("list-group-item");
                listItem.innerHTML =
                    "<strong>" + key + ":</strong> " + properties[key];
                propertiesList.appendChild(listItem);
            }
            $("#layerPropertiesModal").modal("show");
        },
        updateMapLayers() {
            //
        },
    },
    watch: {
        wfsLayerVisibleBanjarmasinUtara() {
            var layer = this.wfsLayerBanjarmasinUtara;
            layer.setVisible(this.wfsLayerVisibleBanjarmasinUtara);
        },
        wfsLayerVisibleBanjarmasinSelatan() {
            var layer = this.wfsLayerBanjarmasinSelatan;
            layer.setVisible(this.wfsLayerVisibleBanjarmasinSelatan);
        },
        wfsLayerVisibleBanjarmasinTimur() {
            var layer = this.wfsLayerBanjarmasinTimur;
            layer.setVisible(this.wfsLayerVisibleBanjarmasinTimur);
        },
        wfsLayerVisibleBanjarmasinBarat() {
            var layer = this.wfsLayerBanjarmasinBarat;
            layer.setVisible(this.wfsLayerVisibleBanjarmasinBarat);
        },
        wfsLayerVisibleBanjarmasinTengah() {
            var layer = this.wfsLayerBanjarmasinTengah;
            layer.setVisible(this.wfsLayerVisibleBanjarmasinTengah);
        },
        wfsLayerVisiblePerairan() {
            var layer = this.wfsLayerPerairan;
            layer.setVisible(this.wfsLayerVisiblePerairan);
        },
        wfsLayerVisibleSebaranPerumahan() {
            var layer = this.wfsLayerSebaranPerumahan;
            layer.setVisible(this.wfsLayerVisibleSebaranPerumahan);
        },
        wfsLayerVisibleSebaranRumahSewa2021() {
            var layer = this.wfsLayerSebaranRumahSewaBanbar2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2021);

            var layer = this.wfsLayerSebaranRumahSewaBanteng2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2021);

            var layer = this.wfsLayerSebaranRumahSewaBantim2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2021);

            var layer = this.wfsLayerSebaranRumahSewaBanut2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2021);
        },
        wfsLayerVisibleSebaranRumahSewa2022() {
            var layer = this.wfsLayerSebaranRumahSewaBanbar2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2022);

            var layer = this.wfsLayerSebaranRumahSewaBansel2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2022);

            var layer = this.wfsLayerSebaranRumahSewaBanteng2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2022);

            var layer = this.wfsLayerSebaranRumahSewaBantim2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2022);

            var layer = this.wfsLayerSebaranRumahSewaBanut2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewa2022);
        },
        wfsLayerVisibleSebaranRumahSewaPoint2021() {
            var layer = this.wfsLayerSebaranRumahSewaPointBanbar2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2021);

            var layer = this.wfsLayerSebaranRumahSewaPointBanteng2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2021);

            var layer = this.wfsLayerSebaranRumahSewaPointBantim2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2021);

            var layer = this.wfsLayerSebaranRumahSewaPointBanut2021;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2021);
        },
        wfsLayerVisibleSebaranRumahSewaPoint2022() {
            var layer = this.wfsLayerSebaranRumahSewaPointBanbar2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2022);

            var layer = this.wfsLayerSebaranRumahSewaPointBansel2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2022);

            var layer = this.wfsLayerSebaranRumahSewaPointBanteng2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2022);

            var layer = this.wfsLayerSebaranRumahSewaPointBantim2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2022);

            var layer = this.wfsLayerSebaranRumahSewaPointBanut2022;
            layer.setVisible(this.wfsLayerVisibleSebaranRumahSewaPoint2022);
        },
        wfsLayerVisibleTransportasi() {
            var layer = this.wfsLayerTransportasi;
            if (this.wfsLayerVisibleTransportasi) {
                layer.setVisible(true);
            } else {
                layer.setVisible(false);
            }
        },
        wfsLayerVisiblePPDLBFP() {
            var layer = this.wfsLayerPPDLBFPBanbar;
            layer.setVisible(this.wfsLayerVisiblePPDLBFP);

            var layer = this.wfsLayerPPDLBFPBansel;
            layer.setVisible(this.wfsLayerVisiblePPDLBFP);

            var layer = this.wfsLayerPPDLBFPBanteng;
            layer.setVisible(this.wfsLayerVisiblePPDLBFP);

            var layer = this.wfsLayerPPDLBFPBantim;
            layer.setVisible(this.wfsLayerVisiblePPDLBFP);

            var layer = this.wfsLayerPPDLBFPBanut;
            layer.setVisible(this.wfsLayerVisiblePPDLBFP);
        },
    },
});
