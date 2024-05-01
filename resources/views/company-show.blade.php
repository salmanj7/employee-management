<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ $company->name }}</h3>
                    <p class="mb-4"><strong>Email:</strong> {{ $company->email }}</p>
                    <p class="mb-4"><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ asset('storage/'.$company->logo) }}" alt="{{ $company->name }} Logo" class="w-32 h-32">
                </div>

                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Employees</h3>
                    @if ($company->employees->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">First Name</th>
                                        <th class="px-4 py-2">Last Name</th>
                                        <th class="px-4 py-2">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company->employees as $employee)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $employee->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $employee->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $employee->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No employees found for this company.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
