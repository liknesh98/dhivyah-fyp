<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">





    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <meta name="theme-color" content="#7952b3">


    <style>
        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1100; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link href="style.css" rel="stylesheet">
   <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Digital Learning</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

                    @if (Session :: has('success'))
                        <div class = "alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times</a>
                        <strong>SUCCESS!</strong> &nbsp;&nbsp;{{Session:: get('success')}}
                        </div>
                    @endif

                    @if (Session :: has('error'))
                        <div class = "alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times</a>
                        <strong>ERROR!</strong> &nbsp;&nbsp;{{Session:: get('error')}}
                        </div>
                    @endif

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="logout">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    @if (Auth::user()->role == 1)
                    <ul class="nav flex-column">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Students</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item" id="studyMaterial">




                                        <a class="nav-link " aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMain" aria-expanded="true" aria-controls="collapseMain">
                                            <span data-feather="home"></span>
                                            Study Material
                                        </a>



                                <div id="collapseMain" class="accordion-collapse collapse show" aria-labelledby="headingMain" data-bs-parent="#accordionExample">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              Year 1
                                            </button>
                                          </h2>
                                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                              <strong><a href="/student/study/1">Science</a></strong>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Year 2
                                              </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                              <strong><a href="/student/study/2">Science</a></strong>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Year 3
                                              </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                              <strong><a href="/student/study/3">Science</a></strong>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                Year 4
                                              </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                              <strong><a href="/student/study/4">Science</a></strong>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFive">
                                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                Year 5
                                              </button>
                                            </h2>
                                            <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                              <strong><a href="/student/study/5">Science</a></strong>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingSix">
                                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                Year 6
                                              </button>
                                            </h2>
                                            <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                              <strong><a href="/student/study/6">Science</a></strong>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                              </div>

                            </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('s_announcement') }}">
                                <span data-feather="layers"></span>
                                Announcement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Progress Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Help
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                FAQ
                            </a>
                        </li>
                    </ul>

                    @endif


                    @if (Auth::user()->role == 2)
                    <ul class="nav flex-column">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Teachers</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMain" aria-expanded="true" aria-controls="collapseMain">
                                            <span data-feather="home"></span>
                                            Manage Study Material
                                        </a>



                                <div id="collapseMain" class="accordion-collapse collapse show" aria-labelledby="headingMain" data-bs-parent="#accordionExample">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="notesheading">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#notes" aria-expanded="true" aria-controls="collapseOne">
                                            Add Notes
                                            </button>
                                          </h2>
                                          <div id="notes" class="accordion-collapse collapse show" aria-labelledby="notesheading" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                              <strong><a href="/teacher/notes">Notes</a></strong>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="exerciseheading">
                                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#exercise" aria-expanded="true" aria-controls="collapseTwo">
                                              Add Exercise
                                              </button>
                                            </h2>
                                            <div id="exercise" class="accordion-collapse collapse show" aria-labelledby="exerciseheading" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                              <strong><a href="/teacher/exercise">Exercise</a></strong>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="accordion-item">
                                            <h2 class="accordion-header" id="videoheading">
                                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#video" aria-expanded="true" aria-controls="collapseThree">
                                              Add Videos
                                              </button>
                                            </h2>
                                            <div id="video" class="accordion-collapse collapse show" aria-labelledby="videoheading" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">
                                              <strong><a href="/teacher/video">Videos</a></strong>
                                              </div>
                                            </div>
                                          </div>
                                         
                                         
                                      </div>
                              </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>
                    @endif

                    @if (Auth::user()->role == 3)
                    <ul class="nav flex-column mb-2">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Administrator</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('a_announcement') }}">
                                <span data-feather="file-text"></span>
                                Manage Announcement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('a_note') }}">
                                <span data-feather="file-text"></span>
                                Manage Notes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Manage Student List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Manage Fees
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Manage Registration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Manage Staff
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Profile
                            </a>
                        </li>
                    </ul>
                    @endif
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- page content -->
                @yield('content')
                <!-- /page content -->
            </main>
            <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>
