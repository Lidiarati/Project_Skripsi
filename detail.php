<?php
session_start();
 include('koneksi.php');
 
    $pasien =mysqli_query ($koneksi, "SELECT * FROM pendaftaran 
    WHERE id_daftar ='" .$_GET['id']."' ");
    $p =mysqli_fetch_object($pasien);
 
?>
<html>
<head>
<meta charset ="utf-8">
    <meta name = "viewport" content ="widht=device-width, initial-scale=1">
<link rel="stylesheet" href="style2.css" class="rel">
</head>
<body>
   <section class ="content"> 
       <h2>Detail Pasien</h2>
        <div class="box">
        <table class="table-data" border="0">
        <tr>
           <td>Kode Pendaftaran</td>
           <td>:</td>
           <td><?php echo $p->id_daftar ?></td>
       </tr>
       <tr>
           <td>Tanggal Daftar</td>
           <td>:</td>
           <td><?php echo $p->tgl_daftar ?></td>
       </tr>
       <tr>
           <td>Nama Lengkap</td>
           <td>:</td>
           <td><?php echo $p->nama_pasien ?></td>
       </tr>
       <tr>
           <td>NIK</td>
           <td>:</td>
           <td><?php echo $p->nik ?></td>
       </tr>
       <tr>
           <td>Alamat</td>
           <td>:</td>
           <td><?php echo $p->alamat ?></td>
       </tr>
       <tr>
           <td>Tanggal Lahir</td>
           <td>:</td>
           <td><?php echo $p->tgl_lahir ?></td>
       </tr>
       <tr>
           <td>Jenis Kelamin</td>
           <td>:</td>
           <td><?php echo $p->jk ?></td>
       </tr>
       <tr>
           <td>No HP</td>
           <td>:</td>
           <td><?php echo $p->no_hp ?></td>
       </tr>
       <tr>
           <td>Tanggal Vaksin</td>
           <td>:</td>
           <td><?php echo $p->tgl_vaksin ?></td>
       </tr>
       <tr>
           <td>Kategori</td>
           <td>:</td>
           <td><?php echo $p->kategori ?></td>
       </tr>
       <tr>
           <td>Jenis Vaksin</td>
           <td>:</td>
           <td><?php echo $p->jenis_vaksin ?></td>
       </tr>
       <tr>
           <td>Vaksin Ke</td>
           <td>:</td>
           <td><?php echo $p->vaksin_ke ?></td>
       </tr>
   </table>
   <div>
       <a href="halaman.php?page=pasien" class="btn btn-danger">Kembali</a>
    </div>
   </div>
   
   </section>
</body>
</html>
