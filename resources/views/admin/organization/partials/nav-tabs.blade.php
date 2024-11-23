<ul class="nav nav-tabs my-4">
    <li class="nav-item">
        <a class="nav-link {{ $activeTab == 'jobs' ? 'active' : '' }}"
            href="{{ route('organization.view', ['id' => $organization->id, 'tab' => 'jobs']) }}">
            Jobs
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $activeTab == 'summary' ? 'active' : '' }}"
            href="{{ route('organization.view', ['id' => $organization->id, 'tab' => 'summary']) }}">
            Summary
        </a>
    </li>
    <!-- Add more tabs as needed -->
</ul>
