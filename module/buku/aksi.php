<?php
include "../../config/koneksi.php";

// inisiasi module dan act
$module = $_GET['module'];
$act = $_GET['act'];

// bagian insert data
if ($module == 'buku' and $act == 'insert') {
    // inisiasi nama field ke dalam variabel
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $jenis = $_POST['jenis_buku'];
    $stok = $_POST['stok'];

    // query insert
    $query = "INSERT INTO muda_buku (isbn, judul_buku, pengarang, penerbit, tahun_terbit, jenis_buku, stok)
              VALUES ('$isbn', '$judul', '$pengarang', '$penerbit', '$tahun', '$jenis', '$stok')";

    // kondisi pengecekan apakah data berhasil di simpan
    if ($connection->query($query)) {

        // alert sukses
        session_start();
        $_SESSION['alertBuku'] = "
        <div class='alert alert-success' role='alert'>
            Data Buku Berhasil di Simpan.
        </div>
        ";

        // redirect ke laman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        // pesan error jika gagal
        echo "Data gagal disimpan";
    }
}
// hapus buku
elseif ($module == 'buku' & $act == 'delete') {

    // inisiasi nama field ke dalam variabel
    $isbn = $_GET['id'];

    // query hapus
    $query = "DELETE FROM muda_buku WHERE isbn ='$isbn'";

    // kondisi pengecekan apakah data berhasil di simpan
    if ($connection->query($query)) {

        // alert sukses
        session_start();
        $_SESSION['alertBuku'] = "
        <div class='alert alert-danger' role='alert'>
            Data Buku Berhasil di Hapus.
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
elseif ($module == 'buku' & $act == 'edit') {

    // inisiasi
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $jenis = $_POST['jenis_buku'];
    $stok = $_POST['stok'];

    // query
    $query = "UPDATE muda_buku SET
                judul_buku = '$judul',
                pengarang = '$pengarang',
                penerbit = '$penerbit',
                tahun_terbit = '$tahun',
                jenis_buku = '$jenis',
                stok = '$stok'
          WHERE isbn = '$isbn'";

    // kondisi pengecekan apakah data berhasil di simpan
    if ($connection->query($query)) {

        // alert sukses
        session_start();
        $_SESSION['alertBuku'] = "
        <div class='alert alert-warning' role='alert'>
            Data Buku Berhasil di Edit.
        </div>
        ";

        // redirect ke laman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        // pesan error jika gagal
        echo "Data gagal diedit";
    }
}
