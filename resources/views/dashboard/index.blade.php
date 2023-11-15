@if (Auth::check())
    @extends('layout/index')
    @section('title', 'Dashboard')
    @section('content')
        <h2 class="text-xl font-semibold">Selamat Datang {{ Auth::user()->nama }} di Halaman Dashboard</h2>

        <button class="bg-red-600 p-2.5 rounded text-white font-medium uppercase text-sm mt-3">
            <a href="/logout/">logout</a>
        </button>
        <button class="bg-blue-600 p-2.5 rounded text-white font-medium uppercase text-sm mt-3">
            <a href="/data">Data</a>
        </button>
    @endsection
@endif
