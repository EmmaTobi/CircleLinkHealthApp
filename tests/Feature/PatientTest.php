<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Patient;
use App\Services\PatientService;
use App\Http\Livewire\Patient\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    use RefreshDatabase; 

    /** @var string */
    private const VIEW_PATIENT_URL = "/patients/1/show";

    /** @var string */
    private const VIEW_PATIENTS_URL = "/patients";

    /** @var string */
    private const CREATE_PATIENT_URL = '/patients/create';

    /**
     * @dataProvider patientsDataProvider
     * Test viewing of patient record with a valid id
     */
    public function testViewpatient(array $patientsData)
    {
        $patient = Patient::create($patientsData);
                    $this->get(self::VIEW_PATIENT_URL)
                    ->assertStatus(200);
    }

    public function testViewPatients()
    {
        $this->get(self::VIEW_PATIENTS_URL)
            ->assertStatus(200);
    }

    public function testViewCreatePatientForm()
    {
        $this->get(self::CREATE_PATIENT_URL)
            ->assertStatus(200);
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
