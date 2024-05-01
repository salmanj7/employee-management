<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <a href="{{route('company.create')}}" class="bg-blue-500 text-blue px-4 py-2 inline-block">CreateCompany</a>
                <a href="{{route('employee.create')}}" class="bg-green-500 text-green px-4 py-2 inline-block">Create Employee</a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($companies as $company)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 flex flex-col">
                        <div>
                            <a href="{{route('company.show',$company->id)}}"><h3 class="text-lg font-semibold">{{ $company->name }}</h3></a>
                            <p class="text-gray-600">{{ $company->email }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
