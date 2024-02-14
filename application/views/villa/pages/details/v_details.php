<style>
    .feature-bg-2 {
        position: relative;
        margin: 150px 0;
    }

    .feature-bg-2:after {
        background-image: url('../../../../../assets/villa/img/<?= $villa['photo'] ?>');
        position: absolute;
        right: 0;
        top: 0;
        width: 40%;
        height: 100%;
        max-height: 400px;
        content: "";
        background-size: cover;
        background-position: center;
        border-top-left-radius: 5px;
        -webkit-box-shadow: 0 0 20px #cacaca;
        box-shadow: 0 0 20px #cacaca;
        border-bottom-left-radius: 5px;
    }
</style>

<!-- breadcrumb-section -->
<div class="breadcrumb-section-2 breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text-villa">
                    <p>Details of</p>
                    <h1> <?= $villa['name'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- featured section -->
<!-- <div class="mt-5">&nbsp;</div> -->
<div class="feature-bg-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-3">Why <span class="orange-text"><?= $villa['name'] ?></span></h2>
                    <div class="row">
                        <?php
                        foreach ($floor as $f) {
                        ?>
                            <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="content">
                                        <h3><?= $f->name ?></h3>
                                        <ul>
                                            <?php
                                            $facility = $this->M_Villa->list_facility_all($f->Id);

                                            foreach ($facility as $fa) {
                                            ?>
                                                <li><?= $fa->name ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 text-right">
                <a href="<?= base_url('villa/catalog/book/') . $villa['slug'] ?>" class="cart-btn-villa"><i class="fas fa-shopping-cart"></i> Book</a>
            </div>
        </div>
    </div>
</div>
<!-- end featured section -->

<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text"><?= $villa['name'] ?></span> Gallery</h3>
                </div>
            </div>
        </div>
        <div class="docs-galley mb-3">
            <ul class="docs-pictures clearfix">
                <?php
                if (!$photos) {
                ?>
                    <h5 class="text-center">No photos available</h5>
                    <?php
                } else {

                    foreach ($photos as $p) {
                    ?>
                        <li><img data-original="<?= base_url('assets/villa/img/') . $p->name ?>" src="<?= base_url('assets/villa/img/') . $p->name ?>" alt="<?= $p->keterangan ?>"></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>