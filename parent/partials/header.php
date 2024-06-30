<div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
            <div class="container-fluid p-0">

                <!-- Navbar toggler -->

                <button class="navbar-toggler navbar-toggler-right d-block d-lg-none" type="button"
                    data-toggle="sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Brand -->
                <a href="index.php" class="navbar-brand ">

                    <span>Parent Dashboard</span>
                </a>

                <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                    <li class="nav-item dropdown">
                        <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown"
                            data-caret="false">
                            <span class="mr-1 d-flex-inline">
                                <span class="text-light"><?= $_COOKIE['name'] ?></span>
                            </span>
                            <img src="assets/images/avatar/family.png" class="rounded-circle" width="32" alt="Frontted">
                        </a>
                        <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item-text dropdown-item-text--lh">
                                <div><strong><?= $_COOKIE['name'] ?></strong></div>
                                <!-- <div class="text-muted">@adriandemian</div> -->
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item active" href="index.php"><i class="material-icons">dvr</i>
                                Dashboard</a>
                            <!-- <a class="dropdown-item" href="profile.html"><i class="material-icons">account_circle</i> My
                                profile</a> -->
                            <!-- <a class="dropdown-item" href="edit-account.html"><i class="material-icons">edit</i>
                                Edit account</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./partials/logout.php"><i
                                    class="material-icons">exit_to_app</i>
                                Logout</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>