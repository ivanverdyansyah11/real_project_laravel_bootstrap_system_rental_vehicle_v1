<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index', [
            'title' => 'Pengguna',
            'penggunas' => Auth::paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $penggunas = Auth::where('nama_lengkap', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('role', 'like', '%' . $request->search . '%')
            ->paginate(6);

        return view('pengguna.index', [
            'title' => 'Pengguna',
            'penggunas' => $penggunas,
        ]);
    }

    function detail($id)
    {
        $pengguna = Auth::where('id', $id)->first();
        return response()->json($pengguna);
    }

    function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'email' => 'required|email:dns|max:255',
                'password' => 'required|min:3|max:255',
            ]);
            $validatedData['role'] = 'staff';
            Auth::create($validatedData);
            return redirect(route('pengguna'))->with('success', 'Berhasil Tambah Pengguna!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('pengguna'))->with('failed', 'Gagal Tambah Pengguna!');
        }
    }

    function update($id, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);
            Auth::where('id', $id)->first()->update($validatedData);
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('pengguna'))->with('failed', 'Gagal Update Pengguna!');
        }
    }

    function delete($id)
    {
        try {
            Auth::where('id', $id)->first()->delete();
            return redirect(route('pengguna'))->with('success', 'Berhasil Hapus Pengguna!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('pengguna'))->with('failed', 'Gagal Hapus Pengguna!');
        }
    }
}
