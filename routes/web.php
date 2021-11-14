<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientExportController;
use \App\Http\Livewire\Patient\HomeComponent as PatientHomeComponent;
use \App\Http\Livewire\Patient\CreateComponent as PatientCreateComponent;
use \App\Http\Livewire\Patient\ShowComponent as PatientShowComponent;
use \App\Http\Livewire\BloodPressureReading\CreateComponent as BPCreateCompontent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Patients Routes
Route::prefix('patients')->group(function(){

    Route::get('/', PatientHomeComponent::class)->name('patient.home');

    Route::get('/create', PatientCreateComponent::class)->name('patient.create');

    Route::get('/{patient}/show', PatientShowComponent::class)->name('patient.show');

    Route::get('/{patient}/bp_reading/create', BPCreateCompontent::class)->name('patient.bp_reading');
    
});

//Index Route
Route::get('/', function () {
    return redirect('/patients');
});