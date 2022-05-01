<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_user.php");
}

?>
<?php 
	include 'koneksi.php';

	if(isset($_POST['submit'])){

		// ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter aja dari sebelah kanan
		$getMaxId = mysqli_query($koneksi, "SELECT MAX(RIGHT(id_daftar, 5)) AS id FROM pendaftaran");
		$d = mysqli_fetch_object($getMaxId);
		$generateId = 'P'.date('Y'). sprintf("%05s", $d->id + 1);
		// proses insert
		$insert = mysqli_query($koneksi, "INSERT INTO pendaftaran VALUES (
				'".$generateId."',
				'".date('Y-m-d')."',
				'".$_POST['nama_pasien']."',
				'".$_POST['nik']."',
				'".$_POST['alamat']."',
				'".$_POST['tgl_lahir']."',
				'".$_POST['jk']."',
				'".$_POST['no_hp']."',
				'".$_POST['tgl_vaksin']."',
				'".$_POST['kategori']."',
				'".$_POST['jenis_vaksin']."',
				'".$_POST['vaksin_ke']."'
			)");

		if($insert){
			echo '<script>alert("Pendaftaran berhasil.");window.location="berhasil.php?id='.$generateId.'"</script>';
		}else{
			echo 'huft '.mysqli_error($koneksi);
		}

	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Corlate</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/icomoon.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->


<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-number">
                            <p><i class="fa fa-phone-square"></i> 08121388379</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="social">
                            <ul class="social-share">
                                <li><a href="https://www.facebook.com/ratthyii.nduet"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="https://www.instagram.com/ratinduet/?hl=id"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/baru.png" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="daftar.php">Daftar Vaksinasi</a></li>
                        <li><a href="login_admin.php">Login Admin</a></li>
                        <li><a href="akun.php">Registrasi</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->
    <div class ="container">
          <h2 class ="alert alert-primary text-center mt-5">Formulir Pendaftaran Vaksinasi Covid-19</h2>
          <form  method ='POST' action ="">
            <div class="row">
              <div class="col-md-6">
              <div class =" item form-group">
                  <label> Nama Lengkap</label>
                    <input type="text" name="nama_pasien" class="form-control">
              </div>
              </div>
              <div class="col-md-6">
              <div class ="form-group">
                <label> NIK</label>
                  <input type="text" name="nik" class="form-control">
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class ="form-group">
                <label> Alamat</label>
                  <textarea type="text" name="alamat" class="form-control"rows="5"></textarea>
                </div>
                </div>
                <div class="col-md-6">
                <div class ="form-group">
                <label> Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" >
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <div class ="form-group">
                <label> No HP</label>
                  <input type="text" name="no_hp" class="form-control">
            </div>
            </div>
              <div class="col-md-6">
              <div class ="form-group">
                <div><label for="jk" class="form-control">Jenis Kelamin </label>
                    <label><input type="radio" name="jk" value="laki-laki"> Laki-laki</label> &nbsp; &nbsp;
                    <label><input type="radio" name="jk" value="perempuan"> Perempuan</label>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <div class ="form-group">
                <label> Tanggal Vaksin</label>
                <select name="tgl_vaksin" class="form-control">
						<option value="">--Pilih--</option>
						<option value="2022-06-06">2022-06-06</option>
						<option value="2022-06-07">2022-06-07</option>
						<option value="2022-06-08">2022-06-08</option>
                        <option value="2022-06-09">2022-06-09</option>
                        <option value="2022-06-10">2022-06-10</option>
                        <option value="2022-06-11">2022-06-11</option>
            </select>
            </div>
            </div>
            <div class="col-md-6">
            <div class ="form-group">
            <label>Kategori</label>
					  <select name="kategori" class="form-control">
						<option value="">--Pilih--</option>
						<option value="umum">Umum</option>
						<option value="remaja">Remaja</option>
						<option value="ibu_hamil">Ibu hamil</option>
            </select>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <div class ="form-group">
            <label>Jenis Vaksin</label>
					  <select name="jenis_vaksin" class="form-control">
						<option value="">--Pilih--</option>
						<option value="moderna">Moderna</option>
						<option value="sinovac">Sinovak</option>
						<option value="astrazeneca">AstraZeneca</option>
                        <option value="pfizer">Pfizer</option>
            </select>
            </div>
            </div>
            <div class="col-md-6">
            <div class ="form-group">
            <div><label for="vaksin_ke" class="form-control" >Vaksin Ke </label>
                <label><input type="radio" name="vaksin_ke" value="satu"> Satu</label> &nbsp; &nbsp;
                <label><input type="radio" name="vaksin_ke" value="dua"> Dua</label>&nbsp;&nbsp;
                <label><input type="radio" name="vaksin_ke" value="tiga"> Tiga</label>
            </div>
            </div>
            </div>
             <br>
             <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Daftar</button>&nbsp; &nbsp;
            <a href="index.php" class="btn btn-warning btn-lg">Kembali</a>
            </div>
          </form>

      </div>
</div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

