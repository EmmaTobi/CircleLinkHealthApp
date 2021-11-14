<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\PatientContract as PatientService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @var PatientContract */
    protected $patientService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->patientService = app()->make(PatientService::class);
    }

    /**
     * Test create patient function on patient service class
     * @dataProvider patientsDataProvider
     * @return void
     */
    public function testCreatePatient(array $patientsData)
    {
        $patient = $this->patientService->createPatient($patientData);
        $this->assertModelExists($patient);
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
            [
                ["first_name" => "gbemileke", "last_name" => "aduni", "email" => "gbemi@gmail.com", "date_of_birth" => "1980-01-01", "gender" => "female" ],
            ],
        ];
    }

}
