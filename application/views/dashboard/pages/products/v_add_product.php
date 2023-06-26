<main id="main" class="main">

    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/product">Products</a></li>
                <li class="breadcrumb-item  <?php if ($this->uri->segment(2) == 'product') echo 'active' ?>"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">


            <?php
            if ($this->uri->segment(4) == true) {
            ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Product Data</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" action="<?= base_url('admin/product/store/' . $products["menu_seo"]) ?>" method="POST">
                                <div class="col-12">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $products["menu_nama"] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="inputCategory" class="form-label">Category</label>
                                    <select name="product_category" id="product_category" class="form-select">
                                        <option value="">--Choose category</option>
                                        <?php
                                        foreach ($categories as $c) {
                                        ?>
                                            <option value="<?= $c->kategori_id ?>" <?= $c->kategori_id == $products["kategori_id"] ? 'selected' : '' ?>><?= $c->kategori_nama ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="product_price" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="product_price" id="product_price" value="<?= $products["menu_harga"] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="product_description" class="form-label">Description</label>
                                    <textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?= $products["menu_deskripsi"] ?></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Photo Product</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" action="<?= base_url('admin/product/update_photo/' . $products["menu_seo"]) ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="product_photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="product_photo" placeholder="Product's photo" name="product_photo">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                        <div class="card-body">
                            <img src="<?= base_url(); ?>assets/img/menu_folder/<?= $products["menu_foto"] ?>" class="card-img-top" alt="..." width="300" height="250">
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Product</h5>

                            <?= $this->session->flashdata('message_name'); ?>

                            <!-- Vertical Form -->
                            <form class="row g-3" action="<?= base_url('admin/product/store') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name">
                                </div>
                                <div class="col-12">
                                    <label for="inputCategory" class="form-label">Category</label>
                                    <select name="product_category" id="product_category" class="form-select">
                                        <option value="">--Choose category</option>
                                        <?php
                                        foreach ($categories as $c) {
                                        ?>
                                            <option value="<?= $c->kategori_id ?>"><?= $c->kategori_nama ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="product_price" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="product_price" id="product_price">
                                </div>
                                <div class="col-12">
                                    <label for="product_description" class="form-label">Description</label>
                                    <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="product_photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="product_photo" placeholder="Product's photo" name="product_photo">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </section>

</main><!-- End #main -->