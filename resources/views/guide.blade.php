<!-- resources/views/guide.blade.php -->
@extends('layout.homelayout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">
        <!-- Header Section -->
        <div class="bg-indigo-600 text-white py-8 px-6 rounded-t-3xl">
            <h1 class="text-3xl font-bold">Panduan Mengatur Keuangan</h1>
            <p class="mt-2 text-lg">Pelajari cara mengelola keuangan Anda dengan bijak dan efektif.</p>
        </div>

        <!-- Content Section -->
        <div class="p-8 space-y-6">
            <!-- Card 1: Panduan Penggunaan Aplikasi -->
            <div class="bg-gray-50 p-6 rounded-2xl shadow-md">
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Panduan Penggunaan Aplikasi</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li><strong>Langkah 1:</strong> Masuk ke akun Anda menggunakan email dan kata sandi.</li>
                    <li><strong>Langkah 2:</strong> Isi data keuangan Anda secara lengkap dan akurat.</li>
                    <li><strong>Langkah 3:</strong> Simpan perubahan dan pantau perkembangan keuangan Anda.</li>
                </ul>
            </div>

            <!-- Card 2: Tips Mengatur Keuangan -->
            <div class="bg-gray-50 p-6 rounded-2xl shadow-md">
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Tips & Trik Mengatur Keuangan</h2>
                <p class="text-gray-700 mb-4">
                    Berikut adalah beberapa tips untuk membantu Anda mengatur keuangan dengan baik:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li><strong>Buat Anggaran Bulanan:</strong> Tetapkan batas pengeluaran bulanan untuk setiap kategori (misalnya makanan, transportasi, hiburan).</li>
                    <li><strong>Prioritaskan Tabungan:</strong> Selalu sisihkan sebagian pendapatan Anda untuk tabungan atau investasi.</li>
                    <li><strong>Kurangi Utang:</strong> Hindari utang yang tidak perlu dan bayar utang tepat waktu.</li>
                    <li><strong>Gunakan Aplikasi Keuangan:</strong> Manfaatkan aplikasi ini untuk melacak pengeluaran dan pendapatan Anda secara real-time.</li>
                </ul>
            </div>

            <!-- Card 3: Prinsip Keuangan Sehat -->
            <div class="bg-gray-50 p-6 rounded-2xl shadow-md">
                <h2 class="text-xl font-semibold text-indigo-600 mb-4">Prinsip Keuangan Sehat</h2>
                <p class="text-gray-700 mb-4">
                    Untuk mencapai keuangan yang sehat, ikuti prinsip berikut:
                </p>
                <ol class="list-decimal list-inside text-gray-700 space-y-2">
                    <li><strong>Pendapatan > Pengeluaran:</strong> Pastikan penghasilan Anda lebih besar daripada pengeluaran.</li>
                    <li><strong>Diversifikasi Investasi:</strong> Jangan taruh semua uang Anda di satu tempat; diversifikasi portofolio investasi Anda.</li>
                    <li><strong>Emergency Fund:</strong> Siapkan dana darurat minimal 3-6 bulan biaya hidup.</li>
                    <li><strong>Evaluasi Berkala:</strong> Tinjau kondisi keuangan Anda setiap bulan atau setiap kuartal.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
