<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Profil;

class ProfileController extends Controller
{
    /**
     * Display the profile page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil ID profil dari session
        $id_profil = Session::get('id_profil');

        // Jika tidak ada ID profil di session, buat profil baru dengan nilai default
        if (!$id_profil) {
            $profil = Profil::create([
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'alamat' => '',
                'phoneNumber' => '',
                'jobStatus' => '',
                'kota' => '',
                'profilpic' => null,
            ]);
            Session::put('id_profil', $profil->id_profil);
            $id_profil = $profil->id_profil;
        }

        // Cari profil berdasarkan ID dari session
        $profil = Profil::findOrFail($id_profil);

        return view('profile', compact('profil'));
    }

    /**
     * Show the form for editing or creating the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Ambil ID profil dari session
        $id_profil = Session::get('id_profil');

        // Cari profil berdasarkan ID dari session
        $profil = Profil::findOrFail($id_profil);

        return view('editProfile', compact('profil'));
    }

    /**
     * Update or create the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Ambil ID profil dari session
        $id_profil = Session::get('id_profil');

        // Validasi input
        $request->validate([
            'first_name' => 'nullable|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100|unique:profil,email,' . $id_profil . ',id_profil',
            'alamat' => 'nullable|string',
            'phoneNumber' => 'nullable|string|max:20',
            'jobStatus' => 'nullable|string|max:50',
            'kota' => 'nullable|string|max:50',
        ]);

        // Gunakan updateOrCreate untuk menangani kedua kasus (edit/input)
        $profil = Profil::updateOrCreate(
            ['id_profil' => $id_profil], 
            $request->only(['first_name', 'last_name', 'email', 'alamat', 'phoneNumber', 'jobStatus', 'kota'])
        );

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Upload a new profile picture.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadPhoto(Request $request)
    {
        // Ambil ID profil dari session
        $id_profil = Session::get('id_profil');

        // Validasi input
        $request->validate([
            'profilpic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profil = Profil::findOrFail($id_profil);

        // Hapus foto lama jika ada
        if ($profil->profilpic) {
            Storage::delete($profil->profilpic);
        }

        // Simpan foto baru
        $path = $request->file('profilpic')->store('profil_pics');
        $profil->profilpic = $path;
        $profil->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }

    /**
     * Delete the user's profile picture.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePhoto()
    {
        // Ambil ID profil dari session
        $id_profil = Session::get('id_profil');

        $profil = Profil::findOrFail($id_profil);

        if ($profil && $profil->profilpic) {
            Storage::delete($profil->profilpic);
            $profil->update(['profilpic' => null]);
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
}