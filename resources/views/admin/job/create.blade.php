<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Listing Creation') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('jobs.store') }}" method="POST">
                        <div class="container">
                            @csrf
                            <!-- Hidden input for the organization ID -->
                            <input type="hidden" name="organization_id" value="{{ $organization->id }}">


                            <div class="row mb-2">
                                <!-- Job Title -->
                                <div class="col">
                                    <x-input-label for="job_title" :value="__('Job Title')" />
                                    <x-text-input id="job_title" class="p-1 mt-1 w-full text-sm" type="text"
                                        name="job_title" required autofocus />
                                    <x-input-error :messages="$errors->get('job_title')" class="mt-2" />
                                </div>
                                <!-- Job Type -->
                                <div class="col">
                                    <x-input-label for="job_type" :value="__('Type')" />
                                    <select id="job_type" name="job_type"
                                        class="form-select border rounded border-secondary-subtle shadow-sm p-1 mt-1 w-full text-sm">
                                        <option value="Full-time">Full-time</option>
                                        <option value="Part-time">Part-time</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                </div>
                            </div>
                            <!-- Company -->
                            <div class="mt-1">
                                <x-input-label for="company" :value="__('Company')" />
                                <x-text-input id="company" class="mt-1 p-1 w-full text-sm" type="text"
                                    name="company" required />
                                <x-input-error :messages="$errors->get('company')" class="mt-2" />
                            </div>
                            <!-- Address -->
                            <div class="mt-1">
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" class="mt-1 p-1 w-full text-sm" type="text"
                                    name="address" required />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                            <!-- Job Category -->
                            <div class="mt-1">
                                <x-input-label for="job_category" :value="__('Job Category')" />
                                <x-text-input placeholder="e.g., Marketing, Finance, Healthcare, Education, IT.."
                                    id="job_category" class="mt-1 p-1 w-full text-sm" type="text" name="job_category"
                                    required />
                                <x-input-error :messages="$errors->get('job_category')" class="mt-2" />
                            </div>
                            <!-- Job Description -->
                            <div class="mt-1">
                                <x-input-label for="job_description" :value="__('Job Description')" />
                                <textarea name="job_description" id="job_description"
                                    class="mt-1 p-1 form-control rounded border-none shadow-sm text-sm" type="text" oninput="autoExpand(this)"
                                    rows="8" style="overflow:hidden; resize:none;" placeholder="(Detailed Job details)" required></textarea>
                                <x-input-error :messages="$errors->get('job_description')" class="mt-2" />
                            </div>
                            <!-- Submit Button -->
                            <button type="submit"
                                class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                Post
                            </button>
                            <!-- Cancel Button -->
                            <a href="{{ route('jobs.index') }}"
                                class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
