<style>
    .tombel:hover {
        text-decoration: none;
    }
</style>

<div class='card shadow'>
    <div class='card-header'>
        <h3>Data Siswa</h3>
    </div>
    <div class='card-body '>
        <?php
        session_start();
        if (!empty($_SESSION['alert'])) :
            echo $_SESSION['alert'];
        endif;
        session_destroy()
        ?>
        <!-- tombol tambah data siswa -->
        <button type="button" class="btn btn-success px-4 my-3" data-bs-toggle="modal" data-bs-target="#siswaModal">
            Tambah Data Siswa
        </button>

        <!-- bagian table siswa -->
        <table class=" table table-striped mt-3">
            <thead>
                <th>No.</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Query Select data siswa
                $query = "SELECT * FROM muda_siswa";
                $conn = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)) {
                ?>
                    <!-- Fetch data siswa -->
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nisn']; ?></td>
                        <td><?= $data['nama_siswa']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                        <td><?= $data['jenis_kelamin']; ?></td>
                        <td>
                            <a href="?module=edit-siswa&id=<?php echo $data['nisn'] ?>" class="btn btn-warning tombel me-3">Edit</a>
                            <a href="module/siswa/aksi.php?module=siswa&act=delete&id=<?= $data['nisn']; ?>" class="btn btn-danger tombel" onclick="return confirm('Yakin ingin menghapus data <?= $data['nama_siswa'] ?> ?')">Hapus</a>
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

<!-- Modal Siswa -->
<div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="module/siswa/aksi.php?module=siswa&act=insert" method="post">
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select name="jurusan" class="form-select">
                            <option value="PPLG">PPLG</option>
                            <option value="DKV">DKV</option>
                            <option value="TJKT">TJKT</option>
                            <option value="MPLB">MPLB</option>
                            <option value="AKL">AKL</option>
                            <option value="Pemasaran">Pemasaran</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telp</label>
                        <input type="text" name="no_hp" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>