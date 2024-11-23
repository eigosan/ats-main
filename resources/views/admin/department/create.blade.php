<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organization Creation') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="department_name" class="form-label">Department Name</label>
                            <input type="text" name="department_name" id="department_name" class="form-control"
                                value="{{ old('department_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="position_name" class="form-label">Position Name</label>
                            <input type="text" name="position_name" id="position_name" class="form-control"
                                value="{{ old('position_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="job_status" class="form-label">Job Status</label>
                            <select name="job_status" id="job_status" class="form-control" required>
                                <option value="Open" {{ old('job_status') == 'Open' ? 'selected' : '' }}>Open</option>
                                <option value="Closed" {{ old('job_status') == 'Closed' ? 'selected' : '' }}>Closed
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="job_stage" class="form-label">Job Stage</label>
                            <select name="job_stage" id="job_stage" class="form-control" required>
                                <option value="Application" {{ old('job_stage') == 'Application' ? 'selected' : '' }}>
                                    Application</option>
                                <option value="Interview" {{ old('job_stage') == 'Interview' ? 'selected' : '' }}>
                                    Interview</option>
                                <option value="Offer" {{ old('job_stage') == 'Offer' ? 'selected' : '' }}>Offer
                                </option>
                                <option value="Hired" {{ old('job_stage') == 'Hired' ? 'selected' : '' }}>Hired
                                </option>
                                <option value="Rejected" {{ old('job_stage') == 'Rejected' ? 'selected' : '' }}>
                                    Rejected</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Department</button>
                        <a href="{{ route('department.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
