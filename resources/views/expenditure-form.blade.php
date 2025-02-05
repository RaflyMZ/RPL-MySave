<!-- resources/views/finansial.blade.php -->
@extends('layout.homelayout')

@section('content')
    <section class="p-6">
        <div class="flex items-center justify-center min-h-screen bg-white-400">
            <div class="bg-gray-100 p-8 rounded-2xl shadow-md w-96">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        @if (request()->get('page') == 'edit')
                            <h2 class="text-xl font-bold mb-4">Ubah Pengeluaran</h2>
                        @elseif (request()->get('page') == 'detail')
                            <h2 class="text-xl font-bold mb-4">Detil Pengeluaran</h2>
                        @elseif (request()->get('page') == 'delete')
                            <h2 class="text-xl font-bold mb-4">Hapus Pengeluaran</h2>
                        @else
                            <h2 class="text-xl font-bold mb-4">Tambah Pengeluaran</h2>
                        @endif
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (request()->get('page') == 'edit')
                    <form action="{{ route('expenditure.form.edit', ['id' => $expenditure->id_pengeluaran]) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="date" id="date"
                                value="{{ $expenditure->tenggat_pengeluaran }}"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengeluaran</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                                value="{{ $expenditure->nama_pengeluaran }}">
                        </div>
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700">Nominal</label>
                            <input type="number" name="amount" id="amount"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                                value="{{ $expenditure->nominal }}">
                        </div>
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('expenditure') }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                @elseif (request()->get('page') == 'detail')
                    <form class="space-y-4">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="date" id="date"
                                value="{{ $expenditure->tenggat_pengeluaran }}"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400" readonly>
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengeluaran</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                                value="{{ $expenditure->nama_pengeluaran }}" readonly>
                        </div>
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700">Nominal</label>
                            <input type="number" name="amount" id="amount"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                                value="{{ $expenditure->nominal }}" readonly>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('expenditure') }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                        </div>
                    </form>
                @elseif (request()->get('page') == 'delete')
                    <form action="{{ route('expenditure.form.delete', ['id' => $expenditure->id_pengeluaran]) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <p class="text-sm text-gray-700">Apakah Anda yakin ingin menghapus pengeluaran dengan nama {{ $expenditure->nama_pengeluaran }} di tanggal {{ $expenditure->tenggat_pengeluaran }}?</p>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('expenditure') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('expenditure.form.add') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengeluaran</label>
                            <input type="text" name="name" id="name"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700">Nominal</label>
                            <input type="number" name="amount" id="amount"
                                class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('expenditure') }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection
