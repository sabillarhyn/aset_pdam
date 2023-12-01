<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Aset PDAM</title>
    <link href="asset/pdam-logo.png" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <!--Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
     <div class="cetak">
        <div class="cetak-aset">
        <?php
                include 'koneksi/koneksi.php';

                $sql = "SELECT * FROM aset
                JOIN rekanan ON rekanan.id_rekanan = aset.id_rekanan
                JOIN pengadaan ON pengadaan.id_pengadaan = aset.id_pengadaan
                ";
                $query = mysqli_query($koneksi,$sql);

                if (!$query) {
                die ('SQL Error: ' . mysqli_error($koneksi));
                }
                echo '<table class="tabel-cetak">
                    <tr>
                        <th>ID Aset</th>
                        <th>Nama Aset</th>
                        <th>Merek</th>
                        <th>Spesifikasi</th>
                        <th>Nilai Awal</th>
                        <th>Lokasi</th>
                        <th>Rekanan</th>
                        <th>Nomor Pengadaan</th>
                    </tr>
                    <tr>';
                    while ($row = mysqli_fetch_array($query))
                    {
                        echo '<tr>
                                <td class="tcenter">'.$row['id_aset'].'</td>
                                <td>'.$row['nama_aset'].'</td>
                                <td>'.$row['merk'].'</td>
                                <td>'.$row['spesifikasi'].'</td>
                                <td>'.$row['nilai_awal'].'</td>
                                <td>'.$row['lokasi'].'</td>
                                <td>'.$row['nama_rekanan'].'</td>
                                <td>'.$row['no_dokumen'].'</td>
                                ';
                    }?>

                    <?php
                    echo '
                    </tr>
                    </table>';
                    ?>
                   
        </div>
     </div>

     <!-- <script>
        window.print();
     </script> -->


</body>
</html>