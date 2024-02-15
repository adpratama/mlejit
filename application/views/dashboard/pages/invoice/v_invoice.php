<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Invoices</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item  <?php if ($this->uri->segment(2) == 'invoice') echo 'active' ?>">Invoices</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
                <div class="card">
                    <div class="card-header text-end">
                        <a href="<?= base_url('admin/invoice/add') ?>" class="btn btn-primary btn-sm">Create invoice</a>
                    </div>
                    <div class="card-body">
                        <table class="table datatable" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Num.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">User</th>
                                    <th>Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($invoices as $i) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $i->no_invoice ?></td>
                                        <td><?= format_indo($i->tanggal_invoice) ?></td>
                                        <td>Rp<?= number_format($i->total_invoice) ?></td>
                                        <td><?= $i->name ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/invoice/print/' . $i->no_invoice) ?>" class="btn btn-info btn-sm" target="_blank">
                                                <i class="bi bi-file-pdf"></i> Print
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            columnDefs: [{
                targets: 3, // Menggunakan index kolom ke-3, dimulai dari 0
                className: 'dt-body-right' // Menambahkan class untuk rata kanan pada isi kolom
            }],
        });
    });
</script>