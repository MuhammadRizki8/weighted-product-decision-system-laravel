<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\OpsiKriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WPController;



Route::get('/', [HomeController::class, 'index']);
Route::resource('kriterias', KriteriaController::class);

Route::get('kriterias/{kriteria}/opsi_kriterias', [OpsiKriteriaController::class, 'index'])->name('opsi_kriterias.index');
Route::get('kriterias/{kriteria}/opsi_kriterias/create', [OpsiKriteriaController::class, 'create'])->name('opsi_kriterias.create');
Route::post('kriterias/{kriteria}/opsi_kriterias', [OpsiKriteriaController::class, 'store'])->name('opsi_kriterias.store');
Route::get('kriterias/{kriteria}/opsi_kriterias/{opsiKriteria}/edit', [OpsiKriteriaController::class, 'edit'])->name('opsi_kriterias.edit');
Route::put('kriterias/{kriteria}/opsi_kriterias/{opsiKriteria}', [OpsiKriteriaController::class, 'update'])->name('opsi_kriterias.update');
Route::delete('kriterias/{kriteria}/opsi_kriterias/{opsiKriteria}', [OpsiKriteriaController::class, 'destroy'])->name('opsi_kriterias.destroy');

Route::resource('alternatifs', AlternatifController::class)->except(['show']);
Route::get('alternatifs/{alternatif}', [AlternatifController::class, 'show'])->name('alternatifs.show');
Route::get('alternatifs/{alternatif}/edit_penilaian', [AlternatifController::class, 'editPenilaian'])->name('alternatifs.edit_penilaian');


Route::resource('penilaians', PenilaianController::class);
Route::put('penilaians/update/{alternatif}', [PenilaianController::class, 'update'])->name('penilaians.update');

Route::get('penilaians/create/{alternatif_id}', [PenilaianController::class, 'create'])->name('penilaians.create');

Route::get('/wp', [WPController::class, 'index'])->name('wp.index');