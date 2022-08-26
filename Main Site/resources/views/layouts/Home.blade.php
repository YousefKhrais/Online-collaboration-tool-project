<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Online Collaboration Tool</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset("Home/assets/img/favicon.png")}}" rel="icon">
    <link href="{{asset("Home/assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {{--    <link href="{{asset("Home/vendor/animate.css/animate.min.css")}}" rel="stylesheet">--}}
    <link href="{{asset("Home/assets/vendor/aos/aos.css")}}" rel="stylesheet">
    <link href="{{asset("Home/assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("Home/assets/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
    <link href="{{asset("Home/assets/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
    <link href="{{asset("Home/assets/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link href="{{asset("Home/assets/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset("Home/assets/css/style.css")}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    @yield("style")

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{route("home")}}">Mentor</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0 ">
            <ul>
                <li><a class="active" href="{{route("home")}}">Home</a></li>
                <li><a href="{{route("about")}}">About</a></li>
                <li><a href="{{route("courses")}}">Courses</a></li>
                <li><a href="{{route("trainers")}}">Trainers</a></li>
                <li><a href="{{route("contact")}}">Contact</a></li>

                @auth("student")
                    @include("layouts.LoginRegisterMenu.StudentLoginRegisterMenu")
                @elseauth("teacher")
                    @include("layouts.LoginRegisterMenu.TeacherLoginRegisterationMenu")
                @else
                    <li class="dropdown">
                        <a href="#">
                            <span>Login/Register</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="{{route("studentLogin")}}">Student Login</a></li>
                            <li><a href="{{route("teacherLogin")}}">Teacher Login</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
{{-- yields here --}}
@yield("HomeSection")
@yield("About")
@yield("courses")
@yield("trainers")
@yield("pricing")
@yield("contact")
@yield("courseDetails")
@yield("loginPage")
@yield("studentProfile")
@yield("editStudentProfile")
@yield("teacherLogin")
@yield("teacherProfile")
@yield("editTeacherProfile")
@yield("TeacherCourses")
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Mentor</h3>
                    <p>
                        Al Remal St. <br>
                        Gaza Strip, Gaza P860<br>
                        Palestine <br><br>
                        <strong>Phone:</strong> +970594111772<br>
                        <strong>Email:</strong> yousef.khrais@programming-mentor.site<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset("Home/assets/vendor/purecounter/purecounter.js")}}"></script>
<script src="{{asset("Home/assets/vendor/aos/aos.js")}}"></script>
<script src="{{asset("Home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("Home/assets/vendor/swiper/swiper-bundle.min.js")}}"></script>
<script src="{{asset("Home/assets/vendor/php-email-form/validate.js")}}"></script>

<!-- Template Main JS File -->
<script src="{{asset("Home/assets/js/main.js")}}"></script>
@yield("scripts")
</body>

</html>
