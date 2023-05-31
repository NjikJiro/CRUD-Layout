<?php
$nisn = $_GET['id'];
$query = "SELECT * FROM muda_siswa WHERE nisn='$nisn'";
$conn = mysqli_query($connection, $query);
$data = mysqli_fetch_array($conn);
?>

<div class="card shadow">
    <div class="card-header">
        <h3>Edit Data Siswa</h3>
    </div>
    <div class="container">
        <form action="module/siswa/aksi.php?module=siswa&act=edit" method="post" class="p-4">
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" class="form-control" value="<?= $data['nisn']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" autocomplete="off" value="<?= $data['nama_siswa']; ?>">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan" class="form-select" value="">
                    <option value="<?= $data['jurusan']; ?>" selected><?= $data['jurusan']; ?></option>
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
                    <?php
                    if ($data['jenis_kelamin'] == 'L') :
                    ?>
                        <option value="L" selected>Laki-laki</option>
                        <option value="P">Perempuan</option>
                    <?php
                    else :
                    ?>
                        <option value="L">Laki-laki</option>
                        <option value="P" selected>Perempuan</option>
                    <?php
                    endif;
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="text" name="no_hp" class="form-control" autocomplete="off" value="<?= $data['no_hp']; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control"><?= $data['alamat']; ?></textarea>
            </div>
            <div class="modal-footer">
                <a href="?module=siswa" class="btn btn-secondary me-3">Batal</a>
                <input type="submit" value="Simpan Data" class="btn btn-success">
            </div>
        </form>
    </div>
</div>