<?php
include ('koneksi.php');
if (isset($_GET ['id'])){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE id_daftar ='" .$_GET['id']."' ");
		echo '<script>alert("berhasil menghapus data."); document.location="halaman.php?page=pasien";</script>';
		
}



?>