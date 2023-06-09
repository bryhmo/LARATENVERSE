<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
     
// foreach (User::all() as $user) {
//     echo $user->name;
// }
// $users = User::where('Avatar', '')
//                ->orderBy('name')
//                ->take(5)
//                ->get();
// dd($users);
    
    // dd($user);
    // $user = User::All();
    // dd($user);
    // $user=User::all();
    // dd($user);


});

// //fetching all data using the Laravel Eloquent ORM


//     //create user to the users table 
//     $user = User::create([
//         'name'=>'salihu omoricha',
//         'email'=>'omosali@gmail.com',
//         'password'=>'fadanafada',
//     ]);
//     // dd($user);

//     //find a user with specific id or email
//     $user = User::find(7);
//     // dd($user);



  


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/photo', [PhotoController::class, 'update'])->name('profile.photo');
});

require __DIR__.'/auth.php';


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    
    dd($user);
    // $user->token
});
