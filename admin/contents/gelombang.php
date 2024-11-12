<?php
$gelombang = mysqli_query($connection, 'SELECT * FROM gelombang ORDER BY id DESC');
?>

<div class="container table-anggota">
    <div class="warna">
        <fieldset class='border border-black border-2 p-3'>
            <legend class='float-none w-auto px-2'>Data Gelombang</legend>
            <div class="d-flex ms-5">
                <a href="?pg=tambah-gelombang" class='btn btn-primary me-3'>ADD</a>
                <!-- <a href="?pg=gelombang_aktif" class='ms-3'>Aktifkan Gelombang</a> -->
            </div>
            <div class="container mt-3 d-flex justify-content-center initable">
                <table class='text-center table table-bordered table-success table-striped'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>nama_gelombang</th>
                            <th>Aktif atau Tidak</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($rowGelombang = mysqli_fetch_assoc($gelombang)):
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $rowGelombang['nama_gelombang'] ?></td>
                                <td><?php if ($rowGelombang['aktif'] == 1) {
                                        echo 'aktif';
                                    } elseif ($rowGelombang['aktif'] == 0) {
                                        echo 'non-aktif';
                                    } else {
                                        echo 'tidak valid';
                                    }
                                    ?></td>
                                <td>
                                    <a href="?pg=tambah-gelombang&delete=<?php echo $rowGelombang['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></a>
                                    <a href="?pg=tambah-gelombang&edit=<?php echo $rowGelombang['id'] ?>" class="btn btn-success btn-sm"><i data-feather="edit"></i></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
</div>