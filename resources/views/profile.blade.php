@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container pt-27 px-4 pb-8">
    <div class="flex items-center justify-between">
        <div>
            <p class="font-medium text-lg font-sans">Profil saya</p>
            <p class="text-sm text-gray-700">Informasi akun dan kedai.</p>
        </div>

        <button type="button" data-target="form-edit" class="toggle-btn flex items-center gap-2 rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition cursor-pointer">
            <img src="{{ asset('images/edit.svg') }}" class="w-4 h-4 brightness-0 invert" alt="Edit">
            Edit
        </button>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4">
        <div class="space-y-4">

            <!-- informasi pribadi -->
            <div class="rounded-xl border border-gray-200 bg-white p-5">
                <h2 class="font-medium text-gray-900">Informasi pribadi</h2>
                <dl class="mt-3 divide-y divide-gray-200 text-sm">
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Nama lengkap</dt>
                        <dd class="text-gray-900">{{ $user['nama'] }}</dd>
                    </div>
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Username</dt>
                        <dd class="text-gray-900">{{ $username }}</dd>
                    </div>
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Nomor telepon</dt>
                        <dd class="text-gray-900">{{ $user['telepon'] }}</dd>
                    </div>
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Jabatan</dt>
                        <dd class="text-gray-900">{{ $user['jabatan'] }}</dd>
                    </div>
                </dl>
            </div>

            <!-- form edit profil (tersembunyi) -->
            <div id="form-edit" class="hidden rounded-xl border border-gray-200 bg-white p-5">
                <h2 class="font-medium text-gray-900">Edit profil</h2>
                <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nama lengkap</label>
                        <input type="text" value="{{ $user['nama'] }}"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Username</label>
                        <input type="text" value="{{ $username }}"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nomor telepon</label>
                        <input type="text" value="{{ $user['telepon'] }}"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                </div>
                <div class="mt-4 flex gap-2">
                    <button type="button" class="rounded-lg bg-coffee px-3 py-2 text-xs text-white hover:bg-coffee-hover transition">Simpan</button>
                    <button type="button" data-close="form-edit" class="close-btn rounded-lg border border-gray-300 px-3 py-2 text-xs text-gray-700 hover:bg-gray-50 transition">Batal</button>
                </div>
            </div>

            <!-- informasi akun -->
            <div class="rounded-xl border border-gray-200 bg-white p-5">
                <h2 class="font-medium text-gray-900">Informasi akun</h2>
                <dl class="mt-3 divide-y divide-gray-200 text-sm">
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Akun dibuat pada</dt>
                        <dd class="text-gray-900">{{ $user['dibuat'] }}</dd>
                    </div>
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Status akun</dt>
                        <dd><span class="rounded-md bg-green-100 px-3 py-1 text-xs font-medium text-green-800">Aktif</span></dd>
                    </div>
                </dl>
            </div>

            <!-- informasi coffee shop -->
            <div class="rounded-xl border border-gray-200 bg-white p-5">
                <h2 class="font-medium text-gray-900">Informasi coffee shop</h2>
                <dl class="mt-3 divide-y divide-gray-200 text-sm">
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Nama kedai</dt>
                        <dd class="text-gray-900">{{ $kedai['nama'] }}</dd>
                    </div>
                    <div class="flex justify-between gap-6 py-3">
                        <dt class="text-gray-600">Alamat</dt>
                        <dd class="text-gray-900 text-right">{{ $kedai['alamat'] }}</dd>
                    </div>
                    <div class="flex justify-between py-3">
                        <dt class="text-gray-600">Nomor telepon</dt>
                        <dd class="text-gray-900">{{ $kedai['telepon'] }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // buka/tutup form
    document.querySelectorAll('.toggle-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            ['form-edit', 'form-password'].forEach(id => {
                document.getElementById(id).classList.toggle('hidden', id !== btn.dataset.target);
            });
        });
    });
    document.querySelectorAll('.close-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById(btn.dataset.close).classList.add('hidden');
        });
    });
</script>
@endsection