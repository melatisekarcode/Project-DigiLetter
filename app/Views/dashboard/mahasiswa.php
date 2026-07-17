<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Digi Letter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        .tab-content.d-none {
            display: none !important;
        }
    </style>
</head>
<body class="bg-light-smooth">

<div class="d-flex min-vh-100">
    <!-- SIDEBAR -->
    <aside class="sidebar bg-dark-smooth text-white p-3 d-none d-lg-block" style="min-width: 260px;">
        <div class="d-flex align-items-center gap-2 mb-4 px-2 pt-2">
            <img src="/img/Logo.png" alt="Logo Digi Latter" style="width: 80px; height: auto;">
            <span class="fs-5 fw-bold tracking-wide">Digi Letter</span>
        </div>
        
        <hr class="text-secondary">
        
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <button onclick="switchTab('dashboard-utama')" id="btn-dashboard-utama" class="nav-link nav-btn w-100 border-0 bg-transparent text-start rounded-3 text-white d-flex align-items-center gap-3 active">
                    <i class="bi bi-grid-1x2"></i> Dashboard Utama
                </button>
            </li>
            <li class="nav-item">
                <!-- Diarahkan langsung ke ID konten surat-keluar -->
                <button onclick="switchTab('surat-keluar')" id="btn-surat-keluar" class="nav-link nav-btn w-100 border-0 bg-transparent text-start rounded-3 text-white-50 d-flex align-items-center gap-3">
                    <i class="bi bi-send"></i> Surat Keluar
                </button>
            </li>
            <li class="nav-item">
                <button onclick="switchTab('pengajuan-baru')" id="btn-pengajuan-baru" class="nav-link nav-btn w-100 border-0 bg-transparent text-start rounded-3 text-white-50 d-flex align-items-center gap-3">
                    <i class="bi bi-file-earmark-plus"></i> Ajukan Surat Baru
                </button>
            </li>
            <li class="nav-item">
                <button onclick="switchTab('riwayat-ajuan')" id="btn-riwayat-ajuan" class="nav-link nav-btn w-100 border-0 bg-transparent text-start rounded-3 text-white-50 d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center gap-3">
                        <i class="bi bi-clock-history"></i> Riwayat Ajuan
                    </span>
                </button>
            </li>
        </ul>
        
        <div class="sidebar-footer mt-auto pt-4">
            <a href="<?= site_url('logout') ?>" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 rounded-3 py-2">
                <i class="bi bi-box-arrow-left"></i> Log Out
            </a>
        </div>
    </aside>

    <div class="flex-grow-1 d-flex flex-column style-content-wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm border-bottom px-4 py-3">
            <div class="container-fluid p-0">
                <button class="btn btn-light d-lg-none me-3" type="button">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <div class="d-flex align-items-center gap-2">
                    <h5 class="mb-0 fw-bold text-dark-smooth">Tracking Tanda Tangan Digital</h5>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-pill small ms-2">Mahasiswa</span>
                </div>
                <div class="ms-auto d-flex align-items-center gap-3">
                    <div class="text-end d-none d-sm-block">
                        <p class="mb-0 small fw-bold text-dark-smooth">
                            <?= esc(session()->get('nama')); ?>
                        </p>
                    </div>
                    <div class="profile-avatar bg-brand text-white d-flex align-items-center justify-content-center rounded-circle shadow-sm">
                        <?= strtoupper(substr(session()->get('nama'), 0, 2)); ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- MAIN CONTENT -->
        <main class="p-4 flex-grow-1">

            <!-- TAB 1: DASHBOARD UTAMA -->
            <div id="content-dashboard-utama" class="tab-content">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row g-4 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card stat-card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-medium mb-1">Total Ajuan Surat</p>
                                     <h3 class="fw-bold mb-0 text-dark-smooth"><?= esc($statistik['total'] ?? 0) ?></h3>
                                </div>
                                <div class="stat-icon bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-folder2-open fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card stat-card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-medium mb-1">Menunggu Review</p>
                                    <h3 class="fw-bold mb-0 text-dark-smooth"><?= esc($statistik['diajukan'] ?? 0) ?></h3>
                                </div>
                                <div class="stat-icon bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-hourglass-split fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card stat-card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-medium mb-1">Telah Disetujui (TTD)</p>
                                     <h3 class="fw-bold mb-0 text-dark-smooth"><?= esc($statistik['ditandatangani'] ?? 0) ?></h3>
                                </div>
                                <div class="stat-icon bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-pen-fill fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card stat-card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-medium mb-1">Ditolak / Revisi</p>
                                     <h3 class="fw-bold mb-0 text-dark-smooth"><?= esc($statistik['ditolak'] ?? 0) ?></h3>
                                </div>
                                <div class="stat-icon bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-x fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABLE PREVIEW UTAMA -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mt-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
                        <div>
                            <h6 class="fw-bold text-dark-smooth mb-1">Status Dokumen & Verifikasi TTD</h6>
                            <p class="text-muted mb-0 small">Pantau tanda tangan digital dosen pembimbing dan kaprodi di sini.</p>
                        </div>
                        <button onclick="switchTab('pengajuan-baru')" class="btn btn-sm btn-brand px-3 py-2 rounded-3"><i class="bi bi-plus-circle me-1"></i> Buat Ajuan Baru</button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table align-middle custom-table">
                            <thead>
                                <tr>
                                    <th>Jenis Surat</th>
                                    <th>Keperluan Berkas</th>
                                    <th>Tanggal Ajuan</th>
                                    <th>Keterangan Sistem</th>
                                    <th>Status TTD</th>
                                    <th class="text-center">Aksi Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($riwayat_surat)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada ajuan surat.</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($riwayat_surat as $row): ?>
                                <tr>
                                    <td><span class="fw-bold text-dark-smooth"><?= esc($row['nama_jenis']) ?></span></td>
                                    <td><span class="small text-muted"><?= esc($row['tujuan_surat']) ?></span></td>
                                    <td class="small text-muted"><?= date('d M Y', strtotime($row['tanggal_pengajuan'])) ?></td>
                                    <td><span class="small text-muted"><?= esc($row['keterangan'] ?? '-') ?></span></td>
                                    <td>
                                        <?php if (in_array($row['status'], ['diajukan', 'diproses'])): ?>
                                            <span class="badge bg-warning-subtle text-warning px-2.5 py-1.5 rounded-pill small"><i class="bi bi-clock me-1"></i> Proses Review</span>
                                        <?php elseif (in_array($row['status'], ['ditandatangani', 'disampaikan'])): ?>
                                            <span class="badge bg-success-subtle text-success px-2.5 py-1.5 rounded-pill small"><i class="bi bi-check-circle-fill me-1"></i> Terverifikasi TTD</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger-subtle text-danger px-2.5 py-1.5 rounded-pill small"><i class="bi bi-exclamation-triangle-fill me-1"></i> Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (in_array($row['status'], ['ditandatangani', 'disampaikan']) && $row['file_surat']): ?>
                                            <a href="<?= site_url('dokumen/lihat/' . $row['file_surat']) ?>" target="_blank" class="btn btn-sm btn-outline-primary px-2 py-1 rounded-3 small"><i class="bi bi-download"></i> Unduh PDF</a>
                                        <?php elseif ($row['status'] === 'ditolak'): ?>
                                            <button class="btn btn-sm btn-light border px-2 py-1 rounded-3 small text-dark"><i class="bi bi-pencil-square"></i> Perbaiki</button>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-light border px-2 py-1 rounded-3 small text-muted" disabled><i class="bi bi-download"></i> Unduh</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- UPDATE TAB 2: SEKARANG MEMBACA DARI TABEL PENGAJUAN SURAT (SURAT KELUAR RIIL) -->
            <div id="content-surat-keluar" class="tab-content d-none">
                <div class="mb-4">
                    <h4 class="fw-bold text-dark-smooth">Surat Keluar</h4>
                    <p class="text-muted small">Kelola dan lihat daftar seluruh berkas ajuan keluar resmi Anda.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="table-responsive">
                        <table class="table align-middle custom-table">
                            <thead>
                                <tr>
                                    <th>Jenis Surat</th>
                                    <th>Keperluan / Perihal Berkas</th>
                                    <th>Tanggal Ajuan</th>
                                    <th>Keterangan Alur</th>
                                    <th>Status Dokumen</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($riwayat_surat)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada rekaman arsip surat keluar.</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($riwayat_surat as $row): ?>
                                <tr>
                                    <td><span class="fw-bold text-dark-smooth"><?= esc($row['nama_jenis']) ?></span></td>
                                    <td><span class="small text-muted"><?= esc($row['tujuan_surat']) ?></span></td>
                                    <td class="small text-muted"><?= date('d M Y - H:i', strtotime($row['tanggal_pengajuan'])) ?></td>
                                    <td><span class="small text-muted"><?= esc($row['keterangan'] ?? '-') ?></span></td>
                                    <td>
                                        <?php if ($row['status'] === 'diajukan'): ?>
                                            <span class="badge bg-secondary-subtle text-secondary px-2.5 py-1.5 rounded-pill small">Diajukan</span>
                                        <?php elseif ($row['status'] === 'diproses'): ?>
                                            <span class="badge bg-warning-subtle text-warning px-2.5 py-1.5 rounded-pill small">Sedang Direview</span>
                                        <?php elseif (in_array($row['status'], ['ditandatangani', 'disampaikan'])): ?>
                                            <span class="badge bg-success-subtle text-success px-2.5 py-1.5 rounded-pill small">Selesai (TTD)</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger-subtle text-danger px-2.5 py-1.5 rounded-pill small">Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (in_array($row['status'], ['ditandatangani', 'disampaikan']) && $row['file_surat']): ?>
                                            <a href="<?= site_url('dokumen/lihat/' . $row['file_surat']) ?>" target="_blank" class="btn btn-sm btn-primary px-3 py-1 rounded-3 small"><i class="bi bi-eye"></i> Lihat Berkas</a>
                                        <?php elseif ($row['status'] === 'ditolak'): ?>
                                            <button class="btn btn-sm btn-outline-danger px-2 py-1 rounded-3 small"><i class="bi bi-arrow-counterclockwise"></i> Resubmit</button>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-light border text-muted px-2 py-1 rounded-3 small" disabled><i class="bi bi-hourglass text-secondary"></i> Menunggu</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TAB 3: FORM AJUAN BARU -->
            <div id="content-pengajuan-baru" class="tab-content d-none">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark-smooth mb-1">Halaman Pengajuan Surat</h4>
                        <p class="text-muted small mb-0">Silakan isi formulir pengajuan surat resmi di bawah ini.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12 col-xl-8">
                        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                            <form id="form-pengajuan" class="row g-3" action="<?= site_url('mahasiswa/simpan') ?>" method="post" enctype="multipart/form-data">
                                
                                <input type="file" id="input-file-pdf" name="file_surat" accept="application/pdf" class="d-none" onchange="handleFilePreview(this)">
                                <input type="hidden" id="hidden-keterangan" name="keterangan">

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Jenis Surat</label>
                                    <select id="select-jenis-surat" name="jenis_surat" class="form-select rounded-3" onchange="clearFieldError(this, 'jenis-error-msg')">
                                         <option value="">Pilih Jenis Surat</option>
                                        <?php foreach ($jenis_surat as $js): ?>
                                            <option value="<?= $js['id_jenis']; ?>"><?= esc($js['nama_jenis']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="jenis-error-msg" class="text-danger small mt-1 d-none">
                                        <i class="bi bi-exclamation-circle-fill me-1"></i> Silakan pilih jenis surat terlebih dahulu.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Perihal / Keperluan</label>
                                    <input type="text" name="tujuan_surat" class="form-control rounded-3" placeholder="Contoh: Pengajuan Izin Penelitian Skripsi" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Dosen Penandatangan / Penanggung Jawab</label>
                                    <select id="select-dosen" class="form-select rounded-3" onchange="clearFieldError(this, 'dosen-error-msg')">
                                        <option value="">Pilih Dosen</option>
                                        <?php foreach ($dosen as $dsn): ?>
                                            <option value="<?= $dsn['id_user']; ?>"><?= esc($dsn['nama']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="dosen-error-msg" class="text-danger small mt-1 d-none">
                                        <i class="bi bi-exclamation-circle-fill me-1"></i> Silakan pilih dosen penanggung jawab terlebih dahulu.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Isi Ringkas / Keterangan Tambahan</label>
                                    <textarea id="textarea-catatan" class="form-control rounded-3" rows="4" placeholder="Ketik deskripsi atau keterangan tambahan surat di sini..."></textarea>
                                </div>

                                <div class="col-12 d-flex gap-2 justify-content-end pt-2">
                                    <button type="button" class="btn btn-light border rounded-3 px-4">Simpan Draft</button>
                                    <button type="button" class="btn btn-brand text-white rounded-3 px-4" onclick="kirimAjuan()">Kirim Ajuan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4">
                        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 20px;">
                            <h6 class="fw-bold text-dark-smooth mb-3">Pratinjau Dokumen</h6>
                            <div id="preview-dokumen" class="border rounded-3 p-4 bg-light shadow-inner text-center text-muted" style="min-height: 250px; display: flex; flex-direction: column; justify-content: center; align-items: center; cursor: pointer;" onclick="document.getElementById('input-file-pdf').click()">
                                <div>
                                    <i class="bi bi-cloud-arrow-up fs-1 text-secondary mb-2"></i>
                                    <p class="small fw-bold text-dark-smooth mb-1">Klik untuk unggah file PDF</p>
                                    <p class="extra-small mb-0">Draft berkas otomatis terbentuk setelah form diisi.</p>
                                </div>
                            </div>
                            <div id="pdf-error-msg" class="text-danger small mt-2 d-none">
                                <i class="bi bi-exclamation-circle-fill me-1"></i> Anda belum memasukkan file PDF. Silakan unggah file terlebih dahulu.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 4 & 5 OPTIONS -->
            <!-- TAB 4: RIWAYAT AJUAN -->
            <div id="content-riwayat-ajuan" class="tab-content d-none">
                <div class="mb-4">
                    <h4 class="fw-bold text-dark-smooth">Riwayat Ajuan</h4>
                    <p class="text-muted small">Catatan historis ringkas mengenai surat yang pernah Anda ajukan.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover custom-table">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;">No.</th>
                                    <th>Nama / Perihal Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($riwayat_surat)): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada catatan riwayat ajuan.</td>
                                </tr>
                                <?php else: ?>
                                <?php $no = 1; foreach ($riwayat_surat as $row): ?>
                                <tr>
                                    <td><span class="small text-muted"><?= $no++; ?></span></td>
                                    <td><span class="fw-bold text-dark-smooth"><?= esc($row['tujuan_surat']) ?></span></td>
                                    <td><span class="small text-muted"><?= esc($row['nama_jenis']) ?></span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 small text-muted">
                                            <i class="bi bi-calendar3"></i> 
                                            <?= date('d M Y', strtotime($row['tanggal_pengajuan'])) ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<script>
    // UPDATE: Fungsi switchTab disederhanakan dan dioptimalkan agar langsung membaca ID container HTML
    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(el => { el.classList.add('d-none'); });
        document.querySelectorAll('.nav-btn').forEach(el => {
            el.classList.remove('active', 'text-white');
            el.classList.add('text-white-50');
        });

        // Tampilkan element kontainer tujuan sesuai ID-nya
        const selectedContent = document.getElementById(`content-${tabId}`);
        if (selectedContent) {
            selectedContent.classList.remove('d-none');
        }

        const activeBtn = document.getElementById(`btn-${tabId}`);
        if (activeBtn) {
            activeBtn.classList.add('active', 'text-white');
            activeBtn.classList.remove('text-white-50');
        }
    }

    function handleFilePreview(inputEl) {
        const preview = document.getElementById('preview-dokumen');
        const errorMsg = document.getElementById('pdf-error-msg');
        const file = inputEl.files[0];

        if (file) {
            inputEl.classList.remove('is-invalid');
            errorMsg.classList.add('d-none');
            const fileUrl = URL.createObjectURL(file);

            preview.style.cursor = 'default';
            preview.style.display = 'block';
            preview.style.padding = '0';
            preview.innerHTML = `
                <div class="p-2 border-bottom bg-white d-flex align-items-center justify-content-between">
                    <span class="small fw-bold text-dark-smooth text-truncate"><i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i>${file.name}</span>
                    <button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="event.stopPropagation(); document.getElementById('input-file-pdf').click();">Ganti</button>
                </div>
                <embed src="${fileUrl}" type="application/pdf" width="100%" height="400px" />
            `;
        }
    }

    function clearFieldError(selectEl, errorMsgId) {
        if (selectEl.value) {
            selectEl.classList.remove('is-invalid');
            document.getElementById(errorMsgId).classList.add('d-none');
        }
    }

    function kirimAjuan() {
        const jenisSelect = document.getElementById('select-jenis-surat');
        const jenisError = document.getElementById('jenis-error-msg');
        const dosenSelect = document.getElementById('select-dosen');
        const dosenError = document.getElementById('dosen-error-msg');
        const fileInput = document.getElementById('input-file-pdf');
        const fileErrorMsg = document.getElementById('pdf-error-msg');

        let isValid = true;

        if (!jenisSelect.value) {
            jenisSelect.classList.add('is-invalid');
            jenisError.classList.remove('d-none');
            isValid = false;
        }

        if (!dosenSelect.value) {
            dosenSelect.classList.add('is-invalid');
            dosenError.classList.remove('d-none');
            isValid = false;
        }

        if (!fileInput.files || fileInput.files.length === 0) {
            fileInput.classList.add('is-invalid');
            fileErrorMsg.classList.remove('d-none');
            isValid = false;
        }

        if (!isValid) return false;

        const namaDosen = dosenSelect.options[dosenSelect.selectedIndex].text;
        const catatan = document.getElementById('textarea-catatan').value;
        document.getElementById('hidden-keterangan').value = "Dosen TTD: " + namaDosen + " | Catatan: " + (catatan ? catatan : '-');

        document.getElementById('form-pengajuan').submit();
    }

    // Default view saat pertama kali load halaman
    switchTab('dashboard-utama');
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>