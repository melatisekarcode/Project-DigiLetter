<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGI LETTER - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-slate-100 text-slate-700 antialiased flex h-screen overflow-hidden">

    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between p-4 shrink-0">
        <div>
            <div class="flex items-center gap-3 px-2 py-3 mb-6">
                <div class="bg-blue-600 text-white p-2 rounded-lg text-center w-10 h-10 flex items-center justify-center font-bold text-xl">D</div>
                <span class="font-bold text-lg text-blue-900 tracking-wide">DIGI LETTER</span>
            </div>

            <nav class="space-y-1">
                <button id="btn-surat-masuk" class="nav-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">
                    <i class="fa-solid fa-inbox text-slate-400 w-5"></i> Surat Masuk
                </button>
                <button id="btn-surat-keluar" class="nav-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">
                    <i class="fa-solid fa-paper-plane text-slate-400 w-5"></i> Surat Keluar
                </button>
                <button id="btn-pengajuan-baru" class="nav-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">
                    <i class="fa-solid fa-file-circle-plus text-slate-400 w-5"></i> Pengajuan Baru
                </button>
                <hr class="my-4 border-slate-200">
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-50">
                    <i class="fa-solid fa-gear text-slate-400 w-5"></i> Pengaturan
                </a>
            </nav>
        </div>

        <div class="flex items-center justify-between border-t border-slate-200 pt-4 px-2">
            <div class="flex items-center gap-3">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop" class="w-9 h-9 rounded-full object-cover border" alt="User">
                <div>
                    <p class="text-sm font-semibold text-slate-800 leading-none">Ahmad Fauzi</p>
                    <span class="text-xs text-slate-500">User</span>
                </div>
            </div>
            <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between shrink-0">
            <div></div> 
            <div class="flex items-center gap-4">
                <button class="relative text-slate-400 hover:text-slate-600">
                    <i class="fa-regular fa-bell text-lg"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="flex items-center gap-2">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop" class="w-7 h-7 rounded-full object-cover" alt="User">
                    <button class="text-sm font-medium text-slate-600 hover:text-red-600 flex items-center gap-1">
                        Log Out <i class="fa-solid fa-right-from-bracket text-xs"></i>
                    </button>
                </div>
            </div>
        </header>

        <main class="flex-1 p-6 overflow-y-auto">

            <div id="content-surat-list" class="tab-content hidden">
                <div class="mb-4">
                    <h1 id="page-title" class="text-xl font-bold text-slate-900">Surat Masuk</h1>
                    <p class="text-xs text-slate-500 mt-1">User: <span class="font-medium text-slate-700">Ahmad Fauzi</span></p>
                </div>

                <div class="grid grid-cols-4 gap-4 mb-6">
                    <div class="bg-white p-4 rounded-xl border border-slate-200">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Surat</p>
                        <p class="text-2xl font-bold text-slate-800 mt-1">245</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-slate-200">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Menunggu TTD</p>
                        <p class="text-2xl font-bold text-slate-800 mt-1">3</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-slate-200">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Sedang Diproses</p>
                        <p class="text-2xl font-bold text-slate-800 mt-1">8</p>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-slate-200">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Selesai</p>
                        <p class="text-2xl font-bold text-slate-800 mt-1">234</p>
                    </div>
                </div>

                <div class="bg-white p-3 rounded-t-xl border border-slate-200 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <select class="text-sm bg-slate-50 border border-slate-200 rounded-lg px-3 py-1.5 focus:outline-none">
                            <option>Selesai</option>
                            <option>Sedang Diproses</option>
                        </select>
                    </div>
                    <button class="bg-blue-600 text-white text-sm font-medium px-4 py-1.5 rounded-lg shadow-sm hover:bg-blue-700 flex items-center gap-2">
                        <i class="fa-solid fa-sliders text-xs"></i> Filter
                    </button>
                </div>

                <div class="bg-white border-x border-b border-slate-200 rounded-b-xl overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase">
                                <th class="p-4 w-12 text-center"><input type="checkbox" class="rounded"></th>
                                <th class="p-4">Surat</th>
                                <th class="p-4 w-40">Status</th>
                                <th class="p-4 w-44">Waktu</th>
                            </tr>
                        </thead>
                        <tbody id="table-body-surat" class="divide-y divide-slate-100 text-sm">
                            </tbody>
                    </table>
                </div>
            </div>

            <div id="content-pengajuan-baru" class="tab-content hidden">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-900">Halaman Pengajuan Surat</h1>
                        <p class="text-xs text-slate-500 mt-1">Creatum (Undangan, Permohonan, dll)</p>
                    </div>
                    <button class="bg-blue-600 text-white text-xs font-medium px-4 py-2 rounded-lg shadow-sm hover:bg-blue-700">
                        Simpan Draft
                    </button>
                </div>

                <div class="flex items-center gap-2 mb-6 text-xs font-medium text-slate-400 bg-white border border-slate-200 p-3 rounded-xl">
                    <span class="text-blue-600 flex items-center gap-1 font-semibold"><i class="fa-solid fa-circle-dot"></i> 1. Detail Surat</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span>2. Isi Surat</span>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span>3. Review & Kirim</span>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-2 space-y-4 bg-white p-5 rounded-xl border border-slate-200">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Jenis Surat</label>
                            <select class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                                <option>Surat Undangan, Surat Tugas, DLL</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Perihal</label>
                            <input type="text" placeholder="Perihal" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Penerima</label>
                            <div class="relative">
                                <input type="text" placeholder="Penerima (Dropdown Pencarian)..." class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-3 pr-10 py-2 text-sm focus:outline-none focus:border-blue-500">
                                <i class="fa-solid fa-magnifying-glass absolute right-3 top-2.5 text-slate-400 text-sm"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Penandatangan (Hajib)</label>
                            <input type="text" value="Eko Pambudi" readonly class="w-full bg-slate-100 border border-slate-200 rounded-lg px-3 py-2 text-sm text-slate-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Isi Surat</label>
                            <div class="border border-slate-200 rounded-lg overflow-hidden">
                                <div class="bg-slate-50 border-b border-slate-200 p-2 flex gap-2 text-slate-500 text-xs">
                                    <button class="p-1 hover:bg-slate-200 rounded"><i class="fa-solid fa-bold"></i></button>
                                    <button class="p-1 hover:bg-slate-200 rounded"><i class="fa-solid fa-italic"></i></button>
                                    <button class="p-1 hover:bg-slate-200 rounded"><i class="fa-solid fa-underline"></i></button>
                                    <span class="text-slate-300">|</span>
                                    <button class="p-1 hover:bg-slate-200 rounded"><i class="fa-solid fa-align-left"></i></button>
                                    <button class="p-1 hover:bg-slate-200 rounded"><i class="fa-solid fa-align-center"></i></button>
                                    <button class="p-1 hover:bg-slate-200 rounded"><i class="fa-solid fa-list"></i></button>
                                </div>
                                <textarea rows="4" class="w-full p-3 text-sm focus:outline-none resize-none bg-slate-50/50" placeholder="Ketik isi surat disini..."></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 pt-2">
                            <button class="px-4 py-2 text-sm font-medium border border-slate-200 rounded-lg hover:bg-slate-50">Simpan Draft</button>
                            <button class="px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm">Lanjutkan Ke Penandatanganan</button>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <div class="bg-white border border-slate-200 rounded-xl p-4 sticky top-0">
                            <p class="text-xs font-semibold text-slate-500 uppercase mb-3">Preview Dokumen</p>
                            <div class="border border-slate-200 aspect-[3/4] p-5 shadow-inner bg-slate-50 flex flex-col justify-between text-[10px] text-slate-400">
                                <div>
                                    <div class="flex items-center gap-2 border-b border-slate-300 pb-2 mb-2">
                                        <div class="w-6 h-6 bg-blue-600 rounded"></div>
                                        <div>
                                            <div class="h-2 w-20 bg-slate-300 rounded mb-1"></div>
                                            <div class="h-1 w-28 bg-slate-200 rounded"></div>
                                        </div>
                                    </div>
                                    <div class="space-y-1.5 mt-4">
                                        <div class="h-2 w-12 bg-slate-300 rounded"></div>
                                        <div class="h-2 w-24 bg-slate-200 rounded"></div>
                                        <div class="h-2 w-full bg-slate-200 rounded pt-4"></div>
                                        <div class="h-2 w-full bg-slate-200 rounded"></div>
                                        <div class="h-2 w-3/4 bg-slate-200 rounded"></div>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <div class="w-16 h-12 border border-dashed border-slate-300 rounded flex items-center justify-center text-[8px]">
                                        Tanda Tangan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>