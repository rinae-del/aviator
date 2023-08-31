<?php
session_start();
require_once "../st/connection.php";
$sql = "SELECT * FROM profile";
$rslt = mysqli_query($conn, $sql);
$users = mysqli_num_rows($rslt);

$sql = "SELECT SUM(amount) FROM history WHERE type = 'Earned From aviator'";
$rslt = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rslt);
$earned = $row['SUM(amount)'];

$sql = "SELECT SUM(amount) FROM cointransactions";
$rslt = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rslt);
$sold = $row['SUM(amount)'];

$sql = "SELECT SUM(coins) FROM profile";
$rslt = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rslt);
$coins = $row['SUM(coins)'];



?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from theme-land.com/sapp/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 May 2023 11:00:59 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Discover a revolutionary peer-to-peer earning platform that empowers individuals to unlock their financial potential. Join our community and experience a secure and transparent ecosystem where you can connect with other users to buy, sell, and trade assets directly. Earn passive income, explore investment opportunities, and unleash the power of your network. Take control of your financial future with our innovative peer-to-peer earning platform." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Peer To Peer Aviator</title>

    <!-- Favicon  -->
    <link rel="icon" href="../../assets/img/favicon.png">

    <!-- ***** All CSS Files ***** -->

    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!--====== Scroll To Top Area End ======-->

    <div class="main">
        <!-- ***** Header Start ***** -->
        <header class="navbar navbar-sticky navbar-expand-lg navbar-dark">
            <div class="container position-relative">
                <a class="navbar-brand" href="index.html">
                    <img class="navbar-brand-regular" src="assets/img/logo/logo-white.png" width="80px" alt="brand-logo">
                    <!-- <img class="navbar-brand-sticky" src="assets/img/logo/logo.png" alt="sticky brand-logo"> -->
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-inner">
                    <!--  Mobile Menu Toggler -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownMenuLink" >
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Telegram Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../st/register">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../st/login">Login</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- ***** Header End ***** -->

        <!-- ***** Welcome Area Start ***** -->
        <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Welcome Intro Start -->
                    <div class="col-12 col-md-7 col-lg-6">
                        <div class="welcome-intro">
                            <h1 class="text-white">No Loss Peer To Peer Aviator</h1>
                            <p class="text-white my-4">Earn money every 12 hours by playing a captivating Aviator game. Invest in other participants within the decentralized system, eliminating the need to send funds to an admin. Enjoy full control over your investments and financial decisions. Start your journey to financial growth today!</p>
                            <!-- Store Buttons -->

                            <span class="d-inline-block text-white fw-3 font-italic mt-3">*You have the option to deposit directly to admin or participate to decentralized market. Your call.</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-6">
                        <!-- Welcome Thumb -->
                        <div class="welcome-thumb mx-auto" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
                            <img src="assets/img/welcome/welcome-mockup.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shape Bottom -->
            <div class="shape-bottom">
                <svg viewBox="0 0 1920 310" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg replaced-svg">
                    <title>sApp Shape</title>
                    <desc>Created with Sketch</desc>
                    <defs></defs>
                    <g id="sApp-Landing-Page" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="sApp-v1.0" transform="translate(0.000000, -554.000000)" fill="#FFFFFF">
                            <path d="M-3,551 C186.257589,757.321118 319.044414,856.322454 395.360475,848.004007 C509.834566,835.526337 561.525143,796.329212 637.731734,765.961549 C713.938325,735.593886 816.980646,681.910577 1035.72208,733.065469 C1254.46351,784.220361 1511.54925,678.92359 1539.40808,662.398665 C1567.2669,645.87374 1660.9143,591.478574 1773.19378,597.641868 C1848.04677,601.75073 1901.75645,588.357675 1934.32284,557.462704 L1934.32284,863.183395 L-3,863.183395" id="sApp-v1.0"></path>
                        </g>
                    </g>
                </svg>
            </div>
        </section>
        <!-- ***** Welcome Area End ***** -->

        <!-- ***** Counter Area Start ***** -->
        <section class="section counter-area ptb_50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-5 col-sm-3 single-counter text-center">
                        <div class="counter-inner p-3 p-md-0">
                            <!-- Counter Item -->
                            <div class="counter-item d-inline-block mb-3">
                                <span class="counter fw-7"><?php echo $users ?></span><span class="fw-7"></span>
                            </div>
                            <h5>Users</h5>
                        </div>
                    </div>
                    <div class="col-5 col-sm-3 single-counter text-center">
                        <div class="counter-inner p-3 p-md-0">
                            <!-- Counter Item -->
                            <div class="counter-item d-inline-block mb-3">
                            <span class="fw-7">R</span><span class="counter fw-7"><?php echo $earned ?></span>
                            </div>
                            <h5>Money Earned</h5>
                        </div>
                    </div>
                    <div class="col-5 col-sm-3 single-counter text-center">
                        <div class="counter-inner p-3 p-md-0">
                            <!-- Counter Item -->
                            <div class="counter-item d-inline-block mb-3">
                          <span class="counter fw-7"><?php echo $sold ?></span>
                            </div>
                            <h5>Coins Sold</h5>
                        </div>
                    </div>
                    <div class="col-5 col-sm-3 single-counter text-center">
                        <div class="counter-inner p-3 p-md-0">
                            <!-- Counter Item -->
                            <div class="counter-item d-inline-block mb-3">
                           <span class="counter fw-7"><?php echo $users ?></span>
                            </div>
                            <h5>Coins In Circulation.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Counter Area End ***** -->

        <!-- ***** Features Area Start ***** -->
        <section id="features" class="section features-area style-two overflow-hidden ptb_100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <span class="d-inline-block rounded-pill shadow-sm fw-5 px-4 py-2 mb-3">
                                <i class="far fa-lightbulb text-primary mr-1"></i>
                                <span class="text-primary">Premium</span>
                                Features
                            </span>
                            <h2>What Makes Us Different?</h2>
                            <p class="d-none d-sm-block mt-4">We give power to our users. Your money, your freedom. Let no one be in control.</p>
                            <p class="d-block d-sm-none mt-4">We give power to our users. Your money, your freedom. Let no one be in control.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 res-margin">
                        <!-- Image Box -->
                        <div class="image-box text-center icon-1 p-5 wow fadeInLeft" data-wow-delay="0.4s">
                            <!-- Featured Image -->
                            <div class="featured-img mb-3">
                                <img class="avatar-sm" src="assets/img/icon/featured-img/layers.png" alt="">
                            </div>
                            <!-- Icon Text -->
                            <div class="icon-text">
                                <h3 class="mb-2">Decentralized</h3>
                                <p>No admin needed. Buy and Sell with other users. Fee-free transactions. Get 5% extra on coin purchases from other users. Start earning now.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 res-margin">
                        <!-- Image Box -->
                        <div class="image-box text-center icon-1 p-5 wow fadeInUp" data-wow-delay="0.2s">
                            <!-- Featured Image -->
                            <div class="featured-img mb-3">
                                <img class="avatar-sm" src="assets/img/icon/featured-img/speak.png" alt="">
                            </div>
                            <!-- Icon Text -->
                            <div class="icon-text">
                                <h3 class="mb-2">Send Money</h3>
                                <p>Instant, free money transfers. Send funds to any member effortlessly using their username. No fees, no hassle. Start sending money now.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <!-- Image Box -->
                        <div class="image-box text-center icon-1 p-5 wow fadeInRight" data-wow-delay="0.4s">
                            <!-- Featured Image -->
                            <div class="featured-img mb-3">
                                <img class="avatar-sm" src="assets/img/icon/featured-img/lock.png" alt="">
                            </div>
                            <!-- Icon Text -->
                            <div class="icon-text">
                                <h3 class="mb-2">Flexibility</h3>
                                <p>Trustworthy peer-to-peer platform. Buy and sell securely within your trusted network, build your own transaction team. Make money together.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Features Area End ***** -->

        <!-- ***** Service Area Start ***** -->
        <section class="section service-area bg-gray overflow-hidden ptb_100">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-6 order-2 order-lg-1">
                        <!-- Service Text -->
                        <div class="service-text pt-4 pt-lg-0">
                            <h2 class="text-capitalize mb-4">Aviate your earnings every 12 hours.</h2>
                            <!-- Service List -->
                            <ul class="service-list">
                                <!-- Single Service -->
                                <li class="single-service media py-2">
                                    <div class="service-icon pr-4">
                                        <span><i class="fab fa-buffer"></i></span>
                                    </div>
                                    <div class="service-text media-body">
                                        <p>Earn every 12 hours playing a thrilling aviator game. Unlike betting, you never lose. Make money with fellow players.</p>
                                    </div>
                                </li>
                                <!-- Single Service -->
                                <li class="single-service media py-2">
                                    <div class="service-icon pr-4">
                                        <span><i class="fas fa-brush"></i></span>
                                    </div>
                                    <div class="service-text media-body">
                                        <p>Sell your earnings at anytime without limit. You can sell your coins every single day, weekends included.</p>
                                    </div>
                                </li>
                                <!-- Single Service -->
                                <li class="single-service media py-2">
                                    <div class="service-icon pr-4">
                                        <span><i class="fas fa-burn"></i></span>
                                    </div>
                                    <div class="service-text media-body">
                                        <p>Upgrade your account and earn more. You can buy a higher level to earn more money every 12 hours.</p>
                                    </div>
                                </li>
                                <!-- Single Service -->

                            </ul>
                            <a href="../st/register" class="btn btn-bordered mt-4">Aviate Now</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 order-1 order-lg-2 d-none d-lg-block">
                        <!-- Service Thumb -->
                        <div class="service-thumb mx-auto">
                            <img src="assets/img/features/thumb-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Service Area End ***** -->

        <!-- ***** Discover Area Start ***** -->
        <section class="section discover-area overflow-hidden ptb_100">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-6 order-2 order-lg-1">
                        <!-- Discover Thumb -->
                        <div class="service-thumb discover-thumb mx-auto pt-5 pt-lg-0">
                            <img src="assets/img/discover/iphone_x.png" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-1 order-lg-2">
                        <!-- Discover Text -->
                        <div class="discover-text pt-4 pt-lg-0">
                            <h2 class="pb-4 pb-sm-0">Unlock a world of possibilities and opportunities.</h2>
                            <p class="d-none d-sm-block pt-3 pb-4">Aviator is designed for a wide range of users, including recruiters, investors, and individuals seeking to generate income within their team. Join us to explore new avenues for financial growth and maximize your earning potential.</p>
                            <!-- Check List -->
                            <ul class="check-list">
                                <li class="py-1">
                                    <!-- List Box -->
                                    <div class="list-box media">
                                        <span class="icon align-self-center"><i class="fas fa-check"></i></span>
                                        <span class="media-body pl-3"> Aviator offers a range of rewards and benefits to participants, providing additional incentives for engagement and financial growth.</span>
                                    </div>
                                </li>
                                <li class="py-1">
                                    <!-- List Box -->
                                    <div class="list-box media">
                                        <span class="icon align-self-center"><i class="fas fa-check"></i></span>
                                        <span class="media-body pl-3">The platform encourages collaboration and teamwork, allowing users to buy and sell among their team members, creating a supportive and interconnected community.</span>
                                    </div>
                                </li>
                                <li class="py-1">
                                    <!-- List Box -->
                                    <div class="list-box media">
                                        <span class="icon align-self-center"><i class="fas fa-check"></i></span>
                                        <span class="media-body pl-3">Aviator eliminates transaction fees, enabling participants to transfer funds without incurring additional costs.</span>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Discover Area End ***** -->

        <!-- ***** Work Area Start ***** -->
        <section class="section work-area bg-overlay overflow-hidden ptb_100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <!-- Work Content -->
                        <div class="work-content text-center">
                            <h2 class="text-white">How to start?</h2>
                            <p class="d-none d-sm-block text-white my-3 mt-sm-4 mb-sm-5">It's easy to get started. All you need is an active email address for verification.</p>
                            <p class="d-block d-sm-none text-white my-3">It's easy to get started. All you need is an active email address for verification.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <!-- Single Work -->
                        <div class="single-work text-center p-3">
                            <!-- Work Icon -->
                            <div class="work-icon">
                                <img class="avatar-md" src="assets/img/icon/work/download.png" alt="">
                            </div>
                            <h3 class="text-white py-3">Register Account</h3>
                            <p class="text-white">Open an account using an active email address, Your email will be used for verification. Only Gmail email addresses accepted.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <!-- Single Work -->
                        <div class="single-work text-center p-3">
                            <!-- Work Icon -->
                            <div class="work-icon">
                                <img class="avatar-md" src="assets/img/icon/work/settings.png" alt="">
                            </div>
                            <h3 class="text-white py-3">Setup your profile</h3>
                            <p class="text-white">Navigate to profile and update your personal information. Make sure your information is accurate because it will be displayed to buyers.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <!-- Single Work -->
                        <div class="single-work text-center p-3">
                            <!-- Work Icon -->
                            <div class="work-icon">
                                <img class="avatar-md" src="assets/img/icon/work/app.png" alt="">
                            </div>
                            <h3 class="text-white py-3">Enjoy the features!</h3>
                            <p class="text-white">Start enjoying endless features and awesome admin team. We are constantly active to help where you don't understand.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Work Area End ***** -->

        <!-- ***** FAQ Area Start ***** -->
        <section class="section faq-area style-two ptb_100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2 class="text-capitalize">Frequently asked questions</h2>
                            <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                            <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <!-- FAQ Content -->
                        <div class="faq-content">
                            <!-- sApp Accordion -->
                            <div class="accordion" id="sApp-accordion">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-6">
                                        <!-- Single Card -->
                                        <div class="card border-0">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn px-0 py-3" type="button">
                                                    How does Aviator work?
                                                    </button>
                                                </h2>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body px-0 py-3">
                                            Aviator is a peer-to-peer platform where participants can engage in financial transactions with each other. Users can deposit, withdraw, and transfer funds directly to other participants without the need for intermediaries.
                                            </div>
                                        </div>
                                        <!-- Single Card -->
                                        <div class="card border-0">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn px-0 py-3" type="button">
                                                    Is Aviator safe and secure?
                                                    </button>
                                                </h2>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body px-0 py-3">
                                            Yes, Aviator prioritizes the security of user transactions and personal information. It implements robust security measures, encryption protocols, and follows best practices to ensure a secure environment for participants.
                                            </div>
                                        </div>
                                        <!-- Single Card -->
                                        <div class="card border-0">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn px-0 py-3" type="button">
                                                    Are there any fees for transactions on Aviator?
                                                    </button>
                                                </h2>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body px-0 py-3">
                                            Aviator is committed to providing cost-free peer to peer transactions. There are no additional fees imposed on deposits, withdrawals, or transfers within the platform. You are charged 15% if you choose to withdraw through admin.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <!-- Single Card -->
                                        <div class="card border-0">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn px-0 py-3" type="button">
                                                    Can I buy and sell coins on Aviator?
                                                    </button>
                                                </h2>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body px-0 py-3">
                                            Yes, Aviator allows participants to buy and sell coins among themselves. Users can explore opportunities to invest, trade, and collaborate with other members to maximize their financial growth.
                                            </div>
                                        </div>
                                        <!-- Single Card -->
                                        <div class="card border-0">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn px-0 py-3" type="button">
                                                    Can I invite friends to join Aviator?
                                                    </button>
                                                </h2>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body px-0 py-3">
                                            Yes, Aviator encourages participants to invite friends and expand their network. Through the referral program, users can earn rewards and bonuses when their referred friends join and actively participate on the platform.
                                            </div>
                                        </div>
                                        <!-- Single Card -->
                                        <div class="card border-0">
                                            <!-- Card Header -->
                                            <div class="card-header bg-inherit border-0 p-0">
                                                <h2 class="mb-0">
                                                    <button class="btn px-0 py-3" type="button">
                                                    How often can I withdraw funds from Aviator?
                                                    </button>
                                                </h2>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body px-0 py-3">
                                            Participants can withdraw funds from Aviator at any time based on their preferences and financial goals. The platform provides flexibility for users to manage their funds according to their individual needs.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="text-body text-center pt-4 px-3 fw-5">Haven't find suitable answer? <a href="#">Tell us what you need.</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** FAQ Area End ***** -->

        <!--====== Footer Area End ======-->
    </div>


    <!-- ***** All jQuery Plugins ***** -->

    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="assets/js/jquery/jquery.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Active js -->
    <script src="assets/js/active.js"></script>
</body>


<!-- Mirrored from theme-land.com/sapp/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 May 2023 11:01:18 GMT -->
</html>