<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist; // Pastikan model ini sudah ada atau buat model baru jika belum ada

class WishlistController extends Controller
{
    public function index()
        {
            $wishlists = Wishlist::all();
            return view('wishlist', compact('wishlists'));
        }

        public function create()
        {
            return view('createWishlist');
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'jumlah' => 'required|numeric',
                'tanggal' => 'required|date',
                'nama' => 'required|string',
                'alasan' => 'nullable|string',
            ]);

            Wishlist::create($validatedData);

            return redirect()->route('wishlist')->with('success', 'Wishlist berhasil ditambahkan.');
        }

        public function edit($id)
        {
            $wishlist = Wishlist::findOrFail($id); // Cari wishlist berdasarkan ID
            return view('editWishlist', compact('wishlist'));
        }

        public function update(Request $request, $id)
        {
            $wishlist = Wishlist::findOrFail($id); // Cari wishlist berdasarkan ID

            $validatedData = $request->validate([
                'jumlah' => 'required|numeric',
                'tanggal' => 'required|date',
                'nama' => 'required|string',
                'alasan' => 'nullable|string',
            ]);

            $wishlist->update($validatedData);

            return redirect()->route('wishlist')->with('success', 'Wishlist berhasil diperbarui.');
        }

        public function destroy(Wishlist $wishlist, $id)
        {
            $wishlist = Wishlist::findOrFail($id); // Cari wishlist berdasarkan ID
            $wishlist->delete();

            return redirect()->route('wishlist')->with('success', 'Wishlist berhasil dihapus.');
        }
}