<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}

?>
<h3>Tambah Jadwal</h3>
<div class="panel panel-primary">
<div class="panel-heading">
    Tambah Jadwal
</div>
<div class="panel-body label-align"  >
    <div class="row">
        <div class="col-md-6 ">
            <form action ="aksi_jadwal.php" method ='POST'>
                <div class="form-group">
                <label >Hari </label>
                <input class="form-control" name ='hari' type ="text" />
                </div>  
                <div class="form-group">
                <label>Jam Buka</label>
                <input class="form-control" name ='jam_buka' />
                </div>
                <div class="form-group">
                <label>Jam Tutup</label>
                <input class="form-control" name ='jam_tutup' />
                </div>
                <div class="form-group">
                <label>No Antrian</label>
                <input class="form-control" name ='no_antrian' />
                </div>
                <div class="form-group">
				<label>Jenis Faskes</label>
				<div>
					<select name="lokasi_vaksin" class="form-control">
						<option value="">Pilih</option>
						<option value="puskesmas">Puskesmas</option>
                        <option value="postu">Postu</option>
                </select>
                </div>
                <div>
                <button type="submit" name='simpan'class="btn btn-warning">Simpan</button>
                <a href="halaman.php?page=pasien" class="btn btn-primary btn-sm">Batal</a>
            </div>
            </form>
    </div>
</div>
</div> 
</div> 
</div>


<?php 
include_once("koneksi.php");
if ($_POST['simpan']){
    $hari = $_POST ['hari'];
    $jam_buka = $_POST['jam_buka'];
    $jam_tutup =['jam_tutup'];
    $no_antrian =['no_antrian'];
    $simpan = $_POST ['simpan'];

    $simpan= "INSERT INTO jadwal (hari,jam_buka,jam_tutup, no_antrian)
    VALUES ('$hari','$jam_buka','$jam_tutup','$no_antrian')";
    echo "User added successfully. <a href='halaman.php?page=tambah_jadwal'>View Users</a>";
}
?>