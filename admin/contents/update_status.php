<?php

$queryStatus = mysqli_query($connection, "SELECT * FROM peserta_pelatihan");

// if (isset($_POST['tambah'])) {
//     $nama_lengkap = $_POST['nama_lengkap'];
//     $email = $_POST['email'];
//     $nama_level = $_POST['nama_level'];
//     $password = $_POST['password'];

//     $insert = mysqli_query($connection, "INSERT INTO users (nama_lengkap, email, id_level, password) VALUES ('$nama_lengkap', '$email','$nama_level','$password')");
//     header('location:?pg=member&tambah=berhasil');
// }

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editStatus = mysqli_query($connection, "SELECT * FROM peserta_pelatihan WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($editStatus);

if (isset($_POST['edit'])) {
    // $nama_lengkap = $_POST['nama_lengkap'];
    // $email = $_POST['email'];
    // $nama_level = $_POST['nama_level'];
    // $password = ($_POST['password']) ? $_POST['password'] : $rowEdit['password'];
    $status = $_POST['status'];

    $update = mysqli_query($connection, "UPDATE peserta_pelatihan SET status='$status' WHERE id='$id'");
    header('location:?pg=student&edit=berhasil');
}

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     $delete = mysqli_query($connection, "DELETE FROM users WHERE id='$id'");
//     header("location:?pg=member&hapus=berhasil");
// }

?>

<div class="container table-anggota">
    <div class="warna">
        <fieldset class='border border-black border-2 p-3'>
            <legend class='float-none w-auto px-2'><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Anggota</legend>
            <form action="" method="post">
                <!-- <div class="mb-3">
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
                </div> -->
                <div class="mb-3">
                    <label for="">Levels</label>
                    <select name="status" id="" required>
                        <option value="">Pilih Status</option>
                        <!-- <option <?php echo isset($_GET['edit']) ?> value="0">Da</option> -->
                        <option <?php echo isset($_GET['edit']) ?> value="1">Wawancara</option>
                        <option <?php echo isset($_GET['edit']) ?> value="2">Lolos Pelatihan</option>
                        <option <?php echo isset($_GET['edit']) ?> value="3">Tidak Lolos</option>
                    </select>
                </div>
                <br>
                <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>">Simpan</button>
            </form>
        </fieldset>
    </div>
</div>