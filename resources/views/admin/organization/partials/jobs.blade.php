<div class="container">
    @if ($jobPostings->isEmpty())
        <!-- Message when there are no job postings -->
        <p class="text-muted">No job postings found for this organization.</p>
        <!-- Add Jobs Button -->
        <a class="btn btn-success" href="{{ route('jobs.create', $organization->id) }}">Add Job</a>
    @else
        <!-- Job Postings Table -->

        <table class="table table-hover table-responsive">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Type</th>
                    <th>Address</th>
                    <th><a class="btn btn-primary" href="{{ route('jobs.create', $organization->id) }}">Add Job</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobPostings as $job)
                    <tr>
                        <td class="align-middle">{{ $job->job_title }}</td>
                        <td class="align-middle">{{ $job->company }}</td>
                        <td class="align-middle">{{ $job->job_type }}</td>
                        <td class="align-middle">{{ $job->address }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group">
                                <!-- View Job -->
                                <a href="{{ route('jobs.view', $job->id) }}" class="btn btn-success btn-sm">View</a>
                                <!-- Edit Job -->
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Delete Job -->
                                <form action="{{ route('jobs.delete', $job->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this job?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
