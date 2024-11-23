<div class="py-4">
    <h3>Organization Summary</h3>
    <ul>
        <li><strong>Name:</strong> {{ $organization->organization_name }}</li>
        <li><strong>Location:</strong> {{ $organization->location }}</li>
        <li><strong>Description:</strong> {{ $organization->description }}</li>
        <li><strong>Headcount:</strong> {{ $organization->headcount }}</li>
        <li><strong>Status:</strong> {{ $organization->job_status }}</li>
    </ul>
</div>
