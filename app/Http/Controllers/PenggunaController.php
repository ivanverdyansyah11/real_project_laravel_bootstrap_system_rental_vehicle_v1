<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index', [
            'title' => 'Pengguna',
            'penggunas' => Auth::whereNotIn('role', ['admin'])->paginate(6),
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
            $validatedData['password'] = bcrypt($validatedData['password']);
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
            $user = Auth::where('id', $id)->first();
            $validatedData = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password_confirmation' => 'nullable|string|min:3|max:255',
                'password' => 'nullable|string|min:3|max:255',
            ]);
            if ($validatedData["password_confirmation"] != null && $validatedData["password"] != null) {
                if (!Hash::check($validatedData["password_confirmation"], $user->password)) {
                    return redirect()->back()->with('failed', 'Password Tidak Sesuai!');
                }
                $validatedData['password'] = bcrypt($validatedData['password']);
            }
            Auth::where('id', $id)->first()->update(Arr::only($validatedData, ['nama_lengkap', 'email', 'password']));
            return redirect(route('pengguna'))->with('success', 'Berhasil Update Pengguna!');
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
