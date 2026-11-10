@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
<div class="container pt-27 px-4 pb-8">
    <p class="font-medium text-lg font-sans">Pengelolaan</p>
    <p class="text-sm text-gray-700">Kelola menu, stok, pesanan, dan karyawan kedai.</p>

    <!-- ringkasan -->
    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-3">
        <div class="rounded-xl bg-gray-50 p-4">
            <p class="text-sm text-gray-600">Total menu</p>
            <p class="mt-1 text-3xl font-medium text-gray-900">{{ count($menu) }}</p>
        </div>
        <div class="rounded-xl bg-gray-50 p-4">
            <p class="text-sm text-gray-600">Stok menipis</p>
            <p class="mt-1 text-3xl font-medium text-red-800">{{ $stokMenipis }}</p>
        </div>
        <div class="rounded-xl bg-gray-50 p-4">
            <p class="text-sm text-gray-600">Pesanan aktif</p>
            <p class="mt-1 text-3xl font-medium text-amber-800">{{ $pesananAktif }}</p>
        </div>
        <div class="rounded-xl bg-gray-50 p-4">
            <p class="text-sm text-gray-600">Karyawan</p>
            <p class="mt-1 text-3xl font-medium text-gray-900">{{ count($karyawan) }}</p>
        </div>
    </div>
    <!-- end ringkasan -->

    <!-- tab -->
    <div class="mt-6 border-b border-gray-200 overflow-x-auto">
        <ul class="flex gap-6 text-sm font-medium whitespace-nowrap" id="tab-list">
            <li><button type="button" data-tab="menu" class="tab-btn pb-3 border-b-2 cursor-pointer">Menu</button></li>
            <li><button type="button" data-tab="stok" class="tab-btn pb-3 border-b-2 cursor-pointer">Stok</button></li>
            <li><button type="button" data-tab="pesanan" class="tab-btn pb-3 border-b-2 cursor-pointer">Pesanan</button></li>
            <li><button type="button" data-tab="karyawan" class="tab-btn pb-3 border-b-2 cursor-pointer">Karyawan</button></li>
        </ul>
    </div>

    <!-- A. MENU -->
    <div id="tab-menu" class="tab-panel mt-4 rounded-xl border border-gray-200 bg-white p-5">
        <div class="flex items-center justify-between">
            <h2 class="font-medium text-gray-900">Pengelolaan menu</h2>
            <button type="button" data-target="form-tambahMenu" class="rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition cursor-pointer">+ Tambah menu</button>
        </div>
        <div class="mt-3 overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-gray-600 border-b border-gray-200">
                    <tr>
                        <th class="py-2 pr-4 font-medium">Nama</th>
                        <th class="py-2 pr-4 font-medium">Kategori</th>
                        <th class="py-2 pr-4 font-medium">Deskripsi</th>
                        <th class="py-2 pr-4 font-medium">Harga</th>
                        <th class="py-2 pr-4 font-medium">Ketersediaan</th>
                        <th class="py-2 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($menu as $m)
                    <tr>
                        <td class="py-3 pr-4 font-medium text-gray-900">{{ $m['nama'] }}</td>
                        <td class="py-3 pr-4 text-gray-700">{{ $m['kategori'] }}</td>
                        <td class="py-3 pr-4 text-gray-700">{{ $m['deskripsi'] }}</td>
                        <td class="py-3 pr-4 text-gray-900">Rp {{ number_format($m['harga'], 0, ',', '.') }}</td>
                        <td class="py-3 pr-4">
                            <span class="rounded-md px-3 py-1 text-xs font-medium {{ $m['tersedia'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $m['tersedia'] ? 'Tersedia' : 'Habis' }}
                            </span>
                        </td>
                        <td class="py-3">
                            <div class="flex gap-2">
                                <button type="button" class="rounded-lg border border-gray-300 px-3 py-1 text-xs text-gray-700 hover:bg-gray-50 cursor-pointer">Ubah</button>
                                <button type="button" class="rounded-lg border border-red-300 px-3 py-1 text-xs text-red-700 hover:bg-red-50 cursor-pointer">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- form tambah menu (tersembunyi) -->
    <div id="form-tambahMenu" class="hidden mt-4 rounded-xl border border-gray-200 bg-white p-5">
        <h2 class="font-medium text-gray-900">Tambah menu</h2>
        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Nama menu</label>
                <input type="text"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Kategori</label>
                <select class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <option>Kopi</option>
                    <option>Non-kopi</option>
                    <option>Makanan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Deskripsi</label>
                <input type="text"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Harga</label>
                <input type="number"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Ketersediaan</label>
                <select class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <option>Tersedia</option>
                    <option>Habis</option>
                </select>
            </div>
        </div>
        <div class="mt-4 flex gap-2">
            <button type="button" class="rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition">Tambah</button>
            <button type="button" data-close="form-tambahMenu" class="close-btn rounded-lg border border-gray-300 px-3 py-2 text-xs text-gray-700 hover:bg-gray-50 transition">Batal</button>
        </div>
    </div>

    <!-- B. STOK -->
    <div id="tab-stok" class="tab-panel hidden mt-4 rounded-xl border border-gray-200 bg-white p-5">
        <div class="flex items-center justify-between">
            <h2 class="font-medium text-gray-900">Pengelolaan stok bahan baku</h2>
            <button type="button" data-target="form-tambahBahan" class="rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition cursor-pointer">+ Tambah bahan</button>
        </div>
        <div class="mt-3 overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-gray-600 border-b border-gray-200">
                    <tr>
                        <th class="py-2 pr-4 font-medium">Bahan baku</th>
                        <th class="py-2 pr-4 font-medium">Jumlah</th>
                        <th class="py-2 pr-4 font-medium">Batas minimum</th>
                        <th class="py-2 pr-4 font-medium">Status</th>
                        <th class="py-2 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($stok as $s)
                    <tr>
                        <td class="py-3 pr-4 font-medium text-gray-900">{{ $s['nama'] }}</td>
                        <td class="py-3 pr-4 text-gray-900">{{ $s['jumlah'] }} {{ $s['satuan'] }}</td>
                        <td class="py-3 pr-4 text-gray-700">{{ $s['minimum'] }} {{ $s['satuan'] }}</td>
                        <td class="py-3 pr-4">
                            <span class="rounded-md px-3 py-1 text-xs font-medium {{ $s['menipis'] ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $s['menipis'] ? 'Hampir habis' : 'Aman' }}
                            </span>
                        </td>
                        <td class="py-3">
                            <div class="flex gap-2">
                                <button type="button" class="rounded-lg border border-gray-300 px-3 py-1 text-xs text-gray-700 hover:bg-gray-50 cursor-pointer">Perbarui</button>
                                <button type="button" class="rounded-lg border border-red-300 px-3 py-1 text-xs text-red-700 hover:bg-red-50 cursor-pointer">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- form tambah bahan (tersembunyi) -->
    <div id="form-tambahBahan" class="hidden mt-4 rounded-xl border border-gray-200 bg-white p-5">
        <h2 class="font-medium text-gray-900">Tambah Bahan Baku</h2>
        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Bahan Baku</label>
                <input type="text"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Jumlah</label>
                <input type="text"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Batas Minimum</label>
                <input type="number"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
        </div>
        <div class="mt-4 flex gap-2">
            <button type="button" class="rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition">Tambah</button>
            <button type="button" data-close="form-tambahBahan" class="close-btn rounded-lg border border-gray-300 px-3 py-2 text-xs text-gray-700 hover:bg-gray-50 transition">Batal</button>
        </div>
    </div>

    <!-- C. PESANAN -->
    <div id="tab-pesanan" class="tab-panel hidden mt-4 rounded-xl border border-gray-200 bg-white p-5">
        <h2 class="font-medium text-gray-900">Pengelolaan pesanan</h2>
        <ul class="mt-3 divide-y divide-gray-200">
            @foreach ($pesanan as $p)
            <li class="py-3">
                <details>
                    <summary class="flex cursor-pointer items-center justify-between gap-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $p['pelanggan'] }} <span class="text-gray-500 font-normal">· {{ $p['kode'] }}</span></p>
                            <p class="text-sm text-gray-600">Tanggal pesanan {{ $p['tanggal'] }}</p>
                            <p class="text-sm text-gray-600">Total Rp {{ number_format($p['total'], 0, ',', '.') }}</p>
                        </div>
                        <span class="rounded-md px-3 py-1 text-xs font-medium {{ $badgeStatus[$p['status']] }}">{{ $p['status'] }}</span>
                    </summary>
                    <div class="mt-3 rounded-lg bg-gray-50 p-3 text-sm">
                        <p class="font-medium text-gray-900">Detail pesanan</p>
                        <ul class="mt-2 space-y-1 text-gray-700">
                            @foreach ($p['detail'] as $d)
                            <li class="flex justify-between">
                                <span>{{ $d[0] }} x{{ $d[1] }}</span>
                                <span>Rp {{ number_format($d[1] * $d[2], 0, ',', '.') }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <div class="mt-3 flex items-center gap-2">
                            <span class="text-gray-600">Ubah status:</span>
                            <button type="button" class="rounded-lg border border-gray-300 px-3 py-1 text-xs text-gray-700 hover:bg-white">Menunggu</button>
                            <button type="button" class="rounded-lg border border-gray-300 px-3 py-1 text-xs text-gray-700 hover:bg-white">Diproses</button>
                            <button type="button" class="rounded-lg border border-gray-300 px-3 py-1 text-xs text-gray-700 hover:bg-white">Selesai</button>
                        </div>
                    </div>
                </details>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- D. KARYAWAN -->
    <div id="tab-karyawan" class="tab-panel hidden mt-4 rounded-xl border border-gray-200 bg-white p-5">
        <div class="flex items-center justify-between">
            <h2 class="font-medium text-gray-900">Pengelolaan karyawan</h2>
            <button type="button" data-target="form-tambahKaryawan" class="rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition cursor-pointer">+ Tambah karyawan</button>
        </div>
        <div class="mt-3 overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-gray-600 border-b border-gray-200">
                    <tr>
                        <th class="py-2 pr-4 font-medium">Nama</th>
                        <th class="py-2 pr-4 font-medium">Jabatan</th>
                        <th class="py-2 pr-4 font-medium">Shift</th>
                        <th class="py-2 pr-4 font-medium">Telepon</th>
                        <th class="py-2 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($karyawan as $k)
                    <tr>
                        <td class="py-3 pr-4 font-medium text-gray-900">{{ $k['nama'] }}</td>
                        <td class="py-3 pr-4 text-gray-700">{{ $k['jabatan'] }}</td>
                        <td class="py-3 pr-4 text-gray-700">{{ $k['shift'] }}</td>
                        <td class="py-3 pr-4 text-gray-700">{{ $k['telepon'] }}</td>
                        <td class="py-3">
                            <div class="flex gap-2">
                                <button type="button" class="rounded-lg border border-gray-300 px-3 py-1 text-xs text-gray-700 hover:bg-gray-50">Ubah</button>
                                <button type="button" class="rounded-lg border border-red-300 px-3 py-1 text-xs text-red-700 hover:bg-red-50">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- form tambah karyawan (tersembunyi) -->
    <div id="form-tambahKaryawan" class="hidden mt-4 rounded-xl border border-gray-200 bg-white p-5">
        <h2 class="font-medium text-gray-900">Tambah Karyawan</h2>
        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Nama Karyawan</label>
                <input type="text"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Jabatan</label>
                <select class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <option>Manajer</option>
                    <option>Barista</option>
                    <option>Kasir</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Shift</label>
                <select class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <option>Pagi</option>
                    <option>Siang</option>
                    <option>Malam</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Telepon</label>
                <input type="number"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
            </div>
        </div>
        <div class="mt-4 flex gap-2">
            <button type="button" class="rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition">Tambah</button>
            <button type="button" data-close="form-tambahKaryawan" class="close-btn rounded-lg border border-gray-300 px-3 py-2 text-xs text-gray-700 hover:bg-gray-50 transition">Batal</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // ganti tab
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');

    function bukaTab(nama) {
        tabPanels.forEach(p => p.classList.toggle('hidden', p.id !== 'tab-' + nama));
        tabBtns.forEach(b => {
            const aktif = b.dataset.tab === nama;
            b.classList.toggle('border-amber-700', aktif);
            b.classList.toggle('text-amber-800', aktif);
            b.classList.toggle('border-transparent', !aktif);
            b.classList.toggle('text-gray-600', !aktif);
        });
    }

    tabBtns.forEach(b => b.addEventListener('click', () => bukaTab(b.dataset.tab)));
    bukaTab('menu');

    // buka/tutup form
    document.querySelectorAll('[data-target]').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById(btn.dataset.target).classList.toggle('hidden');
        });
    });
    document.querySelectorAll('.close-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById(btn.dataset.close).classList.add('hidden');
        });
    });
</script>
@endsection