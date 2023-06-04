<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    //return view('welcome');

   //fetching all data using the Laravel Eloquent ORM
    // $user = User::All();
    // dd($user);

    //create user to the users table 
    // $user = User::create([
    //     'name'=>'salihu omoricha',
    //     'email'=>'omosali@gmail.com',
    //     'password'=>'fadanafada',
    // ]);
    // dd($user);

    //find a user with specific id or email
    // $user = User::find(7);
    // dd($user);

      $user = User::find()->where(['email'=>'']);
      dd($user);

    


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
