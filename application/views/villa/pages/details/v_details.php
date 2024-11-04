<style>
    .feature-bg-2 {
        position: relative;
        margin: 150px 0;
    }

    .preview-villa img {
        border-radius: 5px;
        -webkit-box-shadow: 0 0 20px #cacaca;
        box-shadow: 0 0 20px #cacaca;
        width: 100%;
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
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="content">
                                        <h3><?= $f->name ?></h3>
                                        <ul>
                                            <?php
                                            $string = substr($f->facilities, 0);
                                            $facility = explode(",", $string);
                                            foreach ($facility as $fa) {
                                                // $sql = "SELECT * FROM villa_facility_detail WHERE Id='$fa';";
                                                // $query = $this->db->query($sql);
                                                // $result = $query->row();
                                                $result = $this->M_Villa->list_facility_all($fa);
                                            ?>
                                                <li><?= $result->name ?></li>
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
            <div class="col-lg-5 preview-villa">
                <img src="<?= base_url('assets/villa/img/' . $villa['photo']) ?>" alt="preview-villa">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 text-center">
                <a href="<?= base_url('villa/booking/') ?>" class="cart-btn-villa"><i class="fas fa-shopping-cart"></i> Book</a>
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