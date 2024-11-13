<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filtered Resumes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Job Position</th>
                                <th>Education</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filteredResumes as $resume)
                            <tr>
                                <td>{{ $resume->first_name }}</td>
                                <td>{{ $resume->last_name }}</td>
                                <td>{{ $resume->job_position }}</td>
                                <td>{{ $resume->education }}</td>
                                <td><a href="{{ route('resume.view', $resume->id) }}" class="text-blue-600">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
