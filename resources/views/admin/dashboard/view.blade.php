<x-admin-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between pb-2">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Application Form') }}
                            </h2>
                            <a href="{{ route('/admin/dashboard') }}" type="button" class="btn btn-primary">Return</a>
                        </div>
                        @foreach ($application as $form)
                            <div class="p-3 shadow-sm sm:rounded-lg ">
                                <div class="col">
                                    <p>Name: <strong>{{ $form->first_name }} {{ $form->last_name }}</strong></p>
                                </div>
                                <div class="col pt-2">
                                    <p>Job Position: <strong>{{ $form->age }}</strong> </p>
                                </div>
                                <div class="col pt-2">
                                    <p>Email: <strong>{{ $form->email }}</strong></p>
                                </div>
                                <div class="col pt-2">
                                    <p>Phone Number: <strong>{{ $form->phone_number }}</strong> </p>
                                </div>
                            </div>
                            <div class="p-3 shadow-sm sm:rounded-lg ">
                                <p><strong>Additional Info</strong></p>
                                <textarea readonly name="additional_info" id="additional_info" class="mt-1 p-1 form-control rounded border-none text-sm"
                                    type="text" oninput="autoExpand(this)" rows="5" style="overflow:hidden; resize:none;"
                                    placeholder="(Optional)">{{ $form->additional_info }}</textarea>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-app-layout>
