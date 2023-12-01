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
        $id_unit = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM unit, cabang WHERE id_unit='$id_unit' AND unit.id_cabang=cabang.id_cabang");
        $dataunit = mysqli_fetch_assoc($result);
        $nama_unit = $dataunit['nama_unit'];
        $nama_cabang = $dataunit['nama_cabang'];
?>

        <div class="form-add">
            <div class="form-content">
                <a href="../unit_a.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Edit unit</p>
                <hr>
                <br>
                    <div class="form-input" >
                    <form action="" method="post">
                    <label for="id_unit">ID Unit</label><br>
                    <input type="text" name="id_unit" readonly value="<?php echo $dataunit['id_unit']; ?>">
                    <br>
                    <label for="nama_unit">Nama Unit</label><br>
                    <input type="text" name="nama_unit" value="<?php echo $dataunit['nama_unit']; ?>">
                    
                    <label for="nama_cabang">Nama Cabang</label><br>
                    <select id="id_cabang" name="id_cabang">
                        <option><?php echo $dataunit['nama_cabang']; ?></option>
                        <?php
                             include 'koneksi/koneksi.php';
                             $query = mysqli_query($koneksi, "SELECT * FROM cabang") or die (mysqli_error($koneksi));
                             while($data = mysqli_fetch_array($query)){
                                echo "<option value=$data[id_cabang]>$data[nama_cabang]</option>";
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
            $id_unit = $_POST['id_unit'];
            $nama_unit = $_POST['nama_unit'];
            $nama_cabang = $_POST['nama_cabang'];

            $result = mysqli_query($koneksi, "UPDATE unit SET
                                            nama_unit='$nama_unit', nama_cabang='$nama_cabang'
                                            WHERE id_unit='$id_unit'");

            if ($result) {
                echo '
                <script>
                alert("Data unit BERHASIL diedit !");
                document.location.href = "../unit_a.php";
                </script>';
            } else {
                echo '<script>
                        alert("Data unit GAGAL diedit!");
                        document.location.href = "../unit_a.php;
                        </script>
                        
                        ';
            }
        $koneksi->close();
        mysqli_close($koneksi);
        }
    ?>

</body>
</html>