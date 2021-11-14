<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Patient;
use App\Services\BloodPressureReadingContract as BloodPressureReadingService;
use App\Models\BloodPressureReading;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BloodPressureReadingServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @var BloodPressureReadingContract */
    protected $bloodPressureReadingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bloodPressureReadingService = app()->make(BloodPressureReadingService::class);
    }

    /**
     * BloodPressureReadingContract/takeBPReading
     * Test create patient function on patient service class
     * @dataProvider bpReadingsDataProvider
     * @return void
     */
    public function testTakeBloodPressureReading(array $patientData, array $bpReadingData)
    {
        $patient = Patient::create($patientData);
        $bloodPressureReading = $this->bloodPressureReadingService->takeBPReading($patient, $bpReadingData);
        $this->assertDatabaseHas('blood_pressure_readings', [
                        'id' => $bloodPressureReading['id'],
                        'patient_id' => $bloodPressureReading['patient_id']
                    ]);
    }


    /**
     * Provides blood pressure data
     */
    public function bpReadingsDataProvider() : array
    {
        return  [
            [
                ["first_name" => "emmanuel", "last_name" => "tobiloba", "email" => "emmanuel@gmail.com", "date_of_birth" => "1998-01-01", "gender" => "male" ],
                ["systolic" => 120, "diastolic" => 80]
            ],
            [
                ["first_name" => "gbemileke", "last_name" => "aduni", "email" => "gbemi@gmail.com", "date_of_birth" => "1980-01-01", "gender" => "female" ],
                ["systolic" => 150, "diastolic" => 200]
            ],
        ];
    }
}
