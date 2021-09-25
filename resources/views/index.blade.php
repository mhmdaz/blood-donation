<x-guest-layout>
    <header class="mt-20 pt-10 sm:px-6 lg:px-8">
        <h2 class="px-6 font-semibold text-3xl text-white leading-tight">
            {{ __('Donors') }}
        </h2>
    </header>

    <div class="pt-6 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="donors_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Blood Group</th>
                                <th>District</th>
                                <th>State</th>
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
                        url: '/donors/datatable/active',
                        type: 'POST',
                        data: {
                            _token: document.querySelector('[name="csrf-token"]').getAttribute('content'),
                        },
                    },
                    columns: [
                        { data: 'name' },
                        { data: 'phone' },
                        { data: 'email' },
                        { data: 'blood_group' },
                        { data: 'district' },
                        { data: 'state' },
                        { data: 'last_donated_date' },
                    ],
                });
            });
        </script>
    @endpush
</x-guest-layout>