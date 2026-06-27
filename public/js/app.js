import { dataSuratMasuk, dataSuratKeluar } from './data.js';

// Fungsi mengganti Tab aktif
function switchTab(tabId) {
    // Sembunyikan semua konten tab
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    
    // Reset style semua button navigasi
    document.querySelectorAll('.nav-btn').forEach(el => {
        el.classList.remove('bg-blue-50', 'text-blue-600', 'font-semibold');
        el.classList.add('text-slate-600', 'font-medium');
        const icon = el.querySelector('i');
        if (icon) {
            icon.classList.remove('text-blue-500');
            icon.classList.add('text-slate-400');
        }
    });

    // Berikan style aktif ke button yang dipilih
    const activeBtn = document.getElementById(`btn-${tabId}`);
    if (activeBtn) {
        activeBtn.classList.add('bg-blue-50', 'text-blue-600', 'font-semibold');
        const activeIcon = activeBtn.querySelector('i');
        if (activeIcon) activeIcon.classList.add('text-blue-500');
    }

    // Tampilkan konten dan render data spesifik
    if (tabId === 'surat-masuk' || tabId === 'surat-keluar') {
        document.getElementById('content-surat-list').classList.remove('hidden');
        document.getElementById('page-title').innerText = tabId === 'surat-masuk' ? 'Surat Masuk' : 'Surat Keluar';
        renderTable(tabId === 'surat-masuk' ? dataSuratMasuk : dataSuratKeluar);
    } else if (tabId === 'pengajuan-baru') {
        document.getElementById('content-pengajuan-baru').classList.remove('hidden');
    }
}

// Fungsi merender data array ke dalam baris tabel HTML
function renderTable(data) {
    const tbody = document.getElementById('table-body-surat');
    if (!tbody) return;
    
    tbody.innerHTML = '';
    data.forEach(item => {
        tbody.innerHTML += `
            <tr class="hover:bg-slate-50/80 transition-colors">
                <td class="p-4 text-center"><input type="checkbox" class="rounded text-blue-600"></td>
                <td class="p-4">
                    <div class="font-semibold text-slate-800">${item.pengirim}</div>
                    <div class="text-xs text-slate-400 mt-0.5">${item.instansi}</div>
                </td>
                <td class="p-4">
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold border ${item.color}">
                        ${item.status}
                    </span>
                </td>
                <td class="p-4 text-slate-500 text-xs font-medium">${item.waktu}</td>
            </tr>
        `;
    });
}

// Event Listeners untuk menggantikan inline onclick pada HTML
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('btn-surat-masuk')?.addEventListener('click', () => switchTab('surat-masuk'));
    document.getElementById('btn-surat-keluar')?.addEventListener('click', () => switchTab('surat-keluar'));
    document.getElementById('btn-pengajuan-baru')?.addEventListener('click', () => switchTab('pengajuan-baru'));

    // Set default view ke Surat Masuk saat pertama kali dimuat
    switchTab('surat-masuk');
});