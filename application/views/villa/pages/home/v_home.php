<!-- facts expander with toggles; content for each is in its section -->
<div class="facts"></div>
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
                <a href="<?= base_url('villa/detail/') . $v->slug ?>" class="section__more-link">
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
                        <?php
                        $string = substr($f->facilities, 0);
                        $facility = explode(",", $string);
                        $facility_max = array_splice($facility, 3);
                        foreach ($facility as $fa) {
                            $result = $this->M_Villa->list_facility_all($fa);
                        ?>
                            <ul>
                                <li class="facility-item"><?= $result->name; ?></li>
                            </ul>

                        <?php
                        }
                        ?>
                    </span>
                </li>
            <?php
            }
            ?>
        </ul>

    </section>
<?php
} ?>