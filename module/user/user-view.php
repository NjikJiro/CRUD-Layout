<div class='card shadow'>
    <div class='card-header'>
        <h3>Data User</h3>
    </div>
    <div class='card-body'>
        <?php
        session_start();
        if (!empty($_SESSION['alertUser'])) :
            echo $_SESSION['alertUser'];
        endif;
        session_destroy()
        ?>
        <button type="button" class="btn btn-success px-4 my-3" data-bs-toggle="modal" data-bs-target="#userModal">
            Tambah Data User
        </button>

        <table class="table table-striped mt-3">
            <thead>
                <th>No.</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Query Select data user
                $query = "SELECT * FROM muda_user";
                $conn = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)) {
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['level']; ?></td>
                        <td>
                            <a href="module/siswa/aksi.php?module=siswa&act=delete&id=<?= $data['nisn']; ?>" class="btn btn-danger tombel" onclick="return confirm('Yakin ingin menghapus data <?= $data['nama_siswa'] ?> ?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="module/user/aksi.php?module=user&act=insert" method="post">
                    <div class="mb-3">
                        <label for="nama_user" class="form-label">Nama Lengkap User</label>
                        <input type="text" name="nama_user" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" class="form-select">
                            <option value="admin">Administrator</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>