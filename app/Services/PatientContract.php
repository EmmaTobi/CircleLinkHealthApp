<?php

namespace App\Services;

use App\Models\Patient;


/**
 * Contract class to representing operations related to patient model
 */
interface PatientContract
{
    /**
     * Create a patient
     * @param array $patient Patient Data
     */
    public function createPatient(array $patientData);

}
