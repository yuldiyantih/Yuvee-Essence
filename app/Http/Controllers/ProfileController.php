<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil semua data profile untuk ditampilkan di halaman yang sama
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    public function store(Request $request)
    {
        // Simpan data profil baru (TAMBAH PROFIL)
        $validated = $request->validate([
            'nama'     => 'required|string|max:100',
            'whatsapp' => 'required|string|max:20',
            'email'    => 'required|email',
            'alamat'   => 'required|string|max:255',
        ]);

        Profile::create($validated);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        // Update data profil (UBAH PROFIL)
        $validated = $request->validate([
            'id'       => 'required|exists:profiles,id',
            'nama'     => 'required|string|max:100',
            'whatsapp' => 'required|string|max:20',
            'email'    => 'required|email',
            'alamat'   => 'required|string|max:255',
        ]);

        $profile = Profile::find($request->id);
        $profile->update($validated);

        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function massDelete(Request $request)
    {
        // Hapus data yang dicentang
        if ($request->selected_profiles) {
            Profile::whereIn('id', $request->selected_profiles)->delete();
        }

        return back()->with('success', 'Data terpilih berhasil dihapus.');
    }
}
