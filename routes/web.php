
<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Admin\TokoController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Login\AuthController;
use App\Http\Controllers\TabelController;
use App\Http\Controllers\User\PembayaranController;
use App\Livewire\Chat;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//authenticator
// Route::redirect('/');
Route::middleware('guest')->group(function () {
    Route::get('/', [LandingpageController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'signin'])->name('login');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post("/loginproses", [AuthController::class, 'loginproses'])->name('loginproses');
    Route::post("/signupproses", [AuthController::class, 'signupproses'])->name('signupproses');
    Route::get('/forgotpassword', [AuthController::class, 'forgotpassword'])->name('forgotpassword');

    Route::post('/forgotpassword', function (Request $request) {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => Lang::get($status)])
            : back()->withErrors(['email' => Lang::get($status)]);
    })->name('password.email');
    Route::get('/reset-password/{token}', function (string $token) {
        return view('login.resetpassword', ['token' => $token]);
        // return 'berhasil kirim email notifikasi reset password';
    })->middleware('guest')->name('password.reset');
    Route::post('change-password', [AuthController::class, 'changePassword'])->name('ChangePassword');

    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);


        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->middleware('guest')->name('password.update');




    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');


    Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
        User::where('id', $id)->update(['email_verified_at' => now()]);
        return redirect('/login')->with('status', 'You are already logged in!');
    })->name('verification.verify');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    // Route::get('/', function () {
    //     // Redirect ke halaman login dengan pesan flash
    //     return redirect('/login')->with('status', 'You are already logged in!');
    // });
});

//super admin
Route::middleware(['auth', 'MustSuperAdmin'])->group(function () {
    Route::get('/dashboard-superadmin', [DashboardController::class, 'superAdmin'])->name('dashboard-superadmin');
    Route::get('/tabel-user', [TabelController::class, 'user'])->name('tabel-user');
    // Route::get("/hapus-data-user/{id}", [TabelController::class, 'hapusDataUser'])->name('hapus-data-user');
    Route::get('/tabel-admin', [TabelController::class, 'admin'])->name('tabel-admin');
});


//admin
Route::middleware(['auth', 'MustAdmin'])->group(function () {
    Route::get("/dashboard-admin", [DashboardController::class, 'admin'])->name('dashboard-admin');
    Route::get("/statistik-penjual", [DashboardController::class, 'statistikPenjual'])->name('statisik-penjual');
    Route::get("/pesanan-admin", [PesananController::class, 'pesananAdmin'])->name('pesanan-admin');
    Route::get("/detail-pesanan/{id}", [PesananController::class, 'detailPesanan'])->name('detail-pesanan');
    Route::post('/edit-status/{id}', [PesananController::class, 'editStatus'])->name('edit-status');
    Route::post('/edit-tanggal/{id}', [PesananController::class, 'editTanggalSelesai'])->name('edit-tanggal');
    Route::get("/riwayat-pesanan", [PesananController::class, 'riwayatPesanan'])->name('riwayat-pesanan');
    Route::get("/pengaturan", [TokoController::class, 'pengaturanToko'])->name('pengaturan');
    Route::get("/ubah-banner/{id}", [TokoController::class, 'ubahBanner'])->name('ubah-banner');
    Route::post("/proses-ubah-banner/{id}", [TokoController::class, 'ubahBannerProses'])->name('proses-ubah-banner');
    Route::get("/ubah-produk/{id}", [TokoController::class, 'ubahProduk'])->name('ubah-produk');
    Route::put("/ubah-produk-proses/{id}", [TokoController::class, 'ubahProdukProses'])->name('ubah-produk-proses');
    Route::get("/ubah-profil", [TokoController::class, 'ubahProfil'])->name('ubah-profil');
    Route::post("/proses-ubah-toko", [TokoController::class, 'ubahTokoProses'])->name('proses-ubah-toko');
    Route::get("/cek-produk/{id}", [TokoController::class, 'cekProduk'])->name('cek-produk');
    Route::get("/produk-saya", [ProdukController::class, 'produkSaya'])->name('produk-saya');
    Route::get("/tambah-produk-admin", [ProdukController::class, 'tambahProdukAdmin'])->name('tambah-produk-admin');
    Route::post("/tambahprodukproses", [ProdukController::class, 'tambahprodukproses'])->name('tambahprodukproses');
    Route::get("/edit-produk-admin/{id}", [ProdukController::class, 'editProdukAdmin'])->name('edit-produk-admin');
    Route::put("/editprodukproses/{id}", [ProdukController::class, 'editprodukproses'])->name('editprodukproses');
    Route::get("/hapus-produk-admin/{id}", [ProdukController::class, 'hapusProdukAdmin'])->name('hapus-produk-admin');
});

//user
Route::middleware(['auth', 'MustUser'])->group(function () {
    Route::get('/dashboard-user', [DashboardController::class, 'user'])->name('dashboard-user');
    Route::get('/cari-produk', [ProdukController::class, 'searchProduk'])->name('cari-produk');
    Route::get('/detail-produk/{id}', [ProdukController::class, 'searchProdukById'])->name('user.produk.detail-produk');
    Route::get('/detail-produk', [ProdukController::class, 'detailProduk'])->name('detail-produk');
    Route::get('/detail-toko/{id}', [TokoUserController::class, 'detailToko'])->name('detail-toko');
    Route::get('/keranjang', [PesananController::class, 'keranjangSaya'])->name('keranjang');
    Route::post('/keranjang', [PesananController::class, 'add'])->name('tambahkeranjangproses');
    Route::put('/keranjang/{id}', [PesananController::class, 'update'])->name('updatekeranjang');
    Route::get('/keranjang/{id}', [PesananController::class, 'remove'])->name('hapus-keranjang'); // Changed to DELETE method for removal
    Route::post('/checkout', [PesananController::class, 'checkout'])->name('checkout');
    Route::post('/pembayaran/{id}', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/pesanan', [PesananController::class, 'pesanan'])->name('pesanan');
    Route::get('/riwayat', [PesananController::class, 'riwayat'])->name('riwayat');
});


//features
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/edit', [ProfileController::class, 'edit'])->name('profile-edit')->name('profile');
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
    Route::get('/chats', [ChatController::class, 'index'])->name('listUser');
    Route::get('/chat/{user}', Chat::class)->name('chat');
});
