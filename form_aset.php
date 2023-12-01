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
<body class="bgform">

        <div class="form-add">
            <div class="form-contentb">
                <a href="aset_a.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Tambah Aset</p>
                <hr>
                <br>
                    <div class="form-input" >
                    <form action="action/tambah_aset.php" method="post">
                    
                    <?php
                             include 'koneksi/koneksi.php';
                             $query = mysqli_query($koneksi, "SELECT id_aset from aset order by id_aset DESC LIMIT 1");
                             while($data = mysqli_fetch_array($query)){
                                $id_aset= $data['id_aset'] + '1';
                            
                             

                        ?>

                    <input type="hidden" name="idas" value="<?php echo  $id_aset;?>">

                    <?php
                    }
                    ?>

                    <br>
                    <label for="nama_aset">Nama Aset</label>
                    <input type="text" name="nama_aset">

                    <br>

                    <label for="merk">Merk</label>
                    <input type="text" name="merk">

                    <br>

                    <label for="spesifikasi">Spesifikasi</label>
                    <input type="text" name="spesifikasi">

                    <br>

                    <label for="nilai_awal">Nilai Awal</label>
                    <input type="text" name="nilai_awal">

                    <br>
                    
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi">

                    <br>

                    <label for="unit">Unit</label>
                    <select id="unit" name="unit">
                        <option>---</option>
                        <?php
                             include 'koneksi/koneksi.php';
                             $query = mysqli_query($koneksi, "SELECT * FROM unit JOIN cabang ON unit.id_cabang=cabang.id_cabang") or die (mysqli_error($koneksi));
                             while($data = mysqli_fetch_array($query)){

                        ?>
                        <option value="<?= $data['id_unit']?>, Unit <?php echo  $data['nama_unit'];?>, Cabang <?php echo $data['nama_cabang'];?>">
                        Unit <?php echo  $data['nama_unit'];?>, Cabang <?php echo $data['nama_cabang'];?></option>
                        <?php
                                
                             }
                        ?>
                    </select>
                    
                    <br>

                    <label for="rekanan">Rekanan</label>
                    <select id="id_rekanan" name="id_rekanan">
                        <option>---</option>
                        <?php
                             include 'koneksi/koneksi.php';
                             $query = mysqli_query($koneksi, "SELECT * FROM rekanan") or die (mysqli_error($koneksi));
                             while($data = mysqli_fetch_array($query)){
                                echo "<option value=$data[id_rekanan]>$data[nama_rekanan]</option>";
                             }
                        ?>
                    </select>

                    <br>

                    <label for="no_dokumen">Nomor Pengadaan</label>
                    <select id="id_pengadaan" name="id_pengadaan">
                        <option>---</option>
                        <?php
                             include 'koneksi/koneksi.php';
                             $query = mysqli_query($koneksi, "SELECT * FROM pengadaan") or die (mysqli_error($koneksi));
                             while($data = mysqli_fetch_array($query)){
                                echo "<option value=$data[id_pengadaan]>$data[no_dokumen]</option>";
                             }
                        ?>
                    </select>

                    
                    <br><br>
                    
                    </div>
                    <br><br>
                    <input type="submit" value="KIRIM">
                </form>
            </div>
        </div>

</body>