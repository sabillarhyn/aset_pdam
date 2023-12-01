<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Aset PDAM</title>
    <link href="../asset/pdam-logo.png" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">

    <!--Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body class="bgform">

<?php
        require '../koneksi/koneksi.php';
        $id_riwayat = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM riwayat JOIN aset ON riwayat.id_aset=aset.id_aset WHERE id_riwayat='$id_riwayat'");
        $datariwayat = mysqli_fetch_assoc($result);
?>

        <div class="form-add">
            <div class="form-contentb">
                <a onclick="goBack()"><i class='bx bx-x-circle' title="kembali"></i></a>

                <script>
                    function goBack() {
                    window.history.back();
                    }
                </script>


                <p>Edit Riwayat</p>
                <hr>
                <br>
                    <div class="form-input" >
                    <form action="" method="post">
                    
                    <br>

                    <label for="id_riwayat">ID Riwayat</label>
                    <input type="text" name="id_riwayat" readonly value="<?php echo $datariwayat['id_riwayat']; ?>">


                    <br>
                    <label for="id_aset">ID Aset</label>
                    <input type="text" name="id_aset" readonly value="<?php echo $datariwayat['id_aset']; ?>">

                    <br>

                    <label for="merk">Nama Aset</label>
                    <input type="text" name="nama_aset" readonly value="<?php echo $datariwayat['nama_aset']; ?>">

                    <br>

                    <label for="kondisi">Kondisi</label><br>
                    <select id="kondisi" name="kondisi" required>
                        <option value="<?php echo $datariwayat['kondisi']; ?>"><?php echo $datariwayat['kondisi']; ?></option>
                        <option value="Baik (Berfungsi)">Baik (Berfungsi)</option>
                        <option value="Baik (Tidak Berfungsi)">Baik (Tidak Berfungsi)</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>

                    <br>

                    <label for="lok_lama">Lokasi Lama</label>
                    <input type="text" name="lok_lama" value="<?php echo $datariwayat['lokasi']; ?>">


                    <br>

                    <label for="lok_baru">Lokasi Baru</label>
                    <input type="text" name="lok_baru">

                    <br>
                    
                    <label for="unit_baru">Unit Baru</label>
                    <select id="unit_baru" name="unit_baru">
                        <option>---</option>
                        <?php
                             include 'koneksi/koneksi.php';
                             $query = mysqli_query($koneksi, "SELECT * FROM unit JOIN cabang ON unit.id_cabang=cabang.id_cabang") or die (mysqli_error($koneksi));
                             while($data = mysqli_fetch_array($query)){

                        ?>
                        <option value=", Unit <?php echo  $data['nama_unit'];?>, Cabang <?php echo $data['nama_cabang'];?>">
                        Unit <?php echo  $data['nama_unit'];?>, Cabang <?php echo $data['nama_cabang'];?></option>
                        <?php
                                
                             }
                        ?>
                    </select>
                    
                    <br>

                    <label for="keterangan">Keterangan</label> <br>
                    <input type="text" name="keterangan" value="<?php echo $datariwayat['keterangan']; ?>"></input>

                    
                    <br><br>
                    
                    </div>
                    <br><br>
                    <input type="submit" value="SIMPAN" name="submit">
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $kondisi = $_POST['kondisi'];
            $id_aset = $_POST['id_aset'];
            $lok_lama = $_POST['lok_lama'];
            $lok_baru = $_POST['lok_baru'];
            $unit_baru = $_POST['unit_baru'];
            $lokasibaru = "$lok_baru"." $unit_baru";
            $keterangan = $_POST['keterangan'];


            $result = mysqli_query($koneksi, "UPDATE riwayat SET kondisi='$kondisi', lok_lama='$lok_lama', lok_baru='$lokasibaru', keterangan='$keterangan' WHERE id_riwayat='$id_riwayat'");

            if ($lok_baru !== null) {
               mysqli_query($koneksi, "UPDATE aset SET lokasi='$lokasibaru', kondisi='$kondisi' WHERE id_aset='$id_aset'");
            }

            

            if ($result) {
                echo '
                <script>
                alert("Data Riwayat BERHASIL diedit !");
                document.location.href = "../aset_a.php";
                </script>';
            } else {
                echo '<script>
                        alert("Data Riwayat GAGAL diedit!");
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