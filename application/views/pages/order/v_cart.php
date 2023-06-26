<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">

                    <?php echo form_open('order/update'); ?>
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 1;

                            foreach ($cart_content as $item) {
                                $id_gambar = $item['id'];

                                $image_order = $this->M_Product->product_image($id_gambar);

                                $gambar = $image_order->menu_foto; ?>
                                <tr class="table-body-row">
                                    <td class="product-image"><img src="<?= base_url(); ?>assets/img/menu_folder/<?= $gambar ?>" alt=""></td>
                                    <td align="left">
                                        <a href="<?= base_url('product/show' . $id_gambar) ?>" class="read-more-btn"><?= $item['name'] ?></a>
                                        </td>
                                    <td class="product-price right">Rp<?= number_format($item['price'], 2, ',', '.') ?></td>
                                    <td class="product-quantity right">
                                        <?php
                                        echo
                                        form_input(array(
                                            'name' => $i . '[qty]',
                                            'value' => $item['qty'],
                                            'maxlength' => '3',
                                            'size' => '5',
                                            'type' => 'number',
                                            'class' => 'center'
                                        )); ?>
                                    </td>
                                    <td class="product-total right">Rp<?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                                    <td class="product-remove">
                                        <a href="<?= base_url('order/delete/' . $item['rowid']) ?>">
                                            <i class="far fa-window-close"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            } ?>
                        </tbody>
                    </table>
                    <div class="cart-buttons right" style="height: 45px">
                        <?php
                        $button = array(
                            'name' => 'button',
                            'value' => 'Update cart',
                            'type' => 'submit',
                            'class' => 'cart-btn',
                            'style' => 'text-transform: capitalize; font-weight: 400; font-family: Poppins, sans-serif; font-size: 14px'
                        );
                        echo form_submit($button);
                        ?>
                        <!-- <button type="submit" class="cart-btn">Update cart</button> -->
                        <a href="<?= base_url('order/clear') ?>" class="boxed-btn black">Clear Cart</a>
                        <a href="<?= base_url('order/checkout') ?>" class="boxed-btn black">Check Out</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td class="right">Rp<?= number_format($subtotal, 2, ',', '.') ?></td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>PPn: </strong></td>
                                <td class="right">Rp<?= number_format($ppn, 2, ',', '.') ?></td>
                            </tr> -->
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td class="right">Rp<?= number_format($subtotal, 2, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->