<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="http://localhost/assets/css/admin.css">
    <script type="module" src="http://localhost/assets/js/adminSlice/index.js" defer></script>
    <title>AdminSite</title>
</head>

<body>
    <div id="rootStart"></div>
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

    <script>
        // SIDEBAR DROPDOWN
        const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
        const sidebar = document.getElementById('sidebar');

        allDropdown.forEach(item => {
            const a = item.parentElement.querySelector('span:first-child');
            a.addEventListener('click', function(e) {
                e.preventDefault();

                if (!this.classList.contains('active')) {
                    allDropdown.forEach(i => {
                        const aLink = i.parentElement.querySelector('span:first-child');

                        aLink.classList.remove('active');
                        i.classList.remove('show');
                    })
                }

                this.classList.toggle('active');
                item.classList.toggle('show');
            })
        })





        // SIDEBAR COLLAPSE
        const toggleSidebar = document.querySelector('nav .toggle-sidebar');
        const allSideDivider = document.querySelectorAll('#sidebar .divider');

        if (sidebar.classList.contains('hide')) {
            allSideDivider.forEach(item => {
                item.textContent = '-'
            })
            allDropdown.forEach(item => {
                const a = item.parentElement.querySelector('span:first-child');
                a.classList.remove('active');
                item.classList.remove('show');
            })
        } else {
            allSideDivider.forEach(item => {
                item.textContent = item.dataset.text;
            })
        }

        toggleSidebar.addEventListener('click', function() {
            sidebar.classList.toggle('hide');

            if (sidebar.classList.contains('hide')) {
                allSideDivider.forEach(item => {
                    item.textContent = '-'
                })

                allDropdown.forEach(item => {
                    const a = item.parentElement.querySelector('span:first-child');
                    a.classList.remove('active');
                    item.classList.remove('show');
                })
            } else {
                allSideDivider.forEach(item => {
                    item.textContent = item.dataset.text;
                })
            }
        })




        sidebar.addEventListener('mouseleave', function() {
            if (this.classList.contains('hide')) {
                allDropdown.forEach(item => {
                    const a = item.parentElement.querySelector('span:first-child');
                    a.classList.remove('active');
                    item.classList.remove('show');
                })
                allSideDivider.forEach(item => {
                    item.textContent = '-'
                })
            }
        })



        sidebar.addEventListener('mouseenter', function() {
            if (this.classList.contains('hide')) {
                allDropdown.forEach(item => {
                    const a = item.parentElement.querySelector('span:first-child');
                    a.classList.remove('active');
                    item.classList.remove('show');
                })
                allSideDivider.forEach(item => {
                    item.textContent = item.dataset.text;
                })
            }
        })




        // PROFILE DROPDOWN
        const profile = document.querySelector('nav .profile');
        const imgProfile = profile.querySelector('img');
        const dropdownProfile = profile.querySelector('.profile-link');

        imgProfile.addEventListener('click', function() {
            dropdownProfile.classList.toggle('show');
        })




        // MENU
        const allMenu = document.querySelectorAll('main .content-data .head .menu');

        allMenu.forEach(item => {
            const icon = item.querySelector('.icon');
            const menuLink = item.querySelector('.menu-link');

            icon.addEventListener('click', function() {
                menuLink.classList.toggle('show');
            })
        })



        window.addEventListener('click', function(e) {
            if (e.target !== imgProfile) {
                if (e.target !== dropdownProfile) {
                    if (dropdownProfile.classList.contains('show')) {
                        dropdownProfile.classList.remove('show');
                    }

                }

            }

            allMenu.forEach(item => {
                const icon = item.querySelector('.icon');
                const menuLink = item.querySelector('.menu-link');

                if (e.target !== icon) {
                    if (e.target !== menuLink) {
                        if (menuLink.classList.contains('show')) {
                            menuLink.classList.remove('show')
                        }
                    }
                }
            })
        })
    </script>
</body>

</html>