<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title><?= $title ?> - Mlejit Villa</title>

    <?php if (isset($style)) $this->load->view($style); ?>


    <link rel="stylesheet" href="https://unpkg.com/viewerjs/dist/viewer.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/villa/js/image-viewer/css/main.css">

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends--><!-- header -->
    <div class="top-header-area-villa" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="<?= base_url('villa'); ?>">
                                <img src="<?= base_url(); ?>assets/img/mlejit_villa_crop.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->


                        <!-- menu start -->
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->


    <!-- search area -->
    <!-- end search area -->

    <?php if (isset($pages)) $this->load->view($pages); ?>

    <!-- logo carousel -->
    <!-- <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="<?= base_url(); ?>assets/frontend/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="<?= base_url(); ?>assets/frontend/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="<?= base_url(); ?>assets/frontend/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="<?= base_url(); ?>assets/frontend/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="<?= base_url(); ?>assets/frontend/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end logo carousel -->

    <!-- footer -->
    <div class="footer-area-villa">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box-villa about-widget">
                        <h2 class="widget-title-villa">About us</h2>
                        <p>Nestled in the lush greenery of Bogor, Mlejit Villa is a tranquil oasis that offers a retreat from the hustle and bustle of city life. This exquisite villa is a haven of luxury and relaxation, perfect for those seeking a peaceful getaway in the heart of nature.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box-villa get-in-touch">
                        <h2 class="widget-title-villa">Get in Touch</h2>
                        <ul>
                            <li>Halim Perdanakusuma International Airport, Arrivals Terminal</li>
                            <li>support@mlejit.net</li>
                            <li>+62 817 010 7303</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box-villa pages">
                        <h2 class="widget-title-villa">Pages</h2>
                        <ul>
                            <li class="<?php if (!$this->uri->segment(1)) {
                                            echo  'current-list-item';
                                        } ?>"><a href="<?= base_url('villa'); ?>">Home</a></li>
                            <li><a href="<?= base_url('products'); ?>">Menus</a></li>
                            <li><a href="<?= base_url('about'); ?>">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="footer-box-villa subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright-villa">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <!-- <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
					</p> -->
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons-villa">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/mlejit_kopi/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <!-- <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <?php if (isset($script)) $this->load->view($script); ?>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="https://fengyuanchen.github.io/shared/google-analytics.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/viewerjs/dist/viewer.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/villa/js/image-viewer/js/jquery-viewer.js"></script>
    <script src="<?= base_url() ?>assets/villa/js/image-viewer/js/main.js"></script>

</body>

</html>