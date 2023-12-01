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
            <span class="dashboard">Data Rekanan</span>
        </div>
    </nav>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
                <a href="form_rekanan.php"><button class="inbtn">Tambah</button></a>
                <form method="GET" action="rekanan.php">
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
                        $query = "SELECT * FROM rekanan WHERE id_rekanan like '%".$kata_cari."%' OR nama_rekanan like '%".$kata_cari."%' OR alamat_rekanan like '%".$kata_cari."%' OR nama_pimpinan like '%".$kata_cari."%' OR no_hp like '%".$kata_cari."%' ORDER BY id_rekanan ASC";
                    } else {
                        //jika tidak ada pencarian
                        $query = "SELECT * FROM rekanan ORDER BY id_rekanan ASC";
                    }

                    $result = mysqli_query($koneksi,$query);


                    if (!$result) {
                    die ('SQL Error: ' . mysqli_error($koneksi));
                    }
                    echo '<table class="tabel-rekanan">
                    <tr>
                        <th>ID Rekanan</th>
                        <th>Nama Rekanan</th>
                        <th>Alamat</th>
                        <th>Nama Pimpinan</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>';
                    while ($row = mysqli_fetch_array($result))
                    {
                    echo '<tr>
                        <td class="tcenter">'.$row['id_rekanan'].'</td>
                        <td>'.$row['nama_rekanan'].'</td>
                        <td>'.$row['alamat_rekanan'].'</td>
                        <td>'.$row['nama_pimpinan'].'</td>
                        <td>'.$row['no_hp'].'</td>
                        <td class="tcenter">
                        <a href="action/edit_rekanan.php?id='.$row['id_rekanan'].'"><i class="bx bxs-edit-alt" title="Edit"></i></a> &nbsp;
                        <a onclick="return konfirmasi()" href="action/hapus_rekanan.php?id='.$row['id_rekanan'].'"><i class="bx bxs-trash" title="Hapus"></i></a>
                        </td>';
                    }
                    
                    echo '</tr>
                    </table>';
                    ?>

                    </tr>
                </table>
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

