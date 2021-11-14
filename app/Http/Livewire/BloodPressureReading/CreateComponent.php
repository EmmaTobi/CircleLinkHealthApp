<?php

namespace App\Http\Livewire\BloodPressureReading;

use App\Models\Patient;
use Livewire\Component;
use App\Services\BloodPressureReadingContract as BloodPressureReadingService;

class CreateComponent extends Component
{

    /** @var */
    public $patient;
    /** @var */
    public $systolic;
    /** @var  */
    public $diastolic;
    /** @var string */
    public $message = null;

    /**
     * Mount Patient Model
     * @param Patient $patient
     * @return void
     */
    public function mount(Patient $patient){
        $this->patient = $patient;
    }

    protected $rules = [
        'systolic' => 'required|integer|min:1',
        'diastolic' => 'required|integer|min:1'
    ];

    public function save(){
        $bpReading = $this->validate();
        app()->make(BloodPressureReadingService::class)->takeBPReading($this->patient, $bpReading);
        $this->feedback("BP Reading recorded successfully;");
        return $this->redirect(route('patient.show', $this->patient->id));
    }

    public function render()
    {
        return view('livewire.bp.create')
                ->extends('layouts.base')
                ->section('content');
    }

    protected function formDataReset(){
        $this->reset(array_keys($this->rules));
    }

    protected function feedback(string $msg){
        $this->message = $msg;
        $this->formDataReset();
    }
}