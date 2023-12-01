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
     <div class="stiker">
        <div class="qrstiker">
            <?
            include 'koneksi/koneksi.php';

            $id_aset = $_GET['id'];

            $get =mysqli_query($koneksi, "SELECT * FROM aset, pengadaan WHERE id_aset='$id_aset' AND aset.id_pengadaan=pengadaan.id_pengadaan");
            $fetch = mysqli_fetch_assoc($get);
            $no_dokumen=$fetch['no_dokumen'];
            
            // generate QR 
                $urlview = 'http://localhost:8080/aset_pdam/detail.php?id='.$id_aset;
                $qrcode ='https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$urlview.'&choe=UTF-8'
            ?>

            <table class="table-stiker">
                <tr>
                    <th></th>
                    <th width="400px"></th>
                    <th></th>
                </tr>
                <tr> 
                    <td class="tcenter"><img src="asset/pdam-logo.png"></td>
                    <td class="tcenter"><b>PDAM TIRTA HANDAYANI <br> KAB.GUNUNGKIDUL</b> <br><br> No.Inv : <?=$no_dokumen;?> </td>
                    <td class="tcenter"><img src="<?=$qrcode;?>"></td>
                </tr>

            </table>
                   
        </div>
     </div>

     <script>
        window.print();
     </script>


</body>
</html>