<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
    exit;
}
require_once "controller/function.php";
require_once "template/header.php";
require_once "template/sidebar.php";
$id = $_GET['id'];
$mhs = tampil("SELECT * FROM mahasiswa WHERE id=$id")[0];

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php if (isset($_POST['ubah'])) {
        if (ubah($_POST) > 0) {
            echo "<script>alert('Data Berhasil Diubah');document.location.href='index.php'</script>";
        } else {
            echo mysqli_error($conn);
        }
    } ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                            <input type="hidden" name="gambarlama" value="<?= $mhs['gambar'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input value="<?= $mhs['nama'] ?>" type="text" class="form-control" name="nama"
                                        id="nama" placeholder="masukan nama">
                                </div>
                                <div class="form-group ">
                                    <input type="radio" name="jekel" value="Laki - Laki" class="form-check-input ml-1"
                                        id="laki"><label for="laki" class="ml-4">Laki - Laki </label>
                                    <input type="radio" name="jekel" value="Perempuan" class="form-check-input ml-1"
                                        id="cewe"><label for="cewe" class="ml-4">Perempuan</label>
                                </div>
                                <div class="form-group">
                                    <label for="npm">Npm</label>
                                    <input type="number" name="npm" class="form-control" id="npm"
                                        placeholder="masukan npm" value="<?= $mhs['npm'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" id="email"
                                        value="<?= $mhs['email'] ?>" placeholder="masukan email">
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select name="jurusan" id="jurusan" class="form-control">
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label><br>
                                    <img src="assets/img/<?= $mhs['gambar'] ?>" width="40" alt="" class="my-2">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="gambar" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once "template/footer.php"; ?>