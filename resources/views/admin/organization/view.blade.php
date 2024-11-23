<x-admin-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Organization Header -->
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h4">{{ $organization->organization_name }}</h1>
                        <div>
                            <span class="badge bg-secondary">{{ $organization->visibility }}</span>
                            <span class="badge bg-primary">{{ $organization->job_status }}</span>
                            <span class="ms-2 text-muted">{{ $organization->owner_name }}</span>
                        </div>
                        <a class="btn btn-secondary" href="{{ route('organization.index') }}">Back</a>
                    </div>

                    <!-- Tags Section -->
                    {{-- <div class="my-2">
                        <a href="#" class="text-decoration-none text-primary">+Tags</a>
                    </div> --}}

                    <!-- Navigation Tabs -->
                    @include('admin.organization.partials.nav-tabs', [
                        'activeTab' => $activeTab,
                        'organization' => $organization,
                    ])

                    <!-- Dynamic Section -->
                    <div class="mt-4">
                        @if ($activeTab === 'jobs')
                            @include('admin.organization.partials.jobs', ['organization' => $organization])
                        @elseif ($activeTab === 'summary')
                            @include('admin.organization.partials.summary', [
                                'organization' => $organization,
                            ])
                        @else
                            <p class="text-muted">Tab content not found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
