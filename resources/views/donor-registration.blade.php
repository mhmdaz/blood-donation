<x-guest-layout>
    <header class="mt-20 pt-10 sm:px-6 lg:px-8">
        <h2 class="px-6 font-semibold text-3xl text-white leading-tight">
            {{ __('Register Yourself as Donor') }}
        </h2>
    </header>

    <div class="pt-6 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-donor.form />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>