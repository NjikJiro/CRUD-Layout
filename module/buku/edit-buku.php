<?php
$isbn = $_GET['id'];
$query = "SELECT * FROM muda_buku WHERE isbn='$isbn'";
$conn = mysqli_query($connection, $query);
$data = mysqli_fetch_array($conn);
?>

<div class="card shadow">
    <div class="card-header">
        <h3>Edit Data Buku</h3>
    </div>
    <div class="container">
        <form action="module/buku/aksi.php?module=buku&act=edit" method="post" class="p-4">
            <form action="module/buku/aksi.php?module=buku&act=edit" method="post">
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" autocomplete="off" value="<?= $data['isbn']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" autocomplete="off" value="<?= $data['judul_buku']; ?>">
                </div>
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" name="pengarang" class="form-control" autocomplete="off" value="<?= $data['pengarang']; ?>">
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" autocomplete="off" value="<?= $data['penerbit']; ?>">
                </div>
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" class="form-control" autocomplete="off" value="<?= $data['tahun_terbit']; ?>">
                </div>
                <div class="mb-3">
                    <label for="jenis_buku" class="form-label">Jenis Buku</label>
                    <input type="text" name="jenis_buku" class="form-control" autocomplete="off" value="<?= $data['jenis_buku']; ?>">
                </div>
                <div class="mb-4    ">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" name="stok" class="form-control" autocomplete="off" value="<?= $data['stok']; ?>">
                </div>
                <div class="mb-3 modal-footer">
                    <a href="?module=buku" class="btn btn-secondary me-3">Batal</a>
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                </div>
            </form>
        </form>
    </div>
</div>