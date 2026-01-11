<!-- ================= HEADER ================= -->
<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center mb-4 gap-3">
    <div class="flex-grow-1 d-flex align-items-center gap-2">
        <div class="icon-title">
            <i class="fa-solid fa-user"></i>
        </div>
        <h4 class="mb-0 fw-semibold">Detail Siswa</h4>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="?halaman=data" class="text-decoration-none">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="breadcrumb-item">Siswa</li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<?php
if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];

    $query = $mysqli->query(
        "SELECT * FROM tbl_siswa WHERE id_siswa='$id_siswa'"
    ) or die('Query error: ' . $mysqli->error);

    $data = $query->fetch_assoc();
}
?>

<!-- ================= CONTENT ================= -->
<div class="card mb-5">
    <div class="card-body">

        <div class="row g-4">
            <!-- FOTO -->
            <div class="col-12 col-xl-4 text-center">
                <img src="images/<?= $data['foto_profil']; ?>"
                     alt="Foto Profil"
                     class="img-fluid rounded-circle border shadow-sm"
                     style="width:200px;height:200px;object-fit:cover">
            </div>

            <!-- DATA -->
            <div class="col-12 col-xl-8">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th width="200" class="text-muted fw-medium">ID Siswa</th>
                                <td><?= $data['id_siswa']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-medium">Tanggal Daftar</th>
                                <td><?= tanggal_indo($data['tanggal_daftar']); ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-medium">Kelas</th>
                                <td><?= $data['kelas']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-medium">Nama Lengkap</th>
                                <td><?= $data['nama_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-medium">Jenis Kelamin</th>
                                <td><?= $data['jenis_kelamin']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-medium">Alamat</th>
                                <td><?= $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-medium">Email</th>
                                <td><?= $data['email']; ?></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-medium">WhatsApp</th>
                                <td><?= $data['whatsapp']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ACTION -->
        <div class="d-flex justify-content-end gap-2 pt-4 mt-4 border-top">
            <a href="?halaman=data" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
            <a href="?halaman=ubah&id=<?= $data['id_siswa']; ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-pen me-1"></i> Ubah Data
            </a>
        </div>

    </div>
</div>