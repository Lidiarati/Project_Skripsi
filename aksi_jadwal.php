<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
$id =$_POST ['id_jadwal'];
$hari   = $_POST ['hari'];
$jam_buka      =$_POST['jam_buka'];
$jam_tutup         =$_POST['jam_tutup'];
$no_antrian            =$_POST['no_antrian'];
$lokasi_vaksin = $_POST ['lokasi_vaksin'];
$cek = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$id'") or die(mysqli_error($koneksi));

if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO jadwal(hari,jam_buka,jam_tutup, no_antrian, lokasi_vaksin)
VALUES ('$hari','$jam_buka','$jam_tutup','$no_antrian','$lokasi_vaksin')") or die(mysqli_error($koneksi));

if($sql){
    echo '<script>alert("Berhasil menambahkan data."); document.location="halaman.php?page=jadwal";</script>';
}else{
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
}
}
?>