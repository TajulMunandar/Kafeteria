<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h2> Laporan Lokasi Titik Layanan PLN</h2>
    </div>
    <table id="table" style="margin-top:20px">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kategori</th>
                <th>Kecamatan</th>
                <th>Detail Lokasi</th>
                <th>Keterangan</th>
                <th>Lalitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($layanan as $bgl) {

            ?>
                <tr>
                    <td scope="row"><?= $no ?></td>
                    <td><?= $bgl->kategori ?></td>
                    <td><?= $bgl->kecamatan ?></td>
                    <td><?= $bgl->lokasi ?></td>
                    <td><?= $bgl->keterangan ?></td>
                    <td><?= $bgl->latitude ?></td>
                    <td><?= $bgl->longitude ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <!-- 
		<script>
		window.print();
	</script> -->
</body>

</html>