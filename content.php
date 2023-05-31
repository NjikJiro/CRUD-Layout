<?php $module = !empty($_GET["module"]) ? $_GET["module"] : "" ?>

<?php

if ($module == "" or $module == "home") : ?>
    <div class='card shadow'>
        <div class='card-header'>
            <h1>Selamat Datang di Sistem Informasi Perpustakaan</h1>
        </div>
        <div class='card-body'>
            <p>Your account type is: Administrator</p>
            <p>Silahkan akses menu untuk menggunakan aplikasi!</p>
        </div>
    </div>

<?php
// Tampil Siswa
elseif ($module == "siswa") :

    include "module/siswa/siswa-view.php";

// Edit Siswa
elseif ($module == "edit-siswa") :

    include "module/siswa/edit-siswa.php";

// Tampil Buku
elseif ($module == "buku") :

    include "module/buku/buku-view.php";

// Edit Buku
elseif ($module == "edit-buku") :

    include "module/buku/edit-buku.php";

// User View
elseif ($module == "user") :

    include "module/user/user-view.php";

endif;
?>