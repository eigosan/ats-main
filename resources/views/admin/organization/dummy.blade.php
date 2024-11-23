<x-admin-app-layout>
    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-between p-2">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Organization') }}
                        </h2>

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
                                +
                            </button>
                        @endif
                    </div>
                    <hr>
                    <div>
                        @if ($departments->isEmpty())
                            <p class="text-center p-6">No Organizations Found.</p>
                        @else
                            <table class="table table-hover table-responsive">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $organization)
                                        <tr>
                                            <td class="align-middle">
                                                <p>{{ $organization->organization_name }}</p>
                                            </td>
                                            <td class="align-middle">{{ $organization->location }}</td>
                                            <td class="align-middle">{{ $organization->description }}</td>
                                            <td class="align-middle">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('organization.view', $organization->id) }}"
                                                        class="btn btn-primary">Open</a>
                                                    {{-- <form action="{{ route('admin.organization.destroy', $organization->id) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this organization?')">
                                                            Delete
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

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
                                                <input type="text" class="form-control" id="location"
                                                    name="location">
                                            </div>
                                            <div class="mb-3">
                                                <x-input-label for="description" :value="__('Description')" />
                                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-admin-app-layout>
