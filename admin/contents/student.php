<?php
$queryStudent = mysqli_query($connection, "SELECT peserta_pelatihan.*, jurusan.nama_jurusan, gelombang.nama_gelombang FROM peserta_pelatihan LEFT JOIN jurusan ON peserta_pelatihan.id_jurusan = jurusan.id LEFT JOIN gelombang ON peserta_pelatihan.id_gelombang = gelombang.id ORDER BY id ASC")
?>

<!-- <div class="container"> -->
<div class="row">
    <div class="col-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3">Data Siswa</legend>
            <div align="right">
                <!-- <a href="?pg=tambah-buku" class="btn btn-primary">Tambah</a> -->
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-success table-striped mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Nama Siswa</th>
                            <th>NIK</th>
                            <th>Kartu Keluarga</th>
                            <th>Jenis kelamin</th>
                            <th>Tempat,Tgl Lahir</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Nama Sekolah</th>
                            <th>Kejuruan</th>
                            <th>gelombang</th>
                            <th>Jurusan</th>
                            <th>Nomor Hp</th>
                            <th>Email</th>
                            <th>Aktivitas Saat Ini</th>
                            <?php if (!isset($_SESSION['level']) == 3 && !isset($_SESSION['level']) == 4): ?>
                                <th>Aksi</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($queryStudent)):
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php if ($row['status'] == 0) {
                                        echo 'Daftar';
                                    } elseif ($row['status'] == 1) {
                                        echo 'Wawancara';
                                    } elseif ($row['status'] == 2) {
                                        echo 'Lolos Pelatihan';
                                    } elseif ($row['status'] == 3) {
                                        echo 'Tidak Lolos';
                                    } else {
                                        echo 'Invalid';
                                    } ?></td>
                                <td><?php echo $row['nama_lengkap'] ?></td>
                                <td><?php echo $row['nik'] ?></td>
                                <td><?php echo $row['kartu_keluarga'] ?></td>
                                <td><?php echo $row['jenis_kelamin'] ?></td>
                                <td><?php echo $row['tempat_lahir'] ?>, <?php echo $row['tanggal_lahir'] ?> </td>
                                <td><?php echo $row['pendidikan_terakhir'] ?></td>
                                <td><?php echo $row['nama_sekolah'] ?></td>
                                <td><?php echo $row['kejuruan'] ?></td>
                                <td><?php echo $row['nama_gelombang'] ?></td>
                                <td><?php echo $row['nama_jurusan'] ?></td>
                                <td><?php echo $row['nomor_hp'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php if ($row['aktivitas_saat_ini'] == 0) {
                                        echo 'Mengikuti Pelatihan';
                                    } elseif ($row['aktivitas_saat_ini'] == 1) {
                                        echo 'Mencari Pekerjaan';
                                    } elseif ($row['aktivitas_saat_ini'] == 2) {
                                        echo 'Kerja Malam / Freelance';
                                    } ?>
                                </td>
                                <?php if (!isset($_SESSION['level']) == 3 && !isset($_SESSION['level']) == 4): ?>
                                    <td>
                                        <a id="edit-user" data-id="<?php echo $row['id'] ?>" href="?pg=update_status&edit=<?php echo $row['id'] ?>"
                                            class="btn btn-success btn-sm"><i data-feather="edit"></i>
                                        </a>
                                    </td>
                                <?php endif ?>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
</div>
<!-- </div> -->

<!-- Modal -->
<!-- data-bs-toggle="modal" data-bs-target="#exampleModal"
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->