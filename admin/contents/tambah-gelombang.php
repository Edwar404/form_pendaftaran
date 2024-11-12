<?php
if (isset($_POST['tambah'])) {
    $nama_gelombang = $_POST['nama_gelombang'];

    $insert = mysqli_query($connection, "INSERT INTO gelombang (nama_gelombang) VALUES ('$nama_gelombang')");
    header('location:?pg=gelombang&tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editGelombang = mysqli_query($connection, "SELECT * FROM gelombang WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($editGelombang);

if (isset($_POST['edit'])) {
    $nama_gelombang = $_POST['nama_gelombang'];
    $aktif = $_POST['aktif'];

    // ubah user, kolom apa yang mau di ubah (SET). yang mau di ubah id ke berapa
    $update = mysqli_query($connection, "UPDATE gelombang SET nama_gelombang='$nama_gelombang', aktif='$aktif' WHERE id='$id'");
    header('location:?pg=gelombang&edit=berhasil');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connection, "DELETE FROM gelombang WHERE id='$id'");
    header("location:?pg=gelombang&hapus=berhasil");
}

?>

<div class="container table-anggota">
    <div class="warna">
        <fieldset class='border border-black border-2 p-3'>
            <legend class='float-none w-auto px-2'><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Gelombang</legend>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Nama gelombang : </label>
                    <input type="text" name="nama_gelombang" class="form-control" placeholder="Masukkan Kategori" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_gelombang'] : '' ?>">
                </div>
                <?php if (isset($_GET['edit'])) { ?>
                    <label for="">Aktifkan Gelombang</label>
                    <select name="aktif" id="" required>
                        <option value="">Aktifkan</option>
                        <option value="1">aktif</option>
                        <option value="0">nonaktif</option>
                    </select>
                <?php } ?>
                <br>
                <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>">Simpan</button>
            </form>
        </fieldset>
    </div>
</div>