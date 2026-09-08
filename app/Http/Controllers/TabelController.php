<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class TabelController extends Controller
{
    public function user()
    {
        $users = User::where('role_id', 1)->get();

        return view('superAdmin.tabelUser.index', compact('users'));
    }


    // public function hapusDataUser($id)
    // {
    //     $user = User::where('id', $id)->firstOrFail();
    //     $user->delete();
    //     return back()->with('flash_message_success', 'Delete user success');
    // }

    public function admin()
    {
        $admins = User::where('role_id', 2)->get();
        // dd($data);
        return view('superAdmin.tabelAdmin.index', compact('admins'));
    }
}
