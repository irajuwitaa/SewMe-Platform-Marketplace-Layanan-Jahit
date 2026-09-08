<?php

use App\Models\User;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getAuthenticatedUserProfile')) {
    function getAuthenticatedUserProfile() {
        $user = Auth::user();
        if ($user) {
            return User::where('id',$user->id)->first();
        }
        return null;
    }
}

if (!function_exists('getUserRole')) {
    function getUserRole() {
        $user = Auth::user();
        if ($user) {
            return $user->role;
        }
        return null;
    }
}

// if (!function_exists('getTokoId')) {
   
//     function getTokoId() {
//         $userId = Auth::id();
//         $banner = Banner::where('user_id', $userId)->first();
//         if ($banner) {
//             return $banner->id;
//         }
//         return null;
//     }
// }
