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
    <link rel="stylesheet" href="../style/style.css">

    <!--Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body class="bgform">

<?
        require '../koneksi/koneksi.php';
        $id_aset = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM aset JOIN rekanan ON aset.id_rekanan=rekanan.id_rekanan JOIN pengadaan ON aset.id_pengadaan=aset.id_pengadaan WHERE id_aset='$id_aset'");
        $dataaset = mysqli_fetch_assoc($result);
?>

        <div class="form-add">
            <div class="form-content">
                <a href="../aset_a.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Edit aset</p>
                <hr>
                <br>
                    <div class="form-input" >
                    <form action="" method="post">
                        <br>
                    <label for="id_aset">ID aset</label><br>
                    <input type="text" name="id_aset" readonly value="<?php echo $dataaset['id_aset']; ?>">
                    <br>
                    <label for="nama_aset">Nama Aset</label><br>
                    <input type="text" name="nama_aset" value="<?php echo $dataaset['nama_aset']; ?>">
                    <br>
                    <label for="merk">Merk</label><br>
                    <input type="text" name="merk" value="<?php echo $dataaset['merk']; ?>">
                    <br>
                    <label for="spesifikasi">Spesifikasi</label><br>
                    <input type="text" name="spesifikasi" value="<?php echo $dataaset['spesifikasi']; ?>">
                    <br>
                    <label for="nilai_awal">Nilai Awal</label><br>
                    <input type="text" name="nilai_awal" value="<?php echo $dataaset['nilai_awal']; ?>">
                    <br>
                    <label for="rekanan">Rekanan</label><br>
                    <select id="id_rekanan" name="id_rekanan">
                        <option value="<?php echo $dataaset['id_rekanan']; ?>"><?php echo $dataaset['nama_rekanan']; ?></option>
                        <?php
                             include 'koneksi/koneksi.php';
                             $query = mysqli_query($koneksi, "SELECT * FROM rekanan") or die (mysqli_error($koneksi));
                             while($data = mysqli_fetch_array($query)){
                                echo "<option value=$data[id_rekanan]>$data[nama_rekanan]</option>";
                             }
                        ?>
                    </select>
                    <br>
                    <label for="pengadaan">Nomor Pengadaan</label><br>
                    <select id="id_pengadaan" name="id_pengadaan">
                        <option value="<?php echo $dataaset['id_pengadaan']; ?>"><?php echo $dataaset['no_dokumen']; ?></option>
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
                    <input type="submit" value="SIMPAN" name="submit">
                </form>
            </div>
        </div>


        <?php
        if (isset($_POST['submit'])) {
            $nama_aset = $_POST['nama_aset'];
            $merk = $_POST['merk'];
            $spesifikasi = $_POST['spesifikasi'];
            $nilai_awal = $_POST['nilai_awal'];
            $id_rekanan = $_POST['id_rekanan'];
            $id_pengadaan = $_POST['id_pengadaan'];


            $result = mysqli_query($koneksi, "UPDATE aset SET
                                             nama_aset='$nama_aset', merk='$merk', spesifikasi='$spesifikasi', nilai_awal='$nilai_awal', id_rekanan='$id_rekanan', id_pengadaan='$id_pengadaan'
                                            WHERE id_aset='$id_aset'");

            if ($result) {
                echo '
                <script>
                alert("Data aset BERHASIL diedit !");
                document.location.href = "../aset_a.php";
                </script>';
            } else {
                echo '<script>
                        alert("Data aset GAGAL diedit!");
                        document.location.href = "../aset_a.php;
                        </script>
                        
                        ';
            }
        $koneksi->close();
        mysqli_close($koneksi);
        }
    ?>

</body>
</html>