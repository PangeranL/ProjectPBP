<?php

namespace App\Http\Controllers;

use App\Models\useracc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login Function
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
        ]);

        $info = $request->only('email', 'password');

        if (Auth::attempt($info)) {
            $user = Auth::user();
            $roles = $user->Role;

            if ($roles->count() > 1) {
                return redirect()->route('selectRole');
            }

            // Redirect based on the user's single role
            $role = $roles->first()->role ?? null;

            return $this->redirectToDashboard($role);
        } else {
            return redirect('/')->withErrors('Username atau Password tidak ditemukan!')->withInput();
        }
    }

    // Show Role Selection Page
    public function showRoleSelectionPage()
    {
        $user = Auth::user();
        $roles = $user->Role;

        if ($roles->isEmpty()) {
            return redirect('/')->withErrors('Role tidak ditemukan untuk pengguna ini.');
        }
        return view('selectRole', ['roles' => $roles]);
    }

    // Redirect to Dashboard Based on Role
    public function redirectToDashboard($role)
    {
        switch (strtolower($role)) {
            case 'mahasiswa':
                return redirect()->route('mahasiswaDash');
            case 'bagian akademik':
                return redirect()->route('bagianAkademikDash');
            case 'dekan':
                return redirect()->route('dekanDash');
            case 'ketua program studi':
                return redirect()->route('kaprodiDash');
            case 'pembimbing akademik':
                return redirect()->route('pembimbingAkademikDash');
            default:
                return redirect('/')->withErrors('Role tidak valid.');
        }
    }

    public function handleRoleSelection(Request $request)
        {
            $request->validate([
                'role' => 'required',
            ]);

            $role = $request->input('role');
            return $this->redirectToDashboard($role);
        }
}