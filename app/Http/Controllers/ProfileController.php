<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Profil;

class ProfileController extends Controller
{
    /**
     * Display the profile page (read-only).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil profile pertama dari database
        $profil = Profil::all()->first();

        // Jika tidak ada profil, buat profil baru dengan nilai default
        if (!$profil) {
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
        }

        return view('profile', compact('profil'));
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $profil = Profil::all()->first();
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
        $old_profil = Profil::all()->first();

        // Validasi input
        $request->validate([
            'first_name' => 'nullable|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100|unique:profil,email,' . $old_profil->id_profil . ',id_profil',
            'alamat' => 'nullable|string',
            'phoneNumber' => 'nullable|string|max:20',
            'jobStatus' => 'nullable|string|max:50',
            'kota' => 'nullable|string|max:50',
        ]);

        // Gunakan updateOrCreate untuk menangani kedua kasus (edit/input)
        Profil::updateOrCreate(
            ['id_profil' => $old_profil->id_profil], 
            $request->only(['first_name', 'last_name', 'email', 'alamat', 'phoneNumber', 'jobStatus', 'kota'])
        );

        // Redirect kembali ke halaman profil dengan pesan sukses
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
        // Validasi input
        $request->validate([
            'profilpic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profil = Profil::all()->first();

        // Hapus foto lama jika ada
        if ($profil->profilpic) {
            Storage::delete($profil->profilpic);
        }

        // Simpan foto baru
        $path = $request->file('profilpic')->store('profil_pics');
        $profil->profilpic = $path;
        $profil->save();

        // Redirect kembali ke halaman edit profil dengan pesan sukses
        return redirect()->route('editProfile')->with('success', 'Foto profil berhasil diperbarui.');
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

        // Redirect kembali ke halaman edit profil dengan pesan sukses
        return redirect()->route('editProfile')->with('success', 'Foto profil berhasil dihapus.');
    }
}