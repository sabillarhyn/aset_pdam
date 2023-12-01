<?php 

session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
}


include "sidebar_a.php"; 
?>

<!-- header -->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
        <i class='bx bx-menu'></i>
            <span class="dashboard">Data Riwayat Aset</span>
        </div>
    </nav>

    <?
            include 'koneksi/koneksi.php';

            $id_aset = $_GET['id'];

            $get =mysqli_query($koneksi, "SELECT * FROM aset, pengadaan WHERE id_aset='$id_aset' AND aset.id_pengadaan=pengadaan.id_pengadaan");
            $fetch = mysqli_fetch_assoc($get);

            $nama_aset = $fetch['nama_aset'];
            $merk = $fetch['merk'];
            $spesifikasi = $fetch['spesifikasi'];
            $nilai_awal = $fetch['nilai_awal'];
            $lokasi = $fetch['lokasi'];
            $tgl_beli = $fetch['tgl_beli'];
    ?>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
            
            </div>


            <br>
            &nbsp;<h3>Data Riwayat <?=$nama_aset;?></h3>
            <table class="riwayat-tb">
            <tr> <th width="200px"></th> <th></th>  <th width="170px"></th></tr>
            <tr>    <td>ID Aset</td>            <td>:</td>  <td><?=$id_aset;?></td> </tr>
            <tr>    <td>Merk</td>               <td>:</td>  <td><?=$merk;?></td> </tr>
            <tr>    <td>Spesifikasi</td>        <td>:</td>  <td><?=$spesifikasi;?></td> </tr>
            <tr>    <td>Tanggal Pembelian</td>  <td>:</td>  <td><?echo date('d-M-Y', strtotime($tgl_beli));?></td>   </tr>
            </table>
            <br>

            <!-- table -->
            <div class="table-ds">
            <table class="tabel-riwayat">
                
                
                    <tr>
                        <th>ID riwayat</th>
                        <th>Nama Aset</th>
                        <th>Lokasi Lama</th>
                        <th>Lokasi Baru</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Tanggal Penanganan</th>
                        <th>Aksi</th>
                    </tr>
                    <? 

                $datariwayat =mysqli_query($koneksi, "SELECT * FROM riwayat WHERE id_aset='$id_aset'");

                while($fetch=mysqli_fetch_array($datariwayat)){
                $id_riwayat = $fetch['id_riwayat'];
                $kondisi = $fetch['kondisi'];
                $lok_lama = $fetch['lok_lama'];
                $lok_baru = $fetch['lok_baru'];
                $keterangan = $fetch['keterangan'];
                $tgl_riwayat = $fetch['tgl_riwayat'];
                
                
                ?>
                    <tr>
                                <td class="tcenter"><?=$id_riwayat;?></td>
                                <td><?=$nama_aset;?></td>
                                <td><?=$lok_lama;?></td>
                                <td><?=$lok_baru;?></td>
                                <td><?=$kondisi;?></td>
                                <td><?=$keterangan;?></td>
                                <td><?echo date('d-M-Y', strtotime($tgl_riwayat));?></td>
                                <td class="tcenter">
                                <a href="action/edit_riwayat.php?id=<?php echo $id_riwayat?>"><i class="bx bxs-edit-alt" title="Edit"></i></a>
                                <a href="action/hapus_riwayat.php?id='.$row['id_riwayat'].'"><i class="bx bxs-trash" title="Hapus"></i></a>
                                </td>
                    
                    </tr>
                    <?php
                    }
                    ?>
                    </table>

            </div>

        </div>
        
    </div>
</section>

<script src="style/script.js"></script>

