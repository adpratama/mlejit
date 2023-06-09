<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <!-- <li data-filter=".strawberry">Strawberry</li>
                        <li data-filter=".berry">Berry</li>
                        <li data-filter=".lemon">Lemon</li> -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="row col-mt-2">
            <?php
            foreach ($product as $b) {

            ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 text-center">
                    <?php

                    echo form_open('order/add');
                    echo form_hidden('id', $b->menu_id);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $b->menu_harga);
                    echo form_hidden('name', $b->menu_nama);
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                    <div class="single-product-item">
                        <div class="product-image">
                            <?php
                            if (empty($b->menu_foto)) {
                                $menu_foto = "no-image-icon.jpg";
                            } else {
                                $menu_foto = "menu_folder/" . $b->menu_foto;
                            }
                            ?>
                            <a href="<?= base_url('product/show/' . $b->menu_seo) ?>"><img src="<?= base_url(); ?>assets/img/<?= $menu_foto ?>" alt="" width="300" height="200"></a>
                        </div>
                        <h3><?= $b->menu_nama ?></h3>
                        <p class="product-price"><span>Per item</span> Rp<?= number_format($b->menu_harga, 2, ',', '.') ?></p>
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
            <div class="col-lg-12 text-center">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end products -->