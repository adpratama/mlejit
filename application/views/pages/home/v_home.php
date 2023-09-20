    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h1>Delicious Seasonal Coffee</h1>
                                <div class="hero-btns">
                                    <a href="<?= base_url('products'); ?>" class="boxed-btn">Our Menus</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h1>100% Organic Collection</h1>
                                <div class="hero-btns">
                                    <a href="<?= base_url('products'); ?>" class="boxed-btn">Visit Shop</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <!-- <div class="single-homepage-slider homepage-bg-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>Get December Discount</h1>
                                <div class="hero-btns">
                                    <a href="<?= base_url('products'); ?>" class="boxed-btn">Visit Shop</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- end home page slider -->

    <!-- features list section -->
    <!-- <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Free Shipping</h3>
                            <p>When order over $75</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Support</h3>
                            <p>Get support all day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Refund</h3>
                            <p>Get refund within 3 days!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Best</span> Seller</h3>
                        <p>Our best seller menus.</p>
                    </div>
                </div>
            </div>
            <?php
            if (empty($best)) {
            ?>
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h3 align="center">The menu is not yet available</h3>
                </div>
                <br><br>
            <?php
            } else {
            ?>
                <div class="row">
                    <?php
                    foreach ($best as $b) {

                    ?>
                        <div class="col-lg-4 col-md-6 text-center">
                            <?php

                            echo form_open('order/add');
                            echo form_hidden('id', $b->menu_id);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $b->menu_harga);
                            echo form_hidden('name', $b->menu_nama);
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="product/show/<?= $b->menu_seo ?>"><img src="<?= base_url(); ?>assets/img/menu_folder/<?= $b->menu_foto ?>" alt="" style="width: 300px; height: 250px; overflow: hidden; position: relative"></a>
                                </div>
                                <h3><?= $b->menu_nama ?></h3>
                                <p class="product-price"><span>Per Kg</span> Rp<?= number_format($b->menu_harga, 2, ',', '.') ?> </p>
                                <button class="cart-btn toastrDefaultSuccess" style="text-transform: capitalize; font-weight: 400; font-family: Poppins, sans-serif; font-size: 14px; border: 0px" id=""><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </div>

                            <?php
                            echo form_close(); ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-6 offset-md-3 offset-lg-0 text-center">
                        <a href="<?= base_url('product'); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i>Browse Other Menus...</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- end product section -->

    <!-- testimonail-section -->
    <!-- end testimonail-section -->

    <!-- advertisement section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <a href="https://www.instagram.com/p/Cp4I8fFrxkV/" class="video-play-btn popup-"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">Since Year 2023</p>
                        <h2>We are <span class="orange-text">Mlejit</span></h2>
                        <p>Discover a hidden gem within the bustling confines of the airport - Mlejit Kopi, a coffee shop that captures the essence of exotic flavors and transports you to the vibrant world of coffee. Nestled amidst the terminals, Mlejit Kopi invites weary travelers and coffee aficionados to embark on a sensory journey like no other.</p>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p> -->
                        <a href="<?= base_url('about'); ?>" class="boxed-btn mt-4">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>