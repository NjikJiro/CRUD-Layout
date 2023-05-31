<?php
include "../../config/koneksi.php";

// inisiasi module dan act
$module = $_GET['module'];
$act = $_GET['act'];

// Cek module dan act
if ($module == 'user' & $act == 'insert') :

    // inisiasi
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    // Fungsi Hash Password
    $password = password_hash($pass, PASSWORD_DEFAULT);

    // query insert user
    $query = "INSERT INTO muda_user (nama_user, username, password, level, is_active)
              VALUES ('$nama', '$username', '$password', '$level', '1')";

    if ($connection->query($query)) {

        // alert sukses
        session_start();
        $_SESSION['alertUser'] = "
    <div class='alert alert-success' role='alert'>
        Data User Berhasil di Simpan.
    </div>
    ";

        // redirect ke laman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        // pesan error jika gagal
        echo "Data gagal disimpan";
    }
endif;
