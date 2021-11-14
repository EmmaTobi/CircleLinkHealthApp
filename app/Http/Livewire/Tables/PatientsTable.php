<?php

namespace App\Http\Livewire\Tables;

use App\Models\Patient;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PatientsTable extends LivewireDatatable
{
    public $model = Patient::class;

}