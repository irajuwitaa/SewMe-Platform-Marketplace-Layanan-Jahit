<?php

namespace App\Http\Controllers\Login;

use Hash;
use Validator;
use App\Models\Role;
use App\Models\Toko;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function index()
    // {
    //     return view('landingpage.landingpage');
    // }
    public function signin()
    {
        return view('login.signin');
    }

    public function signup()
    {
        $roles = Role::select('id', 'name')->get();
        return view('login.signup', ['role' => $roles]);
    }
    public function forgotpassword()
    {
        return view('login.forgotpassword');
    }
    public function signupproses(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            "name" => "required",
            "nohp" => "required",
            "email" => "required|email",
            "password" => "required",
            "role_id" => "required",
            "avatar" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $data['password'] = bcrypt($data['password']);

        // Buat pengguna baru
        $user = User::create($data);

        // Buat entri di tabel toko jika role_id adalah 2
        if ($user->role_id == 2) {
            $toko = Toko::create([
                'user_id' => $user->id,
            ]);

            Banner::create([
                'user_id' => $user->id,
                'toko_id' => $toko->id,
            ]);
        }

        // Kirim email verifikasi
        $user->sendEmailVerificationNotification();

        // Logout pengguna yang baru dibuat
        Auth::logout();

        // Arahkan ke halaman login dengan pesan status
        return redirect('/login')->with('status', 'Registrasi berhasil, silakan cek email Anda untuk verifikasi.');
    }

    public function loginproses(Request $request)
    {
        // Validasi input data
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Cek apakah pengguna ada
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            // Pengguna tidak ada
            return response()->json([
                'success' => false,
                'message' => 'Maaf, email Anda tidak terdaftar'
            ], 400);
        }

        // Cek apakah email sudah diverifikasi
        if (is_null($user->email_verified_at)) {
            // Email belum diverifikasi
            return response()->json([
                'success' => false,
                'message' => 'Email belum diverifikasi. Silakan cek email Anda untuk verifikasi.'
            ], 400);
        }

        // Coba login pengguna
        $remember = $request->boolean('remember');

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
            $request->session()->regenerate();

            // Ambil role pengguna setelah login
            $role = Auth::user()->role_id; // Sesuaikan ini jika nama kolom berbeda

            // Tentukan redirect URL berdasarkan role
            $redirect = match ($role) {
                1 => 'dashboard-user',
                2 => 'dashboard-admin',
                3 => 'dashboard-superadmin',
                default => 'dashboard',
            };

            $response = [
                'success' => true,
                'role' => $role,
                'redirect' => $redirect
            ];
            return response()->json($response);
        } else {
            // Username atau password salah
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda Salah !!'
            ], 400);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    function changePassword(Request $request)
    {
        //Validate form
        $validator = Validator::make($request->all(), [
            'oldpassword' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword' => 'required|min:8|max:30',
            'cnewpassword' => 'required|same:newpassword'
        ], [
            'oldpassword.required' => 'Enter your current password',
            'oldpassword.min' => 'Old password must have atleast 8 characters',
            'oldpassword.max' => 'Old password must not be greater than 30 characters',
            'newpassword.required' => 'Enter new password',
            'newpassword.min' => 'New password must have atleast 8 characters',
            'newpassword.max' => 'New password must not be greater than 30 characters',
            'cnewpassword.required' => 'ReEnter your new password',
            'cnewpassword.same' => 'New password and Confirm new password must match'
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $update = User::find(Auth::user()->id)->update(['password' => \Hash::make($request->newpassword)]);

            if (!$update) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong, Failed to update password in db']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Your password has been changed successfully']);
            }
        }
    }
}
