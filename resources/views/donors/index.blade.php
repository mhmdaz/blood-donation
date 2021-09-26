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
                                <th>Actions</th>
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
            let csrf_token = '{{ csrf_token() }}';

            $(document).ready(function () {
                $('#donors_table').DataTable({
                    serverSide: true,
                    ajax: {
                        url: '/donors/datatable',
                        type: 'POST',
                        data: {
                            _token: csrf_token,
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
                        {
                            data: 'actions',
                            render: function (data, type, row) {
                                let html = `<div class="flex justify-center">
                                                <a href="${data.urls.edit}">
                                                    <img class="h-4 w-4" src="/assets/images/edit.svg" />
                                                </a>`

                                if (data.urls.delete) {
                                    html += `<form method="POST" action="${data.urls.delete}" class="ml-2">
                                                <input type="hidden" name="_method" value="DELETE">

                                                <input type="hidden" name="_token" value="${csrf_token}">

                                                <button type="submit">
                                                    <img class="h-5 w-5" src="/assets/images/delete.svg" />
                                                </button>
                                            </form>`
                                }

                                html += `</div>`
                                return html
                            }
                        },
                    ],
                });
            });
        </script>
    @endpush
</x-app-layout>
