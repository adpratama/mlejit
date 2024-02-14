<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title><?= $title ?> - Mlejit </title>

    <?php if (isset($style)) $this->load->view($style); ?>

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>

    <!-- team section -->
    <div class="mt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>mlejit <span class="orange-text">.net</span></h3>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                <div class="col-lg-6 col-md-6 text-center strawberry">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="<?= base_url('home/coffee') ?>"><img src="<?= base_url('assets/img/logo_mlejit_crop.png') ?>" alt=""></a>
                        </div>
                        <ul class="social-link-team">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/mlejit_kopi/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <h3 class="">Mlejit Coffee</h3>
                </div>
                <div class="col-lg-6 col-md-6 text-center berry">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="<?= base_url('villa') ?>"><img src="<?= base_url('assets/img/mlejit_villa_crop.png') ?>" alt=""></a>
                        </div>
                        <ul class="social-link-team">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://instagram.com/mlejit_villa/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <h3>Mlejit Villa</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- end team section -->

    <!-- <?php if (isset($pages)) $this->load->view($pages); ?> -->

    <?php if (isset($script)) $this->load->view($script); ?>

</body>

</html>