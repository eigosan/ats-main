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
    <!-- Fonts -->

</head>

<body class="bg-gray-100">
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <section class="gradient-background max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="header">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid px-5 ">

                    <a class="h3 mt-2 fw-bold fill-current text-white" style="text-decoration:none;"
                        href="/">ATS</a>

                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="text-end">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-outline-warning">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>

                </div>
            </nav>
        </section>
    </header>
    <section class="hero" id="hero">
        <div class="overlay">
            <div class="container col-lg">
                <div class="row flex-lg-row-reverse align-items-center text-center">
                    <div class="col-lg">
                        <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="1800">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('resource/img/pesoLogo.png') }}" alt="Image"
                                        class="img-fluid centered-img" width="450px">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('resource/img/tarlacLogo.png') }}" alt="Image"
                                        class="img-fluid centered-img" width="450px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg mx-3 justify-content-center text-lg-start">
                        <h1 class="display-4 fw-bolder lh-1 mb-3 my-2">Application <br>Tracking System <br>with KNN &
                            NLP
                        </h1>
                        <p class="lead display-6">
                            Smart Hiring, Faster Matches: <br>Empowering PESO with <br>AI-Driven Recruitment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills">
        <div class=" container px-4 pt-4" id="hanging-icons">
            <div class="row g-3 py-3 row-cols-1 row-cols-lg-3">
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" fill="currentColor"
                            class="bi bi-file-code" viewBox="0 0 16 16">
                            <path
                                d="M6.646 5.646a.5.5 0 1 1 .708.708L5.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0a.5.5 0 1 0-.708.708L10.293 8 8.646 9.646a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2z" />
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                        </svg>
                    </div>
                    <div>
                        <h3>Automated Resume Screening</h3>
                        <p>Leverages Natural Language Processing (NLP) to analyze resumes, quickly identifying the most
                            qualified candidates based on relevant skills and experience.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </div>
                    <div>
                        <h3>Intelligent Candidate Matching</h3>
                        <p>Utilizes the K-Nearest Neighbor (KNN) algorithm to accurately match job seekers with job
                            openings, ensuring a better fit for both applicants and employers.</p>

                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </div>
                    <div>
                        <h3>User-Friendly<br> Interface</h3>
                        <p>Designed with simplicity in mind, allowing PESO staff and applicants to easily navigate the
                            system, track applications, and manage recruitment processes efficiently.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-me">
        <div class="about-me">
            <div class="container py-2 px-4">
                <p class="text-justify"> The <strong>Applicant Tracking System</strong> (ATS) with
                    <strong>K-Nearest
                        Neighbor</strong> (KNN)
                    Algorithm and <strong>Natural Language
                        Processing</strong> (NLP) is designed for the Public Employment Service Office (PESO) in Tarlac
                    City to
                    streamline and enhance their recruitment process. This system leverages advanced machine
                    learning
                    techniques, including the KNN algorithm, to efficiently classify and rank job applicants based on
                    various criteria such as qualifications, skills, and job relevance. NLP is integrated to analyze and
                    process unstructured data from resumes and cover letters, extracting key information and matching
                    candidates with suitable job listings. The goal of this ATS is to provide PESO with an intelligent,
                    automated tool that simplifies applicant screening, improves job matching accuracy, and accelerates
                    the employment process for both job seekers and employers in the local community.
                </p>

            </div>
        </div>
    </section>

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
    </section>
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
