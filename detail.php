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

    <?
    include 'koneksi/koneksi.php';

    $id_aset = $_GET['id'];

    $get =mysqli_query($koneksi, "SELECT * FROM aset, pengadaan WHERE id_aset='$id_aset' AND aset.id_pengadaan=pengadaan.id_pengadaan");
    $fetch = mysqli_fetch_assoc($get);

    $nama_aset = $fetch['nama_aset'];
    $merk = $fetch['merk'];
    $spesifikasi = $fetch['spesifikasi'];
    $nilai_awal = $fetch['nilai_awal'];
    $lokasi = $fetch['lokasi'];
    $no_dokumen = $fetch['no_dokumen'];


    $datariwayat =mysqli_query($koneksi, "SELECT * FROM riwayat WHERE id_aset='$id_aset'");

                while($fetch=mysqli_fetch_array($datariwayat)){
                $id_riwayat = $fetch['id_riwayat'];
                $kondisi = $fetch['kondisi'];
                $lok_lama = $fetch['lok_lama'];
                $lok_baru = $fetch['lok_baru'];
                $keterangan = $fetch['keterangan'];
                }

    ?>
    

    <div class="detail-qr">
        <div class="detail-aset">
            <div class="title-detail">
                <img src="asset/pdam-logo.png"><h2>Aset PDAM Tirta Handayani Gunungkidul</h2>
            </div>
            
            <table class="tabel-detail">
                        
                        <tr><td><b>ID Aset</b></td>            <td><?=$id_aset;?></td></tr>
                        <tr><td><b>Nama Aset</b></td>          <td><?=$nama_aset;?></td></tr>
                        <tr><td><b>Merek</b></td>              <td><?=$merk;?></td></tr>
                        <tr><td><b>Spesifikasi</b></td>        <td><?= $spesifikasi;?></td></tr>
                        <tr><td><b>Harga Perolehan</b></td>         <td><?=$nilai_awal;?></td></tr>
                        <tr><td><b>Lokasi</b></td>             <td><?=$lokasi;?></td></tr>
                        <tr><td><b>Kondisi</b></td>            <td><?=$kondisi;?></td></tr>
                        <tr><td><b>Nomor Inventaris</b></td>    <td><?=$no_dokumen;?></td></tr>
                    
                    </table>
        </div>
    </div>




</body>
</html>