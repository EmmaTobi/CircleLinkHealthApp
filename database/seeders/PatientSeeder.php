<?php

namespace Database\Seeders;

use App\Models\Patient;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $patients = collect([]);
    
        $totalPatientsCount = config("app.total_patients_seed_count");

        for($i = 1; $i <= $totalPatientsCount; $i++) {
            $patients->push([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => $faker->randomElement(['male', 'female']),
                'email' => $faker->unique()->email,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
        }
        
        $chunkedPatients = $patients->chunk(1000);
        
        foreach($chunkedPatients as $chunk) {
            Patient::insert($chunk->toArray());
        }
    }
}
