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
            <span class="dashboard">Data Pengadaan</span>
        </div>
    </nav>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
            
                <a href="form_pengadaan.php"><button class="inbtn">Tambah</button></a>
                <form method="GET" action="pengadaan.php">
                <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		        <button type="submit" class="srcbtn">Cari</button>
                </form>
            </div>

            <!-- table -->
            <div class="table-ds">
            <?php

                include 'koneksi/koneksi.php';

                if(isset($_GET['kata_cari'])) {
                    $kata_cari = $_GET['kata_cari'];
                    $query = "SELECT * FROM pengadaan WHERE id_pengadaan like '%".$kata_cari."%' OR no_dokumen like '%".$kata_cari."%' OR tgl_beli like '%".$kata_cari."%' ORDER BY id_pengadaan ASC";
				} else {
					//jika tidak ada pencarian
					$query = "SELECT * FROM pengadaan ORDER BY id_pengadaan ASC";
				}


                $result = mysqli_query($koneksi,$query);


                if (!$result) {
                die ('SQL Error: ' . mysqli_error($koneksi));
                }
                echo '<table class="tabel-pengadaan">
                    <tr>
                        <th>ID Pengadaan</th>
                        <th>Nomor Pengadaan</th>
                        <th>Tanggal Pembelian</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <tr>';
                    while ($row = mysqli_fetch_array($result))
                    {


                        echo '<tr>
                                <td class="tcenter">'.$row['id_pengadaan'].'</td>
                                <td>'.$row['no_dokumen'].'</td>';?>


                                <td class="tcenter"><? echo date('d-M-Y', strtotime($row['tgl_beli']));?></td>


                    <?
                     echo '
                                <td class="tcenter">
                                <a href="action/edit_pengadaan.php?id='.$row['id_pengadaan'].'"><i class="bx bxs-edit-alt" title="Edit"></i></a>
                                <a onclick="return konfirmasi()" href="action/hapus_pengadaan.php?id='.$row['id_pengadaan'].'"><i class="bx bxs-trash" title="Hapus"></i></a>
                                </td>
                                ';
                    }?>

                    <?php
                    echo '
                    </tr>
                    </table>';
                    ?>

        </div>
        
    </div>

    <script type="text/javascript" language="JavaScript">
        function konfirmasi()
        {
            tanya = confirm("Yakin Akan Menghapus Data?")
            if (tanya == true) return true;
            else return false;
        }
    </script>


</section>

<script src="style/script.js"></script>
