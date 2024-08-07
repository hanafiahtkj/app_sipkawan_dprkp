new Vue({
    el: "#app",
    data() {
        return {
            map: null,
            banjarmasinCoordinates: [114.592, -3.3199],
            layersConfig: {
                wfsLayerSebaranPerumahan: ["nam_permha", "nama_penge"],
            },
            displayNames: {
                nam_permha: "Nama Perumahan",
                nama_penge: "Nama Pengembang",
            },

            wfsLayerBanjarmasinUtara: null,
            wfsLayerVisibleBanjarmasinUtara: false,
            wfsLayerBanjarmasinSelatan: null,
            wfsLayerVisibleBanjarmasinSelatan: false,
            wfsLayerBanjarmasinTimur: null,
            wfsLayerVisibleBanjarmasinTimur: false,
            wfsLayerBanjarmasinBarat: null,
            wfsLayerVisibleBanjarmasinBarat: false,
            wfsLayerBanjarmasinTengah: null,
            wfsLayerVisibleBanjarmasinTengah: false,

            wfsLayerPerairan: null,
            wfsLayerVisiblePerairan: false,
            wfsLayerSebaranPerumahan: null,
            wfsLayerVisibleSebaranPerumahan: false,
            wfsLayerTransportasi: null,
            wfsLayerVisibleTransportasi: false,

            wfsLayerVisibleSebaranRumahSewa2021: false,

            wfsLayerSebaranRumahSewaBanbar2021: null,
            wfsLayerVisibleSebaranRumahSewaBanbar2021: false,
            wfsLayerSebaranRumahSewaBanteng2021: null,
            wfsLayerVisibleSebaranRumahSewaBanteng2021: false,
            wfsLayerSebaranRumahSewaBantim2021: null,
            wfsLayerVisibleSebaranRumahSewaBantim2021: false,
            wfsLayerSebaranRumahSewaBanut2021: null,
            wfsLayerVisibleSebaranRumahSewaBanut2021: false,

            wfsLayerVisibleSebaranRumahSewa2022: false,

            wfsLayerSebaranRumahSewaBanbar2022: null,
            wfsLayerVisibleSebaranRumahSewaBanbar2022: false,
            wfsLayerSebaranRumahSewaBanSel2022: null,
            wfsLayerVisibleSebaranRumahSewaBansel2022: false,
            wfsLayerSebaranRumahSewaBanteng2022: null,
            wfsLayerVisibleSebaranRumahSewaBanteng2022: false,
            wfsLayerSebaranRumahSewaBantim2022: null,
            wfsLayerVisibleSebaranRumahSewaBantim2022: false,
            wfsLayerSebaranRumahSewaBanut2022: null,
            wfsLayerVisibleSebaranRumahSewaBanut2022: false,

            wfsLayerVisibleSebaranRumahSewaPoint2021: false,

            wfsLayerSebaranRumahSewaPointBanbar2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBanbar2021: false,
            wfsLayerSebaranRumahSewaPointBansel2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBansel2021: false,
            wfsLayerSebaranRumahSewaPointBanteng2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBanteng2021: false,
            wfsLayerSebaranRumahSewaPointBantim2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBantim2021: false,
            wfsLayerSebaranRumahSewaPointBanut2021: null,
            wfsLayerVisibleSebaranRumahSewaPointBanut2021: false,

            wfsLayerVisibleSebaranRumahSewaPoint2022: false,

            wfsLayerSebaranRumahSewaPointBanbar2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBanbar2022: false,
            wfsLayerSebaranRumahSewaPointBansel2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBansel2022: false,
            wfsLayerSebaranRumahSewaPointBanteng2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBanteng2022: false,
            wfsLayerSebaranRumahSewaPointBantim2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBantim2022: false,
            wfsLayerSebaranRumahSewaPointBanut2022: null,
            wfsLayerVisibleSebaranRumahSewaPointBanut2022: false,

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
        this.setLayerVisibilityFromURL();
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
        setLayerVisibilityFromURL() {
            const urlParams = new URLSearchParams(window.location.search);

            const layers = [
                "wfsLayerVisibleBanjarmasinUtara",
                "wfsLayerVisibleBanjarmasinSelatan",
                "wfsLayerVisibleBanjarmasinTimur",
                "wfsLayerVisibleBanjarmasinBarat",
                "wfsLayerVisibleBanjarmasinTengah",
                "wfsLayerVisiblePerairan",
                "wfsLayerVisibleSebaranPerumahan",
                "wfsLayerVisibleTransportasi",
                "wfsLayerVisibleSebaranRumahSewa2021",
                "wfsLayerVisibleSebaranRumahSewaBanbar2021",
                "wfsLayerVisibleSebaranRumahSewaBanteng2021",
                "wfsLayerVisibleSebaranRumahSewaBantim2021",
                "wfsLayerVisibleSebaranRumahSewaBanut2021",
                "wfsLayerVisibleSebaranRumahSewa2022",
                "wfsLayerVisibleSebaranRumahSewaBanbar2022",
                "wfsLayerVisibleSebaranRumahSewaBansel2022",
                "wfsLayerVisibleSebaranRumahSewaBanteng2022",
                "wfsLayerVisibleSebaranRumahSewaBantim2022",
                "wfsLayerVisibleSebaranRumahSewaBanut2022",
                "wfsLayerVisibleSebaranRumahSewaPoint2021",
                "wfsLayerVisibleSebaranRumahSewaPointBanbar2021",
                "wfsLayerVisibleSebaranRumahSewaPointBansel2021",
                "wfsLayerVisibleSebaranRumahSewaPointBanteng2021",
                "wfsLayerVisibleSebaranRumahSewaPointBantim2021",
                "wfsLayerVisibleSebaranRumahSewaPointBanut2021",
                "wfsLayerVisibleSebaranRumahSewaPoint2022",
                "wfsLayerVisibleSebaranRumahSewaPointBanbar2022",
                "wfsLayerVisibleSebaranRumahSewaPointBansel2022",
                "wfsLayerVisibleSebaranRumahSewaPointBanteng2022",
                "wfsLayerVisibleSebaranRumahSewaPointBantim2022",
                "wfsLayerVisibleSebaranRumahSewaPointBanut2022",
                "wfsLayerVisiblePPDLBFP",
            ];

            layers.forEach((layer) => {
                const param = urlParams.get(layer);
                if (param !== null) {
                    this[layer] = param.toLowerCase() === "true";
                }
            });
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
            this.setupFeatureSelection(
                this.wfsLayerBanjarmasinUtara,
                "wfsLayerBanjarmasinUtara"
            );

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
            this.setupFeatureSelection(
                this.wfsLayerBanjarmasinSelatan,
                "wfsLayerBanjarmasinSelatan"
            );

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
            this.setupFeatureSelection(
                this.wfsLayerBanjarmasinTimur,
                "wfsLayerBanjarmasinTimur"
            );

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
            this.setupFeatureSelection(
                this.wfsLayerBanjarmasinBarat,
                "wfsLayerBanjarmasinBarat"
            );

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
            this.setupFeatureSelection(
                this.wfsLayerBanjarmasinTengah,
                "wfsLayerBanjarmasinTengah"
            );

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
            this.setupFeatureSelection(
                this.wfsLayerPerairan,
                "wfsLayerPerairan"
            );

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
                    fill: new ol.style.Fill({
                        color: "rgb(84 130 53)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranPerumahan);
            this.setupFeatureSelection(
                this.wfsLayerSebaranPerumahan,
                "wfsLayerSebaranPerumahan"
            );

            var wfsSourceSebaranRumahSewaBanbar2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banbar_2021&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanbar2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanbar2021,
                visible: this.wfsLayerVisibleSebaranRumahSewa2021,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanbar2021);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBanbar2021,
                "wfsLayerSebaranRumahSewaBanbar2021"
            );

            var wfsSourceSebaranRumahSewaBanteng2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banteng_2021&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanteng2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanteng2021,
                visible: this.wfsLayerVisibleSebaranRumahSewa2021,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanteng2021);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBanteng2021,
                "wfsLayerSebaranRumahSewaBanteng2021"
            );

            var wfsSourceSebaranRumahSewaBantim2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Bantim_2021&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBantim2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBantim2021,
                visible: this.wfsLayerVisibleSebaranRumahSewa2021,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBantim2021);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBantim2021,
                "wfsLayerSebaranRumahSewaBantim2021"
            );

            var wfsSourceSebaranRumahSewaBanut2021 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banut_2021&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanut2021 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanut2021,
                visible: this.wfsLayerVisibleSebaranRumahSewa2021,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanut2021);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBanut2021,
                "wfsLayerSebaranRumahSewaBanut2021"
            );

            var wfsSourceSebaranRumahSewaBanbar2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banbar_2022&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanbar2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanbar2022,
                visible: this.wfsLayerVisibleSebaranRumahSewa2022,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanbar2022);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBanbar2022,
                "wfsLayerSebaranRumahSewaBanbar2022"
            );

            var wfsSourceSebaranRumahSewaBansel2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Bansel_2022&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBansel2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBansel2022,
                visible: this.wfsLayerVisibleSebaranRumahSewa2022,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBansel2022);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBansel2022,
                "wfsLayerSebaranRumahSewaBansel2022"
            );

            var wfsSourceSebaranRumahSewaBanteng2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banteng_2022&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanteng2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanteng2022,
                visible: this.wfsLayerVisibleSebaranRumahSewa2022,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanteng2022);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBanteng2022,
                "wfsLayerSebaranRumahSewaBanteng2022"
            );

            var wfsSourceSebaranRumahSewaBantim2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Bantim_2022&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBantim2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBantim2022,
                visible: this.wfsLayerVisibleSebaranRumahSewa2022,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBantim2022);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBantim2022,
                "wfsLayerSebaranRumahSewaBantim2022"
            );

            var wfsSourceSebaranRumahSewaBanut2022 = new ol.source.Vector({
                format: new ol.format.GeoJSON(),
                url: function (extent) {
                    return "https://geoserver.banjarmasinkota.go.id/geoserver/gis_database/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=gis_database%3ASebaran_Rumah_Sewa_Banut_2022&outputFormat=application%2Fjson";
                },
                strategy: ol.loadingstrategy.bbox,
            });

            this.wfsLayerSebaranRumahSewaBanut2022 = new ol.layer.Vector({
                source: wfsSourceSebaranRumahSewaBanut2022,
                visible: this.wfsLayerVisibleSebaranRumahSewa2022,
                style: new ol.style.Style({
                    fill: new ol.style.Fill({
                        color: "rgb(191 144 2)",
                    }),
                }),
            });

            this.map.addLayer(this.wfsLayerSebaranRumahSewaBanut2022);
            this.setupFeatureSelection(
                this.wfsLayerSebaranRumahSewaBanut2022,
                "wfsLayerSebaranRumahSewaBanut2022"
            );

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
            this.setupFeatureSelection(
                this.wfsLayerTransportasi,
                "wfsLayerTransportasi"
            );
        },
        setupFeatureSelection(layer, layerKey) {
            var selectInteraction = new ol.interaction.Select({
                layers: [layer],
                condition: ol.events.condition.singleClick,
                style: function (feature) {
                    return new ol.style.Style({
                        stroke: new ol.style.Stroke({
                            color: "rgb(52 51 48)",
                            width: 1,
                        }),
                        fill: new ol.style.Fill({
                            color: "rgba(255, 255, 255, 0.7)",
                        }),
                    });
                },
            });

            this.map.addInteraction(selectInteraction);

            selectInteraction.on("select", (event) => {
                var selectedFeatures = event.selected;
                if (selectedFeatures.length > 0) {
                    var properties = selectedFeatures[0].getProperties();
                    var filteredProperties = this.filterProperties(
                        properties,
                        layerKey
                    );
                    this.showLayerProperties(filteredProperties);
                }
            });
        },
        filterProperties(properties, layerKey) {
            if (this.layersConfig[layerKey]) {
                let filtered = {};
                this.layersConfig[layerKey].forEach((key) => {
                    if (properties[key] !== undefined) {
                        filtered[key] = properties[key];
                    }
                });
                return filtered;
            }
            return properties;
        },
        showLayerProperties(properties) {
            var propertiesList = document.getElementById("layerPropertiesList");
            propertiesList.innerHTML = "";
            for (var key in properties) {
                var listItem = document.createElement("li");
                listItem.classList.add("list-group-item");
                var displayName = this.displayNames[key] || key; // Gunakan nama tampilan jika ada
                listItem.innerHTML =
                    "<strong>" + displayName + ":</strong> " + properties[key];
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
