<main id="main" class="main">

    <div class="pagetitle">
        <h1>Our Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item  <?php if ($this->uri->segment(2) == 'product') echo 'active' ?>">Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
                <div class="card">
                    <div class="card-header text-end">
                        <a href="<?= base_url('admin/product/add') ?>" class="btn btn-primary">Add new</a>
                    </div>
                    <div class="card-body">
                        <!-- <h5 class="card-title">Datatables</h5> -->
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Purchased</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($products as $p) {
                                    ?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $p->menu_nama ?></td>
                                        <td align="right">Rp<?= number_format($p->menu_harga, 2, ',', '.') ?></td>
                                        <td><?= $p->kategori_nama ?></td>
                                        <td><?= $p->menu_jual ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/product/edit/' . $p->menu_seo) ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            <a href="<?= base_url('admin/product/delete/' . $p->menu_seo) ?>" class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></a>
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