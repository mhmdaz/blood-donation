<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donors') }}
        </h2>

        <x-anchor-button href="{{ route('donors.create') }}">
            {{ __('+ Add Donor') }}
        </x-anchor-button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="donors_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>District</th>
                                <th>State</th>
                                <th>Status</th>
                                <th>Last Donated Date</th>
                            </tr>
                        </thead>

                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('datatable-scripts')
        <script type="text/javascript" defer>
            $(document).ready(function () {
                $('#donors_table').DataTable({
                    serverSide: true,
                    ajax: {
                        url: '/donors/datatable',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                    },
                    columns: [
                        { data: 'name' },
                        { data: 'phone' },
                        { data: 'email' },
                        { data: 'district' },
                        { data: 'state' },
                        { data: 'status' },
                        { data: 'last_donated_date' },
                    ],
                });
            });
        </script>
    @endpush
</x-app-layout>
