<main id="main" class="main">

    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item  <?php if ($this->uri->segment(2) == 'category') echo 'active' ?>">Categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header text-end">
                        <a href="<?= base_url('admin/category/add') ?>" class="btn btn-primary">Add new</a>
                    </div>
                    <div class="card-body">


                        <?= $this->session->flashdata('message_name'); ?>
                        <!-- <h5 class="card-title">Datatables</h5> -->
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($categories as $c) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $c->kategori_nama ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/category/edit/' . $c->kategori_seo) ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->