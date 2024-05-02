<script>
    const sideLinks = document.querySelectorAll(
        ".sidebar .side-menu li span:not(.logout)"
    );



    sideLinks.forEach((item) => {
        const li = item.parentElement;


        let index = 0;
        item.addEventListener("click", () => {
            sideLinks.forEach((i) => {
                i.parentElement.classList.remove("active");


            });

            let index = li.getAttribute("key");
            if (+index === 0) {
                window.location.href = "http://localhost/account/user"
            } else if (+index === 1) {
                window.location.href = "http://localhost/account/user/order"
            } else if (+index == 2) {
                window.location.href = "http://localhost/account/user/purchased"
            }



        });
    });
</script>