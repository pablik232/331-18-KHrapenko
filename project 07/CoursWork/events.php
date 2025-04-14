
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь событий</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
</head>
<body>
    <form>
    <section class="home">
        <div class="container swiper">
            <div class="wapper swiper-wapper">
                <div class="clide swiper-slide">
                    <div class="img">
                        <img src="\images\events\1.png" alt="Событие 1" class="active">
                    </div>
                    <div class="img">
                        <img src="\images\events\2.png" alt="Событие 2">
                    </div>
                    <div class="img">
                        <img src="\images\events\3.png" alt="Событие 3">
                    </div>
                    <div class="img">
                        <img src="\images\events\4.png" alt="Событие 4">
                    </div>
                    <div class="img">
                        <img src="\images\events\5.png" alt="Событие 4">
                    </div>
                    <div class="img">
                        <img src="\images\events\6.png" alt="Событие 4">
                    </div>
                    <div class="img">
                        <img src="\images\events\7.png" alt="Событие 4">
                    </div>
                    <div class="img">
                        <img src="\images\events\8.png" alt="Событие 4">
                    </div>
                    <div class="img">
                        <img src="\images\events\9.png" alt="Событие 4">
                    </div>
                    <div class="img">
                        <img src="\images\events\10.png" alt="Событие 4">
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".container", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    </script>
</body>
</html>
