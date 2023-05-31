<style>
    .tombel:hover {
        text-decoration: none;
    }
</style>

<div class='card shadow'>
    <div class='card-header'>
        <h3>Data Buku</h3>
    </div>
    <div class='card-body '>
        <?php
        session_start();
        if (!empty($_SESSION['alertBuku'])) :
            echo $_SESSION['alertBuku'];
        endif;
        session_destroy()
        ?>
        <!-- tombol tambah data buku -->
        <button type="button" class="btn btn-success px-4 my-3" data-bs-toggle="modal" data-bs-target="#bukuModal">
            Tambah Data Buku
        </button>

        <!-- bagian table buku -->
        <table class=" table table-striped mt-3">
            <thead>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jenis Buku</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Query Select data buku
                $query = "SELECT * FROM muda_buku";
                $conn = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)) {
                ?>
                    <!-- Fetch data buku -->
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['judul_buku']; ?></td>
                        <td><?= $data['pengarang']; ?></td>
                        <td><?= $data['penerbit']; ?></td>
                        <td><?= $data['tahun_terbit']; ?></td>
                        <td><?= $data['jenis_buku']; ?></td>
                        <td>
                            <a href="?module=edit-buku&id=<?php echo $data['isbn'] ?>" class="btn btn-warning tombel me-3">Edit</a>
                            <a href="module/buku/aksi.php?module=buku&act=delete&id=<?= $data['isbn']; ?>" class="btn btn-danger tombel" onclick="return confirm('Yakin ingin menghapus data <?= $data['judul_buku'] ?> ?')">Hapus</a>
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

<!-- Modal Buku -->
<div class="modal fade" id="bukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="module/buku/aksi.php?module=buku&act=insert" method="post">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_buku" class="form-label">Jenis Buku</label>
                        <input type="text" name="jenis_buku" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" name="stok" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>