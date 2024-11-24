<x-admin-app-layout>
    <div class="py-6">
        <div class="container">
            <div class="bg-white shadow-sm rounded-lg p-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-semibold text-xl">Organizations</h2>
                    @if ($departments->isEmpty())
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createOrganizationModal">
                            Create
                        </button>
                        {{-- <a href="{{ route('organization.create') }}" type="button"
                        class="btn btn-primary">Create</a> --}}
                    @else
                        <p>Total: {{ $totalDepartments }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createOrganizationModal">
                            Add Organization
                        </button>
                    @endif
                </div>

                <!-- Filters and Actions -->
                {{-- <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="d-flex align-items-center gap-2">
                        <span>Segment:</span>
                        <select class="form-select form-select-sm w-auto">
                            <option value="all" selected>All</option>
                            <option value="active">Active</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-clockwise"></i>
                            Refresh</button>
                        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-funnel"></i> Filters</button>
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Export</a></li>
                            <li><a class="dropdown-item" href="#">Delete Selected</a></li>
                        </ul>
                    </div>
                </div> --}}

                <!-- Table Section -->
                <div class="mt-4">
                    @if ($departments->isEmpty())
                        <p class="text-center text-muted py-4">No Organizations Found.</p>
                    @else
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Organization Name</th>
                                    <th>Job</th>
                                    <th>Location</th>
                                    <th>Owner</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $organization)
                                    <tr>
                                        <td>
                                            <div>
                                                <a href="{{ route('organization.view', $organization->id) }}"
                                                    class="text-decoration-none">{{ $organization->organization_name }}</a>
                                            </div>
                                        </td>
                                        <td>{{ $organization->job_postings_count }}</td>
                                        <td>{{ $organization->location }}</td>
                                        <td>{{ $organization->owner }}</td>
                                        <td>{{ $organization->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('organization.edit', $organization->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item text-danger"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal fade " id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Warning</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the organization?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('organization.delete', $organization->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal" aria-label="Close">No</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Create Organization Modal -->
        <div class="modal fade" id="createOrganizationModal" tabindex="-1"
            aria-labelledby="createOrganizationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('organization.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="createOrganizationModalLabel">Create
                                Organization</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <x-input-label for="organization_name" :value="__('Organization Name')" />
                                <input type="text" class="form-control" id="organization_name"
                                    name="organization_name" required>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <x-input-label for="location" :value="__('Location')" />
                                    <input type="text" class="form-control" id="location" name="location">
                                </div>
                                <div class="mb-3">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
