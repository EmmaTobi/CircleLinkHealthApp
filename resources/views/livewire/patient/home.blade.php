<div>
    <div class="flex justify-between">
        <span class="font-semibold text-4xl font-bold uppercase text-gray-800 leading-tight my-10 mr-1">
            {{ __('List of Patients') }}
        </span>
        <div class="flex justify-between "> 
            <a href="{{ route('patient.create') }}" class="flex flex-col justify-center mr-3">
                <x-button.primary>
                    {{ __('Create Patient') }}
                </x-button.primary>
            </a>
            <a  class="flex flex-col justify-center">
                <x-button.info wire:click="exportPatientsRecord" class="mr-2">
                    {{ __('Export Patient Records') }}
                </x-button.info>
            </a>
            @if($currentStatus[self::EXPORT_FAILED])
                <div class="mr-2" wire:poll.200="updateExportStatus">Exporting patients records...</div>
            @endif
        
            @if($currentStatus[self::EXPORT_SUCESSFULL])
                <span class="mr-2 text-green-500">Exporting Completed. Download file <a class="cursor-pointer" wire:click="downloadPatientsRecord">here</a></span>
            @endif
        </div>
    </div>

    <livewire:patient.index-component searchable="first_name, last_name, email, date_of_birth, gender" per-page="20" />

</div>