<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Useracc;
use App\Models\Userroles;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    // Show the role selection page if the user has more than one role
    public function showRoleSelectionPage()
    {
        // Get the logged-in user's email
        $email = Auth::user()->email;

        // Get the roles assigned to the user
        $roles = Userroles::where('email', $email)->get();

        // If the user has only one role, redirect to the appropriate dashboard
        if ($roles->count() == 1) {
            return redirect()->route('dashboard', ['role' => $roles->first()->role]);
        }

        // If the user has multiple roles, display the role selection page
        return view('selectRole', compact('roles'));
    }

    // Handle the selected role and redirect to the corresponding dashboard
    public function handleRoleSelection(Request $request)
    {
        $request->validate([
            'role' => 'required|string|in:Admin,Mahasiswa,Dekan,Ketua Program Studi,Bagian Akademik,Pembimbing Akademik',
        ]);

        // Redirect to the appropriate dashboard based on the selected role
        return redirect()->route('dashboard', ['role' => $request->role]);
    }

    // Show the dashboard based on the role
    public function showDashboard($role)
    {
        // Redirect to the corresponding dashboard based on the role
        return view('dashboard.' . strtolower(str_replace(' ', '', $role)), compact('role'));
    }
}