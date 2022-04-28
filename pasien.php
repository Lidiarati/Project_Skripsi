
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <h3><i class="fa-solid fa-hospital-user  mr-2" class ="btn btn-primary"></i>DAFTAR PASIEN </h3><hr>
                    <a href="halaman.php?page=pendaftaran"class ="btn btn-primary">Tambah Data Pasien</a>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-dark " id="dataTables-example" >
                                    <thead class="align-middle">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>NIK</th>
                                            <th>NO HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * from pendaftaran") or die(mysqli_error($koneksi));
                                        //melakukan perulangan while dengan dari dari query $sql
                                        while($data = mysqli_fetch_array($sql)){
                                          ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $data['id_daftar']; ?></td>
                                          <td><?php echo $data['nama_pasien']; ?></td>
                                          <td><?php echo $data['nik']; ?></td>
                                          <td><?php echo $data['no_hp']; ?></td>
                                          <td>
                                          <a href="halaman.php?page=detail&id=<?php echo $data['id_daftar'] ?>" class="btn btn-success btn-sm">Detail</a>
                                           <a href="halaman.php?page=edit&id=<?php echo $data['id_daftar'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="delete.php?id=<?php  echo $data['id_daftar'] ?>"onclick ="return confirm ('anda yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                          </td>
                                        </tr>
                                        <?php 
                                      }
                                      ?>
                                      </table>
                                      </tbody>
            </div>
       </div>
    </div>
   </div>
 </div>
