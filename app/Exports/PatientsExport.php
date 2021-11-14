<?php

namespace App\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Patient;

class PatientsExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Patient::query();
    }

    /**
     * Excel Sheet Headers
     */
    public function headings(): array
    {
        return [
            'S/N',
            'First Name',
            'Last Name',
            'Gender',
            'Date Of Birth',
            'Date Created',
            'Blood Pressure Readings'
        ];
    }

    public function map($patient): array
    {
        return [
            $patient->id,
            $patient->first_name,
            $patient->last_name,
            $patient->gender,
            $patient->date_of_birth,
            $patient->created_at->format('Y-m-d'),
            $patient->blood_pressure_readings->count() ?: '0'
        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'gender',
            'date_of_birth',
            'created_at',
            'blood_pressure_readings'
        ];
    }

}
