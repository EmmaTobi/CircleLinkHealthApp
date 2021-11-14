<?php

namespace App\Services;

use App\Models\Patient;

/**
 * Contract class to Representing operations related to blood pressure readings
 */
interface BloodPressureReadingContract
{
     /**
     * Take a blood pressure reading for a patient
     * @param Patient $patient Patient Entity
     * @param array $bpReadingData i.e [systolic, diastolic]
     */
    public function takeBPReading(Patient $patient, array $bpReading );
}
