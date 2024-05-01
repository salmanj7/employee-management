<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                            <input type="file" name="logo" id="logo" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="website" class="block text-sm font-medium text-gray-700">Website URL</label>
                            <input type="url" name="website" id="website" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 px-4 py-2 rounded-md">Save Company</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
