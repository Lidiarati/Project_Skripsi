<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
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
			echo '<script> alert("Berhasil menambahkan data.");document.location="halaman.php?page=pasien"</script>';
		}else{
			echo 'huft '.mysqli_error($koneksi);
		}
  }
?>
<div class="panel panel-primary">
<div class="panel-heading">
    <h3>Form pendaftaran Vaksinasi</h3>
</div>
<div class="panel-body label-align"  >
    <div class="row">
        <div class="col-md-6 ">
          <form  method ='POST' action =''>
              <div class =" item form-group">
                  <label> Nama Lengkap</label>
                    <input type="text" name="nama_pasien" class="form-control">
              </div>
              <div class ="form-group">
                <label> NIK</label>
                  <input type="text" name="nik" class="form-control">
            </div>
            <div class ="form-group">
                <label> Alamat</label>
                  <textarea type="text" name="alamat" class="form-control"rows="4"></textarea>
            </div>
            <div class ="form-group">
                <label> Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" >
            </div>
            <div><label for="jk" class="form-control" >Jenis Kelamin </label>
                <label><input type="radio" name="jk" value="laki-laki"> Laki-laki</label> &nbsp; &nbsp;
                <label><input type="radio" name="jk" value="perempuan"> Perempuan</label>
            </div>
            <div class ="form-group">
                <label> No HP</label>
                  <input type="text" name="no_hp" class="form-control">
            </div> 
            <div class ="form-group">
                <label> Tanggal Vaksin</label>
                  <input type="text" name="tgl_vaksin" class="form-control">
            </div> 
            <div class ="form-group">
            <label>Kategori</label>
					  <select name="kategori" class="form-control">
						<option value="">--Pilih--</option>
						<option value="umum">Umum</option>
						<option value="remaja">Remaja</option>
						<option value="ibu_hamil">Ibu hamil</option>
            </select>
            </div>
            <div class ="form-group">
            <label>Jenis Vaksin</label>
					  <select name="jenis_vaksin" class="form-control">
						<option value="">--Pilih--</option>
						<option value="moderna">Moderna</option>
						<option value="sinovac">Sinovak</option>
						<option value="astrazeneca">AstraZeneca</option>
            </select>
            </div>
            <div class ="form-group">
            <div><label for="vaksin_ke" class="form-control" >Vaksin Ke </label>
                <label><input type="radio" name="vaksin_ke" value="satu"> Satu</label> &nbsp; &nbsp;
                <label><input type="radio" name="vaksin_ke" value="dua"> Dua</label>&nbsp;&nbsp;
                <label><input type="radio" name="vaksin_ke" value="tiga"> Tiga</label>
            </div>
            </div>
            <br>
            <div>
            <input type="submit" name="submit" class="btn btn-warning" value="Daftar Sekarang">
                <a href="halaman.php?page=pasien" class="btn btn-danger">Batal</a>
            </div>
          </form>

      </div>
</div>
</div>
</div>