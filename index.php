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

<div class="index-container">
    <div class="index-content">
        <div class="index-header">
            <a href="login.php"><button class="lgnbtn">Login</button></a>
        </div>
        <div class="index-body">
        <h3>Data Aset PDAM Tirta Handayani Gunungkidul</h3>
        <br>
        <form method="GET" action="index.php">
                <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		        <button type="submit" class="srcbtn">Cari</button>
                </form>
        <br><br><br>
        <div class="table-ds">

        <?php
                include 'koneksi/koneksi.php';

                if(isset($_GET['kata_cari'])) {
                    $kata_cari = $_GET['kata_cari'];
                    $query = "SELECT * FROM aset JOIN rekanan ON rekanan.id_rekanan = aset.id_rekanan
                    JOIN pengadaan ON pengadaan.id_pengadaan = aset.id_pengadaan WHERE id_aset like '%".$kata_cari."%' OR nama_aset like '%".$kata_cari."%' OR lokasi like '%".$kata_cari."%' OR kondisi like '%".$kata_cari."%' OR nama_rekanan like '%".$kata_cari."%' OR no_dokumen like '%".$kata_cari."%' ORDER BY id_aset ASC";
				} else {
					//jika tidak ada pencarian
					$query = "SELECT * FROM aset JOIN rekanan ON rekanan.id_rekanan = aset.id_rekanan
                    JOIN pengadaan ON pengadaan.id_pengadaan = aset.id_pengadaan ORDER BY id_aset ASC";
				}


                $result = mysqli_query($koneksi,$query);

                if (!$result) {
                die ('SQL Error: ' . mysqli_error($koneksi));
                }
                echo '<table class="tabel-admin">
                    <tr>
                        <th width="20px">ID Aset</th>
                        <th>Nama Aset</th>
                        <th>Merek</th>
                        <th>Spesifikasi</th>
                        <th>Nilai Awal</th>
                        <th>Lokasi</th>
                        <th>Rekanan</th>
                        <th>Nomor Pengadaan</th>
                    </tr>
                    <tr>';
                    while ($row = mysqli_fetch_array($result))
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
        </div>
    </div>
</div>

</body>
</html>