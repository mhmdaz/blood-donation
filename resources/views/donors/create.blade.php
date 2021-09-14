<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full sm:max-w-md mx-auto px-6 py-4 bg-white overflow-hidden">
                        <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                            {{ __('Add New Donor') }}
                        </h3>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('donors.store') }}">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Phone Number -->
                            <div class="mt-4">
                                <x-label for="phone" :value="__('Phone Number')" />

                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                            </div>

                            <!-- Blood Group -->
                            <div class="mt-4">
                                <x-label for="blood_group_id" :value="__('Blood Group')" />

                                <select id="blood_group_id" name="blood_group_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                                    @foreach($blood_groups as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- State -->
                            <div class="mt-4">
                                <x-label for="state_id" :value="__('State')" />

                                <select id="state_id" name="state_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                                    @foreach($states as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- District -->
                            <div class="mt-4">
                                <x-label for="district_id" :value="__('District')" />

                                <select id="district_id" name="district_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                                    @foreach($districts as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Last Donated Date -->
                            <div class="mt-4">
                                <x-label for="last_donated_date" :value="__('Last Donated Date')" />

                                <x-input id="last_donated_date" class="block mt-1 w-full" type="date" name="last_donated_date" :value="old('last_donated_date')" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Save') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
