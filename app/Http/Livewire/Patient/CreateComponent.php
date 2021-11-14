<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use App\Services\PatientContract as PatientService;

class CreateComponent extends Component
{
    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var string */
    public $email;

    /** @var string */
    public $date_of_birth;

    /** @var string */
    public $gender;

     /** @var string */
    public $message  = null;

    public function render()
    {
        return view('livewire.patient.create')
                    ->extends('layouts.base')
                    ->section('content');
    }

    public function save(){
        $patientData = $this->validate();
        app()->make(PatientService::class)->createPatient($patientData);
        $this->feedback("Patient Saved Successfully.");
    }

    protected function formDataReset(){
        $this->reset(array_keys($this->rules));
    }

    protected function feedback(string $msg){
        $this->message = $msg;
        $this->formDataReset();
    }

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string|',
        'email' => 'required|email|unique:patients,email',
        'date_of_birth' => 'required|date',
        'gender' => 'required|string'
    ];

}
