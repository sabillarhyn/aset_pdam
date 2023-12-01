<?
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
}
?>



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
            <div class="form-content">
                <a href="admin.php"><i class='bx bx-x-circle' title="kembali"></i></a>
                <p>Tambah Admin</p>
                <hr>
                <br>
                    <div class="form-input">
                        <form action="action/tambah_admin.php" method="post">
                    <label for="nama_admin">Nama Admin</label><br>
                    <input type="text" name="nama_admin" required>
                    <br>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" required>
                    <br>
                    <label for="password">Password</label><br>
                    <input type="text" name="password" required>
                    
                    <label for="level">Level Admin</label><br>
                    <select id="level" name="level" required>
                        <option value="admin1">Admin 1</option>
                        <option value="admin2">Admin 2</option>
                    </select>
                    <br>
                    <label for="bagian">Bagian</label><br>
                    <input type="text" name="bagian">
                    <br><br>
                    </div>
                <input type="submit" value="KIRIM">
                </form>
            </div>
        </div>

</body>