<x-home-page>
    <div class="gradient-background">
        <div class="container mx-auto">
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm bg-dark-subtle">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->job_title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $job->company }}</h6>
                                <p class="card-text">{{ Str::limit($job->job_description, 100) }}</p>
                                <p class="card-text"><small class="text-muted">{{ $job->job_category }} |
                                        {{ $job->job_type }}</small></p>
                                <div class=" d-flex align-items-end justify-content-end pt-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#jobModal{{ $job->id }}">
                                            Details
                                        </button>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Apply Now</a>
                                        <!-- Details Button -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="jobModal{{ $job->id }}" tabindex="-1"
                        aria-labelledby="jobModalLabel{{ $job->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="jobModalLabel{{ $job->id }}">
                                        {{ $job->job_title }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Company:</strong> {{ $job->company }}</p>
                                    <p><strong>Address:</strong> {{ $job->address }}</p>
                                    <p><strong>Category:</strong> {{ $job->job_category }}</p>
                                    <p><strong>Type:</strong> {{ $job->job_type }}</p>
                                    <textarea readonly name="job_description" id="job_description" class="form-control rounded border-none text-sm"
                                        rows="10" style="overflow:auto; resize:vertical;" placeholder="(Optional)">{{ $job->job_description }}</textarea>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <a href="{{ route('login') }}" class="btn btn-success">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-home-page>
