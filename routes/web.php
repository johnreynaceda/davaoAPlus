<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsApprove;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/verification', function () {
    return view('pages.not-approve');
})->name('not-approve');

Route::get('/dashboard', function () {
    switch (auth()->user()->user_type) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'member':
           return redirect()->route('member.dashboard');
        default:
            # code...
            break;
       }
})->middleware(['auth', 'verified',IsApprove::class])->name('dashboard');

Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/member', function(){
        return view('admin.member');
    })->name('admin.member');
    Route::get('/loans', function(){
        return view('admin.loans');
    })->name('admin.loans');
    Route::get('/reports', function(){
        return view('admin.reports');
    })->name('admin.reports');
    Route::get('/payments', function(){
        return view('admin.payments');
    })->name('admin.payments');
});


Route::prefix('member')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/', function(){
        return view('member.dashboard');
    })->name('member.dashboard');
    Route::get('/add-loan', function(){
        return view('member.add-loan');
    })->name('member.add-loan');
    Route::get('/my-loan', function(){
        return view('member.my_loan');
    })->name('member.my_loan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
