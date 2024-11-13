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
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <!-- Personal Information Section -->
                            <h3 class="font-semibold text-lg text-gray-800 ">Personal Information</h3>
                            <div class="row mb-2">
                                <div class="col">
                                    <x-input-label for="first_name" :value="__('First Name')" />
                                    <x-text-input id="first_name" class="p-1 mt-1 w-full text-sm" type="text"
                                        name="first_name" required autofocus />
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                </div>
                                <div class="col">
                                    <x-input-label for="last_name" :value="__('Last Name')" />
                                    <x-text-input id="last_name" class="p-1 mt-1 w-full text-sm" type="text"
                                        name="last_name" required />
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mt-1">
                                <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input placeholder="sampleEmail@email.com" id="email"
                                    class="mt-1 p-1 w-full text-sm" type="email" name="email" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="mt-1 p-1 w-full text-sm" type="tel"
                                    name="phone_number" required />
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="job_position" :value="__('Job Position')" />
                                <x-text-input id="job_position" class="mt-1 p-1 w-full text-sm" type="text"
                                    name="job_position" required />
                                <x-input-error :messages="$errors->get('job_position')" class="mt-2" />
                            </div>

                            <!-- Education Section -->
                            <h3 class="font-semibold text-lg text-gray-800 mt-4">Education</h3>
                            <div id="education-container">
                                <div class="education-item mb-2">
                                    <div class="mt-1">
                                        <x-input-label for="education_level[]" :value="__('Education Level')" />
                                        <x-text-input class="mt-1 p-1 w-full text-sm" type="text"
                                            name="education_level[]" required />
                                    </div>
                                    <div class="mt-1">
                                        <x-input-label for="institution[]" :value="__('Institution Name')" />
                                        <x-text-input class="mt-1 p-1 w-full text-sm" type="text"
                                            name="institution[]" required />
                                    </div>
                                    <div class="mt-1">
                                        <x-input-label for="graduation_year[]" :value="__('Year of Graduation')" />
                                        <x-text-input class="mt-1 p-1 w-full text-sm" type="number"
                                            name="graduation_year[]" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Work Experience Section -->
                            <h3 class="font-semibold text-lg text-gray-800 mt-4">Work Experience</h3>
                            <div id="work-experience-container">
                                <div class="work-experience-item mb-2">
                                    <div class="mt-1">
                                        <x-input-label for="company_name[]" :value="__('Company Name')" />
                                        <x-text-input class="mt-1 p-1 w-full text-sm" type="text"
                                            name="company_name[]" required />
                                    </div>
                                    <div class="mt-1">
                                        <x-input-label for="position[]" :value="__('Job Position')" />
                                        <x-text-input class="mt-1 p-1 w-full text-sm" type="text" name="position[]"
                                            required />
                                    </div>
                                    <div class="mt-1">
                                        <x-input-label for="start_date[]" :value="__('Start Date')" />
                                        <x-text-input class="mt-1 p-1 w-full text-sm" type="date" name="start_date[]"
                                            required />
                                    </div>
                                    <div class="mt-1">
                                        <x-input-label for="end_date[]" :value="__('End Date')" />
                                        <x-text-input class="mt-1 p-1 w-full text-sm" type="date"
                                            name="end_date[]" />
                                    </div>
                                    <div class="mt-1">
                                        <x-input-label for="job_description[]" :value="__('Job Description')" />
                                        <textarea class="mt-1 p-1 w-full text-sm" name="job_description[]" rows="3"></textarea>
                                    </div>
                                    {{-- <button type="button"
                                        class="remove-work-experience mt-2 text-red-600">Remove</button> --}}
                                </div>
                            </div>

                            <!-- Skills Section -->
                            <h3 class="font-semibold text-lg text-gray-800 mt-4">Skills</h3>
                            <div class="mt-1">
                                <x-input-label for="skills" :value="__('Skills')" />
                                <textarea name="skills" id="skills" class="mt-1 p-1 form-control rounded border-none shadow-sm text-sm"
                                    type="text" rows="5" style="overflow:hidden; resize:none;" placeholder="(Optional)"></textarea>
                            </div>

                            <!-- Resume Upload Section -->
                            <h3 class="font-semibold text-lg text-gray-800 mt-4">Resume Upload</h3>
                            <div class="mt-1">
                                <label for="resume">Upload Resume (PDF/DOCX):</label>
                                <input type="file" name="resume" id="resume" accept=".pdf,.docx">
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <button type="submit"
                                class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                Submit
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

    <script>
        // Add Education Field
        document.getElementById('add-education').addEventListener('click', function() {
            const educationContainer = document.getElementById('education-container');
            const newEducation = document.createElement('div');
            newEducation.classList.add('education-item', 'mb-2');
            newEducation.innerHTML = `
                <div class="mt-1">
                    <x-input-label for="education_level[]" :value="__('Education Level')" />
                    <x-text-input class="mt-1 p-1 w-full text-sm" type="text" name="education_level[]" required />
                </div>
                <div class="mt-1">
                    <x-input-label for="institution[]" :value="__('Institution Name')" />
                    <x-text-input class="mt-1 p-1 w-full text-sm" type="text" name="institution[]" required />
                </div>
                <div class="mt-1">
                    <x-input-label for="graduation_year[]" :value="__('Year of Graduation')" />
                    <x-text-input class="mt-1 p-1 w-full text-sm" type="number" name="graduation_year[]" required />
                </div>
                <button type="button" class="remove-education mt-2 text-red-600">Remove</button>
            `;
            educationContainer.appendChild(newEducation);
        });

        // Remove Education Field
        document.getElementById('education-container').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-education')) {
                e.target.parentElement.remove();
            }
        });

        // Add Work Experience Field
        document.getElementById('add-work-experience').addEventListener('click', function() {
            const workExperienceContainer = document.getElementById('work-experience-container');
            const newWorkExperience = document.createElement('div');
            newWorkExperience.classList.add('work-experience-item', 'mb-2');
            newWorkExperience.innerHTML = `
                <div class="mt-1">
                    <x-input-label for="company_name[]" :value="__('Company Name')" />
                    <x-text-input class="mt-1 p-1 w-full text-sm" type="text" name="company_name[]" required />
                </div>
                <div class="mt-1">
                    <x-input-label for="position[]" :value="__('Job Position')" />
                    <x-text-input class="mt-1 p-1 w-full text-sm" type="text" name="position[]" required />
                </div>
                <div class="mt-1">
                    <x-input-label for="start_date[]" :value="__('Start Date')" />
                    <x-text-input class="mt-1 p-1 w-full text-sm" type="date" name="start_date[]" required />
                </div>
                <div class="mt-1">
                    <x-input-label for="end_date[]" :value="__('End Date')" />
                    <x-text-input class="mt-1 p-1 w-full text-sm" type="date" name="end_date[]" />
                </div>
                <div class="mt-1">
                    <x-input-label for="job_description[]" :value="__('Job Description')" />
                    <textarea class="mt-1 p-1 w-full text-sm" name="job_description[]" rows="3"></textarea>
                </div>
                <button type="button" class="remove-work-experience mt-2 text-red-600">Remove</button>
            `;
            workExperienceContainer.appendChild(newWorkExperience);
        });

        // Remove Work Experience Field
        document.getElementById('work-experience-container').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-work-experience')) {
                e.target.parentElement.remove();
            }
        });
    </script>
</x-app-layout>
