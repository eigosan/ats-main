<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Form') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('upload.update', $application->id) }}" method="POST"
                        enctype="multipart/form-data"> <!-- added enctype -->
                        @csrf <!-- moved these 2 out of the container -->
                        @method('PUT') <!-- moved these 2 out of the container -->
                        <div class="container">
                            <div class="row mb-2">
                                <div class="container">
                                    <!-- Personal Information Section -->
                                    <h3 class="font-semibold text-lg text-gray-800 ">Personal Information</h3>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <x-input-label for="first_name" :value="__('First Name')" />
                                            <x-text-input id="first_name" class="p-1 mt-1 w-full text-sm" type="text"
                                                name="first_name" value="{{ $application->first_name }}" required
                                                autofocus />
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
                                        <x-input-label for="age" :value="__('Age')" />
                                        <x-text-input id="age" class="mt-1 p-1 w-full text-sm" type="number"
                                            name="age" value="{{ $application->age }}" required />
                                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                    </div>

                                    <!-- Education Section -->
                                    <h3 class="font-semibold text-lg text-gray-800 mt-3">Education</h3>
                                    <div id="education-container">
                                        <div class="education-item mb-2">
                                            <div class="row">
                                                <div class="col mt-1">
                                                    {{-- <x-input-label for="education_level" :value="__('Education Level')" />
                                                <x-text-input class="mt-1 p-1 w-full text-sm" type="text"
                                                    name="education_level" required /> --}}
                                                    <div class="form-group">
                                                        <x-input-label for="education_level" :value="__('Education Level')" />
                                                        <select class="form-control mt-1 p-1 w-full text-sm"
                                                            id="education_level" name="education_level"
                                                            value="{{ $application->education_level }}" required>
                                                            <option value="no_formal_education">No Formal Education
                                                            </option>
                                                            <option value="high_school">High School</option>
                                                            <option value="some_college_university">Some
                                                                College/University
                                                            </option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                    </div>

                                                    <!-- Other Education Level (Visible only when 'Others' is selected) -->
                                                    <div class="form-group mt-1" id="other_education_group"
                                                        style="display: none;">
                                                        <x-input-label for="education_level" :value="__('Please Specify')" />
                                                        <x-text-input type="text"
                                                            class="form-control mt-1 p-1 w-full text-sm"
                                                            id="other_education" name="other_education"
                                                            placeholder="Enter your education level"
                                                            value="{{ $application->education_level }}" />
                                                    </div>
                                                </div>

                                                <div class="col mt-1">
                                                    <x-input-label for="graduation_year" :value="__('Year of Graduation')" />
                                                    <x-text-input class="mt-1 p-1 w-full text-sm" type="number"
                                                        name="graduation_year"
                                                        value="{{ $application->graduation_year }}" required />
                                                </div>
                                            </div>
                                            <div class="mt-1">
                                                <x-input-label for="institution" :value="__('Institution Name')" />
                                                <x-text-input class="mt-1 p-1 w-full text-sm" type="text"
                                                    name="institution" value="{{ $application->institution }}"
                                                    required />
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Work Experience Section -->
                                    <h3 class="font-semibold text-lg text-gray-800 mt-3">Work Experience</h3>
                                    <div id="work-experience-container">
                                        <div class="work-experience-item mb-2">
                                            <div class="row">
                                                <div class="col mt-1">
                                                    <x-input-label for="company_name" :value="__('Company Name')" />
                                                    <x-text-input class="mt-1 p-1 w-full text-sm" type="text"
                                                        name="company_name"
                                                        value="{{ $application->company_name }}" />
                                                </div>
                                                <div class="col mt-1">
                                                    <x-input-label for="position" :value="__('Job Position')" />
                                                    <x-text-input class="mt-1 p-1 w-full text-sm" type="text"
                                                        name="position" value="{{ $application->position }}" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mt-1">
                                                    <x-input-label for="start_date" :value="__('Start Date')" />
                                                    <x-text-input class="mt-1 p-1 w-full text-sm" type="date"
                                                        name="start_date" value="{{ $application->start_date }}" />
                                                </div>
                                                <div class="col mt-1">
                                                    <x-input-label for="end_date" :value="__('End Date')" />
                                                    <x-text-input class="mt-1 p-1 w-full text-sm" type="date"
                                                        name="end_date" value="{{ $application->end_date }}" />
                                                </div>
                                            </div>
                                            <div class="mt-1">
                                                <x-input-label for="job_description" :value="__('Job Description')" />
                                                <textarea name="job_description" id="skills" class="mt-1 p-1 form-control rounded border-none shadow-sm text-sm"
                                                    type="text" rows="5" style="overflow:hidden; resize:none;">{{ $application->job_description }}</textarea>
                                            </div>
                                            {{-- <button type="button"
                                            class="remove-work-experience mt-2 text-red-600">Remove</button> --}}
                                        </div>
                                    </div>

                                    <!-- Skills Section -->
                                    <h3 class="font-semibold text-lg text-gray-800 mt-3">Additional Info</h3>
                                    <div class="mt-1">
                                        <x-input-label for="skills" :value="__('Skills')" />
                                        <textarea name="skills" id="skills" class="mt-1 p-1 form-control rounded border-none shadow-sm text-sm"
                                            type="text" rows="5" style="overflow:hidden; resize:none;" placeholder="(Optional)">{{ $application->skills }}</textarea>
                                    </div>

                                    <!-- Resume Upload Section -->
                                    <h3 class="font-semibold text-lg text-gray-800 mt-3">Upload Resume</h3>
                                    <div class="mt-1">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="resume"
                                                        name="resume" accept=".pdf,.docx" required>
                                                    <label class="input-group-text" for="resume">Browse</label>
                                                </div>
                                            </div>
                                        </div>
                                        @if (isset($application->resume) && $application->resume)
                                            <div class="mt-2">
                                                <p>Existing Resume: <strong>{{ $application->resume }}</strong></p>
                                                <a href="{{ Storage::url('public/resumes/' . $application->resume) }}"
                                                    target="_blank" class="text-blue-500">Download Existing Resume</a>
                                            </div>
                                        @endif
                                        <div class="form-text">
                                            Accepted formats: PDF, DOCX. Please upload a file no larger than 5MB.
                                        </div>
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
