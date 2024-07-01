<?php $name = $_COOKIE['name']; ?>

<div class="mdk-drawer__content">
    <div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
        <div class="sidebar-heading">Menu</div>


        <div class="sidebar-block p-0 mb-0">
            <ul class="sidebar-menu" id="components_menu">

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="index.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text">Dashboard</span>

                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="add-student.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                        <span class="sidebar-menu-text">Add Child</span>

                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="quiz.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">brush</i>
                        <span class="sidebar-menu-text">Quiz</span>
                    </a>
                </li>


            </ul>


        </div>

        <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
            <a href="#" class="flex d-flex align-items-center text-underline-0 text-body">
                <span class="avatar avatar-sm mr-2">
                    <img src="assets/images/avatar/family.png" alt="avatar" class="avatar-img rounded-circle">
                </span>
                <span class="flex d-flex flex-column">
                    <strong><?php echo $name; ?></strong>

                </span>
            </a>
            <div class="dropdown ml-auto">
                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i
                        class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-item-text dropdown-item-text--lh">
                        <div><strong><?php echo $name; ?></strong></div>

                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item active" href="index.php">Dashboard</a>
                    <!-- <a class="dropdown-item" href="profile.html">My profile</a> -->
                    <!-- <a class="dropdown-item" href="edit-account.html">Edit account</a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./partials/logout.php">Logout</a>
                </div>
            </div>
        </div>


    </div>
</div>