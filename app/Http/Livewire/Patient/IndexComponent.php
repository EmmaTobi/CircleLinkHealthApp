<?php

namespace App\Http\Livewire\Patient;

use Illuminate\Support\Str;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use App\Models\Patient;

class IndexComponent extends LivewireDatatable
{
    /** @var string */
    public $model = Patient::class;

    /** @var array */
    public $searchable = ['first_name', 'last_name'];

    /** @var bool */
    public $persistPerPage = false;
    
    function columns()
    {
    	return [
    		NumberColumn::name('id')->label('S/N')->sortBy('id'),
    		Column::callback(['id', 'first_name'], function ($id, $first_name) {
                        return view('datatables::link', [
                            'href' => route('patient.show', $id),
                            'slot' => ucfirst($first_name)
                            ]);
                    })->label('first_name'),
    		Column::callback(['id', 'last_name'], function ($id, $last_name) {
                        return view('datatables::link', [
                                'href' => route('patient.show', $id),
                                'slot' => ucfirst($last_name)
                                ]);
                    })->label('Last Name'),
    		Column::callback('email', function ($email) {
                            return ucfirst($email);
                    })->label('Email'),
    		Column::callback('gender', function ($gender) {
                    return ucfirst($gender);
                })->label('Gender'),
    		DateColumn::name('date_of_birth')->label('Date of Birth'),
    	];
    }
}
