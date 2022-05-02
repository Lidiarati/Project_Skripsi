<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<?php
session_start();
 include('koneksi.php');
 
    $pasien =mysqli_query ($koneksi, "SELECT * FROM pendaftaran 
    WHERE id_daftar ='" .$_GET['id']."' ");
    $p =mysqli_fetch_object($pasien);
    
    //jika data yang di-edit tidak ditemukan
    //if( mysqli_num_rows($query) < 1 ){
     //die("data tidak ditemukan...");
    //}

 
    
?>
<?php
if(isset($_POST['submit'])){
    //$id = ['id_pasien'];
    $nama_lengkap = $_POST ['nama_pasien'];
    $nik = $_POST ['nik'];
    $alamat = $_POST ['alamat'];
    $tgl_lahir = $_POST ['tgl_lahir'];
    $jk = $_POST ['jk'];
    $no_hp = $_POST ['no_hp'];
    $tgl_vaksin =$_POST['tgl_vaksin'];
    $kategori =$_POST ['kategori'];
    $jenis_vaksin =$_POST['jenis_vaksin'];
    $vaksin_ke =$_POST ['vaksin_ke'];
    $update = mysqli_query ($koneksi,"UPDATE pendaftaran SET nama_pasien='$nama_lengkap', nik='$nik', alamat='$alamat', tgl_lahir='$tgl_lahir',jk='$jk',no_hp='$no_hp', tgl_vaksin='$tgl_vaksin', kategori='$kategori', jenis_vaksin='$jenis_vaksin', vaksin_ke='$vaksin_ke'
     WHERE id_daftar ='" .$_GET['id']."' ") or die(mysql_error($koneksi));
    if($update){
        echo '<script>alert("Berhasil Mengupdate Data."); document.location="halaman.php?page=pasien";</script>';
    }else{
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
    }

    
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="panel panel-primary"> 
<div class="panel-heading">
    <h1>Edit data </h1>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
   <div class="form-group">
   <form  action ="" method ='POST'>
        <label>Nama Lengkap</label>
                <input type="hidden" name="id_pasien" value="<?php echo $p->id_pasien ?>">
                <input class="form-control" name ='nama_pasien'  value="<?php echo $p->nama_pasien ?>"> 
                </div>
                <div class="form-group">
                <label>NIK</label>
                <input class="form-control" name ='nik' value="<?php echo $p->nik ?>">
                </div>
                <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="4" name='alamat'><?php echo $p->alamat ?></textarea>
                <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control"type='date' name ='tgl_lahir'value="<?php echo $p->tgl_lahir ?>"> 
                </div>
                <div><label for="jk">Jenis Kelamin: </label>
                <label><input type="radio" name="jk" value="laki-laki" <?php if($p->jk == 'laki-laki'){ echo 'checked'; } ?>>Laki-Laki &nbsp; &nbsp;
                </label>
                <label><input type="radio" name="jk" value="perempuan" <?php if($p->jk == 'perempuan'){ echo 'checked'; } ?>>Perempuan &nbsp; &nbsp;
                </label>
                </div>
                <div class="form-group">
                <label>NO HP</label>
                <input class="form-control" type='text'name ='no_hp' value="<?php echo $p->no_hp ?>" >
                </div>
                <label>Tanggal Vaksin</label>
                <input class="form-control" type='text'name ='tgl_vaksin' value="<?php echo $p->tgl_vaksin ?>" >
                </div>
                <div class="form-group">
				<label>Tanggal Vaksin</label>
					<select name="tgl_vaksin" class="form-control" required>
						<option value="">--Pilih--</option>
						<option value="2022-06-06" <?php if($p->jenis_vaksin == '2022-06-06'){ echo 'selected'; } ?>>2022-06-06</option>
						<option value="2022-06-07" <?php if($p->jenis_vaksin == '2022-06-07'){ echo 'selected'; } ?>>2022-06-07</option>
                        <option value="2022-06-08" <?php if($p->jenis_vaksin == '2022-06-08'){ echo 'selected'; } ?>>2022-06-08</option>
                        <option value="2022-06-09" <?php if($p->jenis_vaksin == '2022-06-09'){ echo 'selected'; } ?>>2022-06-09</option>
                        <option value="2022-06-10" <?php if($p->jenis_vaksin == '2022-06-10'){ echo 'selected'; } ?>>2022-06-10</option>
                        <option value="2022-06-11" <?php if($p->jenis_vaksin == '2022-06-11'){ echo 'selected'; } ?>>2022-06-11</option>
                    </select>
                </div>
                <div class="form-group">
				<label>Kategori</label>
					<select name="kategori" class="form-control" required>
						<option value="">--Pilih--</option>
						<option value="umum" <?php if($p->kategori == 'umum'){ echo 'selected'; } ?>>Umum</option>
						<option value="remaja" <?php if($p->kategori == 'remaja'){ echo 'selected'; } ?>>Remaja</option>
                        <option value="ibu_hamil" <?php if($p->kategori == 'ibu_hamil'){ echo 'selected'; } ?>>Ibu Hamil</option>
                    </select>
                </div>
                <div class="form-group">
				<label>Jenis Vaksin</label>
					<select name="jenis_vaksin" class="form-control" required>
						<option value="">--Pilih--</option>
						<option value="moderna" <?php if($p->jenis_vaksin == 'moderna'){ echo 'selected'; } ?>>Moderna</option>
						<option value="sinovac" <?php if($p->jenis_vaksin == 'sinocac'){ echo 'selected'; } ?>>Sinovac</option>
                        <option value="astrazeneca" <?php if($p->jenis_vaksin == 'astrazeneca'){ echo 'selected'; } ?>>Astrazeneca</option>
                        <option value="pfizer" <?php if($p->jenis_vaksin == 'pfizer'){ echo 'selected'; } ?>>Pfizer</option>
                    </select>
                </div>
                <div><label for="vaksin_ke">Vaksin Ke :</label>
                <label><input type="radio" name="vaksin_ke" value="satu" <?php if($p->vaksin_ke == 'satu'){ echo 'checked'; } ?>>Satu &nbsp; &nbsp;
                </label>
                <label><input type="radio" name="vaksin_ke" value="dua" <?php if($p->vaksin_ke == 'dua'){ echo 'checked'; } ?>>Dua &nbsp; &nbsp;
                </label>
                <label><input type="radio" name="vaksin_ke" value="tiga" <?php if($p->vaksin_ke == 'tiga'){ echo 'checked'; } ?>>Tiga
                </label>
                </div>
                <div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="simpan">
					<a href="halaman.php?page=pasien" class="btn btn-warning">Kembali</a>
				</div>
            </div>
            </form>
    </div>
</div>
</div> 
</div> 
</div>
</body>
</html>
