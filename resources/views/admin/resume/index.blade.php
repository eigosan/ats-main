<x-admin-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between p-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Filtered Resumes') }}
            </h2>
            <a class="btn btn-primary" href="{{ route('resume.filter') }}">Filter Now</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>Job title</th>
                                <th>Company</th>
                                <th>Address</th>
                                <th>Education</th>
                                <th>Job description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filteredResults as $resume)
                                <tr>
                                    <td>{{ $resume->job_title }}</td>
                                    <td>{{ $resume->company }}</td>
                                    <td>{{ $resume->address }}</td>
                                    <td>{{ $resume->job_description }}</td>
                                    <td><a href="" class="text-blue-600">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
