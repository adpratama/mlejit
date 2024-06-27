<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__rendered {
        line-height: 31px !important;
    }

    .select2-container .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection__arrow {
        height: 34px !important;
    }
</style>
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
            <?php
            if ($this->uri->segment(4) == true) {
            ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit invoice <?= $invoice['no_invoice'] ?></h5>
                            <form action="<?= base_url('admin/koperasi/store/' . $invoice['no_invoice']) ?>" method="post" class="">
                                <div class="row g-2">

                                    <div class="col-3">
                                        <label for="no_invoice" class="form-label">Number</label>
                                        <input type="text" class="form-control" name="no_invoice" value="<?= $invoice['no_invoice'] ?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="tgl_invoice" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="tgl_invoice" value="<?= $invoice['tanggal_invoice'] ?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="customer" class="form-label">Bill to</label>
                                        <select name="customer" id="customer" class="form-control">
                                            <?php
                                            foreach ($customers as $c) : ?>
                                                <option value="<?= $c->id ?>" selected><?= $c->nama_customer ?></option>
                                            <?php
                                            endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="diskon" class="form-label">Discount</label>
                                        <select name="diskon" id="diskonEdit" class="form-control">
                                            <option <?= ($invoice['diskon'] == 0.00) ? "selected" : "" ?> value="0">0%</option>
                                            <option <?= ($invoice['diskon'] == 0.05) ? "selected" : "" ?> value="0.05">5%</option>
                                            <option <?= ($invoice['diskon'] == 0.10) ? "selected" : "" ?> value="0.1">10%</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="keterangan" class="form-label">Notes</label>
                                        <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control" oninput="this.value = this.value.toUpperCase()" placeholder="Enter notes here..." required><?= $invoice['keterangan'] ?></textarea>
                                    </div>

                                    <div class="col-3">
                                        <label for="nominal" class="form-label">Subtotal</label>
                                        <input type="text" class="form-control" name="nominal" id="nominal" value="<?= number_format($invoice['subtotal'], 0, ",", ".") ?>" readonly>
                                    </div>

                                    <div class="col-3">
                                        <label for="besaran_diskon" class="form-label">Discount</label>
                                        <input type="text" class="form-control" name="besaran_diskon" id="besaran_diskon" value="<?= number_format($invoice['besaran_diskon'], 0, ",", ".") ?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="grandtotal" class="form-label">Total</label>
                                        <input type="text" class="form-control" name="grandtotal" id="grandtotal" value="<?= number_format($invoice['total_invoice'], 0, ",", ".") ?>" readonly>
                                    </div>
                                    <div class="col-3 text-end">
                                        <label for="keterangan" class="form-label">&nbsp;</label>
                                        <div class="mt-1">
                                            <a href="<?= base_url('admin/koperasi') ?>" class="btn btn-sm btn-warning"><i class="bi bi-arrow-return-left"></i> Back</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Update <i class="bi bi-save"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <table class="table mt-5">
                                <thead>
                                    <tr>
                                        <th>Delete</th>
                                        <th>Menu</th>
                                        <th style="width: 100px;">Qty</th>
                                        <th style="width: 200px;">Price</th>
                                        <th>Total</th>
                                        <th>Upd.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($details) {
                                        foreach ($details as $d) : ?>
                                            <form action="<?= base_url('admin/koperasi/update_item/' . $invoice['Id'] . '/' . $d->Id) ?>" method="post">
                                                <tr class="baris">
                                                    <td class="text-center">
                                                        <a href="<?= base_url('admin/koperasi/delete_row/' . $invoice['Id'] . '/' . $d->Id) ?>" class="btn btn-danger btn-sm btn-delete">&times;</a>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="menu" oninput="this.value = this.value.toUpperCase()" value="<?= $d->menu ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="qty" value="<?= $d->qty ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="harga" value="<?= number_format($d->harga, 0, ",", ".") ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control total" name="total" value="<?= number_format($d->total, 0, ",", ".") ?>" readonly>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary btn-sm">Perbarui</button>
                                                    </td>
                                                </tr>
                                            </form>
                                        <?php
                                        endforeach;
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">Tidak ada item yang ditampilkan</td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addItem">Add item</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="addItem" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add item <?= $invoice['no_invoice'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('admin/koperasi/add_item/' . $invoice['no_invoice']) ?>" method="POST">
                                <div class="modal-body">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th style="width: 100px;">Qty</th>
                                                <th style="width: 200px;">Price</th>
                                                <th>Total</th>
                                                <th>Del.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="barisEdit">
                                                <td>
                                                    <input type="text" class="form-control" name="newMenu[]" oninput="this.value = this.value.toUpperCase()">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="newQty[]" value="0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="newHarga[]" value="0">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" name="newTotal[]" readonly>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm hapusRowAddItem">Hapus</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-lg-12 text-end">
                                            <button type="button" class="btn btn-secondary btn-sm" id="addNewRow">Add new row</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
                <div class="col-lg-12">
                    <form action="<?= base_url('admin/koperasi/store') ?>" method="post" class="">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Create new invoice</h5>
                                <div class="row g-2">

                                    <div class="col-3">
                                        <label for="no_invoice" class="form-label">Number</label>
                                        <input type="text" class="form-control" name="no_invoice" value="<?= $no_invoice ?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="tgl_invoice" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="tgl_invoice" value="<?= date('Y-m-d') ?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="customer" class="form-label">Bill to</label>
                                        <select name="customer" id="customer" class="form-control">
                                            <?php
                                            foreach ($customers as $c) : ?>
                                                <option value="<?= $c->id ?>" selected><?= $c->nama_customer ?></option>
                                            <?php
                                            endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="diskon" class="form-label">Discount</label>
                                        <select name="diskon" id="diskon" class="form-control">
                                            <option value="0">0%</option>
                                            <option value="0.05">5%</option>
                                            <option value="0.1">10%</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="keterangan" class="form-label">Notes</label>
                                        <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control" oninput="this.value = this.value.toUpperCase()" placeholder="Enter notes here..." required></textarea>
                                    </div>

                                    <div class="col-3">
                                        <label for="nominal" class="form-label">Subtotal</label>
                                        <input type="text" class="form-control" name="nominal" id="nominal" value="0" readonly>
                                    </div>

                                    <div class="col-3">
                                        <label for="besaran_diskon" class="form-label">Discount</label>
                                        <input type="text" class="form-control" name="besaran_diskon" id="besaran_diskon" value="0" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="grandtotal" class="form-label">Total</label>
                                        <input type="text" class="form-control" name="grandtotal" id="grandtotal" value="0" readonly>
                                    </div>
                                    <div class="col-3 text-end">
                                        <label for="keterangan" class="form-label">&nbsp;</label>
                                        <div class="mt-1">
                                            <a href="<?= base_url('admin/koperasi') ?>" class="btn btn-sm btn-warning"><i class="bi bi-arrow-return-left"></i> Back</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Save <i class="bi bi-save"></i></button>
                                        </div>
                                    </div>

                                </div>
                                <table class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th style="width: 100px;">Qty</th>
                                            <th style="width: 200px;">Price</th>
                                            <th>Total</th>
                                            <th>Del.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="baris">
                                            <td>
                                                <input type="text" class="form-control" name="menu[]" oninput="this.value = this.value.toUpperCase()">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="qty[]" value="0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="harga[]" value="0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control total" name="total[]" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm hapusRow">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <button type="button" class="btn btn-secondary btn-sm" id="addRow">Add new row</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
</main>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        var rowCount = 1; // Inisialisasi row

        $('#addRow').on('click', function() {
            // Periksa apakah ada input yang kosong di baris sebelumnya
            var previousRow = $('.baris').last();
            var inputs = previousRow.find('input[type="text"], input[type="datetime-local"]');
            var isEmpty = false;

            inputs.each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;
                    return false; // Berhenti iterasi jika ditemukan input kosong
                }
            });

            // Jika ada input yang kosong, tampilkan pesan peringatan
            if (isEmpty) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Mohon isi semua input pada baris sebelumnya terlebih dahulu!',
                });
                return; // Hentikan penambahan baris baru
            }

            // Salin baris terakhir
            var newRow = previousRow.clone();

            // Kosongkan nilai input di baris baru
            newRow.find('input').val('');
            newRow.find('input[name="qty[]"]').val('0');
            newRow.find('input[name="harga[]"]').val('0');

            // Perbarui tag <h4> pada baris baru dengan nomor urut yang baru
            rowCount++;

            // Tambahkan baris baru setelah baris terakhir
            previousRow.after(newRow);
        });

        // Saat input qty atau harga diubah
        $(document).on('input', 'input[name="qty[]"], input[name="harga[]"]', function() {
            var value = $(this).val();
            var formattedValue = parseFloat(value.split('.').join(''));
            $(this).val(formattedValue);

            var row = $(this).closest('.baris');
            hitungTotal(row);
            updateTotalBelanja();
            updateDiscountAndTotal();
        });

        // Tambahkan event listener untuk event keyup
        $(document).on('keyup', 'input[name="qty[]"], input[name="harga[]"]', function() {
            var value = $(this).val().trim(); // Hapus spasi di awal dan akhir nilai
            var formattedValue = formatNumber(parseFloat(value.split('.').join('')));
            $(this).val(formattedValue);
            if (isNaN(value)) { // Jika nilai input kosong
                $(this).val(''); // Atur nilai input menjadi 0
            }
            var row = $(this).closest('.baris');
            hitungTotal(row);
            updateTotalBelanja();
            updateDiscountAndTotal();
        });

        function hitungTotal(row) {
            var qty = row.find('input[name="qty[]"]').val().replace(/\./g, ''); // Hapus tanda titik
            var harga = row.find('input[name="harga[]"]').val().replace(/\./g, ''); // Hapus tanda titik
            qty = parseInt(qty); // Ubah string ke angka float
            harga = parseInt(harga); // Ubah string ke angka float

            qty = isNaN(qty) ? 0 : qty;
            harga = isNaN(harga) ? 0 : harga;

            var total = qty * harga;
            row.find('input[name="total[]"]').val(formatNumber(total));
            updateTotalBelanja();
        }

        function updateTotalBelanja() {
            var total_pos_fix = 0;
            $(".baris").each(function() {
                var total = $(this).find('input[name="total[]"]').val().replace(/\./g, ''); // Ambil nilai total dari setiap baris
                total = parseFloat(total); // Ubah string ke angka float
                if (!isNaN(total)) { // Pastikan total adalah angka
                    total_pos_fix += total; // Tambahkan nilai total ke total_pos_fix
                }
            });
            $('#nominal').val(formatNumber(total_pos_fix)); // Atur nilai input #nominal dengan total_pos_fix
        }

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Tambahkan event listener untuk tombol hapus row
        $(document).on('click', '.hapusRow', function() {
            $(this).closest('.baris').remove();
            updateTotalBelanja(); // Perbarui total belanja setelah menghapus baris
            updateDiscountAndTotal();
        });
        $(document).on('click', '.hapusBarisEdit', function() {
            $(this).closest('.baris').remove();
            updateTotalBelanja(); // Perbarui total belanja setelah menghapus baris
            updateDiscountAndTotal();
        });

        // Saat opsi diskon berubah
        $('#diskon').on('change', function() {
            // Panggil fungsi untuk mengupdate besaran diskon dan total
            updateDiscountAndTotal();
        });

        // Fungsi untuk mengupdate besaran diskon dan total
        function updateDiscountAndTotal() {
            var diskon = parseFloat($('#diskon').val());
            var subtotal = 0;
            // Hitung subtotal dari total setiap baris
            $('.baris').each(function() {
                var totalBaris = parseInt($(this).find('input[name="total[]"]').val().replace(/\./g, '') || 0);
                subtotal += totalBaris;
            });
            // Hitung besaran diskon
            var besaranDiskon = subtotal * diskon;
            // Hitung total setelah diskon
            var total = subtotal - besaranDiskon;
            // Atur nilai input besaran_diskon dan total dengan format angka yang sesuai
            $('#besaran_diskon').val(formatNumber(besaranDiskon));
            $('#grandtotal').val(formatNumber(total));
        }

        $('#diskonEdit').on('change', function() {
            // Panggil fungsi untuk mengupdate besaran diskon dan total
            updateDiscountAndTotalEdit();
        });

        function updateDiscountAndTotalEdit() {
            var diskon = parseFloat($('#diskonEdit').val());

            var subtotal = parseInt($('#nominal').val().replace(/\./g, '') || 0);

            // Hitung besaran diskon
            var besaranDiskon = subtotal * diskon;
            // Hitung total setelah diskon
            var total = subtotal - besaranDiskon;
            // Atur nilai input besaran_diskon dan total dengan format angka yang sesuai
            $('#besaran_diskon').val(formatNumber(besaranDiskon));
            $('#grandtotal').val(formatNumber(total));
        }


        $(document).on('input', 'input[name="qty"], input[name="harga"]', function() {
            var value = $(this).val();
            var formattedValue = parseFloat(value.split('.').join(''));
            $(this).val(formattedValue);

            var row = $(this).closest('.baris');
            hitungTotalItem(row);
        });

        function hitungTotalItem(row) {
            var qty = row.find('input[name="qty"]').val().replace(/\./g, ''); // Hapus tanda titik
            var harga = row.find('input[name="harga"]').val().replace(/\./g, ''); // Hapus tanda titik
            qty = parseInt(qty); // Ubah string ke angka float
            harga = parseInt(harga); // Ubah string ke angka float

            qty = isNaN(qty) ? 0 : qty;
            harga = isNaN(harga) ? 0 : harga;

            var total = qty * harga;
            row.find('input[name="harga"]').val(formatNumber(harga));
            row.find('input[name="total"]').val(formatNumber(total));
            updateTotalBelanja();
        }

        $('#addNewRow').on('click', function() {
            // Periksa apakah ada input yang kosong di baris sebelumnya
            var previousRow = $('.barisEdit').last();
            var inputs = previousRow.find('input[type="text"], input[type="datetime-local"]');
            var isEmpty = false;

            inputs.each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;
                    return false; // Berhenti iterasi jika ditemukan input kosong
                }
            });

            // Jika ada input yang kosong, tampilkan pesan peringatan
            if (isEmpty) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Mohon isi semua input pada baris sebelumnya terlebih dahulu!',
                });
                return; // Hentikan penambahan baris baru
            }

            // Salin baris terakhir
            var newRow = previousRow.clone();

            // Kosongkan nilai input di baris baru
            newRow.find('input').val('');
            newRow.find('input[name="newQty[]"]').val('0');
            newRow.find('input[name="newHarga[]"]').val('0');

            // Perbarui tag <h4> pada baris baru dengan nomor urut yang baru
            rowCount++;

            // Tambahkan baris baru setelah baris terakhir
            previousRow.after(newRow);
        });


        $(document).on('click', '.hapusRowAddItem', function() {
            $(this).closest('.barisEdit').remove();
        });

        $(document).on('input', 'input[name="newQty[]"], input[name="newHarga[]"]', function() {
            var value = $(this).val();
            var formattedValue = parseFloat(value.split('.').join(''));
            $(this).val(formattedValue);

            var row = $(this).closest('.barisEdit');
            hitungTotalNewItem(row);
        });

        // Tambahkan event listener untuk event keyup
        $(document).on('keyup', 'input[name="newQty[]"], input[name="newHarga[]"]', function() {
            var value = $(this).val().trim(); // Hapus spasi di awal dan akhir nilai
            var formattedValue = formatNumber(parseFloat(value.split('.').join('')));
            $(this).val(formattedValue);
            if (isNaN(value)) { // Jika nilai input kosong
                $(this).val(''); // Atur nilai input menjadi 0
            }
            var row = $(this).closest('.barisEdit');
            hitungTotalNewItem(row);
        });

        function hitungTotalNewItem(row) {
            var qty = row.find('input[name="newQty[]"]').val().replace(/\./g, ''); // Hapus tanda titik
            var harga = row.find('input[name="newHarga[]"]').val().replace(/\./g, ''); // Hapus tanda titik
            qty = parseInt(qty); // Ubah string ke angka float
            harga = parseInt(harga); // Ubah string ke angka float

            qty = isNaN(qty) ? 0 : qty;
            harga = isNaN(harga) ? 0 : harga;

            var total = qty * harga;
            row.find('input[name="newTotal[]"]').val(formatNumber(total));
        }
    });
</script>