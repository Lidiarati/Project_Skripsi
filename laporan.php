<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laporan Pendaftaran Vaksinasi</title>

    <!-- Include file CSS Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Include library Bootstrap Datepicker -->
    <link href="plugin/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Include File jQuery -->
    <script src="js/jquery.min.js"></script>
</head>
<body>
    <div style="padding: 15px;">
        <h3 style="margin-top: 0;"><b>Laporan Pendaftaran Vaksinasi</b></h3>
        <hr />

        <form method="get" action="lap.php">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Filter Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal">
                            <span class="input-group-addon">s/d</span>
                            <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" name="filter" value="true" class="btn btn-secondary">TAMPILKAN</button>

            <?php
            if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="halaman.php?page=laporan" class="btn btn-default">RESET</a>';
            ?>
        </form>

        <?php
        // Load file koneksi.php
        include "koneksi.php";

        $tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            // Buat query untuk menampilkan semua data transaksi
            $query = "SELECT * FROM pendaftaran";
            $url_cetak = "cetak.php";
            $label = "Semua Data Pendaftaran";
        }else{ // Jika terisi
            // Buat query untuk menampilkan data transaksi sesuai periode tanggal
            $query = "SELECT * FROM pendaftaran WHERE (tgl_daftar BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
            $url_cetak = "cetak.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
        ?>
        <hr />
        <h4 style="margin-bottom: 5px;"><b>Data Transaksi</b></h4>
        <?php echo $label ?><br />

        <div style="margin-top: 5px;">
            <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
        </div>

        <div class="table-responsive" style="margin-top: 10px;">
            <table class="table table-bordered">
                <thead>
                <tr>
                <th>No</th>
                <th>ID Pasien</th>
                <th>Nama Pasien</th>
                <th>NIK</th>
                <th>NO HP</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Vaksin</th>
                <th>Jenis Vaksin</th>
                <th>Vaksin Ke</th>
                </tr>

                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                            $tgl = date('d-m-Y', strtotime($data['tgl_daftar'])); // Ubah format tanggal jadi dd-mm-yyyy

                            echo "<tr>";
                            echo "<td>".$tgl."</td>";
                            echo "<td>".$data['id_daftar']."</td>";
                            echo "<td>".$data['nama_pasien']."</td>";
                            echo "<td>".$data['nik']."</td>";
                            echo "<td>".$data['no_hp']."</td>";
                            echo "<td>".$data['alamat']."</td>";
                            echo "<td>".$data['jk']."</td>";
                            echo "<td>".$data['tgl_vaksin']."</td>";
                            echo "<td>".$data['jenis_vaksin']."</td>";
                            echo "<td>".$data['vaksin_ke']."</td>";
                            echo "</tr>";
                        }
                    }else{ // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include File JS Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Include library Bootstrap Datepicker -->
    <script src="plugin/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="js/custom.js"></script>

    <script>
    $(document).ready(function(){
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
    </script>
</body>
</html>