<?php

namespace Database\Seeders;

use App\Models\BloodPressureReading;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BloodPressureReadingSeeder extends Seeder
{
    private $bpInputs = array();

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Total Patients Blood pressure inputs that  should be created
        $patientBPInputs = config("app.total_blood_pressure_readings_seed_count");

        for ($i = 0; $i < $patientBPInputs; $i++) {
            $num1 = rand(10, 200);
            $num2 = rand(10, 200);
            $bpInputs[] = [
                'systolic' => max($num1, $num2),
                'diastolic' => min($num1, $num2),
                'patient_id' => rand(1, config("app.total_patients_seed_count"))
            ];
        }

        foreach ($bpInputs as $bpInput) {
            BloodPressureReading::insert($bpInput);
        }
    }
}
