<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan ini sesuai dengan nama model Anda
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function deleteUser(User $users)
    {
        $users->delete(); // Hapus data user
        return redirect('/about')->with('success', 'User berhasil dihapus!');
    }

    public function actuallyUpdateUser(User $users, Request $request)
    {
        $incomingFields = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15', // Menggunakan string untuk nomor telepon
            'alamat' => 'required|string|max:255',
        ]);

        // Update data user
        $users->update($incomingFields);

        // Redirect setelah pembaruan
        return redirect('/about')->with('success', 'User berhasil diperbarui!');
    }

    public function showEditScreen(User $users)
    {
        return view('edit-user', ['user' => $users]);
    }

    public function createUser(Request $request)
    {
        // Validasi input
        $incomingFields = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        // Simpan ke database
        User::create($incomingFields);

        // Redirect ke halaman beranda
        return redirect('/about');
    }
}
