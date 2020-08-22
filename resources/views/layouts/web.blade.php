<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Freelancer - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('web/assets/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('web/css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
    .spinner-container {
        position: fixed;
        background-color: #0009;
        width: 100%;
        height: 110%;
        z-index: 10000;
        top: 0;
    }

    @keyframes spinner {
        to {transform: rotate(360deg);}
    }
    .spinner {
        content: '';
        box-sizing: border-box;
        position: relative;
        top: 37%;
        left: 46%;
        height: 150px;
        width: 150px;
        margin-top: -15px;
        margin-left: -15px;
        border-radius: 50%;
        border: 1px solid #ccc;
        border-top-color: #07d;
        animation: spinner .6s linear infinite;
    }
    a {
        cursor: pointer;
        cursor: hand;
    }
    </style>
</head>

<body id="page-top">
    <div id="app">
        <div class="spinner-container" v-show="loading_screen" style="display:none;"><div class="spinner"></div></div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Testings.com</a>
                <button
                    class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                    type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @if(auth()->user())
                        <li class="nav-item mx-0 mx-lg-1">
                            {!! Form::open(['route' => 'logout', 'id' => 'logout-form']) !!}
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
                            {!! Form::close() !!}
                        </li>
                        @else
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('index') }}">Exams</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{ asset('web/assets/img/avataaars.svg') }}" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">
                    Hello {{ auth()->user() ? auth()->user()->name : 'Guest' }}!
                </h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">
                    Test your knowledge and take some of our exams now!
                </p>
            </div>
        </header>

        @yield('content')

        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">
                    About
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto">
                        <p class="lead">
                            Freelancer is a free bootstrap theme created by
                            Start Bootstrap. The download includes the
                            complete source files including HTML, CSS, and
                            JavaScript as well as optional SASS stylesheets
                            for easy customization.
                        </p>
                    </div>
                    <div class="col-lg-4 mr-auto">
                        <p class="lead">
                            You can create your own custom avatar for the
                            masthead, change the icon in the dividers, and
                            add your email address to the contact form to
                            make it fully functional!
                        </p>
                    </div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/themes/freelancer/">
                        <i class="fas fa-download mr-2"></i>
                        Free Download!
                    </a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            2215 John Daniel Drive
                            <br />
                            Clark, MO 65243
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                                class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                                class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                                class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                                class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">
                            About Freelancer
                        </h4>
                        <p class="lead mb-0">
                            Freelance is a free to use, MIT licensed
                            Bootstrap theme created by
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>Copyright © Your Website 2020</small>
            </div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
                    class="fa fa-chevron-up"></i></a>
        </div>
    </div>
    <!-- <script type="text/javascript" src="{{ asset('dashboard/vendor/sweetalert.min.js') }}"></script>
    @include('sweetalert') -->
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="{{
                asset('web/assets/mail/jqBootstrapValidation.js')
            }}"></script>
    <script src="{{ asset('web/assets/mail/contact_me.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('web/js/scripts.js') }}"></script>
    @yield('scripts')
</body>

</html>
