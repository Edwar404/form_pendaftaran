<?php

$queryLevel = mysqli_query($connection, "SELECT * FROM levels");
$queryJurusan = mysqli_query($connection, "SELECT * FROM jurusan");

if (isset($_POST['tambah'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $nama_level = $_POST['nama_level'];
    $password = $_POST['password'];
    $id_jurusan = $_POST['nama_jurusan'];

    $insert = mysqli_query($connection, "INSERT INTO users (id_jurusan, nama_lengkap, email, id_level, password) VALUES ('$id_jurusan','$nama_lengkap', '$email','$nama_level','$password')");
    header('location:?pg=member&tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query($connection, "SELECT * FROM users WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($editUser);

if (isset($_POST['edit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $nama_level = $_POST['nama_level'];
    $password = ($_POST['password']) ? $_POST['password'] : $rowEdit['password'];
    $id_jurusan = $_POST['nama_jurusan'];

    $update = mysqli_query($connection, "UPDATE users SET id_jurusan='$id_jurusan', nama_lengkap='$nama_lengkap', email='$email', password='$password', id_level='$nama_level' WHERE id='$id'");
    header('location:?pg=member&edit=berhasil');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($connection, "DELETE FROM users WHERE id='$id'");
    header("location:?pg=member&hapus=berhasil");
}

?>

<div class="container table-anggota">
    <div class="warna">
        <fieldset class='border border-black border-2 p-3'>
            <legend class='float-none w-auto px-2'><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Anggota</legend>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Lengkap: </label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password : </label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
                </div>
                <div class="mb-3">
                    <label for="">Levels</label>
                    <select name="nama_level" id="" required>
                        <option value="">Pilih Level</option>
                        <?php while ($rowLevel = mysqli_fetch_assoc($queryLevel)) { ?>
                            <option <?php echo isset($_GET['edit']) ? ($rowLevel['id'] == $rowEdit['id_level'] ? 'selected' : '') : '' ?> value="<?php echo $rowLevel['id'] ?>"><?php echo $rowLevel['nama_level'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Pilih Jurusan</label>
                    <select name="nama_jurusan" id="" required>
                        <option value="0">Admin</option>
                        <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                            <option <?php echo isset($_GET['edit']) ? ($rowJurusan['id'] == $rowEdit['id_jurusan'] ? 'selected' : '') : '' ?> value="<?php echo $rowJurusan['id'] ?>"><?php echo $rowJurusan['nama_jurusan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>">Simpan</button>
            </form>
        </fieldset>
    </div>
</div>