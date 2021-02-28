<?php
$conn = mysqli_connect("localhost", "root", "", "crud");

function tampil($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    $size = $_FILES['gambar']['size'];

    if ($error === 4) {
        echo "<script>alert('Gambar Belum Diupload!')</script>";
        return false;
    }

    if ($size > 1000000) {
        echo "<script>alert('Ukuran Gambar Terlalu Besar!')</script>";
        return false;
    }

    $ekstensiValid = ['jpg', 'png', 'gif', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>alert('Yang Anda Upload Bukan Gambar')</script>";
        return false;
    }

    $namaBaru = uniqid();
    $namaBaru .= ".";
    $namaBaru .= $ekstensiGambar;
    move_uploaded_file($tmp, 'assets/img/' . $namaBaru);
    return $namaBaru;
}

function tambah($post)
{
    global $conn;
    $nama = htmlspecialchars($post['nama']);
    $jekel = htmlspecialchars($post['jekel']);
    $npm = htmlspecialchars($post['npm']);
    $email = htmlspecialchars($post['email']);
    $jurusan = htmlspecialchars($post['jurusan']);
    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES ('','$nama','$jekel','$npm','$email','$jurusan','$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}