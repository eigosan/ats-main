<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('upload.update', $application->id) }}" method="POST">
                        <div class="container">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col">
                                    <x-input-label for="first_name" :value="__('First Name')" />
                                    <x-text-input id="first_name" class="p-1 mt-1 w-full text-sm" type="text"
                                        name="first_name" value="{{ $application->first_name }}" required autofocus />
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                </div>
                                <div class="col">
                                    <x-input-label for="last_name" :value="__('Last Name')" />
                                    <x-text-input id="last_name" class="p-1 mt-1 w-full text-sm" type="text"
                                        name="last_name" value="{{ $application->last_name }}" required />
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mt-1">
                                <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input placeholder="sampleEmail@email.com" id="email"
                                    class="mt-1 p-1 w-full text-sm" type="email" name="email"
                                    value="{{ $application->email }}" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="mt-1 p-1 w-full text-sm" type="tel"
                                    name="phone_number" value="{{ $application->phone_number }}" required />
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="job_position" :value="__('Job Position')" />
                                <x-text-input id="job_position" class="mt-1 p-1 w-full text-sm" type="text"
                                    name="job_position" value="{{ $application->job_position }}" required />
                                <x-input-error :messages="$errors->get('job_position')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="additional_info" :value="__('Additional Info')" />
                                <textarea name="additional_info" id="additional_info"
                                    class="mt-1 p-1 form-control rounded border-none shadow-sm text-sm" type="text" oninput="autoExpand(this)"
                                    rows="5" style="overflow:hidden; resize:none;" placeholder="(Optional)">{{ $application->additional_info }}</textarea>
                            </div>
                            <button type="submit"
                                class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                Update
                            </button>
                            <button>
                                <a href="{{ route('upload.index') }}" type="button"
                                    class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700">Cancel</a>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
