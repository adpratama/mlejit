<!-- facts expander with toggles; content for each is in its section -->
<div class="facts">
    <div class="facts__toggle">
        <span class="facts__toggle-inner facts__toggle-inner--more">
            <svg class="icon icon--dot">
                <use xlink:href="#icon-dot"></use>
            </svg>
            <span class="facts__toggle-text">See more</span>
        </span>
        <span class="facts__toggle-inner facts__toggle-inner--less">
            <svg class="icon icon--cross">
                <use xlink:href="#icon-cross"></use>
            </svg>
            <span class="facts__toggle-text">See less</span>
        </span>
    </div>
    <button class="button-contentclose">
        <svg class="icon icon--close">
            <use xlink:href="#icon-close"></use>
        </svg>
    </button>
</div>
<!-- index -->
<?php

$sum = count($villas);
?>
<div class="sections__index">
    <span class="sections__index-current">
        <span class="sections__index-inner">01</span>
    </span>
    <span class="sections__index-total">0<?= $sum ?></span>
</div>
<!-- navigation down -->
<nav class="sections__nav">
    <button class="sections__nav-item sections__nav-item--prev">
        <svg class="icon icon--navup">
            <use xlink:href="#icon-navup"></use>
        </svg>
    </button>
    <button class="sections__nav-item sections__nav-item--next">
        <svg class="icon icon--navdown">
            <use xlink:href="#icon-navdown"></use>
        </svg>
    </button>
</nav>
<!-- sections -->

<?php
$no = 1;
foreach ($villas as $v) {

?>
    <section class="section  <?php if ($v->Id == '1') echo 'section--current' ?>">
        <div class="section__content">
            <h2 class="section__title"><?= $v->name ?></h2>
            <p class="section__description"><span class="section__description-inner"><?= $v->description ?></span></p>
        </div>
        <div class="section__img">
            <div class="section__img-inner" style="background-image: url(<?= base_url() ?>assets/villa/img/<?= $v->photo ?>)"></div>
        </div>
        <div class="section__more">
            <div class="section__more-inner section__more-inner--bg1">
                <span class="section__more-text">Want to know more?</span>
                <a href="<?= base_url('villa/catalog/details/') . $v->slug ?>" class="section__more-link">
                    <span class="section__more-linktext">Explore <?= $v->name ?></span>
                    <svg class="icon icon--arrowlong">
                        <use xlink:href="#icon-arrowlong"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="section__expander"></div>
        <ul class="section__facts">
            <?php
            $id = $v->Id;
            $floor = $this->M_Villa->list_floor($id);

            foreach ($floor as $f) {
            ?>
                <li class="section__facts-item">
                    <h3 class="section__facts-title"><?= $f->name ?></h3>
                    <span class="section__facts-detail">
                        <ul>
                            <?php
                            $parent_id = $f->Id;
                            $facility = $this->M_Villa->list_facility($parent_id);
                            // print_r($facility);

                            foreach ($facility as $fa) {
                            ?>
                                <li><?= $fa->name ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </span>
                </li>
            <?php
            }
            ?>
            <li class="section__facts-item section__facts-item--clickable" data-gallery="gallery1">
                <div class="section__facts-img">
                    <img src="<?= base_url() ?>assets/villa/img/thumb1.jpg" alt="Some image" />
                    <svg class="icon icon--grid">
                        <use xlink:href="#icon-grid"></use>
                    </svg>
                </div>
                <h3 class="section__facts-title">More impressions</h3>
                <span class="section__facts-detail">A collection of images</span>
            </li>
        </ul>
        <div class="section__gallery" id="gallery1">
            <h3 class="section__gallery-item section__gallery-item--title">More impressions</h3>
            <a class="section__gallery-item" href="#"><img src="<?= base_url() ?>assets/villa/img/thumb1.jpg" alt="Some image" /></a>
            <a class="section__gallery-item" href="#"><img src="<?= base_url() ?>assets/villa/img/thumb2.jpg" alt="Some image" /></a>
            <a class="section__gallery-item" href="#"><img src="<?= base_url() ?>assets/villa/img/thumb3.jpg" alt="Some image" /></a>
            <a class="section__gallery-item" href="#"><img src="<?= base_url() ?>assets/villa/img/thumb4.jpg" alt="Some image" /></a>
            <a class="section__gallery-item" href="#"><img src="<?= base_url() ?>assets/villa/img/thumb5.jpg" alt="Some image" /></a>
            <a class="section__gallery-item" href="#"><img src="<?= base_url() ?>assets/villa/img/thumb6.jpg" alt="Some image" /></a>
        </div>
    </section>
<?php
} ?>