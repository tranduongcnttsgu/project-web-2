<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="http://localhost/assets/css/admin.css">
    <link rel="stylesheet" href="http://localhost/assets/font/font-awesome-pro-v6-6.2.0/css/all.min.css" />
    <?php
    require_once __DIR__ . "/../../utils/ImportStyle.php";
    ?>
    <link rel="stylesheet" href="http://localhost/assets/css/global.css">

    <script src="http://localhost/assets/js/core.js"></script>
    <script type="module" src="http://localhost/assets/js/adminSlice/index.js" defer></script>

    <title>AdminSite</title>
</head>

<body>
    <div id="rootStart"></div>
    <div id="messageBox"></div>
    <div id="popup"></div>
    <!-- SIDEBAR -->
    <?php
    require_once __DIR__ . "/../components/admin/sidebar.php";
    ?>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->

    <!-- NAVBAR -->
    <!-- CONTENT  -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#" style="visibility: hidden;">
                <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
            <span class="nav-link">
                <i class='bx bxs-bell icon'></i>
                <span class="badge">5</span>
            </span>
            <span class="nav-link">
                <i class='bx bxs-message-square-dots icon'></i>
                <span class="badge">8</span>
            </span>
            <span class="divider"></span>
            <div class="profile">
                <img src="http://localhost/assets/Db_img/avatar-default.png" alt="">
                <ul class="profile-link">

                    <li onclick="dispatch('admin/popup',1)" style="cursor: pointer;"><span><i class='bx bxs-log-out-circle'></i> Logout</span></li>
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        {{content}}
        <!-- MAIN -->
    </section>
    <?php require_once __DIR__ . "/../../utils/script.php";  ?>

</body>


</html>