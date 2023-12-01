<?php
    include '../koneksi/koneksi.php';
    $nama_aset = $_POST['nama_aset'];
    $merk = $_POST['merk'];
    $spesifikasi = $_POST['spesifikasi'];
    $nilai_awal = $_POST['nilai_awal'];
    $lokasi = $_POST['lokasi'];
    $unit = $_POST['unit'];
    $id_rekanan = $_POST['id_rekanan'];
    $id_pengadaan = $_POST['id_pengadaan'];
    $lokasikomplit = "$lokasi $unit";
    $id_aset = $_POST['idas'];

    $pecah_unit = explode(',', $unit);

    $sql = "INSERT INTO aset (nama_aset, merk, spesifikasi, nilai_awal, lokasi, kondisi, id_unit, id_rekanan, id_pengadaan) 
    VALUES ('$nama_aset', '$merk', '$spesifikasi', '$nilai_awal', '$lokasikomplit', 'Baik (Berfungsi)', $pecah_unit[0], '$id_rekanan', '$id_pengadaan')";



    $sql1 = "INSERT INTO riwayat (id_aset,kondisi,lok_lama,lok_baru,keterangan) 
    VALUES ('$id_aset', 'Baik (Berfungsi)', '$lokasikomplit', '-', '-')";
    mysqli_query($koneksi, $sql);


mysqli_query($koneksi, $sql1);

    header("Location: ../aset_a.php");

    $koneksi->close();
    exit;
?>