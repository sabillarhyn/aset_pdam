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

    <!-- js  -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
	<div class="sidebar close">
        <div class="logo-details">
        <i class='bx bx-folder-open'></i>
            <span class="logo_name">Aset PDAM</span> 
        </div>
        <ul class="nav-links">
            <!-- dashboard -->
            <li>
                <a href="dashboard_a.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="dashboard_a.php">Dashboard</a></li>
                </ul>
            </li>
            

           <!-- data aset  -->
           <li>
                <a href="aset_a.php">
                <i class='bx bx-collection'></i>
                <span class="link_name">Data Aset</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="aset_a.php">Data Aset</a></li>
                </ul>
            </li>


            <!-- lokasi (drop down) -->
            <li>
               <div class="iocn-link">
                <a href="#">
                <i class='bx bxs-location-plus'></i>
                <span class="link_name">Lokasi</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
               </div>
               <ul class="sub-menu">
                <li><a class="link_name" href="#">Lokasi</a></li>
                <li><a href="cabang_a.php"> Cabang</a></li>
                <li><a href="unit_a.php">Unit Kerja</a></li>
               </ul>
            </li>



            <!-- profile admin  -->
        <li>
        <div class="profile-details">
            <div class="profile-content">
                <img src="asset/profile.png" alt="profile">
            </div>
            
            <div class="name-job">
                <div class="profile_name">Admin Pemeliharaan</div>
                <div class="job">Bagian Pemeliharaan</div>
            </div>
            <a href="logout.php"><i class='bx bx-log-out' title="Keluar"></i></a>
        </div>
    </li>
    </ul>
</div>

	
</body>