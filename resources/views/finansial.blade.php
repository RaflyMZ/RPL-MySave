<!-- resources/views/finansial.blade.php -->
@extends('layout.homelayout')

@section('content')
<section class="p-6">
    <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md p-6">
        <!-- Data Finansial -->
        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Data Finansial</h2>
            <div class="flex justify-between items-center mb-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded">Wishlist</button>
                <button class="bg-indigo-500 text-white px-4 py-2 rounded">Tambah Finansial</button>
            </div>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border p-3">ID Finansial</th>
                        <th class="border p-3">Tanggal</th>
                        <th class="border p-3">Jumlah</th>
                        <th class="border p-3">Sumber</th>
                        <th class="border p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border p-3"></td>
                        <td class="border p-3"></td>
                        <td class="border p-3"></td>
                        <td class="border p-3"></td>
                        <td class="border p-3 flex space-x-2 justify-between">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded">Detail</button>
                            <button class="bg-orange-500 text-white px-3 py-1 rounded">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                        </td>
                    </tr>
                    <!-- Tambahkan baris tabel lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>

        <!-- Target Bulanan -->
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <div class="w-full md:w-1/2">
                <h3 class="text-lg font-bold mb-4">Target Bulanan</h3>
                <div class="flex justify-between items-center mb-4">
                    <button class="bg-indigo-500 text-white px-4 py-2 rounded">Tambah Target</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Reset</button>
                </div>
                <form>
                    <div class="mb-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="target_tabungan">
                            Target Tabungan
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="target_tabungan" type="text" placeholder="Rp.">
                    </div>
                    <div class="mb-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="finansial_saat_ini">
                            Finansial Saat ini
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="finansial_saat_ini" type="text" placeholder="Rp.">
                    </div>
                    <div class="mb-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="total_pengeluaran">
                            Total Pengeluaran
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="total_pengeluaran" type="text" placeholder="Rp.">
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/2">
                <h3 class="text-lg font-bold mb-4">Rekomendasi</h3>
                <div class="flex justify-between items-center mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="target_tabungan_rek">
                        Target Tabungan
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="target_tabungan_rek" type="text" placeholder="Rp.">
                </div>
                <div class="mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="saran">
                        Saran
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="saran" rows="4" placeholder="Untuk pengeluaran disarankan kurangi pembelian lainnya yang tidak perlu"></textarea>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
