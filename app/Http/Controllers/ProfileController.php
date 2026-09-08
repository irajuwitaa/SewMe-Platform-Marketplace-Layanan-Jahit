<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {

        // $role = auth()->user()->role;
        $user = auth()->user();
        // dd($user);
        $profile = User::where('id', $user->id)->first();
        // dd($role);

        return view('user.profile.index', [
            'title' => 'Profile',
            'profile' => $profile
        ]);
    }
    public function edit(Request $request)
    {
        $user = auth()->user();
        $profile = User::find($user->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nohp' => 'required|string|max:15',
            // 'email' => 'required|string|email|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update profile fields
        $profile->name = $request->input('name');
        $profile->nohp = $request->input('nohp');
        // $profile->email = $request->input('email');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $newname = $request->name . '-' . now()->timestamp . '.' . $extension;
            $file->storeAs('avatar', $newname);
            $profile->avatar = $newname;
        }

        $profile->save();

        return redirect('/profile');
    }
}
