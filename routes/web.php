<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\EntretienController;
use App\Models\Candidature;
use App\Models\Entretien;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {

    $userId = auth()->id();

    $totalCandidatures = Candidature::where('user_id', $userId)->count();

    $pendingCandidatures = Candidature::where('user_id', $userId)
        ->where('status', 'pending')
        ->count();

    $acceptedCandidatures = Candidature::where('user_id', $userId)
        ->where('status', 'accepted')
        ->count();

    $rejectedCandidatures = Candidature::where('user_id', $userId)
        ->where('status', 'rejected')
        ->count();

    $recentCandidatures = Candidature::where('user_id', $userId)
        ->latest()
        ->take(5)
        ->get();

    $upcomingEntretiens = Entretien::whereHas('candidature', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with('candidature')
        ->where('scheduled_at', '>=', now())
        ->orderBy('scheduled_at')
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalCandidatures',
        'pendingCandidatures',
        'acceptedCandidatures',
        'rejectedCandidatures',
        'recentCandidatures',
        'upcomingEntretiens'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/candidatures/archives', [CandidatureController::class, 'archives'])
        ->name('candidatures.archives');
 
    Route::patch('/candidatures/{id}/restore', [CandidatureController::class, 'restore'])
        ->name('candidatures.restore');


    Route::resource('candidatures', CandidatureController::class);

   

    /*
    |--------------------------------------------------------------------------
    | Entretiens
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/entretiens',
        [EntretienController::class, 'index']
    )->name('entretiens.index');

    Route::post(
        '/entretiens',
        [EntretienController::class, 'store']
    )->name('entretiens.store');

    Route::put(
        '/entretiens/{entretien}',
        [EntretienController::class, 'update']
    )->name('entretiens.update');

    Route::delete(
        '/entretiens/{entretien}',
        [EntretienController::class, 'destroy']
    )->name('entretiens.destroy');

});



require __DIR__.'/auth.php';
