<x-app-layout>
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
                            {{ __('Application Form') }}
                        </h2>
                        @if ($application->isEmpty())
                            <a href="{{ route('upload.create') }}" type="button" class="btn btn-primary">Create</a>
                        @endif
                    </div>
                    <hr>
                    <div>
                        @if ($application->isEmpty())
                            <p class="text-center p-6" colspan="5">No Application Found.</p>
                        @else
                            <table class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                        <th>Job Position</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($application as $form)
                                        <tr>
                                            <td class="align-middle">
                                                <p>{{ $form->first_name }} {{ $form->last_name }} </p>
                                            </td>
                                            <td class="align-middle">{{ $form->email }}</td>
                                            <td class="align-middle">{{ $form->phone_number }}</td>
                                            <td class="align-middle">{{ $form->job_position }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('upload.edit', $form->id) }}" type="button"
                                                        class="btn btn-warning">Edit</a>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        Delete
                                                    </button>
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
                                                                Are you sure you want to delete your application form?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('upload.delete', $form->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Yes</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close">No</button>
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
        </div>
    </div>
</x-app-layout>
