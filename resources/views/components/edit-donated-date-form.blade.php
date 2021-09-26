<div class="w-full sm:max-w-md mx-auto px-6 py-4 bg-white overflow-hidden">
    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Enter Your Details') }}
    </h3>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('donors.donated-date.update') }}">
        @method('PUT')

        @csrf

        <!-- Phone Number -->
        <div class="mt-4">
            <x-label class="required" for="phone" :value="__('Phone Number')" />

            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone') ?? optional($donor ?? null)->phone" placeholder="XXX8089XXX" required autofocus />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-label class="required" for="date_of_birth" :value="__('Date of Birth')" />

            <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth') ?? optional($donor ?? null)->date_of_birth" />
        </div>

        <!-- Last Donated Date -->
        <div class="mt-4">
            <x-label class="required" for="last_donated_date" :value="__('Last Donated Date')" />

            <x-input id="last_donated_date" class="block mt-1 w-full" type="date" name="last_donated_date" :value="old('last_donated_date') ?? optional($donor ?? null)->last_donated_date" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Save') }}
            </x-button>
        </div>
    </form>
</div>
