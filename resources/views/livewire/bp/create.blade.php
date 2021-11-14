
<div class="flex justify-end">
    <div class="w-full rounded-lg bg-white overflow-hidden w-full block p-2">
        <div class="flex justify-between">
            <h2 class="text-4xl font-bold text-gray-900 uppercase mb-4">{{ $patient->first_name }} Blood Pressure Entry</h2>
            <a href="{{ route('patient.home') }}" class="text-xl text-gray-900 capitalize underline">{{ __('home') }}</a>
        </div>

        <x-input.group for="systolic" label="Systolic (mmHg):" :error="$errors->first('systolic')">
            <x-input.text wire:model.lazy="systolic" id="systolic" placeholder="Numerator" />
        </x-input.group>
    
        <x-input.group for="diastolic" label="Diastolic (mmHg):" :error="$errors->first('diastolic')">
            <x-input.text wire:model.lazy="diastolic" id="diastolic" placeholder="Denominator" />
        </x-input.group>

        <div class="mt-8 flex justify-end items-center">
            <x-button.primary wire:click="save" type="button">
                Save
            </x-button.primary>
            @if($message) 
                <span class="ml-1 text-green-800 self-center">{{ $message }}</span> 
            @endif
        </div>
    </div>
</div>

