<?php
include ('koneksi.php');
if (isset($_GET ['id_jadwal'])){
    $id = $_GET ['id_jadwal'];
    $cek = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$id'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("berhasil menghapus data."); document.location="halaman.php?page=jadwal";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="halaman.php?page=jadwal";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="halaman.php?page=jadwal";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="halaman.php?page=pjadwal";</script>';
}


?>