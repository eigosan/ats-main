<x-admin-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Admin Dashboard') }}
                </h2>
            </x-slot>
            <div class="container-fluid ">
                {{-- cards --}}
                {{-- <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Primary Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Warning Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Success Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Danger Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- charts --}}
                <div class="row pt-2">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between p-3">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ __('Organizations') }}
                                </h2>
                                @if ($departments->isEmpty())
                                    <a class="btn btn-primary" href="{{ route('organization.index') }}">+</a>
                                @else
                                    <p>Total: {{ $totalDepartments }}</p>
                                    <a class="btn btn-primary" href="{{ route('organization.index') }}">+</a>
                                @endif
                            </div>
                            <div class="card-body" style="height: 300px; overflow-y: auto;">
                                <div>
                                    @if ($departments->isEmpty())
                                        <p class="text-center text-muted py-4">No Organizations Found.</p>
                                    @else
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Organization Name</th>
                                                    <th>Job Count</th>
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
                                                        <td>{{ $organization->jobs_count }}</td>
                                                        <td>{{ $organization->created_at->format('Y-m-d') }}</td>
                                                        <td>
                                                            <a href="{{ route('organization.view', $organization->id) }}"
                                                                class="btn btn-secondary">view</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between p-3">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ __('Job Listing') }}
                                </h2>
                                @if ($jobs->isEmpty())
                                    <a href="{{ route('jobs.index') }}" type="button" class="btn btn-primary">+</a>
                                @else
                                    <p>Total: {{ $jobsTotal }}</p>
                                    <a href="{{ route('jobs.index') }}" type="button" class="btn btn-primary">+</a>
                                @endif
                            </div>
                            <div class="card-body" style="height: 300px; overflow-y: auto;">
                                <div>
                                    @if ($jobs->isEmpty())
                                        <p class="text-center p-6" colspan="5">No Listings Found.</p>
                                    @else
                                        <table class="table table-hover table-responsive">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Organization</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jobs as $form)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <p>{{ $form->job_title }}</p>
                                                        </td>
                                                        <td class="align-middle">{{ $form->job_type }}</td>
                                                        <td class="align-middle">
                                                            {{ $form->organization->organization_name }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <a href="{{ route('jobs.view', $form->id) }}"
                                                                    type="button" class="btn btn-success">View</a>

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
                    </div>
                </div>
                {{-- List --}}
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between p-3">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Application Form List') }}
                        </h2>
                        @if ($application->isEmpty())
                            <a href="" type="button" class="btn btn-primary">Upload Now</a>
                        @else
                            <p>Total: {{ $totalApplication }}</p>
                        @endif
                    </div>
                    <div class="card-body" style="height: 300px; overflow-y: auto;">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div>
                                @if ($application->isEmpty())
                                    <p class="text-center p-6" colspan="5">No Applications Found.</p>
                                @else
                                    <table class="table table-hover table-striped-columns table-responsive">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Job Position</th>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Phone Number</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($application as $form)
                                                <tr>
                                                    <td class="align-middle">{{ $form->job_position }}</td>
                                                    <td class="align-middle">
                                                        <p>{{ $form->first_name }} {{ $form->last_name }} </p>
                                                    </td>
                                                    <td class="align-middle">{{ $form->email }}</td>
                                                    <td class="align-middle">{{ $form->phone_number }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('admin.dashboard.view', $form->user_id) }}"
                                                                type="button" class="btn btn-success">View</a>
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
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
