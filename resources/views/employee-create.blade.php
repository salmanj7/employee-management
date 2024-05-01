<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                            <select name="company_id" id="company_id" class="mt-1 p-2 border rounded-md w-full" required>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-md">Create Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
