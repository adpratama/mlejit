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
                            <a href="<?= base_url(); ?>">
                                <img src="<?= base_url(); ?>assets/frontend/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="#">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Static Home</a></li>
                                        <li><a href="index_2.html">Slider Home</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="404.html">404 page</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Check Out</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="news.html">News</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                    </ul>
                                </li>
                                <li><a href="news.html">News</a>
                                    <ul class="sub-menu">
                                        <li><a href="news.html">News</a></li>
                                        <li><a href="single-news.html">Single News</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="shop.html">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="checkout.html">Check Out</a></li>
                                        <li><a href="single-product.html">Single Product</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                    </ul>
                                </li>
                                <?php
                                $item_order = $this->cart->contents();
                                $jml_item = 0;

                                foreach ($item_order as $key => $value) {
                                    $jml_item = $jml_item + $value['qty'];
                                }
                                ?>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="cart.html">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span class="badge badge-pill badge-primary"><?= $jml_item ?></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <?php

                                            if (empty($item_order)) {
                                            ?>
                                                <!-- <a href="#"> -->
                                                Cart is empty
                                                <!-- </a> -->
                                                <?php
                                            } else {
                                                foreach ($item_order as $key => $value) {
                                                    $id_gambar = $value['id'];
                                                    $image_order = $this->db->select('menu_foto')->where('menu_id', $id_gambar)->get('v_menu')->row();
                                                    // $image_order = $this->db->select('menu_foto')->from('v_menu')->where('menu_id', $id_gambar)->get()->return();

                                                    $gambar = $image_order->menu_foto; ?>
                                                    <li>

                                                        <span><b><?= $value['name'] ?></b></span><br>
                                                        <!-- <img src="<?= base_url(); ?>assets/img/menu_folder/<?= $gambar ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle" weight="50px" height="50px"> -->
                                                        <span> <?= $value['qty'] ?> * Rp<?= number_format($value['price']) ?></span>
                                                        <br>
                                                        <span>Rp<?= number_format($value['subtotal']) ?></span>
                                                        <br>
                                                    </li>
                                                <?php
                                                } ?>

                                                <li>
                                                    <span>
                                                        <b>Total: Rp<?= $this->cart->format_number($this->cart->total()); ?></b>
                                                    </span>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('order'); ?>">View Cart</a>
                                                </li>
                                                <li>
                                                    <a href="#">Checkout</a>
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
    <div class="logo-carousel-section">
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
    </div>
    <!-- end logo carousel -->

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@mlejit.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="services.html">Shop</a></li>
                            <li><a href="news.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <?php if (isset($script)) $this->load->view($script); ?>

</body>

</html>