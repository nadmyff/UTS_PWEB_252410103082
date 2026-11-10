<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // ===== LOGIN =====
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'Noy' && $password === '12345') {
            // Data flow: username dikirim lewat request parameter (?username=...)
            return redirect()->route('dashboard', ['username' => $username]);
        }

        return back()
            ->withErrors(['login' => 'username atau password salah!'])
            ->withInput();
    }

    // ===== DASHBOARD =====
    public function dashboard(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }

        $menuTerlaris = [
            ['nama' => 'Caffe latte', 'terjual' => 42, 'harga' => 28000],
            ['nama' => 'Kopi susu gula aren', 'terjual' => 38, 'harga' => 22000],
            ['nama' => 'Americano', 'terjual' => 25, 'harga' => 20000],
            ['nama' => 'Croissant butter', 'terjual' => 17, 'harga' => 24000],
        ];

        $pesanan = [
            ['nama' => 'Dimas', 'item' => 'Caffe latte x2', 'total' => 56000, 'status' => 'Diproses'],
            ['nama' => 'Sari', 'item' => 'Croissant, americano', 'total' => 44000, 'status' => 'Selesai'],
            ['nama' => 'Rizky', 'item' => 'Kopi susu gula aren', 'total' => 22000, 'status' => 'Selesai'],
        ];

        return view('dashboard', [
            'username'     => $username,
            'totalMenu'    => 24,
            'tersedia'     => 21,
            'habis'        => 3,
            'pendapatan'   => 1240000,
            'menuTerlaris' => $menuTerlaris,
            'pesanan'      => $pesanan,
        ]);
    }

    // ===== PENGELOLAAN =====
    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }

        $menu = [
            ['nama' => 'Americano', 'kategori' => 'Kopi', 'deskripsi' => 'Espresso dengan air panas', 'harga' => 20000, 'tersedia' => true],
            ['nama' => 'Caffe latte', 'kategori' => 'Kopi', 'deskripsi' => 'Espresso dengan susu steamed', 'harga' => 28000, 'tersedia' => true],
            ['nama' => 'Kopi susu gula aren', 'kategori' => 'Kopi', 'deskripsi' => 'Kopi susu dengan gula aren', 'harga' => 22000, 'tersedia' => true],
            ['nama' => 'Matcha latte', 'kategori' => 'Non-kopi', 'deskripsi' => 'Matcha dengan susu', 'harga' => 26000, 'tersedia' => true],
            ['nama' => 'Croissant butter', 'kategori' => 'Makanan', 'deskripsi' => 'Croissant panggang dengan butter', 'harga' => 24000, 'tersedia' => false],
            ['nama' => 'Roti bakar coklat', 'kategori' => 'Makanan', 'deskripsi' => 'Roti bakar isi coklat', 'harga' => 18000, 'tersedia' => false],
        ];

        $stok = collect([
            ['nama' => 'Biji kopi', 'jumlah' => 8, 'satuan' => 'kg', 'minimum' => 3],
            ['nama' => 'Susu', 'jumlah' => 4, 'satuan' => 'liter', 'minimum' => 10],
            ['nama' => 'Gula', 'jumlah' => 12, 'satuan' => 'kg', 'minimum' => 5],
            ['nama' => 'Bubuk matcha', 'jumlah' => 1, 'satuan' => 'kg', 'minimum' => 2],
            ['nama' => 'Cup', 'jumlah' => 150, 'satuan' => 'pcs', 'minimum' => 100],
        ])->map(function ($s) {
            $s['menipis'] = $s['jumlah'] <= $s['minimum'];
            return $s;
        })->all();

        $pesanan = collect([
            ['kode' => 'ORD-001', 'pelanggan' => 'Dimas', 'tanggal' => '22-07-2026', 'status' => 'Diproses', 'detail' => [['Caffe latte', 2, 28000]]],
            ['kode' => 'ORD-002', 'pelanggan' => 'Sari', 'tanggal' => '22-07-2026', 'status' => 'Selesai', 'detail' => [['Croissant butter', 1, 24000], ['Americano', 1, 20000]]],
            ['kode' => 'ORD-003', 'pelanggan' => 'Rizky', 'tanggal' => '22-07-2026', 'status' => 'Selesai', 'detail' => [['Kopi susu gula aren', 1, 22000]]],
            ['kode' => 'ORD-004', 'pelanggan' => 'Nina', 'tanggal' => '22-07-2026', 'status' => 'Menunggu', 'detail' => [['Matcha latte', 1, 26000]]],
        ])->map(function ($p) {
            $p['total'] = collect($p['detail'])->sum(fn ($d) => $d[1] * $d[2]);
            return $p;
        })->all();

        $karyawan = [
            ['nama' => 'Farah', 'jabatan' => 'Manajer', 'shift' => 'Pagi', 'telepon' => '0812-3456-7890'],
            ['nama' => 'Bima', 'jabatan' => 'Barista', 'shift' => 'Pagi', 'telepon' => '0813-1111-2222'],
            ['nama' => 'Laras', 'jabatan' => 'Barista', 'shift' => 'Siang', 'telepon' => '0857-3333-4444'],
            ['nama' => 'Anton', 'jabatan' => 'Kasir', 'shift' => 'Siang', 'telepon' => '0821-5555-6666'],
        ];

        $badgeStatus = [
            'Menunggu' => 'bg-gray-200 text-gray-800',
            'Diproses' => 'bg-amber-200 text-amber-900',
            'Selesai'  => 'bg-green-100 text-green-800',
        ];

        return view('pengelolaan', [
            'username'     => $username,
            'menu'         => $menu,
            'stok'         => $stok,
            'pesanan'      => $pesanan,
            'karyawan'     => $karyawan,
            'badgeStatus'  => $badgeStatus,
            'stokMenipis'  => collect($stok)->where('menipis', true)->count(),
            'pesananAktif' => collect($pesanan)->whereIn('status', ['Menunggu', 'Diproses'])->count(),
        ]);
    }

    // ===== PROFILE =====
    public function profile(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }

        $user = [
            'nama'    => 'Nada MaylaFaizah Adhim',
            'telepon' => '252410103082',
            'jabatan' => 'Owner',
            'dibuat'  => '9 November 2026',
        ];

        $kedai = [
            'nama'    => 'noiffee',
            'alamat'  => 'Jl. Kalimantan No. 10, Jember, Jawa Timur',
            'telepon' => '0812-3456-789',
        ];

        return view('profile', [
            'username' => $username,
            'user'     => $user,
            'kedai'    => $kedai,
        ]);
    }
}