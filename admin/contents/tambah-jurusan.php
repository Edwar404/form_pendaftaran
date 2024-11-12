<?php
if (isset($_POST['tambah'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    $insert = mysqli_query($connection, "INSERT INTO jurusan (nama_jurusan) VALUES ('$nama_jurusan')");
    header('location:?pg=jurusan&tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query($connection, "SELECT * FROM jurusan WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($editUser);

if (isset($_POST['edit'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    $update = mysqli_query($connection, "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id='$id'");
    header('location:?pg=jurusan&edit=berhasil');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connection, "DELETE FROM jurusan WHERE id='$id'");
    header("location:?pg=jurusan&hapus=berhasil");
}

?>

<div class="container table-anggota">
    <div class="warna">
        <fieldset class='border border-black border-2 p-3'>
            <legend class='float-none w-auto px-2'><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Jurusan</legend>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Jurusan : </label>
                    <input type="text" name="nama_jurusan" class="form-control" placeholder="Masukkan Jurusan" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_jurusan'] : '' ?>">
                </div>
                <br>
                <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>">Simpan</button>
            </form>
        </fieldset>
    </div>
</div>