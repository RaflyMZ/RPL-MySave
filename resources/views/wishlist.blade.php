<!-- resources/views/wishlist.blade.php -->
@extends('layout.homelayout')
@section('content')
    <section class="p-6">
        <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md p-6">
            <!-- Daftar Wishlist -->
            <div class="mb-8">
                <h2 class="text-xl font-bold mb-4">Daftar Wishlist</h2>
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('wishlist.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Wishlist</a>
                </div>
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border p-3">No Urut</th>
                            <th class="border p-3">Jumlah</th>
                            <th class="border p-3">Tanggal</th>
                            <th class="border p-3">Nama</th>
                            <th class="border p-3">Alasan</th>
                            <th class="border p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlists as $index => $wishlist)
                            <tr>
                                <td class="border p-3">{{ $index + 1 }}</td>
                                <td class="border p-3 rp">{{ $wishlist->jumlah }}</td>
                                <td class="border p-3">{{ $wishlist->tanggal }}</td>
                                <td class="border p-3">{{ $wishlist->nama }}</td>
                                <td class="border p-3">{{ $wishlist->alasan }}</td>
                                <td class="border p-3 flex space-x-2 justify-between">
                                    <a href="{{ route('wishlist.edit', $wishlist->id) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                                    <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus wishlist ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Hutang Minggu Ini -->
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <h3 class="text-lg font-bold mb-4">Hutang Minggu Ini</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="hutang_1">
                                Rp 1
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="hutang_1" type="text" placeholder="Rp.">
                        </div>
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="hutang_2">
                                Rp 2
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="hutang_2" type="text" placeholder="Rp.">
                        </div>
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="hutang_3">
                                Rp 3
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="hutang_3" type="text" placeholder="Rp.">
                        </div>
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="hutang_4">
                                Rp 4
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="hutang_4" type="text" placeholder="Rp.">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-lg font-bold mb-4">Perbandingan</h3>
                    <div class="flex justify-between items-center mb-4">
                        <canvas id="perbandinganChart" width="200" height="200"></canvas>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span>Pengeluaran</span>
                        <span>Pendapatan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('perbandinganChart').getContext('2d');
        const perbandinganChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pengeluaran', 'Pendapatan'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
