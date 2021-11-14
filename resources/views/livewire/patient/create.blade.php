
<div class="flex justify-between">
    <div class="w-full rounded-lg bg-white overflow-hidden w-full block p-2">
        <div class="flex justify-between">
            <h2 class="text-4xl font-bold text-gray-900 uppercase mb-4">{{ __('create a patient') }}</h2>
            <a href="{{ route('patient.home') }}" class="text-xl text-gray-900 capitalize underline">{{ __('home') }}</a>
        </div>
        
        <x-input.group for="first_name" label="First Name:" :error="$errors->first('first_name')">
            <x-input.text wire:model.lazy="first_name" id="first_name" placeholder="First Name" />
        </x-input.group>
    
        <x-input.group for="last_name" label="Last Name:" :error="$errors->first('last_name')">
            <x-input.text wire:model.lazy="last_name" id="last_name" placeholder="Last Name" />
        </x-input.group>

        <x-input.group for="email" label="Email:" :error="$errors->first('email')">
            <x-input.text wire:model.lazy="email" id="email" placeholder="Email"/>
        </x-input.group>

        <x-input.group for="gender" label="Gender:" :error="$errors->first('gender')">
            <input wire:model="gender" value="male" id="gender" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out mr-3" />Male
            <input wire:model="gender" value="female" id="gender" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out mr-3" />Female
        </x-input.group>

        <x-input.group for="date_of_birth" label="Date of Birth:" :error="$errors->first('date_of_birth')">
            <x-input.date wire:model.lazy="date_of_birth" id="date_of_birth"/>
        </x-input.group>
        

        <div class="mt-8 flex justify-end items-center">
            <x-button.primary wire:click="save" type="button">
                Save
            </x-button.primary>
            @if($message) <span class="ml-1 text-green-800 self-center">{{ $message }}</span> @endif
        </div>
    </div>
</div>
