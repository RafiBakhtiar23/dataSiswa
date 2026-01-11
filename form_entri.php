<!-- ================= HEADER ================= -->
<div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center mb-4 gap-3">
    <div class="flex-grow-1 d-flex align-items-center gap-2">
        <div class="icon-title">
            <i class="fa-solid fa-user"></i>
        </div>
        <h4 class="mb-0 fw-semibold">Entri Data Siswa</h4>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="?halaman=data" class="text-decoration-none">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="breadcrumb-item">Siswa</li>
            <li class="breadcrumb-item active">Entri</li>
        </ol>
    </nav>
</div>

<!-- ================= GENERATE ID ================= -->
<?php
$query = $mysqli->query("SELECT RIGHT(id_siswa,5) AS nomor FROM tbl_siswa ORDER BY id_siswa DESC LIMIT 1")
    or die('Query error: ' . $mysqli->error);

$rows = $query->num_rows;
$nomor_urut = ($rows <> 0) ? $query->fetch_assoc()['nomor'] + 1 : 1;
$id_siswa = "ID-" . str_pad($nomor_urut, 5, "0", STR_PAD_LEFT);
?>

<!-- ================= FORM ================= -->
<div class="card mb-5">
    <div class="card-body">

        <form action="proses_simpan.php" method="post" enctype="multipart/form-data"
              class="needs-validation" novalidate>

            <div class="row g-4">
                <!-- LEFT -->
                <div class="col-xl-6">

                    <div class="mb-3">
                        <label class="form-label">ID Siswa</label>
                        <input type="text" name="id_siswa" class="form-control" value="<?= $id_siswa; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Daftar <span class="text-danger">*</span></label>
                        <input type="text" name="tanggal_daftar"
                               class="form-control datepicker"
                               autocomplete="off" required>
                        <div class="invalid-feedback">Tanggal daftar wajib diisi.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas <span class="text-danger">*</span></label>
                        <select name="kelas" class="form-select" required>
                            <option selected disabled value="">Pilih kelas</option>
                            <option value="Data Analysis">Data Analysis</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Game Development">Game Development</option>
                            <option value="Mobile Development">Mobile Development</option>
                            <option value="Web Design">Web Design</option>
                            <option value="Web Development">Web Development</option>
                        </select>
                        <div class="invalid-feedback">Kelas wajib dipilih.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                        <div class="invalid-feedback">Nama lengkap wajib diisi.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Jenis Kelamin <span class="text-danger">*</span></label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                   name="jenis_kelamin" value="Laki-laki" required>
                            <label class="form-check-label">Laki-laki</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                   name="jenis_kelamin" value="Perempuan" required>
                            <label class="form-check-label">Perempuan</label>
                        </div>

                        <div class="invalid-feedback d-block">
                            Pilih salah satu jenis kelamin.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" rows="2" class="form-control" required></textarea>
                        <div class="invalid-feedback">Alamat wajib diisi.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" required>
                        <div class="invalid-feedback">Email wajib diisi.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                        <input type="text" name="whatsapp"
                               class="form-control"
                               maxlength="13"
                               onkeypress="return goodchars(event,'0123456789',this)"
                               required>
                        <div class="invalid-feedback">WhatsApp wajib diisi.</div>
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="col-xl-6 text-center">

                    <label class="form-label">Foto Profil <span class="text-danger">*</span></label>
                    <input type="file" name="foto" id="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png" required>

                    <img id="preview_foto"
                         src="images/img-default.png"
                         class="img-fluid rounded-circle border shadow-sm mt-4"
                         style="width:200px;height:200px;object-fit:cover">

                    <div class="form-text mt-3">
                        Format JPG / PNG<br>
                        Maksimal ukuran 1 MB
                    </div>

                </div>
            </div>

            <!-- ACTION -->
            <div class="d-flex justify-content-end gap-2 mt-4 pt-4 border-top">
                <a href="?halaman=data" class="btn btn-secondary btn-sm">
                    Batal
                </a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">
                    Simpan Data
                </button>
            </div>

        </form>

    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
$(function () {

    $('#foto').on('change', function () {
        const file = this.files[0];
        if (!file) return;

        const allowed = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowed.exec(file.name)) {
            $.notify({ message: 'Format foto harus JPG atau PNG.' }, { type: 'warning' });
            this.value = '';
            return;
        }

        if (file.size > 1000000) {
            $.notify({ message: 'Ukuran foto maksimal 1 MB.' }, { type: 'warning' });
            this.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = e => $('#preview_foto').attr('src', e.target.result);
        reader.readAsDataURL(file);
    });

});
</script>
