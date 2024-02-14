<div class="breadcrumb-section-2 breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text-villa">
                    <p>Form Booking Villa</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card p-5">
                <h3>Form Booking Villa</h3>
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>

                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
                    <div class="alert alert-danger"> <?= validation_errors() ?> </div>
                <?php } ?>

                <form action="<?= base_url('villa/save') ?>" method="post" id="form_booking">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Input your name" value="<?= set_value('name') ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Example input" value="<?= set_value('start_date') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Example input" value="<?= set_value('end_date') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Input your whatsapp number" value="<?= set_value('contact') ?>">
                    </div>
                    <div class="form-group">
                        <label for="villa">Villa</label>
                        <select class="custom-select" name="villa" id="villa">
                            <option selected> -- Select Villa -- </option>
                            <?php
                            foreach ($list_villa as $lv) {
                            ?>
                                <option value="<?= $lv->Id ?>"><?= $lv->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" class="form-control"><?= set_value('message') ?></textarea>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Booking Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>