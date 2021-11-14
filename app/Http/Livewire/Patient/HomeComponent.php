<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use App\Jobs\ExportPatientsJob;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Bus\Batch;

class HomeComponent extends Component
{

    /** @var string */
    protected const EXPORT_FAILED = "failed";

    /** @var string */
    protected const EXPORT_INPROGRESS = "in_progress";

    /** @var string */
    protected const EXPORT_SUCESSFULL = "success";

    /** @var int */
    public $batchId;
    
    /** @var array */
    public $currentStatus ;

    public function render()
    {
        $this->currentStatus = $this->getDefaultExportStatus();
        return view('livewire.patient.home')
                ->extends('layouts.base')
                ->section('content');
    }

    public function downloadPatientsRecord()
    {
        return Storage::download('public/patients_record.csv');
    }

    public function exportPatientsRecord(){
        $this->setExportStatus(self::EXPORT_INPROGRESS, true);
        $batch = Bus::batch([
                    new ExportPatientsJob
                ])->catch(function (Batch $batch, Throwable $e) {
                    $this->setExportStatus(self::EXPORT_FAILED, true);
                })->finally(function (Batch $batch) {
                    $this->setExportStatus(self::EXPORT_SUCESSFULL, true);
                })->dispatch();
        $this->batchId = $batch->id;
    }

    /**
     * Set Export Status
     * @param string $status status key
     * @param bool $value status
     * @return void
     */
    protected function setExportStatus(string $status, bool $value){
        $currentStatus = $this->getDefaultExportStatus();
        $currentStatus[$status] = $value;
        $this->currentStatus = $currentStatus;
    }

    /**
     * Get default export status
     * @preturn array
     */
    private function getDefaultExportStatus() : array{
        return [
            self::EXPORT_FAILED => false,
            self::EXPORT_INPROGRESS => false,
            self::EXPORT_SUCESSFULL => false
        ];
    }

}
