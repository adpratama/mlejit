<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?> - Mlejit Villa</title>
    <meta name="description" content="An implementation of Gil Huybrecht's Outdoors design" />
    <meta name="keywords" content="template, web design, html, javascript, layout, css, slide out" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/img/logo_mlejit_box.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/villa/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/villa/css/base.css" />
    <script>
        document.documentElement.className = "js";
        var supportsCssVars = function() {
            var e,
                t = document.createElement("style");
            return (
                (t.innerHTML = "root: { --tmp-var: bold; }"),
                document.head.appendChild(t),
                (e = !!(
                    window.CSS &&
                    window.CSS.supports &&
                    window.CSS.supports("font-weight", "var(--tmp-var)")
                )),
                t.parentNode.removeChild(t),
                e
            );
        };
        supportsCssVars() ||
            alert(
                "Please view this demo in a modern browser that supports CSS Variables."
            );
    </script>
    <!--script src="//tympanus.net/codrops/adpacks/analytics.js"></script-->
    <style>
        .loader {
            bottom: 0;
            height: 100%;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 1111;
            background: #eaddcf;
            overflow-x: hidden;
        }

        .loader-inner {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            height: 50px;
            width: 50px;
        }

        .circle {
            width: 8vmax;
            height: 8vmax;
            border-right: 4px solid #4f3829;
            border-radius: 50%;
            -webkit-animation: spinRight 800ms linear infinite;
            animation: spinRight 800ms linear infinite;
        }

        .circle:before {
            content: '';
            width: 6vmax;
            height: 6vmax;
            display: block;
            position: absolute;
            top: calc(50% - 3vmax);
            left: calc(50% - 3vmax);
            border-left: 3px solid #4f3829;
            border-radius: 100%;
            -webkit-animation: spinLeft 800ms linear infinite;
            animation: spinLeft 800ms linear infinite;
        }

        .circle:after {
            content: '';
            width: 6vmax;
            height: 6vmax;
            display: block;
            position: absolute;
            top: calc(50% - 3vmax);
            left: calc(50% - 3vmax);
            border-left: 3px solid #F28123;
            border-radius: 100%;
            -webkit-animation: spinLeft 800ms linear infinite;
            animation: spinLeft 800ms linear infinite;
            width: 4vmax;
            height: 4vmax;
            top: calc(50% - 2vmax);
            left: calc(50% - 2vmax);
            border: 0;
            border-right: 2px solid #000;
            -webkit-animation: none;
            animation: none;
        }

        @-webkit-keyframes spinLeft {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(720deg);
                transform: rotate(720deg);
            }
        }

        @keyframes spinLeft {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(720deg);
                transform: rotate(720deg);
            }
        }

        @-webkit-keyframes spinRight {
            from {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }

            to {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }

        @keyframes spinRight {
            from {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }

            to {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }
    </style>
</head>

<body class="loading">
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <svg class="hidden">
        <symbol id="icon-arrow" viewBox="0 0 24 24">
            <title>arrow</title>
            <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 " />
        </symbol>
        <symbol id="icon-drop" viewBox="0 0 24 24">
            <title>drop</title>
            <path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z" />
            <path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z" />
        </symbol>
        <symbol id="icon-menu" viewBox="0 0 24 13">
            <title>menu</title>
            <path d="M.75 1.515h22.498a.75.75 0 0 0 0-1.5H.75a.75.75 0 0 0 0 1.5zM23.248 5.265H8.168a.75.75 0 0 0 0 1.5h15.08a.75.75 0 0 0 0-1.5zM23.248 10.514H4.322a.75.75 0 0 0 0 1.5h18.926a.75.75 0 0 0 0-1.5z" />
        </symbol>
        <symbol id="icon-dot" viewBox="0 0 24 24">
            <title>dot</title>
            <path d="M11.5 9c-.69 0-1.28.244-1.768.732A2.41 2.41 0 0 0 9 11.5c0 .69.244 1.28.732 1.767A2.409 2.409 0 0 0 11.5 14c.69 0 1.28-.244 1.768-.733A2.408 2.408 0 0 0 14 11.5c0-.69-.244-1.28-.732-1.768A2.408 2.408 0 0 0 11.5 9z" />
        </symbol>
        <symbol id="icon-cross" viewBox="0 0 24 24">
            <title>cross</title>
            <path d="M11.449 11.962l-5.1 5.099a.363.363 0 1 0 .513.512L12 12.436l5.137 5.137a.361.361 0 0 0 .513 0 .363.363 0 0 0 0-.512l-5.099-5.1 5.102-5.102a.363.363 0 1 0-.512-.513L12 11.487l-5.141-5.14a.363.363 0 0 0-.513.512l5.103 5.103z" />
        </symbol>
        <symbol id="icon-arrowlong" viewBox="0 0 32 11">
            <title>arrow-long</title>
            <path d="M27.166.183a.619.619 0 0 0-.878 0 .619.619 0 0 0 0 .878l2.735 2.735H.768a.624.624 0 0 0 0 1.248h28.254L26.287 7.77a.619.619 0 0 0 0 .878.617.617 0 0 0 .441.183c.163 0 .32-.061.442-.183l3.796-3.796a.623.623 0 0 0-.005-.878L27.166.183z" />
        </symbol>
        <symbol id="icon-close" viewBox="0 0 24 24">
            <title>close</title>
            <path d="M21 4.565L19.435 3 12 10.435 4.565 3 3 4.565 10.435 12 3 19.435 4.565 21 12 13.565 19.435 21 21 19.435 13.565 12z" />
        </symbol>
        <symbol id="icon-navup" viewBox="0 0 50 50">
            <title>navup</title>
            <path d="M20.259 28.211l5.07-5.03 5.075 5.034a.36.36 0 0 0 .51 0 .356.356 0 0 0 0-.506l-5.323-5.28a.404.404 0 0 0-.135-.084.364.364 0 0 0-.384.08l-5.324 5.28a.356.356 0 0 0 0 .506c.141.14.37.14.51 0z" />
        </symbol>
        <symbol id="icon-navdown" viewBox="0 0 50 50">
            <title>navdown</title>
            <path d="M20.259 22.43l5.07 5.03 5.075-5.034a.36.36 0 0 1 .51 0c.14.14.14.366 0 .506l-5.323 5.28a.404.404 0 0 1-.135.084.364.364 0 0 1-.384-.081l-5.324-5.28a.356.356 0 0 1 0-.505c.141-.14.37-.14.51 0z" />
        </symbol>
        <symbol id="icon-grid" viewBox="0 0 24 24">
            <title>grid</title>
            <path d="M8.982 8.982h5.988v5.988H8.982zM0 0h5.988v5.988H0zM8.982 17.965h5.988v5.988H8.982zM0 8.982h5.988v5.988H0zM0 17.965h5.988v5.988H0zM17.965 0h5.988v5.988h-5.988zM8.982 0h5.988v5.988H8.982zM17.965 8.982h5.988v5.988h-5.988zM17.965 17.965h5.988v5.988h-5.988z" />
        </symbol>
    </svg>
    <main>

        <div class="sections">
            <header class="sections__header">
                <!-- <a href="<?= base_url('villa') ?>"> -->
                <h1 class="title">Mlejit Villa</h1>
                <!-- </a> -->
                <!-- <img src="<?= base_url(); ?>assets/villa/img/logo_mlejit_villa.png" alt="" style=""> -->
            </header>
            <!-- menu -->
            <nav class="menu">
                <ul class="menu__inner">
                    <li class="menu__item"><a class="menu__item-link" href="<?= base_url('villa/booking') ?>">Booking</a></li>
                    <li class="menu__item"><a class="menu__item-link" href="<?= base_url('villa/camping') ?>">Price Camping</a></li>
                    <li class="menu__item"><a class="menu__item-link" href="<?= base_url('villa/contact') ?>">Contact</a></li>
                    <!--<li class="menu__item"><a class="menu__item-link" href="#">Testimonials</a></li>-->
                    <!--<li class="menu__item"><a class="menu__item-link" href="#">Contact</a></li>-->
                </ul>
                <div class="menu__toggle">
                    <span class="menu__toggle-inner menu__toggle-inner--open">
                        <svg class="icon icon--menu">
                            <use xlink:href="#icon-menu"></use>
                        </svg>
                    </span>
                    <span class="menu__toggle-inner menu__toggle-inner--close">
                        <svg class="icon icon--close">
                            <use xlink:href="#icon-close"></use>
                        </svg>
                    </span>
                </div>
            </nav>
            <?php if (isset($pages)) $this->load->view($pages); ?>
        </div><!--/ sections -->
    </main>
    <script src="<?= base_url() ?>assets/villa/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/villa/js/charming.min.js"></script>
    <script src="<?= base_url() ?>assets/villa/js/anime.min.js"></script>
    <script src="<?= base_url() ?>assets/villa/js/main.js"></script>

    <script src="<?= base_url() ?>assets/frontend/js/jquery-1.11.3.min.js"></script>
    <script>
        jQuery(window).on("load", function() {
            jQuery(".loader").fadeOut(1000);
        });
    </script>
</body>

</html>