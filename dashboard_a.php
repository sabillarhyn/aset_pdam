<?php 

session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
}

include "sidebar_a.php" ?>

<!-- header -->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
        <i class='bx bx-menu'></i>
            <span class="dashboard">Dashboard</span>
        </div>
    </nav>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
            <form method="GET" action="dashboard_a.php">
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
                    $query = "SELECT * FROM aset JOIN rekanan ON rekanan.id_rekanan = aset.id_rekanan
                    JOIN pengadaan ON pengadaan.id_pengadaan = aset.id_pengadaan WHERE id_aset like '%".$kata_cari."%' OR nama_aset like '%".$kata_cari."%' OR lokasi like '%".$kata_cari."%' OR nama_rekanan like '%".$kata_cari."%' OR no_dokumen like '%".$kata_cari."%' OR tgl_beli like '%".$kata_cari."%' ORDER BY id_aset ASC";
				} else {
					//jika tidak ada pencarian
					$query = "SELECT * FROM aset JOIN rekanan ON rekanan.id_rekanan = aset.id_rekanan
                    JOIN pengadaan ON pengadaan.id_pengadaan = aset.id_pengadaan ORDER BY id_aset ASC";
				}

                $result = mysqli_query($koneksi,$query);

                if (!$result) {
                die ('SQL Error: ' . mysqli_error($koneksi));
                }
                echo '<table class="tabel-aset">
                    <tr>
                        <th width="5px">ID Aset</th>
                        <th>Nama Aset</th>
                        <th>Merek</th>
                        <th>Spesifikasi</th>
                        <th>Nilai Awal</th>
                        <th>Tanggal Beli</th>
                        <th>Lokasi</th>
                        <th>Nomor Pengadaan</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>';
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo '<tr>
                                <td class="tcenter">'.$row['id_aset'].'</td>
                                <td>'.$row['nama_aset'].'</td>
                                <td>'.$row['merk'].'</td>
                                <td>'.$row['spesifikasi'].'</td>
                                <td>'.$row['nilai_awal'].'</td>';
                                ?>

                                <td class="tcenter"><? echo date('d-M-Y', strtotime($row['tgl_beli']));?></td>

                                <? 
                                echo'
                                <td>'.$row['lokasi'].'</td>
                                <td>'.$row['no_dokumen'].'</td>
                                <td class="tcenter"><a href="cetak_qr.php?id='.$row['id_aset'].'"><i class="bx bx-qr" title="Cetak QR"></a></td>
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

