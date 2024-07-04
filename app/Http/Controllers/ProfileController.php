<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'title' => 'Profile',
            'user' => Auth::where('id', auth()->user()->id)->first(),
        ]);
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
            } else {
                $validatedData['password'] = $user->password;
            }
            Auth::where('id', $id)->first()->update(Arr::only($validatedData, ['nama_lengkap', 'email', 'password']));
            return redirect(route('profile'))->with('success', 'Berhasil Update Profile!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('profile'))->with('failed', 'Gagal Update Profile!');
        }
    }
}
