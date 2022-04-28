<?php
    include 'koneksi.php';  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset ="utf-8">
    <meta name = "viewport" content ="widht=device-width, initial-scale=1">
    <title>Pendaftaran Vaksinasi</title>
    <link rel="stylesheet" href="style2.css" class="rel">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    <section class ="box-formulir">
        <h2>pendaftaran berhasil</h2>
<div class="box">
    <h4>kode pendaftaran anda adalah <?php echo $_GET['id'] ?> </h4>
    <a href ="cetak-bukti.php?id=<?php echo $_GET ['id'] ?>"target="_blank"class ="btn-cetak"> CETAK BUKTI DAFTAR </a>&nbsp; &nbsp;
    <a href="index.php" class="btn-kembali">Kembali</a>
</div>
    </section>

</body>
</html>
