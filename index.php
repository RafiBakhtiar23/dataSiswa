<?php
// ================= KONEKSI & HELPER =================
require_once "config/database.php";
require_once "helper/fungsi_tanggal_indo.php";
?>
<!DOCTYPE html>
<html lang="id" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Manajemen Data Siswa">
    <meta name="author" content="Indra Styawantoro">

    <title>Sistem Data Siswa</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="d-flex flex-column h-100">

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container-fluid px-lg-5">
            <span class="navbar-brand d-flex align-items-center gap-2">
                <i class="fa-solid fa-users text-white"></i>
                <span>Sistem Data Siswa</span>
            </span>
        </div>
    </nav>

    <!-- ================= MAIN ================= -->
    <main class="flex-shrink-0">
        <!-- padding-top wajib karena navbar fixed -->
        <div class="container-fluid px-lg-5" style="padding-top:90px">

            <?php
            $halaman = $_GET['halaman'] ?? 'data';

            switch ($halaman) {
                case 'entri':
                    include "form_entri.php";
                    break;

                case 'ubah':
                    include "form_ubah.php";
                    break;

                case 'detail':
                    include "tampil_detail.php";
                    break;

                case 'data':
                default:
                    include "tampil_data.php";
                    break;
            }
            ?>

        </div>
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="footer mt-auto py-3">
        <div class="container-fluid px-lg-5 text-center">
            <small>
                &copy; <?= date('Y'); ?> Sistem Data Siswa
                <span class="mx-1">·</span>
                Internal Management System
            </small>
        </div>
    </footer>

    <!-- ================= JS ================= -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables/dataTables.bootstrap5.min.js"></script>

    <!-- Flatpickr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/id.min.js"></script>

    <!-- Notify -->
    <script src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/form-validation.js"></script>

</body>
</html>
