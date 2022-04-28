<?php 
include('koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}

?>
<center><br><br>
<font Size="6" face="Helvetica">selamat datang disistem informasi pendaftaran vaksinasi covid 19</font> <br>
<img src="assets/img/dasbor.jpg" width="500px height="600px" /> <br><br><br>
<font Size="3">Vaksin merupakan zat atau substansi yang berfungsi membantu tubuh melawan penyakit tertentu. Tubuh yang sudah divaksin akan membentuk antibodi terhadap virus tertentu.
</font>
</center>