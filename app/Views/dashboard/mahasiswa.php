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
        /* Utility tambahan untuk mendukung fitur sembunyi/tampil halaman */
        .tab-content.d-none {
            display: none !important;
        }
    </style>
</head>
<body class="bg-light-smooth">

<div class="d-flex min-vh-100">
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
        </nav>

        <main class="p-4 flex-grow-1">

            <div id="content-dashboard-utama" class="tab-content">
                <div class="row g-4 mb-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card stat-card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small fw-medium mb-1">Total Ajuan Surat</p>
                                    <h3 class="fw-bold mb-0 text-dark-smooth">0</h3>
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
                                    <h3 class="fw-bold mb-0 text-dark-smooth">0</h3>
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
                                    <h3 class="fw-bold mb-0 text-dark-smooth">0</h3>
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
                                    <h3 class="fw-bold mb-0 text-dark-smooth">0</h3>
                                </div>
                                <div class="stat-icon bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-x fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <th>Penanggung Jawab (Dosen)</th>
                                    <th>Tanggal Ajuan</th>
                                    <th>Keperluan Berkas</th>
                                    <th>Status TTD</th>
                                    <th class="text-center">Aksi Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="fw-bold text-dark-smooth">Pengajuan Surat</span></td>
                                    <td>
                                        <div class="small fw-semibold">Yanto Hermawan S.T, M.Kom.</div>
                                        <div class="extra-small text-muted">Dosen Pembimbing 1</div>
                                    </td>
                                    <td class="small text-muted">25 Juni 2026</td>
                                    <td><span class="small text-muted">Riset Judul Proposal Skripsi</span></td>
                                    <td><span class="badge bg-warning-subtle text-warning px-2.5 py-1.5 rounded-pill small"><i class="bi bi-clock me-1"></i> Proses Review</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-light border px-2 py-1 rounded-3 small text-muted" disabled><i class="bi bi-download"></i> Unduh</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-bold text-dark-smooth">Perizinan Surat</span></td>
                                    <td>
                                        <div class="small fw-semibold">Dr. Robert Doney</div>
                                        <div class="extra-small text-muted">Ketua Program Studi</div>
                                    </td>
                                    <td class="small text-muted">20 Juni 2026</td>
                                    <td><span class="small text-muted">Penyelanggaran program kerja himpunan mahasiswa SI</span></td>
                                    <td><span class="badge bg-success-subtle text-success px-2.5 py-1.5 rounded-pill small"><i class="bi bi-check-circle-fill me-1"></i> Terverifikasi TTD</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary px-2 py-1 rounded-3 small"><i class="bi bi-download"></i> Unduh PDF</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-bold text-dark-smooth">Peminjaman</span></td>
                                    <td>
                                        <div class="small fw-semibold">Dr. Robert Doney</div>
                                        <div class="extra-small text-muted">Ketua Bagian Peminjaman barang kampus</div>
                                    </td>
                                    <td class="small text-muted">15 Juni 2026</td>
                                    <td><span class="small text-muted">Peminjaman barang untuk Proker UKM</span></td>
                                    <td><span class="badge bg-danger-subtle text-danger px-2.5 py-1.5 rounded-pill small"><i class="bi bi-exclamation-triangle-fill me-1"></i> Ditolak (Revisi)</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-light border px-2 py-1 rounded-3 small text-dark"><i class="bi bi-pencil-square"></i> Perbaiki</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="content-surat-list" class="tab-content d-none">
                <div class="mb-4">
                    <h4 id="page-title" class="fw-bold text-dark-smooth">Surat Masuk</h4>
                    <p class="text-muted small">Kelola data arsip surat berkas digital Anda.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <select class="form-select form-select-sm w-auto rounded-3">
                            <option>Semua Status</option>
                            <option>Selesai</option>
                            <option>Sedang Diproses</option>
                        </select>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-muted small">
                                    <th style="width: 50px;"><class="form-check-input"></th>
                                    <th>Pengirim / Perihal</th>
                                    <th>Status Dokumen</th>
                                    <th>Waktu Terbit</th>
                                </tr>
                            </thead>
                            <tbody id="table-body-surat">
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
                            <form id="form-pengajuan" class="row g-3" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Jenis Surat</label>
                                    <select id="select-jenis-surat" class="form-select rounded-3" onchange="clearFieldError(this, 'jenis-error-msg')">
                                         <option value="">Pilih Jenis Surat</option>
                                        <?php foreach ($jenis_surat as $js): ?>
                                        <option value="<?= $js['id_jenis']; ?>">
                                            <?= esc($js['nama_jenis']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                    <div id="jenis-error-msg" class="text-danger small mt-1 d-none">
                                        <i class="bi bi-exclamation-circle-fill me-1"></i>
                                        Silakan pilih jenis surat terlebih dahulu.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Perihal / Keperluan</label>
                                    <input type="text" class="form-control rounded-3" placeholder="Contoh: Pengajuan Izin Penelitian Skripsi">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Dosen Penandatangan / Penanggung Jawab</label>
                                    <select id="select-dosen" class="form-select rounded-3" name="id_dosen" onchange="clearFieldError(this, 'dosen-error-msg')">

                                    <option value="">Pilih Dosen</option>

                                    <?php foreach ($dosen as $dsn): ?>

                                        <option value="<?= $dsn['id_user']; ?>">
                                            <?= esc($dsn['nama']); ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>
                                    <div id="dosen-error-msg" class="text-danger small mt-1 d-none">
                                        <i class="bi bi-exclamation-circle-fill me-1"></i>
                                        Silakan pilih dosen penanggung jawab terlebih dahulu.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Isi Ringkas / Keterangan Tambahan</label>
                                    <textarea class="form-control rounded-3" rows="4" placeholder="Ketik deskripsi atau keterangan tambahan surat di sini..."></textarea>
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

                            <input
                                type="file"
                                id="input-file-pdf"
                                name="file_surat"
                                accept="application/pdf"
                                class="d-none"
                                onchange="handleFilePreview(this)">

                            <div id="preview-dokumen"
                                 class="border rounded-3 p-4 bg-light shadow-inner text-center text-muted"
                                 style="min-height: 250px; display: flex; flex-direction: column; justify-content: center; align-items: center; cursor: pointer;"
                                 onclick="document.getElementById('input-file-pdf').click()">
                                <div>
                                    <i class="bi bi-cloud-arrow-up fs-1 text-secondary mb-2"></i>
                                    <p class="small fw-bold text-dark-smooth mb-1">Klik untuk unggah file PDF</p>
                                    <p class="extra-small mb-0">Draft berkas otomatis terbentuk setelah form diisi.</p>
                                </div>
                            </div>

                            <div id="pdf-error-msg" class="text-danger small mt-2 d-none">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>
                                Anda belum memasukkan file PDF. Silakan unggah file terlebih dahulu sebelum mengirim ajuan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="content-riwayat-ajuan" class="tab-content d-none">
                <h4 class="fw-bold text-dark-smooth mb-3">Riwayat Ajuan</h4>
                <div class="alert alert-info rounded-3">Halaman riwayat ajuan surat Anda.</div>
            </div>

            <div id="content-daftar-dosen" class="tab-content d-none">
                <h4 class="fw-bold text-dark-smooth mb-3">Daftar Dosen</h4>
                <div class="alert alert-info rounded-3">Informasi kontak dan jadwal verifikasi dosen penanggung jawab.</div>
            </div>

        </main>
    </div>
</div>

<script>
    function switchTab(tabId) {
    // 1. Sembunyikan seluruh konten kontainer tab halaman
    document.querySelectorAll('.tab-content').forEach(el => {
        el.classList.add('d-none');
    });
    
    // 2. Kembalikan semua tombol sidebar ke style non-aktif awal
    document.querySelectorAll('.nav-btn').forEach(el => {
        el.classList.remove('active', 'text-white');
        el.classList.add('text-white-50');
    });

    // 3. LOGIKA BARU: Jika memilih surat-masuk / surat-keluar, arahkan ke kontainer bersama
    if (tabId === 'surat-masuk' || tabId === 'surat-keluar') {
        const suratContent = document.getElementById('content-surat-list');
        if (suratContent) suratContent.classList.remove('d-none');
        
        document.getElementById('page-title').innerText = tabId === 'surat-masuk' ? 'Surat Masuk' : 'Surat Keluar';
        renderTable(tabId === 'surat-masuk' ? dataSuratMasuk : dataSuratKeluar);
    } else {
        // Konten reguler (dashboard-utama, pengajuan-baru, dll)
        const selectedContent = document.getElementById(`content-${tabId}`);
        if (selectedContent) {
            selectedContent.classList.remove('d-none');
        }
    }

    // 4. Ubah tombol navigasi aktif yang ditekan
    const activeBtn = document.getElementById(`btn-${tabId}`);
    if (activeBtn) {
        activeBtn.classList.add('active', 'text-white');
        activeBtn.classList.remove('text-white-50');
    }
}
    function renderTable(data) {
        const tbody = document.getElementById('table-body-surat');
        tbody.innerHTML = '';
        data.forEach(item => {
            tbody.innerHTML += `
                <tr>
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        <div class="fw-bold text-dark-smooth">${item.pengirim}</div>
                        <div class="extra-small text-muted">${item.instansi}</div>
                    </td>
                    <td>
                        <span class="badge ${item.color} px-2.5 py-1.5 rounded-pill small">
                            ${item.status}
                        </span>
                    </td>
                    <td class="small text-muted">${item.waktu}</td>
                </tr>
            `;
        });
    }

    // ===== LOGIKA PRATINJAU & VALIDASI UPLOAD PDF SEBELUM KIRIM AJUAN =====

    // Menampilkan isi PDF langsung (embed) di kotak Pratinjau Dokumen saat file dipilih,
    // dan langsung menghapus tanda error jika sebelumnya muncul.
    function handleFilePreview(inputEl) {
        const preview = document.getElementById('preview-dokumen');
        const errorMsg = document.getElementById('pdf-error-msg');
        const file = inputEl.files[0];

        if (file) {
            inputEl.classList.remove('is-invalid');
            errorMsg.classList.add('d-none');

            // Buat URL sementara dari file PDF lalu tampilkan langsung isinya di kotak Pratinjau Dokumen
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

    // Menghapus tanda error pada select begitu user memilih sebuah opsi
    function clearFieldError(selectEl, errorMsgId) {
        if (selectEl.value) {
            selectEl.classList.remove('is-invalid');
            document.getElementById(errorMsgId).classList.add('d-none');
        }
    }

    // Dipanggil saat tombol "Kirim Ajuan" ditekan.
    // Mengecek jenis surat, dosen, dan file PDF sebelum ajuan boleh dikirim.
    function kirimAjuan() {
        const jenisSelect = document.getElementById('select-jenis-surat');
        const jenisError = document.getElementById('jenis-error-msg');
        const dosenSelect = document.getElementById('select-dosen');
        const dosenError = document.getElementById('dosen-error-msg');
        const fileInput = document.getElementById('input-file-pdf');
        const fileErrorMsg = document.getElementById('pdf-error-msg');

        let isValid = true;
        let firstInvalidEl = null;

        // Reset semua tanda error dulu
        jenisSelect.classList.remove('is-invalid');
        jenisError.classList.add('d-none');
        dosenSelect.classList.remove('is-invalid');
        dosenError.classList.add('d-none');
        fileInput.classList.remove('is-invalid');
        fileErrorMsg.classList.add('d-none');

        // 1. Validasi Jenis Surat
        if (!jenisSelect.value) {
            jenisSelect.classList.add('is-invalid');
            jenisError.classList.remove('d-none');
            isValid = false;
            firstInvalidEl = firstInvalidEl || jenisSelect;
        }

        // 2. Validasi Dosen Penandatangan
        if (!dosenSelect.value) {
            dosenSelect.classList.add('is-invalid');
            dosenError.classList.remove('d-none');
            isValid = false;
            firstInvalidEl = firstInvalidEl || dosenSelect;
        }

        // 3. Validasi File PDF
        if (!fileInput.files || fileInput.files.length === 0) {
            fileInput.classList.add('is-invalid');
            fileErrorMsg.classList.remove('d-none');
            isValid = false;
            firstInvalidEl = firstInvalidEl || document.getElementById('preview-dokumen');
        } else {
            const file = fileInput.files[0];
            if (file.type !== 'application/pdf') {
                fileInput.classList.add('is-invalid');
                fileErrorMsg.classList.remove('d-none');
                fileErrorMsg.innerHTML = '<i class="bi bi-exclamation-circle-fill me-1"></i> File yang diunggah harus berformat PDF.';
                isValid = false;
                firstInvalidEl = firstInvalidEl || document.getElementById('preview-dokumen');
            }
        }

        if (!isValid) {
            if (firstInvalidEl) {
                firstInvalidEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (typeof firstInvalidEl.focus === 'function') firstInvalidEl.focus();
            }
            return false; // batalkan proses kirim
        }

        // Semua valid -> lanjutkan proses kirim ajuan (submit form / AJAX ke server)
        // TODO: ganti bagian ini dengan submit form/AJAX sesuai backend Anda
        document.getElementById('form-pengajuan').submit();
    }

    // Default load saat dashboard pertama kali diakses
    switchTab('dashboard-utama');
</script>

</body>
</html>