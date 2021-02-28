<?php

require_once "controller/function.php";
require_once "template/header.php";
require_once "template/sidebar.php";

$mahasiswa = tampil("SELECT * FROM mahasiswa");


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Npm</th>
                                        <th>Email</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($mahasiswa as $mhs) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><img src="assets/img/<?= $mhs['gambar'] ?>" width="40px" alt=""></td>
                                        <td><?= $mhs['nama']; ?></td>
                                        <td><?= $mhs['jekel']; ?></td>
                                        <td><?= $mhs['npm']; ?></td>
                                        <td><?= $mhs['email']; ?></td>
                                        <td><?= $mhs['jekel']; ?></td>
                                        <td>
                                            <a href="" class="float-right ml-1"><i class="fas fa-trash text-danger"
                                                    title="hapus data"></i>
                                            </a>
                                            <i class="float-right">|</i>
                                            <a href="" class="float-right mr-1"><i class="fas fa-edit text-warning"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Npm</th>
                                        <th>Email</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once "template/footer.php"; ?>