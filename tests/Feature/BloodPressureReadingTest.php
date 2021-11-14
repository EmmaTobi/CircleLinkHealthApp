<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Patient;
use App\Http\Livewire\BloodPressureReading\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BloodPressureReadingTest extends TestCase
{

    use RefreshDatabase;
    
    /** @var string */
    private const INVALID_BLOOD_PRESSURE_READING_CREATE_URL = "/patients/10000000/bp_reading/create";

    /** @var string */
    private const VALID_BLOOD_PRESSURE_READING_CREATE_URL = "/patients/1/bp_reading/create";

    /**
     * @dataProvider patientsDataProvider
     * Test viewing of patient record with a valid id
     */
    public function testViewPatientsWithValidId(array $patientData)
    {
        $patient = Patient::create($patientData);
        $this->get(self::VALID_BLOOD_PRESSURE_READING_CREATE_URL)
                ->assertStatus(200);
    }

    /**
     * Test viewing of patient record with an invalid id
     */
    public function testViewPatientsWithInValidId()
    {
        $this->get(self::INVALID_BLOOD_PRESSURE_READING_CREATE_URL)
            ->assertNotFound();
    }

    /**
     * Provides patient data
     */
    public function patientsDataProvider() : array
    {
        return  [
            [
                ["first_name" => "emmanuel", "last_name" => "tobiloba", "email" => "emmanuel@gmail.com", "date_of_birth" => "1998-01-01", "gender" => "male" ],
            ],
        ];
    }

}
