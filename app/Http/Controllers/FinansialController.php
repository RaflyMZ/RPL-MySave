<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use App\Models\Finansial; // Pastikan model Finansial sudah dibuat
use App\Models\Target;
use Carbon\Carbon;

class FinansialController extends Controller
{
    /**
     * Display the finansial page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $finansials = Finansial::all(); // Mengambil semua data finansial
        $target = Target::all()->where('reset', false)->first(); // Mengambil data target aktif
        $recommendation = $this->getRecommendation(); // Mendapatkan rekomendasi

        return view('finansial', compact('finansials', 'target', 'recommendation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function tambah()
    {
        return view('tambahFinansial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'sumber' => 'required|string|max:255',
            'tanggal_pemasukan' => 'required|date',
            'penghasilan' => 'required|numeric',
        ]);

        // Simpan data ke database
        Finansial::create($validatedData);

        return redirect()->route('finansial')->with('success', 'Data finansial berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $finansial = Finansial::findOrFail($id); // Cari data berdasarkan ID
        return view('editFinansial', compact('finansial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'sumber' => 'required|string|max:255',
            'tanggal_pemasukan' => 'required|date',
            'penghasilan' => 'required|numeric',
        ]);

        // Cari data berdasarkan ID dan update
        $finansial = Finansial::findOrFail($id);
        $finansial->update($validatedData);

        return redirect()->route('finansial')->with('success', 'Data finansial berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Cari data berdasarkan ID dan hapus
        $finansial = Finansial::findOrFail($id);
        $finansial->delete();

        return redirect()->route('finansial')->with('success', 'Data finansial berhasil dihapus.');
    }

    public function setTarget(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal_target' => 'required|date',
            'nominal_target' => 'required|numeric',
        ]);

        $existingTarget = Target::all()->where('reset', false)->first();
        if ($existingTarget) {
            return redirect()->route('finansial')->withErrors(['msg' => 'Target masih ada, silahkan reset terlebih dahulu.']);
        }

        // Simpan data target baru
        Target::create([
            'tanggal_target' => $validatedData['tanggal_target'],
            'target_tabungan' => $validatedData['nominal_target'],
            'reset' => false,
        ]);

        return redirect()->route('finansial')->with('success', 'Target keuangan berhasil ditetapkan.');
    }

    public function resetTarget()
    {
        Target::query()->update(['reset' => true]);
        return redirect()->route('finansial')->with('success', 'Data target berhasil direset.');
    }

    private function getRecommendation()
    {
        $target = Target::all()->where('reset', false)->first();

        if ($target == null) {
            $totalPemasukan = Finansial::sum('penghasilan');
            $totalPengeluaran = Expenditure::sum('nominal');
            $financeSekarang = $totalPemasukan - $totalPengeluaran;

            return (object) [
                'recommendation' => 'Belum ada target yang ditentukan.',
                'totalPemasukan' => $totalPemasukan,
                'totalPengeluaran' => $totalPengeluaran,
                'financeSekarang' => $financeSekarang,
                'nominal_target' => '0',
                'rasio' => 0,
            ];
        }

        $tanggalTargetTerbuat = Carbon::parse($target->created_at)->startOfDay();
        $tanggalTarget = Carbon::parse($target->tanggal_target)->endOfDay();
        $tanggalSekarang = now();

        $totalPemasukan = Finansial::whereBetween('tanggal_pemasukan', [$tanggalTargetTerbuat, $tanggalTarget])->sum('penghasilan');
        $totalPengeluaran = Expenditure::whereBetween('tenggat_pengeluaran', [$tanggalTargetTerbuat, $tanggalTarget])->sum('nominal');
        $financeSekarang = $totalPemasukan - $totalPengeluaran;
        $nominal_target = $target->target_tabungan;

        // Perhitungan rasio berdasarkan seberapa dekat dengan target tabungan
        $rasio = $nominal_target != 0 ? $financeSekarang / $nominal_target : 1;
        $recommendation = $this->getRecommendationMessage($rasio);

        // Hitung persentase waktu yang telah berlalu
        $totalHari = $tanggalTarget->diffInDays($tanggalTargetTerbuat);
        $hariTersisa = $tanggalTarget->diffInDays($tanggalSekarang, false);
        $persentaseWaktu = $totalHari != 0 ? (($totalHari - $hariTersisa) / $totalHari) * 100 : 0;

        // Tambahkan pesan rekomendasi berdasarkan persentase waktu
        if ($persentaseWaktu > 75 && $rasio < 1) {
            $recommendation .= ' Waktu hampir habis, segera lakukan tindakan untuk mencapai target.';
        } elseif ($persentaseWaktu > 50 && $rasio < 1) {
            $recommendation .= ' Waktu sudah lebih dari setengah, evaluasi kembali keuangan Anda.';
        } else {
            $recommendation .= ' Anda masih memiliki waktu yang cukup, pertahankan kondisi keuangan Anda.';
        }

        return (object) [
            'tanggalTarget' => $tanggalTarget,
            'tanggalTargetTerbuat' => $tanggalTargetTerbuat,
            'tanggalSekarang' => $tanggalSekarang,
            'recommendation' => $recommendation,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'financeSekarang' => $financeSekarang,
            'nominal_target' => $nominal_target,
            'rasio' => $rasio,
        ];
    }

    private function getRecommendationMessage($rasio)
    {
        $messages = [
            '0.50' => 'Kondisi keuangan sangat kritis! Kurangi pengeluaran dan cari sumber pemasukan tambahan.',
            '0.75' => 'Kondisi keuangan perlu perbaikan. Evaluasi pengeluaran dan prioritaskan kebutuhan utama.',
            '0.91' => 'Hampir seimbang, tetapi masih perlu perbaikan. Kurangi pengeluaran yang tidak perlu.',
            '1.00' => 'Kondisi keuangan seimbang. Pertahankan dan cari cara untuk meningkatkan pemasukan.',
            '1.20' => 'Sudah bagus! Pertahankan kebiasaan menabung dan investasikan kelebihan dana.',
            '1.50' => 'Sangat baik! Lanjutkan kebiasaan menabung dan pertimbangkan investasi jangka panjang.',
            '2.00' => 'Luar biasa! Keuangan Anda sangat sehat. Pertimbangkan diversifikasi investasi.',
        ];

        // Cari pesan rekomendasi yang sesuai berdasarkan rasio
        foreach ($messages as $threshold => $message) {
            if ($rasio <= (float) $threshold) {
            return $message;
            }
        }

        if ($rasio < 0.50) {
            return 'Kondisi keuangan sangat kritis! Kurangi pengeluaran dan cari sumber pemasukan tambahan.';
        }

        if ($rasio > 2.00) {
            return 'Keuangan Anda sangat sehat. Pertimbangkan diversifikasi investasi dan terus pertahankan kebiasaan baik Anda.';
        }

        return 'Rasio keuangan tidak valid.'; // Fallback jika rasio di luar rentang yang ditentukan
    }
}
