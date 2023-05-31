<?php
include "../../config/koneksi.php";

// inisiasi module dan act
$module = $_GET['module'];
$act = $_GET['act'];

// bagian insert data
if ($module == 'siswa' and $act == 'insert') {
    // inisiasi nama field ke dalam variabel
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // query insert
    $query = "INSERT INTO muda_siswa (nisn, nama_siswa, jurusan, jenis_kelamin, alamat, no_hp)
              VALUES ('$nisn', '$nama', '$jurusan', '$jekel', '$alamat', '$no_hp')";

    // kondisi pengecekan apakah data berhasil di simpan
    if ($connection->query($query)) {

        // alert sukses
        session_start();
        $_SESSION['alert'] = "
        <div class='alert alert-success' role='alert'>
            Data Siswa Berhasil di Simpan.
        </div>
        ";

        // redirect ke laman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        // pesan error jika gagal
        echo "Data gagal disimpan";
    }

    // bagian hapus data
} elseif ($module == 'siswa' & $act == 'delete') {

    // inisiasi nama field ke dalam variabel
    $nisn = $_GET['id'];

    // query hapus
    $query = "DELETE FROM muda_siswa WHERE nisn =$nisn";

    // kondisi pengecekan apakah data berhasil di simpan
    if ($connection->query($query)) {

        // alert sukses
        session_start();
        $_SESSION['alert'] = "
        <div class='alert alert-danger' role='alert'>
            Data Siswa Berhasil di Hapus.
        </div>
        ";

        // redirect ke laman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        // pesan error jika gagal
        echo "Data gagal dihapus";
    }
}
// bagian edit
elseif ($module == 'siswa' & $act == 'edit') {

    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE muda_siswa SET
                nama_siswa = '$nama',
                jurusan = '$jurusan',
                jenis_kelamin = '$jekel',
                alamat = '$alamat',
                no_hp = '$no_hp'
          WHERE nisn = '$nisn'";

    // kondisi pengecekan apakah data berhasil di simpan
    if ($connection->query($query)) {

        // alert sukses
        session_start();
        $_SESSION['alert'] = "
        <div class='alert alert-warning' role='alert'>
            Data Siswa Berhasil di Edit.
        </div>
        ";

        // redirect ke laman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        // pesan error jika gagal
        echo "Data gagal diedit";
    }
}
