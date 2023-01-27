<div class="content-padder content-background " >
    <div class="uk-section-small uk-section-default header">
        <div class="uk-container uk-container-large">
            <h2><span class="ion-speedometer"></span> Beranda</h2>
            <p>
                Selamat Datang, <?= $this->session->userdata('nama') ?>, <?= $judul ?>
            </p>
        </div>
    </div>
    <div class="uk-section-small mt-3">
        <div class="uk-container uk-container-large ">
            <div id="mapid" style="z-index: 0; height: 85vh;"></div>
        </div>
    </div>


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
            zoom: 10,
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
