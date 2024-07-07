<?php
session_start();

include("./admin/connection/connection.php");

$fetch_logo = "SELECT * FROM `db_logo` WHERE `id` = 1";
$logo = mysqli_query($conn, $fetch_logo);
$logo = mysqli_fetch_assoc($logo);

$fetch_contact = "SELECT * FROM `db_contact` WHERE `id` = 1";
$contact = mysqli_query($conn, $fetch_contact);
$contact = mysqli_fetch_assoc($contact);

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);
    $sql = "INSERT INTO `db_contact_msg`(`name`, `email`, `subject`, `contact_number`, `message`) VALUES ('$name', '$email', '$subject', '$phone', '$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "Message Sent Successfully";
        header("Location: contact.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong.";
        echo "<script>console.log('Message Not Sent. " . mysqli_error($conn) . "')</script>";
        header("Location: contact.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="description" content="Haptic - Web And Agency HTML Template">
    <meta name="keywords" content="agency, app, business, company, corporate, designer, freelance, fullpage, modern, office, personal, portfolio, professional, web, web agency">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="./logo/<?php echo $logo['logo']; ?>" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/flaticon_aina.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="home-1">
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>
    <div class="cursor"></div>

    <!-- Start of header section
	============================================= -->
    <?php include("./header.php");
    ?>
    <!-- Sidebar sidebar Item -->
    <div class="xs-sidebar-group info-group">
        <div class="xs-overlay xs-bg-black">
            <div class="row loader-area">
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
            </div>
        </div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget text-uppercase">
                        <i class="fal fa-times"></i> Close
                    </a>
                </div>
                <div class="sidebar-textwidget">

                    <!-- Sidebar Info Content -->
                    <div class="sidebar-info-contents headline pera-content">
                        <div class="content-inner">
                            <div class="sidebar-logo">
                                <a href="#"><img src="assets/img/logo/logo2.png" alt=""></a>
                            </div>
                            <div class="sidebar-menu ul-li-block">
                                <ul>
                                    <li><a href="about.html"><i class="fal fa-home"></i> About Us </a></li>
                                    <li><a href="service.html"><i class="fal fa-cogs"></i> Service </a></li>
                                    <li><a href="testimonila.html"><i class="fal fa-comments-alt"></i> Testimonial </a>
                                    </li>
                                    <li><a href="team.html"><i class="fal fa-users"></i> Our Team </a></li>
                                    <li><a href="portfolio.html"><i class="fal fa-briefcase"></i> Portfolio </a></li>
                                    <li><a href="blog.html"><i class="fal fa-blog"></i> Blog </a></li>
                                    <li><a href="contact.html"><i class="fal fa-envelope"></i> Contact </a></li>
                                </ul>
                            </div>
                            <div class="sidebar-more-menu text-uppercase d-flex ul-li">
                                <span>More:</span>
                                <ul>
                                    <li><a href="#">My Account </a></li>
                                    <li><a href="#">Job Apply </a></li>
                                    <li><a href="#">Privacy Policy </a></li>
                                </ul>
                            </div>
                            <div class="sidebar-social ul-li-block">
                                <span>Social:</span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i> Dribble</a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                                </ul>
                            </div>
                            <div class="sidebar-copyright text-center">
                                © Copyright 2023. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of header section
	============================================= -->

    <br><br><br><br>

    <section id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14475.479940924219!2d67.07226698663793!3d24.902416080639007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f30a80523ff%3A0xf18a3ecfe7cffbdd!2sNational%20Stadium%20Karachi!5e0!3m2!1sen!2s!4v1719946789874!5m2!1sen!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- Start of contact info section
	============================================= -->
    <section id="bi-contact-info" class="bi-contact-info-section inner-page-padding">
        <div class="container">
            <div class="bi-contact-info-content">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-6">
                                <div class="bi-contact-info-item position-relative">

                                    <h5>Email Address</h5>
                                    <p class="mb-0"><?= $contact['email_one'] ?></p>
                                    <p class="mb-0"><?= $contact['email_two'] ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="bi-contact-info-item position-relative">

                                    <h5>Phone Number</h5>
                                    <p class="mb-0"><?= $contact['contact_number_one'] ?></p>
                                    <p class="mb-0"><?= $contact['contact_number_two'] ?></p>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="bi-contact-info-item position-relative">

                                    <h3>Address</h3>
                                    <p href="#"><?= $contact['address'] ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <form class="mt-lg-5" method="post">
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control m-2" placeholder="Your Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control m-2" placeholder="Your Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="subject" class="form-control m-2" placeholder="Subject">
                            </div>
                            <div class="form-group mb-3">
                                <input type="tel" name="phone" class="form-control m-2" placeholder="Your Phone Number">
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control m-2" name="message" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary m-2">Submit</button>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </section>
    <!-- End of contact info section
	============================================= -->

    <br><br>

    <!-- Start of Footer  section
	============================================= -->
    <footer id="bi-footer" class="bi-footer-section">
        <div class="hap-footer-copyright text-center">
            © 2024 All Rights Reserved.
        </div>
    </footer>
    <!-- End of Footer  section
	============================================= -->


    <!-- For Js Library -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/knob.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <script src="assets/js/ScrollSmoother.min.js"></script>
    <script src="assets/js/SplitText.min.js"></script>
    <script src="assets/js/jquery.filterizr.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/hover-revel.js"></script>
    <script src="assets/js/split-type.min.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/jquery.marquee.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/tilt.jquery.min.js"></script>
    <script src="assets/js/matter.min.js"></script>
    <script src="assets/js/script.js"></script>

    <?php

    if (isset($_SESSION["success"])) {
        echo "<script>
        toastr.success('" . $_SESSION["success"] . "')
        </script>";
    }

    if (isset($_SESSION["error"])) {
        echo "<script>
        toastr.error('" . $_SESSION["error"] . "')
        </script>";
    }

    session_unset();
    ?>
</body>

</html>