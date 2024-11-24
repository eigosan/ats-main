<x-admin-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>MAPAPALITAN TO, MAGIGING JOB PIPELINE</h1>
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between text-end pb-2">
                            <h1></h1>
                            <a href="{{ route('jobs.index') }}" type="button" class="btn btn-primary">Return</a>
                        </div>

                        <div class="p-3 shadow-sm sm:rounded-lg ">
                            <div class="row">
                                <div class="col">
                                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                                        {{ $jobs->job_title }}
                                    </h1>
                                </div>
                                <div class="col">
                                    <h2><strong>{{ $jobs->job_type }}</strong> </h2>
                                </div>
                            </div>
                            <div class="col pt-2">
                                <h2><strong>{{ $jobs->company }}</strong> </h2>
                            </div>
                            <div class="col pt-2">
                                <p>{{ $jobs->address }}</p>
                            </div>
                        </div>

                        <div class="p-3 shadow-sm sm:rounded-lg ">
                            <p><strong>{{ $jobs->job_category }}</strong> </p>
                            <textarea readonly name="job_description" id="job_description" class="mt-1 p-1 form-control rounded border-none text-sm"
                                rows="10" style="overflow:auto; resize:vertical;" placeholder="(Optional)">{{ $jobs->job_description }}</textarea>

                        </div>
                        <div class=" d-flex align-items-end justify-content-end pt-2">
                            <div class="btn-group">
                                <a href="{{ route('jobs.edit', $jobs->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Delete
                                </button>
                            </div>
                        </div>



                    </div>
                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Warning</h1>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete your Job listing?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('jobs.delete', $jobs->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-app-layout>
