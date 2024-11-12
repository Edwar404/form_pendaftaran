<?php
$user = mysqli_query($connection, 'SELECT users.*, levels.nama_level, jurusan.nama_jurusan FROM users LEFT JOIN levels ON levels.id = users.id_level LEFT JOIN jurusan ON users.id_jurusan = jurusan.id ORDER BY id DESC');
?>

<div class="container table-anggota">
    <div class="warna">
        <fieldset class='border border-black border-2 p-3'>
            <legend class='float-none w-auto px-2'>Data Anggota</legend>
            <div class="d-flex ms-5">
                <a href="?pg=tambah-member" class='btn btn-primary me-3'>ADD</a>
                <!-- <a href="" class='ms-3'>RECYCLE</a> -->
            </div>
            <div class="container mt-3 d-flex justify-content-center initable">
                <table class='text-center table table-bordered table-success table-striped'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Jurusan</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($rowUser = mysqli_fetch_assoc($user)):

                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $rowUser['nama_lengkap'] ?></td>
                                <td><?php echo $rowUser['email'] ?></td>
                                <td><?php echo $rowUser['nama_level'] ?></td>
                                <td><?php if ($rowUser['id_jurusan'] == 0) {
                                    echo 'Admin';
                                }else {
                                    echo $rowUser['nama_jurusan'] ;
                                }?></td>
                                <td>
                                    <a href="?pg=tambah-member&delete=<?php echo $rowUser['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></a>
                                    <a href="?pg=tambah-member&edit=<?php echo $rowUser['id'] ?>" class="btn btn-success btn-sm"><i data-feather="edit"></i></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
</div>