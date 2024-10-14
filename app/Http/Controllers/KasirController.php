<?php

namespace App\Http\Controllers;

use App\Models\kasir; // Pastikan ini sesuai dengan nama model Anda
use Illuminate\Http\Request;

class kasirController extends Controller
{

    public function deleteKasir(kasir $kasir)
    {
        $kasir->delete(); // Hapus data kasir
        return redirect('/about')->with('success', 'Kasir berhasil dihapus!');
    }

    public function actuallyUpdateKasir(Kasir $kasir, Request $request)
    {
        $incomingFields = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15', // Menggunakan string untuk nomor telepon
            'alamat' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
        ]);

        // Update data kasir
        $kasir->update($incomingFields);

        // Redirect setelah pembaruan
        return redirect('/about')->with('success', 'Kasir berhasil diperbarui!');
    }

    public function showEditScreen(Kasir $kasir)
    {
        return view('edit-kasir', ['kasir' => $kasir]);
    }

    public function createKasir(Request $request)
    {
        // Validasi input
        $incomingFields = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
        ]);

        // Simpan ke database
        Kasir::create($incomingFields);

        // Redirect ke halaman beranda
        return redirect('/about');
    }
}
