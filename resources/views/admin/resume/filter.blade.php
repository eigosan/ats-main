<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filter Resumes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="" method="POST">
                        @csrf
                        <!-- Job Position Filter -->
                        <div class="mt-4">
                            <x-input-label for="job_position" :value="__('Job Position')" />
                            <x-text-input id="job_position" class="mt-1 p-1 w-full text-sm" type="text"
                                name="job_position" />
                        </div>

                        <!-- Education Filter -->
                        <div class="mt-4">
                            <x-input-label for="education" :value="__('Education')" />
                            <x-text-input id="education" class="mt-1 p-1 w-full text-sm" type="text"
                                name="education" />
                        </div>

                        <button type="submit"
                            class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                            Filter Resumes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
