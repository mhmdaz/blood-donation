<div class="w-full sm:max-w-md mx-auto px-6 py-4 bg-white overflow-hidden">
    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Enter Donor Details') }}
    </h3>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ ($donor ?? null) ? route('donors.update', $donor) : route('donors.store') }}">
        @if ($donor ?? null) @method('PUT') @endif

        @csrf

        <!-- Name -->
        <div>
            <x-label class="required" for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? optional($donor ?? null)->name" placeholder="Aaron John" required autofocus />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-label for="date_of_birth" :value="__('Date of Birth')" />

            <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth') ?? optional($donor ?? null)->date_of_birth" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-label class="required" for="phone" :value="__('Phone Number')" />

            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone') ?? optional($donor ?? null)->phone" placeholder="XXX8089XXX" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ?? optional($donor ?? null)->email" placeholder="aaron@donate.com" />
        </div>

        <!-- Blood Group -->
        <div class="mt-4">
            <x-label class="required" for="blood_group_id" :value="__('Blood Group')" />

            <select id="blood_group_id" name="blood_group_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                @foreach($blood_groups as $id => $name)
                    <option
                        value="{{ $id }}"
                        {{ (old('blood_group_id') ?? optional($donor ?? null)->blood_group_id === $id) ? 'selected' : '' }}
                    >{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-label class="required" for="state_id" :value="__('State')" />

            <select id="state_id" name="state_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                @foreach($states as $id => $name)
                    <option
                        value="{{ $id }}"
                        {{ (old('state_id') ?? optional($donor ?? null)->state_id === $id) ? 'selected' : '' }}
                    >{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- District -->
        <div class="mt-4">
            <x-label class="required" for="district_id" :value="__('District')" />

            <select id="district_id" name="district_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                @foreach($districts as $id => $name)
                    <option
                        value="{{ $id }}"
                        {{ (old('district_id') ?? optional($donor ?? null)->district_id === $id) ? 'selected' : '' }}
                    >{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Last Donated Date -->
        <div class="mt-4">
            <x-label for="last_donated_date" :value="__('Last Donated Date')" />

            <x-input id="last_donated_date" class="block mt-1 w-full" type="date" name="last_donated_date" :value="old('last_donated_date') ?? optional($donor ?? null)->last_donated_date" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Save') }}
            </x-button>
        </div>
    </form>
</div>
