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
            <span class="dashboard">Data Cabang</span>
        </div>
    </nav>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
            <form method="GET" action="cabang.php">
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
                        $query = "SELECT * FROM cabang WHERE id_cabang like '%".$kata_cari."%' OR nama_cabang like '%".$kata_cari."%' ORDER BY id_cabang ASC";
                    } else {
                        //jika tidak ada pencarian
                        $query = "SELECT * FROM cabang ORDER BY id_cabang ASC";
                    }

                    $result = mysqli_query($koneksi,$query);

                    if (!$result) {
                    die ('SQL Error: ' . mysqli_error($koneksi));
                    }
                    echo '<table class="tabel-cabang">
                        <tr>
                            <th>ID Cabang</th>
                            <th>Nama Cabang</th>
                        </tr>
                        <tr>';
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo '<tr>
                                    <td class="tcenter">'.$row['id_cabang'].'</td>
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

