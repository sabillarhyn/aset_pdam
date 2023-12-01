<?php 

session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
}

include "sidebar.php" ?>

<!-- header -->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
        <i class='bx bx-menu'></i>
            <span class="dashboard">Data Unit Kerja</span>
        </div>
    </nav>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
            <form method="GET" action="unit.php">
                <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		        <button type="submit" class="srcbtn">Cari</button>
                </form>
            </div>
<br>

            <!-- table -->
            <div class="table-ds">
                <?php

                include 'koneksi/koneksi.php';

                if(isset($_GET['kata_cari'])) {
                    $kata_cari = $_GET['kata_cari'];
                    $query = "SELECT * FROM unit JOIN cabang ON unit.id_cabang = cabang.id_cabang WHERE id_unit like '%".$kata_cari."%' OR nama_unit like '%".$kata_cari."%' OR nama_cabang like '%".$kata_cari."%' ORDER BY id_unit ASC";
                } else {
                    //jika tidak ada pencarian
                    $query = "SELECT * FROM unit JOIN cabang ON unit.id_cabang = cabang.id_cabang ORDER BY id_unit ASC";
                }


                $result = mysqli_query($koneksi,$query);

                if (!$result) {
                die ('SQL Error: ' . mysqli_error($koneksi));
                }
                echo '<table class="tabel-unit">
                    <tr>
                        <th>ID Unit</th>
                        <th>Nama Unit</th>
                        <th>Nama Cabang</th>
                    </tr>
                    <tr>';
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo '<tr>
                                <td class="tcenter">'.$row['id_unit'].'</td>
                                <td>'.$row['nama_unit'].'</td>
                                <td>'.$row['nama_cabang'].'</td>
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
</section>

<script src="style/script.js"></script>

