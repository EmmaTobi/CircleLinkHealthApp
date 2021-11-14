<div class="w-full rounded-lg bg-white overflow-hidden w-full block p-2">
    <dl class="mt-8 divide-y divide-gray-200 text-sm lg:mt-0 lg:col-span-5">
        <div class="pb-4 flex items-center justify-between">
            <dt class="text-gray-600">Full Name</dt>
            <dd class="font-medium text-gray-900">{{ ucfirst($patient->first_name) }}  {{ ucfirst($patient->last_name) }}</dd>
        </div>
        <div class="py-4 flex items-center justify-between">
            <dt class="text-gray-600">Email</dt>
            <dd class="font-medium text-gray-900">{{ ucfirst($patient->email) }}</dd>
        </div>
        <div class="pt-4 flex items-center justify-between">
            <dt class="font-medium text-gray-900">Blood Pressure Readings Counter</dt>
            <dd class="font-medium text-indigo-600">{{$patient->blood_pressure_readings->count()}}</dd>
        </div>
    </dl>
    <div class="flex justify-between mt-5">
        <a href="{{ route('patient.bp_reading', $patient->id ) }}">
            <x-button.primary>
                {{ __('Add BP Readings') }}
            </x-button.primary>
        </a>
        <a href="{{ route('patient.home') }}" class="text-xxl text-gray-900 capitalize underline">{{ __('Back') }}</a>
    </div>
    
</div>
