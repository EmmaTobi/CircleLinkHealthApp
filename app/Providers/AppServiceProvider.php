<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PatientService;
use App\Services\PatientContract;
use App\Services\BloodPressureReadingContract;
use App\Services\BloodPressureReadingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Bind Patient Contract to Patient Service
        $this->app->bind( PatientContract::class, function($app){
            return new PatientService();
        });
        // Bind BloodPressureReadingContract  to BloodPressureReadingService
        $this->app->bind( BloodPressureReadingContract::class, function($app){
            return new BloodPressureReadingService();
        });
    }
}
