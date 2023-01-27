<!DOCTYPE html>
<html>

<head>
    <title>HALAMAN UTAMA TITIK LAYANAN PLN</title>

    <meta charset="UTF-8">
    <meta name="description" content="Clean and responsive administration panel">
    <meta name="keywords" content="Admin,Panel,HTML,CSS,XML,JavaScript">
    <meta name="author" content="Erik Campobadal">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('public/') ?>images/logo.png">

    <link rel="stylesheet" href="<?= base_url('public/') ?>css/uikit.min.css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('public/') ?>css/style.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('public/') ?>css/notyf.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="<?= base_url('public/') ?>js/uikit.min.js"></script>
    <script src="<?= base_url('public/') ?>js/uikit-icons.min.js"></script>
    <!-- leaflet koneksi -->
    <link rel="stylesheet" href="<?= base_url('public/') ?>leaflet/leaflet.css" />
    <script src="<?= base_url('public/') ?>leaflet/leaflet.js"></script>
    <!-- leaflet koneksi -->
    <!-- Pencarian GIS -->

    <link rel="stylesheet" href="<?= base_url('public/') ?>leaflet-cari/src/leaflet-search.css" />
    <link rel="stylesheet" href="<?= base_url('public/') ?>css/running_teks.css" />
    <script src="<?= base_url('public/') ?>leaflet-cari/src/leaflet-search.js"></script>
    <!-- Pencarian GIS -->

    <style typle="text/css">
        #mapid {
            height: 550px;
        }
    </style>
</head>

<body>
    <div class="uk-navbar-container tm-navbar-container uk-active">
        <div class="uk-container uk-container-expand" style="background-color: #F2DEBA;">
            <nav uk-navbar>
                <div class="uk-navbar-left">
                    <a href="#" class="uk-navbar-item uk-logo text-dark">
                        <img width="40" src="<?= base_url('public/') ?>icon/pln.png" /> &nbsp; APLIKASI PENDATAAN LOKASI TITIK KEDAI KOPI
                    </a>
                </div>
                <div class="uk-navbar-right">

                    <div class="uk-navbar-item">
                        <form action="javascript:void(0)">
                            <!-- <a class="uk-button uk-button-default" href="#modal-center" uk-toggle>BIODATA</a> -->
                        </form>
                    </div>
                    <div class="uk-navbar-item">
                        <form action="javascript:void(0)">
                            <a class="uk-button btn btn-dark" href="#modal-center" uk-toggle style="border-radius:8px">Kontak PLN</a>
                        </form>
                    </div>
                    <a class="uk-button btn btn-dark" style="margin-right:15px;  border-radius:8px" href="<?= base_url('login') ?>" uk-toggle>Login</a>
                    <!-- <a class="uk-button uk-button-default" href="<?= base_url('utama/report') ?>" uk-toggle>Laporan</a> -->
                </div>
            </nav>
        </div>
    </div>
    <div class="uk-container uk-container pt-3" style="height: 80%;">
        <article class="uk-comment uk-comment-primary">
            <div id="mapid"></div>
        </article>

        <script type="text/javascript">
            var data = [
                <?php
                foreach ($layanan as $key => $r) { ?> {
                        "lokasi": [<?= $r->latitude ?>, <?= $r->longitude ?>],
                        "kecamatan": "<?= $r->kecamatan ?>",
                        "keterangan": "<?= $r->keterangan ?>",
                        "tempat": "<?= $r->lokasi ?>",
                        "kategori": "<?= $r->kategori ?>",
                        "nama": "<?= $r->nama ?>"
                    },
                <?php } ?>
            ];

            var map = new L.Map('mapid', {
                zoom: 12,
                center: new L.latLng(5.222489, 97.086003)
            });
            map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            }));

            var markersLayer = new L.LayerGroup();
            map.addLayer(markersLayer);

            var controlSearch = new L.Control.Search({
                position: 'topleft',
                layer: markersLayer,
                initial: false,
                zoom: 25,
                marker: false
            });

            map.addControl(new L.Control.Search({
                layer: markersLayer,
                initial: false,
                collapsed: true,
            }));

            var pasang_baru = L.icon({
                iconUrl: '<?= base_url('public/icon/pasang.svg') ?>',
                iconSize: [30, 30]
            });

            var sambung_sementara = L.icon({
                iconUrl: '<?= base_url('public/icon/sambung.svg') ?>',
                iconSize: [30, 30]
            });

            var ubah_daya = L.icon({
                iconUrl: '<?= base_url('public/icon/ubah.svg') ?>',
                iconSize: [30, 30]
            });

            var notice = L.icon({
                iconUrl: '<?= base_url('public/icon/notice.png') ?>',
                iconSize: [30, 30]
            });
            var icons = "";
            for (i in data) {
                var kecamatan = data[i].kecamatan;
                var lokasi = data[i].lokasi;
                var tempat = data[i].tempat;
                var keterangan = data[i].keterangan;
                var kategori = data[i].kategori;
                var nama = data[i].nama;

                if (kategori == "1") {
                    icons = pasang_baru;
                } else if (kategori == "2") {
                    icons = sambung_sementara;
                } else if (kategori == "3") {
                    icons = ubah_daya;
                } else {
                    icons = notice;
                }

                var marker = new L.Marker(new L.latLng(lokasi), {
                    title: kecamatan,
                    icon: icons
                });
                marker.bindPopup('<b>Kecamatan: ' + kecamatan + ' <br> Lokasi: ' + tempat + '<br> Keterangan: ' + keterangan + '<br> Layanan: ' + nama + '</b>');
                markersLayer.addLayer(marker);
            }
        </script>
    </div>
    <div class="runtext-container" >
        <div class="main-runtext" style="background-color: #F2DEBA;">
            <marquee direction=""  onmouseover="this.stop();" onmouseout="this.start();">
                <div class="holder ">
                    <div class="text-container "><span data-fancybox-group="gallery" class="fancybox text-dark" title="THE ELECTRIC LIGHTING ACT: section 35">Selamat datang di website PLN kota Lhokseumawe</span>
                    </div>
                </div>
            </marquee>
        </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>

<!-- MODAl -->
<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-container uk-container-large">
            <article class="uk-comment uk-comment-primary">
                <header class="uk-comment-header">
                    <div class="uk-grid-medium uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-comment-avatar" src="<?= base_url('public/') ?>icon/pln.png" width="80" height="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Bobbi</a></h4>
                            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">082525252525</a></h4>
                        </div>
                    </div>
                </header>
                <div class="uk-comment-body">
                    <b>
                        <center>Aplikasi Pendataan Lokasi Pelayanan PLN</center>
                    </b>
                </div>
            </article>


        </div>

    </div>
</div>
<!-- MODAl -->
