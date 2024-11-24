<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($jobs->job_title) }}
        </h2>
        <!-- Status Dropdown -->
        <label for="statusDropdown" class="text-sm font-medium text-gray-700">Status</label>
        <div class="flex items-center">
            <!-- Status Select Dropdown -->
            <select id="statusDropdown" class="form-select block w-40 py-2 px-4 border rounded-lg"
                data-job-id="{{ $jobs->id }}">
                <option value="draft" @if ($jobs->status == 'draft') selected @endif>Draft</option>
                <option value="open" @if ($jobs->status == 'open') selected @endif>Open</option>
                <option value="closed" @if ($jobs->status == 'closed') selected @endif>Closed</option>
            </select>
        </div>
    </x-slot>
    <div class="max-w-full mx-auto sm:px-4 lg:px-6">
        <div class="kanban-scroll-container"
            style="overflow-x: auto; white-space: nowrap; padding: 10px; border: 1px solid #ddd; border-radius: 10px;">
            <div class="kanban-container row flex-nowrap" style="display: inline-flex; gap: 20px;">
                @foreach (['new', 'selection', 'in_review', 'shortlisted', 'rejected', 'hired'] as $status)
                    <div class="col-md-3"
                        style="flex: 0 0 auto; width: 300px; margin-right: 10px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                        <div class="card border-secondary mb-3"
                            style="border-radius: 10px; border: none; overflow: hidden;">
                            <div class="card-header bg-secondary text-white text-center"
                                style="border-bottom: 2px solid #ccc; font-weight: bold;">
                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                            </div>
                            <div class="card-body kanban-column" data-status="{{ $status }}"
                                style="max-height: 500px; overflow-y: auto; padding: 10px; background-color: #ffffff;">
                                @foreach ($applicants->where('status', $status) as $applicant)
                                    <div class="card mb-2 kanban-item" data-id="{{ $applicant->id }}"
                                        style="border-radius: 8px; border: 1px solid #e0e0e0; background-color: #fdfdfd;">
                                        <div class="card-body" style="padding: 10px;">
                                            <h5 class="card-title"
                                                style="font-size: 16px; font-weight: 600; color: #333;">
                                                {{ $applicant->first_name }} {{ $applicant->last_name }}
                                            </h5>
                                            <p class="card-text" style="font-size: 14px; color: #555;">
                                                <strong>Email:</strong> {{ $applicant->email }} <br>
                                                <strong>Position:</strong> {{ $applicant->job_position }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin-app-layout>
