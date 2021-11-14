<?php

namespace App\Services;

use App\Models\Patient;

/**
 * Service class to Representing operations related to blood pressure readings
 */
class BloodPressureReadingService implements BloodPressureReadingContract
{
     /**
     * Take a blood pressure reading for a patient
     * @param Patient $patient Patient Entity
     * @param array $bpReadingData i.e [systolic, diastolic]
     */
    public function takeBPReading(Patient $patient, array $bpReading ){
        return $patient->blood_pressure_readings()->create($bpReading);
    }
}
