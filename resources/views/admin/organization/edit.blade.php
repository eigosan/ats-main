<x-admin-app-layout>
    <div class="container py-6">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card for Editing Organization -->
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Organization</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form Start -->
                        <form action="{{ route('organization.update', $organization->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Organization Name -->
                            <div class="mb-3">
                                <label for="organization_name" class="form-label">Organization Name</label>
                                <input type="text" class="form-control" id="organization_name"
                                    name="organization_name" value="{{ $organization->organization_name }}" required>
                            </div>

                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ $organization->location }}">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $organization->description }}</textarea>
                            </div>

                            <!-- Headcount -->
                            <div class="mb-3">
                                <label for="headcount" class="form-label">Headcount</label>
                                <input type="number" class="form-control" id="headcount" name="headcount"
                                    min="0" value="{{ $organization->headcount }}">
                            </div>

                            <!-- Job Status -->
                            <div class="mb-3">
                                <label for="job_status" class="form-label">Job Status</label>
                                <select class="form-select" id="job_status" name="job_status" required>
                                    <option value="Open" {{ $organization->job_status === 'Open' ? 'selected' : '' }}>
                                        Open</option>
                                    <option value="Closed"
                                        {{ $organization->job_status === 'Closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>

                            <!-- Job Stage -->
                            <div class="mb-3">
                                <label for="job_stage" class="form-label">Job Stage</label>
                                <select class="form-select" id="job_stage" name="job_stage" required>
                                    <option value="Application"
                                        {{ $organization->job_stage === 'Application' ? 'selected' : '' }}>Application
                                    </option>
                                    <option value="Interview"
                                        {{ $organization->job_stage === 'Interview' ? 'selected' : '' }}>Interview
                                    </option>
                                    <option value="Offer" {{ $organization->job_stage === 'Offer' ? 'selected' : '' }}>
                                        Offer</option>
                                    <option value="Hired"
                                        {{ $organization->job_stage === 'Hired' ? 'selected' : '' }}>Hired</option>
                                    <option value="Rejected"
                                        {{ $organization->job_stage === 'Rejected' ? 'selected' : '' }}>Rejected
                                    </option>
                                </select>
                            </div>

                            <!-- Created By -->
                            <div class="mb-3">
                                <label for="created_by" class="form-label">Created By</label>
                                <input type="text" class="form-control" id="created_by" name="created_by"
                                    value="{{ $organization->created_by }}" readonly>
                            </div>

                            <!-- Updated By -->
                            <div class="mb-3">
                                <label for="updated_by" class="form-label">Updated By</label>
                                <input type="text" class="form-control" id="updated_by" name="updated_by"
                                    value="{{ auth()->user()->name }}" readonly>
                            </div>

                            <!-- Form Buttons -->
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2"
                                    onclick="window.history.back()">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
