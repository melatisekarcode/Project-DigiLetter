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
                <button onclick="switchTab('surat-masuk')" id="btn-surat-masuk" class="nav-link nav-btn w-100 border-0 bg-transparent text-start rounded-3 text-white-50 d-flex align-items-center gap-3">
                    <i class="bi bi-mailbox"></i> Surat Masuk
                </button>
            </li>
            <li class="nav-item">
                <button onclick="switchTab('surat-keluar')" id="btn-surat-keluar" class="nav-link nav-btn w-100 border-0 bg-transparent text-start rounded-3 text-white-50 d-flex align-items-center gap-3">
                    <i class="bi bi-send"></i> Surat Keluar
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
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-pill small ms-2">Admin</span>
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
                            <form class="row g-3">
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Jenis Surat</label>
                                    <select class="form-select rounded-3">
                                             <option value="">Pilih Jenis Surat</option>
                                        <?php foreach ($jenis_surat as $js): ?>
                                        <option value="<?= $js['id_jenis']; ?>">
                                            <?= esc($js['nama_jenis']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Perihal / Keperluan</label>
                                    <input type="text" class="form-control rounded-3" placeholder="Contoh: Pengajuan Izin Penelitian Skripsi">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Dosen Penandatangan / Penanggung Jawab</label>
                                    <select class="form-select rounded-3">
                                        <option>Dr. Eng. Hermawan, M.T. (Dosen Pembimbing 1)</option>
                                        <option>Siti Aminah, M.Kom. (Ketua Program Studi)</option>
                                        <option>Budi Santoso, M.T. (Kepala Lab Komputer)</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-dark-smooth">Isi Ringkas / Keterangan Tambahan</label>
                                    <textarea class="form-control rounded-3" rows="4" placeholder="Ketik deskripsi atau keterangan tambahan surat di sini..."></textarea>
                                </div>
                                <div class="col-12 d-flex gap-2 justify-content-end pt-2">
                                    <button type="button" class="btn btn-light border rounded-3 px-4">Simpan Draft</button>
                                    <button type="button" class="btn btn-brand text-white rounded-3 px-4">Kirim Ajuan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-xl-4">
                        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 20px;">
                            <h6 class="fw-bold text-dark-smooth mb-3">Pratinjau Dokumen</h6>
                            <div class="border rounded-3 p-4 bg-light shadow-inner text-center text-muted" style="min-height: 250px; display: flex; flex-column: column; justify-content: center; align-items: center;">
                                <div>
                                    <i class="bi bi-file-earmark-pdf fs-1 text-secondary mb-2"></i>
                                    <p class="small mb-0">Draft berkas otomatis terbentuk setelah form diisi.</p>
                                </div>
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

    // Default load saat dashboard pertama kali diakses
    switchTab('dashboard-utama');
</script>

</body>
</html>