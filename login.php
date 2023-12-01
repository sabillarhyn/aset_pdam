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

<style>
        body {
        background-image: url('asset/lgback.png');
        background-size: cover;
        background-attachment: fixed ;
        }
</style>


<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alertfail' role='alert'>Anda bukan Admin atau Username dan Password tidak sesuai !</div>";
		}
	}
	?>



    <div class="login-pg">
        <div class="login-content">
            <div class="login-title">
            <img src="asset/pdam-logo.png"> <p>Sistem Manajemen Aset <br> PDAM Tirta Handayani Gunungkidul</p>
                <!-- <h1>Login</h1>  -->
                <br>
            </div>

            <div class="login-form">
            <form action="cek_login.php" method="post">
                <input type="text" name="username" placeholder="Username" required="required">
                <br><br>
                <input type="password" name="password" placeholder="Password" required="required">
                <br><br><br>
                <input type="submit" value="MASUK">

            </form>
            </div>

        </div>
    </div>


</body>

<!-- buat matiin alert tapi blm jadi -->
<!-- <script src="script.js"></script> -->

</html>