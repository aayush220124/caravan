<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Car Rental">
    <meta name="keyword" content="taxi,car,rent,hire,transport">
    <meta name="author" content="">
    <!-- Title -->
    <title>Caravan Car Renal Service</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/frontend/img/favicon/favicon-32x32.png">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="/frontend/css/bootstrap.css">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css">
    <!--Magnific css-->
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css">
    <!--Animate css-->
    <link rel="stylesheet" href="/frontend/css/animate.min.css">
    <!--Datepicker css-->
    <link rel="stylesheet" href="/frontend/css/jquery.datepicker.css">
    <!--Nice Select css-->
    <link rel="stylesheet" href="/frontend/css/nice-select.css">
    <!-- Lightgallery css -->
    <link rel="stylesheet" href="/frontend/css/lightgallery.min.css">
    <!--ClockPicker css-->
    <link rel="stylesheet" href="/frontend/css/jquery-clockpicker.min.css">
    <!--Slicknav css-->
    <link rel="stylesheet" href="/frontend/css/slicknav.min.css">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="/frontend/css/style.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="/frontend/css/responsive.css">
</head>

<body>

    <!-- Header Top Area Start -->
    <section class="gauto-header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-top-left">
                        <p>Need Help?: <i class="fa fa-phone"></i> Call: +321 123 45 978</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-right">
                        <a href="<?= route_to('user.loginPage') ?>">
                            <i class="fa fa-key"></i>
                            login
                        </a>
                        <a href="<?= route_to('user.signupPage') ?>">
                            <i class="fa fa-user"></i>
                            register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Header Top Area End -->

    <!-- Main Header Area Start -->
    <header class="gauto-main-header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="site-logo">
                        <a href="index.html">
                            <img src="/frontend/img/logo.png" alt="gauto" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-9">
                    <div class="header-promo">
                        <div class="single-header-promo">
                            <div class="header-promo-icon">
                                <img src="/frontend/img/globe.png" alt="globe" />
                            </div>
                            <div class="header-promo-info">
                                <h3>Kitchener</h3>
                                <p>Ontario, Canada</p>
                            </div>
                        </div>
                        <div class="single-header-promo">
                            <div class="header-promo-icon">
                                <img src="/frontend/img/clock.png" alt="clock" />
                            </div>
                            <div class="header-promo-info">
                                <h3>Monday to Friday</h3>
                                <p>9:00am - 6:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="header-action">
                        <a href="#"><i class="fa fa-phone"></i> Request a call</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Header Area End -->


    <!-- Mainmenu Area Start -->
    <section class="gauto-mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mainmenu">
                        <nav>
                            <ul id="gauto_navigation">
                                <li><a href="<?= route_to('home') ?>">home</a></li>
                                <li><a href="<?= route_to('about') ?>">about</a></li>
                                <li><a href="<?= route_to('contact') ?>">contact</a></li>
                                <li><a href="#">Complate Booking</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">RVs</a></li>
                                <li><a href="#">Trailer</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mainmenu Area End -->


    <!-- Breadcromb Area Start -->
    <section class="gauto-breadcromb-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3>Set new password</h3>
                        <ul>
                            <li><i class="fa fa-home"></i></li>
                            <li><a href="index.html">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>Set new password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcromb Area End -->


    <!-- Login Area Start -->
    <section class="gauto-login-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box">
                        <div class="login-page-heading">
                            <i class="fa fa-key"></i>
                            <h3>Set new password</h3>
                        </div>

                        <!-- Display error message if exists -->
                        <?php if (session()->has('alert-danger')) : ?>
                            <div class="alert alert-danger text-left alert-dismissible fade show" role="alert">
                                <?= session('alert-danger') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Display success message if exists -->
                        <?php if (session()->has('alert-success')) : ?>
                            <div class="alert alert-success text-left alert-dismissible fade show" role="alert">
                                <?= session('alert-success') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <form name="loginForm" action="<?= route_to('user.newPasswordHandler') ?>" method="post" onsubmit="return validateForm()">
                            <?= csrf_field() ?>
                            <div class="account-form-group">
                                <input type="password" placeholder="Password" name="password" required>
                                <i class="fa fa-lock"></i>
                                <?php if (session()->has('errors') && isset(session('errors')['password'])) : ?>
                                    <div class="input-error">
                                        <?php echo esc(session('errors')['password']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="account-form-group">
                                <input type="password" placeholder="Confirm New Password" name="confirm-password" required>
                                <i class="fa fa-lock"></i>
                                <?php if (session()->has('errors') && isset(session('errors')['confirm-password'])) : ?>
                                    <div class="input-error">
                                        <?php echo esc(session('errors')['confirm-password']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <p>
                                <button type="submit" class="gauto-theme-btn">Set new password</button>
                            </p>
                        </form>
                        <div class="login-sign-up">
                            <a href="<?= route_to('user.loginPage') ?>">Back to log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Area End -->


    <!-- Footer Area Start -->
    <footer class="gauto-footer-area">
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright">
                            <p>Design With <i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!--Jquery js-->
    <script src="/frontend/js/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="/frontend/js/popper.min.js"></script>
    <!--Bootstrap js-->
    <script src="/frontend/js/bootstrap.min.js"></script>
    <!--Owl-Carousel js-->
    <script src="/frontend/js/owl.carousel.min.js"></script>
    <!--Lightgallery js-->
    <script src="/frontend/js/lightgallery-all.js"></script>
    <script src="/frontend/js/custom_lightgallery.js"></script>
    <!--Slicknav js-->
    <script src="/frontend/js/jquery.slicknav.min.js"></script>
    <!--Magnific js-->
    <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
    <!--Nice Select js-->
    <script src="/frontend/js/jquery.nice-select.min.js"></script>
    <!-- Datepicker JS -->
    <script src="/frontend/js/jquery.datepicker.min.js"></script>
    <!--ClockPicker JS-->
    <script src="/frontend/js/jquery-clockpicker.min.js"></script>
    <!--Main js-->
    <script src="/frontend/js/main.js"></script>
</body>

</html>