<?php 

// session_start();

// // cek apakah yang mengakses halaman ini sudah login
// if($_SESSION['level']==""){
//     header("location:login.php?pesan=gagal");
// }


include "sidebar_a.php" 

?>

<!-- header -->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
        <i class='bx bx-menu'></i>
            <span class="dashboard">Data Aset</span>
        </div>
    </nav>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
            
                <a href="form_aset.php"><button class="inbtn">Tambah</button></a>
                <form method="GET" action="aset_a.php">
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
                    $query = "SELECT * FROM aset JOIN rekanan ON rekanan.id_rekanan = aset.id_rekanan
                    JOIN pengadaan ON pengadaan.id_pengadaan = aset.id_pengadaan WHERE id_aset like '%".$kata_cari."%' OR nama_aset like '%".$kata_cari."%' OR nilai_awal like '%".$kata_cari."%' OR lokasi like '%".$kata_cari."%' OR nama_rekanan like '%".$kata_cari."%' OR no_dokumen like '%".$kata_cari."%' ORDER BY id_aset ASC";
				} else {
					//jika tidak ada pencarian
					$query = "SELECT * FROM aset JOIN rekanan ON rekanan.id_rekanan = aset.id_rekanan
                    JOIN pengadaan ON pengadaan.id_pengadaan = aset.id_pengadaan ORDER BY id_aset ASC";
				}

                

                $result = mysqli_query($koneksi,$query);

                $jum_data = mysqli_num_rows($result);

                echo '<br><h3>Jumalah data ditemukan : '; echo $jum_data; echo '</h3><br>';

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
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Rekanan</th>
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
                                <td>'.$row['nilai_awal'].'</td>
                                <td>'.$row['lokasi'].'</td>
                                <td>'.$row['kondisi'].'</td>
                                <td>'.$row['nama_rekanan'].'</td>
                                <td>'.$row['no_dokumen'].'</td>
                                <td class="tcenter">
                                <a href="riwayat.php?id='.$row['id_aset'].'"><i class="bx bx-file" title="Riwayat"></i></a>&nbsp
                                <a href="action/edit_aset.php?id='.$row['id_aset'].'"><i class="bx bxs-edit-alt" title="Edit"></i></a>&nbsp
                                <a onclick="return konfirmasi()" href="action/hapus_aset.php?id='.$row['id_aset'].'"><i class="bx bxs-trash" title="Hapus"></i></a>
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
