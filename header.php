<header id="hap-header" class="hap-header-section">
    <div class="container">

        <div class="hap-header-menu-navigation d-flex align-items-center justify-content-between">
            <div class="brand-logo">
                <a href="index.php"><img src="./logo/<?php echo $logo['logo']; ?>" alt="" width="80"></a>
            </div>
            <nav class="main-navigation clearfix ul-li">
                <ul id="main-nav" class="nav navbar-nav clearfix">

                    <li><a href="index.php" target="_parent">Home</a></li>
                    <!-- <li><a href="about.php" target="_parent">About</a></li> -->
                    <li><a href="contact.php" target="_parent">Contact Us</a></li>
                    <li><a href="./parent/login.php" target="_parent">Log In</a></li>
                    <li><a href="./parent/signup.php" target="_parent">Register</a></li>


                </ul>
            </nav>

        </div>
        <div class="mobile_menu position-relative">
            <div class="mobile_menu_button open_mobile_menu">
                <i class="fal fa-bars"></i>
            </div>
            <div class="mobile_menu_wrap">
                <div class="mobile_menu_overlay open_mobile_menu"></div>
                <div class="mobile_menu_content">
                    <div class="mobile_menu_close open_mobile_menu">
                        <i class="fal fa-times"></i>
                    </div>
                    <div class="m-brand-logo">
                        <a href="!#"><img src="assets/img/logo/logo2.png" alt=""></a>
                    </div>

                    <nav class="mobile-main-navigation  clearfix ul-li">
                        <ul id="m-main-nav" class="nav navbar-nav clearfix">


                            <li><a href="index.php" target="_parent">Home</a></li>
                            <!-- <li><a href="about.php" target="_parent">About</a></li> -->
                            <li><a href="contact.php" target="_parent">Contact</a></li>
                            <li><a href="./parent/login.php" target="_parent">Log In</a></li>
                            <li><a href="./parent/signup.php" target="_parent">Sign In</a></li>
                        </ul>
                    </nav>
                    <div class="bi-mobile-header-social text-center">
                        <a href="#"> <i class="fab fa-instagram"></i></a>
                        <a href="#"> <i class="fab fa-linkedin-in"></i></a>
                        <a href="#"> <i class="fab fa-facebook"></i></a>
                        <a href="#"> <i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Mobile-Menu -->
        </div>
    </div>
</header>