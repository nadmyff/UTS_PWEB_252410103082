@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container pt-27 px-4 pb-8">
    <p class="font-medium text-lg font-sans">Halo, {{ $username }}!</p>
    <p class="text-sm text-gray-700">Ringkasan kedai hari ini.</p>

    <!-- ringkasan -->
    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-3">
        <div class="rounded-xl bg-gray-50 p-4">
            <div class="flex items-center gap-1.5 text-sm text-gray-600">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" d="M9 6h11M9 12h11M9 18h11M4 6h.01M4 12h.01M4 18h.01" />
                </svg>
                Total menu
            </div>
            <p class="mt-1 text-3xl font-medium text-gray-900">{{ $totalMenu }}</p>
        </div>

        <div class="rounded-xl bg-gray-50 p-4">
            <div class="flex items-center gap-1.5 text-sm text-gray-600">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7" />
                </svg>
                Tersedia
            </div>
            <p class="mt-1 text-3xl font-medium text-green-700">{{ $tersedia }}</p>
        </div>

        <div class="rounded-xl bg-gray-50 p-4">
            <div class="flex items-center gap-1.5 text-sm text-gray-600">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6 6 18" />
                </svg>
                Habis
            </div>
            <p class="mt-1 text-3xl font-medium text-red-800">{{ $habis }}</p>
        </div>

        <div class="rounded-xl bg-gray-50 p-4">
            <div class="flex items-center gap-1.5 text-sm text-gray-600">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18v10H3zM12 12h.01" />
                </svg>
                Pendapatan
            </div>
            <p class="mt-1 text-3xl font-medium text-gray-900">
                Rp {{ number_format($pendapatan / 1000000, 2, ',', '.') }} jt
            </p>
        </div>
    </div>
    <!-- end ringkasan -->

    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- menu terlaris -->
        <div class="rounded-xl border border-gray-200 bg-white p-5">
            <h2 class="font-medium text-gray-900">Menu terlaris</h2>
            <ul class="mt-3 divide-y divide-gray-200">
                @foreach ($menuTerlaris as $menu)
                <li class="flex items-center justify-between py-3">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $menu['nama'] }}</p>
                        <p class="text-sm text-gray-600">{{ $menu['terjual'] }} terjual</p>
                    </div>
                    <p class="text-sm text-gray-900">Rp {{ number_format($menu['harga'], 0, ',', '.') }}</p>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- end menu terlaris -->

        <!-- pesanan hari ini -->
        <div class="rounded-xl border border-gray-200 bg-white p-5">
            <h2 class="font-medium text-gray-900">Pesanan hari ini</h2>
            <ul class="mt-3 divide-y divide-gray-200">
                @foreach ($pesanan as $p)
                <li class="flex items-center justify-between py-3">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $p['nama'] }}</p>
                        <p class="text-sm text-gray-600">
                            {{ $p['item'] }} · Rp {{ number_format($p['total'], 0, ',', '.') }}
                        </p>
                    </div>
                    <span class="rounded-md px-3 py-1 text-xs font-medium
                        {{ $p['status'] === 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-amber-200 text-amber-900' }}">
                        {{ $p['status'] }}
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- end pesanan hari ini -->
    </div>
</div>
@endsection