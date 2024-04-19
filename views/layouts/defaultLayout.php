<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://localhost/assets/css/global.css">
    <link rel="stylesheet" href="http://localhost/assets/css/header.css">
    <link rel="stylesheet" href="http://localhost/assets/font/font-awesome-pro-v6-6.2.0/css/all.min.css" />
    <script type="module" src="http://localhost/assets/js/userSlice/index.js" defer></script>
    <script src="http://localhost/assets/js/core.js" defer></script>
    <script src="http://localhost/assets/js/header.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />



    <title>Document</title>
    <?php
    require_once __DIR__ . "/../../utils/ImportStyle.php";
    ?>
</head>

<body style="background-color: #f4f5f9;">
    <div id="messageBox"></div>
    <div id="popup"></div>
    <?php
    require_once __DIR__ . "/../components/header.php";
    ?>
    {{content}}
    <?php
    require_once __DIR__ . "/../components/footer.php";
    ?>
    <?php require_once __DIR__ . "/../../utils/script.php";  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var cardSlide = new Swiper(".cardSellingSlide", {
        slidesPerView: 5,
        spaceBetween: 5,
        centeredSlides: true,
        autoplay: {
            delay: 7500,
            disableOnInteraction: false,
        },
        loop: true,
        allowTouchMove: false,
        navigation: {
            nextEl: ".swiper-button-next-card",
            prevEl: ".swiper-button-prev-card",
        },
    });
</script>


</html>