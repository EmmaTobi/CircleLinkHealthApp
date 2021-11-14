<?php

namespace App\Services;

use App\Models\Patient;

/**
 * Service class to Handle operations related to patient model
 */
class PatientService implements PatientContract
{
    /**
     * Create a patient
     * @param array $patient Patient Data
     */
    public function createPatient(array $patient){
        return Patient::create($patient);
    }

}
