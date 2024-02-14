<style>
    .card-text {
        margin: 0;
        padding: 0;
    }
    
    .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .wrapper-img {
        height: 150px;
    }
</style>

<div class="breadcrumb-section-2 breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text-villa">
                    <p>List Camping</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="camping">
    <div class="container">
        <h5 class="mt-3">Berikut ini adalah beberapa paket list camping yang tersedia di Mlejit Villa:</h5>
        <div class="row">
            <?php foreach ($list_camping as $lc) { ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4 wrapper-img">
                                <img src="<?= base_url('assets/villa/img/camping/') . $lc->image ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $lc->nama ?></h5>
                                    <p class="card-text"><small class="text-muted">Weekday : Rp.<?= number_format($lc->weekday, 2, ',', '.') ?></small></p>
                                    <p class="card-text"><small class="text-muted">Weekend : Rp.<?= number_format($lc->weekend, 2, ',', '.') ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>