<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // public function index()
    // {
        
    //     $role = auth()->user()->role;
    //     $user = auth()->user();
    //     dd($user);
    //     $profile = User::where('id', $user->id)->first();
    //     // dd($role);

    //     return view('user.profile.index', [
    //         'title' => 'Profile',
    //         'role' => $role->name,
    //         'profile' => $profile
    //     ]);
    // }
}
