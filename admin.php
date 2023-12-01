<?php include "sidebar.php" ;

?>



<!-- header -->
<section class="home-section">
    <nav>
        <div class="sidebar-button">
        <i class='bx bx-menu'></i>
            <span class="dashboard">Data Admin</span>
        </div>
    </nav>

    <!-- konten dashboard -->
    <div class="home-content">
        <div class="dashboard-content">
            <!-- search area -->
            <div class="search-box">
                <a href="form_admin.php"><button class="inbtn">Tambah</button></a>
                <form method="GET" action="admin.php">
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
                    $query = "SELECT * FROM admin WHERE id_admin like '%".$kata_cari."%' OR nama_admin like '%".$kata_cari."%' OR username like '%".$kata_cari."%' ORDER BY id_admin ASC";
				} else {
					//jika tidak ada pencarian
					$query = "SELECT * FROM admin ORDER BY id_admin ASC";
				}


		
                $result = mysqli_query($koneksi,$query);

                if (!$result) {
	            die ('SQL Error: ' . mysqli_error($koneksi));
                }
                echo '<table class="tabel-admin">
                    <tr>
                        <th>ID Admin</th>
                        <th>Nama Admin</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Bagian</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <tr>';
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo '<tr>
                                <td class="tcenter">'.$row['id_admin'].'</td>
                                <td>'.$row['nama_admin'].'</td>
                                <td>'.$row['username'].'</td>
                                <td>'.$row['level'].'</td>
                                <td>'.$row['bagian'].'</td>
                                <td class="tcenter">
                                <a href="action/edit_admin.php?id='.$row['id_admin'].'"><i class="bx bxs-edit-alt" title="Edit"></i></a>&nbsp
                                <a onclick="return konfirmasi()" href="action/hapus_admin.php?id='.$row['id_admin'].'"><i class="bx bxs-trash" title="Hapus"></i></a>
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
