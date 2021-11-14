<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;

class ShowComponent extends Component
{
    /** @var  Patient */
    public Patient $patient;

    public function render()
    {
        return view('livewire.patient.show')
        ->extends('layouts.base')
        ->section('content');
    }
}
