<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finansial; // Pastikan model Finansial sudah dibuat

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
        return view('finansial', compact('finansials'));
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
}