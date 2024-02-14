<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title><?= $title ?> - Mlejit Coffee Shop</title>

    <?php if (isset($style)) $this->load->view($style); ?>

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends--><!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="<?= base_url('home/coffee'); ?>">
                                <img src="<?= base_url(); ?>assets/img/logo_mlejit_crop.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->


                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="<?php if (!$this->uri->segment(1)) {
                                                echo  'current-list-item';
                                            } ?>"><a href="<?= base_url(); ?>">Home</a></li>
                                <li class="<?php if ($this->uri->segment(1) == "product") {
                                                echo  'current-list-item';
                                            } ?>"><a href="<?= base_url('product'); ?>">Menus</a></li>
                                <li class="<?php if ($this->uri->segment(1) == "about") {
                                                echo  'current-list-item';
                                            } ?>"><a href="<?= base_url('about'); ?>">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="<?= base_url('order'); ?>">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span class="badge badge-pill badge-primary"><?= $jml_item ?></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <?php

                                            if (empty($jml_item)) {
                                            ?>
                                                Cart is empty
                                                <?php
                                            } else {
                                                foreach ($this->cart->contents() as $key => $value) {
                                                    $id_gambar = $value['id'];
                                                    $image_order = $this->M_Product->product_image($id_gambar);

                                                    $gambar = $image_order->menu_foto; ?>
                                                    <li>
                                                        <table class="cart-table">
                                                            <tr class="table-body-row">
                                                                <td rowspan="4">
                                                                    <img src="<?= base_url(); ?>assets/img/menu_folder/<?= $gambar ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle" weight="50px" height="50px">
                                                                </td>
                                                                <td>
                                                            <tr class="table-body-row">
                                                                <td colspan="2"><b><?= $value['name'] ?></b></td>
                                                            </tr>
                                                            <tr class="table-body-row">
                                                                <td><?= $value['qty'] ?> * Rp<?= number_format($value['price']) ?></td>
                                                                <td>Rp<?= number_format($value['subtotal']) ?></td>
                                                            </tr>
                                                            </td>
                                                            </tr>
                                                        </table>
                                                    </li>
                                                <?php
                                                } ?>

                                                <li>
                                                    <table class="cart-table">
                                                        <tr>
                                                            <td>Total:</td>
                                                            <td align="right"><b>Rp<?= $total ?></b></td>
                                                        </tr>
                                                    </table>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('order'); ?>">View Cart</a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('order/checkout') ?>">Checkout</a>
                                                </li>
                                            <?php

                                            }
                                            ?>
                                        </ul>
                                        <!-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>

                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->


    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Mlejit Kopi is a charming coffee shop nestled within the bustling environment of an airport, catering to the needs of weary travelers and coffee aficionados alike.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>Halim Perdanakusuma International Airport, Near Car Parking Area</li>
                            <li>support@mlejit.net</li>
                            <li>+62 817 010 7303</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li class="<?php if (!$this->uri->segment(1)) {
                                            echo  'current-list-item';
                                        } ?>"><a href="<?= base_url(); ?>">Home</a></li>
                            <li><a href="<?= base_url('products'); ?>">Menus</a></li>
                            <li><a href="<?= base_url('about'); ?>">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
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
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <!-- <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
					</p> -->
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
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

</body>

</html>