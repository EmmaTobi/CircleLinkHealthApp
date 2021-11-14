<?php

namespace Database\Seeders;

use App\Models\BloodPressureReading;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // make the foreign key checks null
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // dropping table data if present
        Patient::truncate();
        BloodPressureReading::truncate();

        // flush Event incase of mailing and other third party usage
        Patient::flushEventListeners();
        BloodPressureReading::flushEventListeners();
    
        $this->call(PatientSeeder::class);
        $this->call(BloodPressureReadingSeeder::class);
    }
}
