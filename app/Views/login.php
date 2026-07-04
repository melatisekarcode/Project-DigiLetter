<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Digi Letter</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
     <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-body">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card login-card shadow border-0 rounded-4 overflow-hidden">
        <div class="row g-0">
            <!-- Sisi Branding Kiri -->
            <div class="col-md-5 d-none d-md-flex flex-column justify-content-center align-items-center bg-brand text-white p-4 text-center">
                <img src="<?= base_url('img/Logo.png') ?>" alt="Logo Digi Latter" style="width: 300px; height: auto;">
                <p class="small text-white-50">Sistem Pengajuan Surat Digital & Tanda Tangan Elektronik Mahasiswa</p>
            </div>
            <!-- Sisi Form Kanan -->
            <div class="col-md-7 p-4 p-sm-5 bg-white">
                <div class="mb-4">
                    <h3 class="fw-bold text-dark-smooth">Welcome to Digi Letter</h3>
                    <p class="text-muted small">Silakan masuk untuk mengajukan atau menyetujui dokumen surat.</p>
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label text-secondary small fw-semibold">Email</label>

                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-card-list"></i></span>
                            <input type="text" name="email" class="form-control bg-light border-start-0" value="" placeholder="Masukkan Email" required>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-secondary small fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control bg-light border-start-0" value="" placeholder="Masukkan Password anda" required>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" checked>
                            <label class="form-check-label text-muted small" for="rememberMe">Ingat Saya</label>
                        </div>
                        <a href="#" class="text-decoration-none small text-brand">Masalah Login?</a>
                    </div>
                    <button type="submit" class="btn btn-brand w-100 py-2 rounded-3 fw-medium shadow-sm">
                        Masuk Sistem <i class="bi bi-box-arrow-in-right ms-1"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>