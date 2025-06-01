<?php
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\GymDetailController;
use App\Http\Middleware\Loggedin;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MembershipController;
use Illuminate\Support\Facades\Mail;

use App\Http\Middleware\OwnerMiddleware;
use App\Http\Middleware\CheckAdminOrGymOwner;


//---------------------------------------------Bagian MembershipDasboard----------------------------------------------
Route::get('/membership/membership', [MembershipController::class, 'show'])->name('membership');

Route::get('/membership/approve/{id}', [MembershipController::class, 'approve'])->name('membership.approve');

Route::get('/membership/reject/{id}', [MembershipController::class, 'reject'])->name('membership.reject');



//---------------------------------------------Bagian Dasboard--------------------------------------------------------
Route::middleware(Loggedin:: class)->group(function(){
    Route::middleware(AdminMiddleware:: class)->group(function(){
Route::get('/akun/data', [UserController::class, 'index'])->name('akun.data');
// Route untuk form tambah akun
Route::get('/akun/add', [UserController::class, 'create'])->name('akun.create');
// Route untuk menyimpan data akun baru
Route::post('/akun/store', [UserController::class, 'store'])->name('akun.store');
Route::resource('akun', UserController::class);
Route::put('akun/{user_id}', [UserController::class, 'update'])->name('update-akun');
// Menghapus akun
Route::delete('/akun/delete/{user_id}', [UserController::class, 'destroy'])->name('akun.delete');

Route::get('akun/{user_id}/edit', [UserController::class, 'edit'])->name('akun.edit');
Route::get('/akun/data', [UserController::class, 'search'])->name('akun.data');
// reset password
});





//--------------------------------------------------------------------------------------------------------------------
Route::post('/membership', [MembershipController::class, 'store'])->name('membership.store');
Route::get('/membership/search', [MembershipController::class, 'searchmember'])->name('membership.data');

//-------------------------------------------------Bagian GYM----------------------------------------------------------
Route::middleware(CheckAdminOrGymOwner:: class)->group(function(){
Route::get('/gym/data', [GymController::class, 'indexgym'])->name('gym.data');
Route::get('/gym/detail', [GymDetailController::class, 'show'])->name('detail.gym');

// ------------------------------------------------- ADD DATA GYM -------------------------------------------------- 
// Step 1: Tambah data gym utama
Route::get('/gym/data/add', [GymController::class, 'addGym'])->name('gym.add');
Route::post('/gym/data/store', [GymController::class, 'storeGym'])->name('gym.store');

// Step 2: Tambah foto gym
Route::get('/gym/data/foto-gym', [GymController::class, 'addFotoGym'])->name('gym.foto');
Route::post('/gym/data/store-foto/', [GymController::class, 'storeFotoGym'])->name('gym.store.foto');

// Step 3: Tambah alamat gym
Route::get('/gym/data/alamat-gym', [GymController::class, 'addAlamatGym'])->name('gym.alamat');
Route::post('/gym/data/store-alamat/', [GymController::class, 'storeAlamatGym'])->name('gym.store.alamat');

// Step 4: Tambah fasilitas umum
Route::get('/gym/data/fasilitas-umum', [GymController::class, 'addFasilitasUmum'])->name('fasilitas.umum');
Route::post('/gym/data/store-fasilitas-umum/', [GymController::class, 'storeFasilitasUmum'])->name('gym.store.fasilitas.umum');

// Step 5: Tambah fasilitas alat
Route::get('/gym/data/fasilitas-alat', [GymController::class, 'addFasilitasAlat'])->name('fasilitas.alat');
Route::post('/gym/data/store-fasilitas-alat/', [GymController::class, 'storeFasilitasAlat'])->name('gym.store.fasilitas.alat');

// Step 6: List trainer gym (opsional)
Route::get('/gym/data/trainer-gym', [GymController::class, 'TrainerGym'])->name('gym.trainer');
//--------bagian nambah trainer-----------------------------------------------------------------------------------------------
Route::get('/gym/data/trainer-gym/add', [GymController::class, 'add'])->name('add.trainer');
Route::post('/gym/data/store-trainer/', [GymController::class, 'storeTrainerGym'])->name('gym.store.trainer');
// Route::delete('/gym/data/delete-trainer/', [GymController::class, 'destroyTrainer'])->name('trainer.delete');

// ---------------------------------------------------- EDIT DATA GYM ------------------------------------------------------------ 
// Step 1: Edit data gym utama
Route::get('/gym/data/edit', [GymController::class, 'editDataGym'])->name('gym.edit.data');
Route::put('/gym/data/update', [GymController::class, 'updateDataGym'])->name('gym.update.data');

// Step 2: Edit foto gym
Route::get('/gym/data/edit-foto/', [GymController::class, 'editFotoGym'])->name('gym.edit.foto');
Route::put('/gym/data/update-foto/', [GymController::class, 'updateFotoGym'])->name('gym.update.foto');

// Step 3: Edit alamat gym
Route::get('/gym/data/edit-alamat/', [GymController::class, 'editAlamatGym'])->name('gym.edit.alamat');
Route::put('/gym/data/update-alamat/', [GymController::class, 'updateAlamatGym'])->name('gym.update.alamat');

// Step 4: Edit fasilitas umum
Route::get('/gym/data/edit-fasilitas-umum/', [GymController::class, 'editFasilitasUmum'])->name('gym.edit.fasilitas.umum');
Route::put('/gym/data/update-fasilitas-umum/', [GymController::class, 'updateFasilitasUmum'])->name('gym.update.fasilitas.umum');

// Step 5: Edit fasilitas alat
Route::get('/gym/data/edit-fasilitas-alat/', [GymController::class, 'editFasilitasAlat'])->name('gym.edit.fasilitas.alat');
Route::put('/gym/data/update-fasilitas-alat/', [GymController::class, 'updateFasilitasAlat'])->name('gym.update.fasilitas.alat');

// Step 6: Edit trainer gym

Route::get('/gym/trainer/edit', [GymController::class, 'editTrainerGym'])->name('gym.edit.trainer');

// Menyimpan pembaruan data trainer
Route::put('/gym/trainer/update', [GymController::class, 'updateTrainerGym'])->name('gym.update.trainer');

// ----------------------------------------------- DELETE DATA GYM ------------------------------------------------
Route::delete('/gym/data/delete', [GymController::class, 'destroy'])->name('gym.delete');
Route::get('/gym/search', [GymController::class, 'searchgymD'])->name('gyms.searchD');

});

//--------------------------------------------------------RISET PASSWORD-------------------------------------------------------------
route::get('/reset-password', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');
Route::get('/logout', [LogoutController::class, 'Process'])->name('logout');
Route::get('/membership', [LoginController::class, 'checkLoginBeforeMembership'])->name('membership.show');

});


Route::delete('/gym/data/{trainer}', [GymController::class, 'deleteTrainer'])->name('gym.delete.trainer');






//---------------------------------------------------Bagian Home-------------------------------------------------------
route::get('/', [HomeController::class, 'index'])->name('home.welcome');
Route::get('/home/search', [HomeController::class, 'searchhome'])->name('home.search');
Route::get('home/search', [HomeController::class, 'searchgym'])->name('home.search');
// Route::get('/', function () {
//     return view('home.welcome');
// });
// Route untuk menampilkan halaman pendaftaran
Route::get('home/pendaftaran', [PendaftaranController::class, 'pendaftaran'])->name('home.pendaftaran');

// Route untuk menyimpan data pendaftaran gym owner
Route::post('home/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');


route::get('home/about' , [AboutController::class, 'about'])->name('home.about');

route::get('home/login' , [LoginController::class, 'showLoginForm'])->name('login');

route::post('login/process',[LoginController::class, 'process'])->name('admin.login.process');

Route::get('/home/gym-detail/{slug}', [GymDetailController::class, 'show'])->name('gym-detail');

route::get('home/search', [SearchController::class, 'show'])->name('search');

Route::get('/gyms/search', [SearchController::class, 'searchgym'])->name('gyms.search');






