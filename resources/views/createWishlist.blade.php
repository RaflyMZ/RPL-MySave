@extends('layout.homelayout')
@section('content')
<section class="p-6">
    <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Wishlist</h2>
        <form action="{{ route('wishlist.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="jumlah">
                    Jumlah
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="jumlah" type="number" name="jumlah" required>
            </div>
            <div class="mb-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="tanggal">
                    Tanggal
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tanggal" type="date" name="tanggal" required>
            </div>
            <div class="mb-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nama">
                    Nama
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nama" type="text" name="nama" required>
            </div>
            <div class="mb-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="alasan">
                    Alasan
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="alasan" name="alasan"></textarea>
            </div>
            <button class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</section>
@endsection