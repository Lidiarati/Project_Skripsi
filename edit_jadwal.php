<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<?php
 include('koneksi.php');
 if(!isset($_GET['id_jadwal'])){
    header('Location: halaman.php?page=jadwal');}
 
    $id = $_GET ['id_jadwal'];
    $sql = "SELECT * FROM jadwal WHERE id_jadwal=$id";
    $query = mysqli_query($koneksi, $sql);
    $jadwal = mysqli_fetch_array($query);
    
    // jika data yang di-edit tidak ditemukan
    if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan");
    }
    ?>
<div class="panel panel-primary"> 
<div class="panel-heading">
    <h1>Edit Jadwal </h1>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
            <form  action ="halaman.php?page=edit_jadwal&id_jadwal= <?php echo $id; ?>" method ='POST'>
            <div class="form-group">
        
                <div class="form-group">
                <label>Hari</label>
                <input type="hidden" name="id_jadwal" value="<?php echo $jadwal['id_jadwal'] ?>">
                <input class="form-control" name ='hari' type='text'  value="<?php echo $jadwal['hari']; ?>"> 
                </div>
                
                <div class="form-group">
                <label>Jam Buka</label>
                <input class="form-control" name ='jam_buka' value="<?php echo $jadwal['jam_buka']; ?>">
                </div>
                <div class="form-group">
                <label>Jam Mulai</label>
                <input class="form-control"type='text' name ='jam_tutup'value="<?php echo $jadwal['jam_tutup']; ?>"> 
                </div>
                
                <div class="form-group">
                <label>No antrian</label>
                <input class="form-control" name ='no_antrian' value="<?php echo $jadwal['no_antrian']; ?>">
                </div>
                <div class=" form-group">
				<label>Nama Faskes</label>
					<select name="lokasi_vaksin" class="form-control">
						<option value="">Pilih</option>
						<option value="puskesmas" <?php if($jadwal['lokasi_vaksin'] == 'puskesmas'){ echo 'selected'; } ?>>Puskesmas</option>
						<option value="postu" <?php if($jadwal['lokasi_vaksin'] == 'postu'){ echo 'selected'; } ?>>Postu</option>
                    </select>
            </div>
                <div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="halaman.php?page=pasien" class="btn btn-warning">Kembali</a>
				</div>
            </div>
        </form>
    </div>
</div>
</div> 
</div> 
</div>

<?php
if(isset($_POST['submit'])){
    //$id = ['id_jadwal'];
    $hari = $_POST ['hari'];
    $jam_buka = $_POST ['jam_buka'];
    $jam_tutup= $_POST ['jam_tutup'];
    $no_antrian = $_POST ['no_antrian'];
    $lokasi_vaksin =$_POST ['lokasi_vaksin'];

    $update = mysqli_query ($koneksi," UPDATE jadwal SET hari='$hari', jam_buka='$jam_buka', jam_tutup='$jam_tutup', no_antrian='$no_antrian', lokasi_vaksin ='$lokasi_vaksin' WHERE id_jadwal='$id'") or die(mysqli_error($koneksi));
    if($update){
        echo '<script>alert("Berhasil menyimpan data."); document.location="halaman.php?page=jadwal";</script>';
    }else{
        echo '<div class="alert alert-warning"> Gagal melakukan proses edit data.</div>';
    }

    
}
?>

