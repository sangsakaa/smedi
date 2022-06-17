<?php


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';
Route::middleware('auth')->group(function () {

    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('histori/{santri}', [App\Http\Controllers\SantriController::class, 'tampilkan'])->name('histori.tampilkan');
    Route::post('histori/{santri}', [App\Http\Controllers\SantriController::class, 'buatstore'])->name('histori.buatstore');

    Route::get('historipelanggaran/{santri}', [App\Http\Controllers\SantriController::class, 'tampilkanpelanggaran'])->name('historipelanggaran.tampilkanpelanggaran');
    Route::post('historipelanggaran/{santri}', [App\Http\Controllers\SantriController::class, 'pelanggarantstore'])->name('historipelanggaran.pelanggarantstore');


    Route::post('kelas/{kelas}', [App\Http\Controllers\KelasController::class, 'kelasstore'])->name('kelas.kelasstore');
    Route::delete('kelas/{kelassantri}', [App\Http\Controllers\KelasController::class, 'hapus']);

    Route::get('absen/{sesi}', [App\Http\Controllers\SesikelasController::class, 'absen']);
    Route::get('about', [App\Http\Controllers\DashboardController::class, 'rekap']);
    Route::post('absen/{sesi}', [App\Http\Controllers\SesikelasController::class, 'simpanabsen']);
    Route::get('asramasantri/add_many', [App\Http\Controllers\AsramasantriController::class, 'addManyPage']);
    Route::get('kolektifkelas', [App\Http\Controllers\KelasController::class, 'kolektifkelas']);
    Route::post(
        'asramasantri/add_many',
        [
            App\Http\Controllers\AsramasantriController::class,
            'addMany'
        ]
    );
    Route::post(
        'kolektifkelas',
        [App\Http\Controllers\KelasController::class, 'tambahkelas']
    );

    // pondok
    Route::resource('pondok', App\Http\Controllers\PondokController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);
    // Asrama santri
    Route::resource('asramasantri', App\Http\Controllers\AsramasantriController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);

    // Asrama
    Route::resource('asrama', App\Http\Controllers\AsramaController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);

    // Pelanggaran
    Route::resource('pelanggaran', App\Http\Controllers\PelanggaranController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);

    // santri
    Route::resource('santri', App\Http\Controllers\SantriController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);

    // histori
    Route::resource('histori', App\Http\Controllers\HistoriController::class)->only([
        'store', 'destroy'
    ]);
    // histori Pelanggaran
    Route::resource('historipelanggaran', App\Http\Controllers\HistoripelanggaranController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);
    // Pengurus
    Route::resource('penugasan', App\Http\Controllers\PenugasanController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);

    //Ustadz
    Route::resource('ustadz', App\Http\Controllers\UstadzController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);
    Route::resource('kelas', App\Http\Controllers\KelasController::class)->only([
        'index', 'index2', 'edit', 'update', 'show', 'destroy', 'create', 'store',
    ])->parameters([
        'kelas' => 'kelas',
    ]);

    Route::resource('mapel', App\Http\Controllers\MapelController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);
    Route::resource('perangkat', App\Http\Controllers\PerangkatController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);

    Route::resource('absen', App\Http\Controllers\SesikelasController::class)->only([
        'index', 'edit', 'update', 'show', 'destroy', 'create', 'store'
    ]);
});
