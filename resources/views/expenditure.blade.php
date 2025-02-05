<!-- resources/views/finansial.blade.php -->
@extends('layout.homelayout')

@section('content')
    <section class="p-6">
        <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md p-6">
            <!-- Data Finansial -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-xl font-bold mb-4">Data Pengeluaran</h2>
                    </div>
                    <a href="{{ route('expenditure.form') }}"
                        class="bg-indigo-500 text-white px-4 py-2 rounded float-right">Tambah</a>
                </div>

                @if (session('message'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border p-3">ID Pengeluaran</th>
                            <th class="border p-3">Tanggal</th>
                            <th class="border p-3">Nama Pengeluaran</th>
                            <th class="border p-3">Nominal</th>
                            <th class="border p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenditures as $expenditure)
                        <tr>
                            <td class="border p-3">{{ $expenditure->id_pengeluaran }}</td>
                            <td class="border p-3">{{ $expenditure->tenggat_pengeluaran }}</td>
                            <td class="border p-3">{{ $expenditure->nama_pengeluaran }}</td>
                            <td class="border p-3 rp">{{ $expenditure->nominal }}</td>
                            <td class="border p-3 flex space-x-2 justify-between">
                                <a href="{{ route('expenditure.form', ['page' => 'detail', 'id' => $expenditure->id_pengeluaran]) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Detail</a>
                                <a href="{{ route('expenditure.form', ['page' => 'edit', 'id' => $expenditure->id_pengeluaran]) }}" class="bg-orange-500 text-white px-3 py-1 rounded">Edit</a>
                                <a href="{{ route('expenditure.form', ['page' => 'delete', 'id' => $expenditure->id_pengeluaran]) }}" class="bg-red-500 text-white px-3 py-1 rounded">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Tambahkan baris tabel lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        // javascript untuk convert semua class ".rp" menjadi format rupiah
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 2
        });

        document.querySelectorAll('.rp').forEach(element => {
            element.textContent = formatter.format(element.textContent);
        });
    </script>
@endsection
