@extends('layout.homelayout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-white-400">
    <div class="bg-gray-100 p-8 rounded-2xl shadow-md w-96">
        <h1 class="text-center text-xl font-semibold text-white-600 border-b pb-2 mb-6">Finansial</h1>

        <form action="{{ route('finansial.store') }}" method="POST">
            @csrf
                        
            <div class="mb-4">
                <label for="tanggal_pemasukan" class="block text-white-700 text-sm mb-1">Tanggal</label>
                <input type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
            </div>
            
            <div class="mb-4">
                <label for="penghasilan" class="block text-white-700 text-sm mb-1">Nominal</label>
                <input type="number" name="penghasilan" id="penghasilan" class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
            </div>
            
            <div class="mb-4">
                <label for="sumber" class="block text-white-700 text-sm mb-1">Sumber</label>
                <textarea name="sumber" id="sumber" rows="3" class="w-full px-3 py-2 border rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400" required></textarea>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-900">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
