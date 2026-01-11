<!-- ================= HEADER ================= -->
<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center mb-4 gap-3">
    <div class="flex-grow-1 d-flex align-items-center gap-2">
        <div class="icon-title">
            <i class="fa-solid fa-user"></i>
        </div>
        <h4 class="mb-0 fw-semibold">Data Siswa</h4>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="?halaman=data" class="text-decoration-none">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="breadcrumb-item">Siswa</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div>

<!-- ================= ACTION ================= -->
<div class="card mb-4">
    <div class="card-body d-flex justify-content-end">
        <a href="?halaman=entri" class="btn btn-primary">
            <i class="fa-solid fa-plus me-2"></i>
            Tambah Siswa
        </a>
    </div>
</div>

<!-- ================= TABLE ================= -->
<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table id="myTable" class="table table-hover align-middle">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Foto</th>
                        <th>ID Siswa</th>
                        <th class="text-start">Nama Lengkap</th>
                        <th>Gender</th>
                        <th>Tanggal Daftar</th>
                        <th class="text-start">Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = $mysqli->query(
                        "SELECT id_siswa, tanggal_daftar, kelas, nama_lengkap, jenis_kelamin, foto_profil
                         FROM tbl_siswa
                         ORDER BY id_siswa DESC"
                    ) or die('Query error: ' . $mysqli->error);

                    while ($data = $query->fetch_assoc()) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>

                            <td class="text-center">
                                <img src="images/<?= $data['foto_profil']; ?>" alt="Foto"
                                     class="img-fluid rounded-circle border"
                                     width="40" height="40">
                            </td>

                            <td class="text-center fw-medium"><?= $data['id_siswa']; ?></td>

                            <td><?= $data['nama_lengkap']; ?></td>

                            <td class="text-center">
                                <?= $data['jenis_kelamin']; ?>
                            </td>

                            <td class="text-center">
                                <?= tanggal_indo($data['tanggal_daftar']); ?>
                            </td>

                            <td><?= $data['kelas']; ?></td>

                            <!-- ===== AKSI ===== -->
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="?halaman=detail&id=<?= $data['id_siswa']; ?>"
                                       class="btn btn-outline-primary btn-sm"
                                       title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="?halaman=ubah&id=<?= $data['id_siswa']; ?>"
                                       class="btn btn-outline-success btn-sm"
                                       title="Ubah">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <button type="button"
                                            class="btn btn-outline-danger btn-sm"
                                            title="Hapus"
                                            data-bs-toggle="modal"
                                            data-bs-target="#hapus<?= $data['id_siswa']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>

                                <!-- MODAL HAPUS -->
                                <div class="modal fade" id="hapus<?= $data['id_siswa']; ?>" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">
                                                    <i class="fa fa-trash me-2 text-danger"></i>
                                                    Hapus Data
                                                </h6>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p class="mb-1">Yakin ingin menghapus siswa:</p>
                                                <strong><?= $data['id_siswa']; ?> - <?= $data['nama_lengkap']; ?></strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <a href="proses_hapus.php?id=<?= $data['id_siswa']; ?>"
                                                   class="btn btn-danger btn-sm">
                                                    Ya, Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- ================= NOTIFICATION ================= -->
<script>
$(function () {
    const params = new URLSearchParams(window.location.search);
    const pesan = params.get('pesan');

    if (pesan === '1') {
        $.notify({ message: 'Data siswa berhasil disimpan.' }, { type: 'success' });
    } else if (pesan === '2') {
        $.notify({ message: 'Data siswa berhasil diubah.' }, { type: 'success' });
    } else if (pesan === '3') {
        $.notify({ message: 'Data siswa berhasil dihapus.' }, { type: 'success' });
    }
});
</script>