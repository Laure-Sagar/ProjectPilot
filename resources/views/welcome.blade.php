<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="ICO Crypto is a modern and elegant landing page, created for ICO Agencies and digital crypto currency investment website.">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Project Pilot | Navigate Your Project</title>
    <link rel="stylesheet" href="assets/css/vendor.bundle.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="theme-dark io-zinnia" data-spy="scroll" data-target="#mainnav" data-offset="80">
    <!-- Header -->
    <header class="site-header is-sticky">
        <!-- Place Particle Js -->
        <div id="particles-js" class="particles-container particles-js"></div><!-- Navbar -->
        <div class="navbar navbar-full navbar-expand-lg is-transparent" id="mainnav"><a class="navbar-brand animated"
                data-animate="fadeInDown" data-delay=".65" href="index.html">
                <img class="logo logo-dark" alt="logo" src="/assets/images/logo.png"
                    srcset="/assets/images/logo2x.png 2x">
                <img class="logo logo-light" alt="logo" src="/assets/images/logo-alt.png"
                    srcset="/assets/images/logo-alt2x.png 2x"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle"><span
                    class="navbar-toggler-icon"><span class="ti ti-align-justify"></span></span></button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">
                <ul class="navbar-nav animated remove-animation" data-animate="fadeInDown" data-delay=".75">
                    <li class="nav-item"><a class="nav-link menu-link" href="#benifits">Problem Analysis</a></li>
                    <li class="nav-item"><a class="nav-link menu-link" href="#team">Project Team Member</a></li>
                </ul>
                @auth
                <ul class="navbar-btns animated remove-animation" data-animate="fadeInDown" data-delay=".85">
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link"
                            href="/dashboard">DASHBOARD</a>
                    </li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline btn-outline-alt menu-link bg-dark"
                            href="/logout">LOGOUT</a></li>
                </ul>
                @else
                <ul class="navbar-btns animated remove-animation" data-animate="fadeInDown" data-delay=".85">
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link" href="/login">LOGIN</a>
                    </li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline btn-outline-alt menu-link bg-dark"
                            href="/register">REGISTER</a></li>
                </ul>
                @endauth

            </div>
        </div><!-- End Navbar -->
        <!-- Banner/Slider -->
        <div id="header" class="banner banner-zinnia">
            <div class="ui-shape ui-shape-light ui-shape-header"></div>
            <div class="container">
                <div class="banner-content">
                    <div class="row align-items-center text-center justify-content-center">
                        <div class="col-sm-10 col-md-12 col-lg-10">
                            <div class="header-txt tab-center mobile-center">
                                <h1 class="animated" data-animate="fadeInUp" data-delay="1.25">ProjectPilot: The Nepal's
                                    1<sup>st</sup> Project Management Tool that <br class="d-none d-xl-block"> Helps in
                                    Project Development.
                                </h1>

                                <div class="gaps size-1x d-none d-md-block"></div>
                                <p class="lead animated text-white" data-animate="fadeInUp" data-delay="1.35">
                                    ProjectPilot aims to
                                    become the leading digital project management platform, providing a unique approach
                                    to rewarding contributors for <brclass="d-none d-sm-block">their efforts in
                                        achieving project success</p>
                            </div>
                        </div><!-- .col  -->
                    </div><!-- .row  -->
                </div><!-- .banner-content  -->
            </div><!-- .container  -->
        </div><!-- End Banner/Slider -->
    </header>
    <!-- Start Section -->
    <div class="section section-pad prblmsltn-section section-bg-alt bg-white" id="benifits">
        <div class="ui-shape ui-shape-s2"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-6 col-sm-8">
                    <div class="section-head-s7">
                        <h2 class="section-title-s7 animated" data-animate="fadeInUp" data-delay=".1">Problem &amp;
                            Solution</h2>
                    </div>
                </div>
            </div>
            <div class="prblmsltn-list">
                <div class="prblmsltn-item">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 animate-left delay-5ms">
                            <div class="prblm-item">
                                <h2 class="prblm-title text-green-700">Problem</h2>
                                <p>When working on a project with a large team, it's important to have tools that
                                    support multiple users and collaboration.
                                    Task dependencies must be properly identified and managed to avoid delays and other
                                    issues. Additionally, there are
                                    always risks associated with a project, and proper risk management is essential to
                                    identify and mitigate these risks to
                                    ensure project success.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 animate-right delay-7ms">
                            <div class="sltn-item">
                                <h2 class="sltn-title sltn-subtitle text-white">Solution</h2>
                                <ul class="sltn-points">
                                    <li>To ensure that the project is completed on time, within budget, and to the
                                        required quality standards.</li>
                                    <li>To track progress.</li>
                                    <li>Communicate the project plan to stakeholders.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Section -->
    <!-- Start Section -->

    <!-- Start Section -->
    <div class="section section-pad section-bg" id="team">
        <div class="ui-shape ui-shape-s5"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-head-s7">
                        <h2 class="section-title-s7 animated" data-animate="fadeInUp" data-delay=".1">Project Team
                            Members
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-sm-6 col-lg-3">
                    <div class="team-circle animated" data-animate="fadeInUp" data-delay=".3">
                        <div class="team-photo"><img src="https://ui-avatars.com/api/?name=Sahil+Bhewtal" alt="" /><a
                                href="#team-profile-1" class="expand-trigger content-popup"></a>
                        </div>
                        <div class="team-info">
                            <h5 class="team-name">Sahil Bhewtal</h5>

                        </div><!-- Start .team-profile  -->
                        <!-- .team-profile  -->
                    </div>
                </div><!-- .col  -->
                <div class="col-sm-6 col-lg-3">
                    <div class="team-circle animated" data-animate="fadeInUp" data-delay=".4">
                        <div class="team-photo"><img src="https://ui-avatars.com/api/?name=Sagar+Chhetri" alt="team"><a
                                href="#team-profile-2" class="expand-trigger content-popup"></a>
                        </div>
                        <div class="team-info">
                            <h5 class="team-name">Sagar Chhetri</h5>

                        </div><!-- Start .team-profile  -->
                    </div>
                </div><!-- .col  -->
                <div class="col-sm-6 col-lg-3">
                    <div class="team-circle animated" data-animate="fadeInUp" data-delay=".5">
                        <div class="team-photo"><img src="https://ui-avatars.com/api/?name=Pritha+Shrestha"
                                alt="team"><a href="#team-profile-3" class="expand-trigger content-popup"></a>
                        </div>
                        <div class="team-info">
                            <h5 class="team-name">Pritha Shrestha</h5>
                        </div>
                    </div><!-- .col  -->
                </div><!-- .row  -->
            </div>
        </div>

        <!-- Start Section -->
        <div class="section footer-section">
            <div class="ui-shape ui-shape-light ui-shape-footer"></div>
            <div class="container text-center mt-4 mb-4 text-white">
                Copyrights @Project Pilot. All Rights Reserved.
            </div><!-- .container -->
        </div><!-- End Section -->

        {{-- Preloader --}}
        {{-- <div id="preloader">
            <div id="loader"></div>
            <div class="loader-section loader-top"></div>
            <div class="loader-section loader-bottom"></div>
        </div> --}}
        <!-- Preloader End -->

        <!-- JavaScript  -->
        <script src="assets/js/jquery.bundle.js"></script>
        <script src="assets/js/script.js"></script>
</body>

</html>