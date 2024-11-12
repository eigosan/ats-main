<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('resource/css/style.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body class="bg-gray-100">
    <div class="min-h-screen bg-gray-100">
        @include('homepage.layouts.nav')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>




    {{-- 
    <section id="upload">
        <div class="resume-upload container">
            <div class="position-relative p-5 text-center text-muted bg-body-tertiary border rounded-5">
                <h1>Upload your resume to get started</h1>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="login-btn btn btn-outline-secondary px-5 mt-5">
                                Upload your resume
                            </a>
                        @endauth
                    </nav>
                @endif
                <p class="col-lg-6 mx-auto mb-3">
                    as .pdf or .docx file
                </p>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="overlay2">
            <div class="container px-5 py-3">
                <div class="row  row-cols-md-2 align-items-md-center">
                    <div class="text-start pb-3">
                        <img src="{{ asset('resource/img/pesoLogo.png') }}" alt="Peso Logo" width="200px">
                        <img src="{{ asset('resource/img/tarlacLogo.png') }}" alt="Tarlac Logo" width="200px">
                    </div>

                    <div class="text-end">
                        <h2 class="pb-3 text-end">Follow Us</h2>
                        <div class="col d-flex flex-column py-2">
                            <p>dummyemail@gmail.com <svg xmlns="http://www.w3.org/2000/svg" height="30"
                                    class="px-2"
                                    viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                </svg></p>
                        </div>

                        <div class="col d-flex flex-column py2">
                            <p>+63123456789 <svg xmlns="http://www.w3.org/2000/svg" height="30" class="px-2"
                                    viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                </svg></p>
                        </div>


                        <div class="col d-flex flex-column py-2">
                            <p>facebook.com/PGTPESO2300
                                <a href="https://www.facebook.com/PGTPESO2300">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="30" class="px-2"
                                        viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                                    </svg>
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <footer class="gradient-background container-fluid py-2">
        <div class="d-flex flex-column align-items-center pt-2 text-white">
            <a href="/" class="nav-link">Application Tracking System with KNN & NLP</a>
            </ul>
            <p>© {{ date('Y') }} All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
