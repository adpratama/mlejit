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
                            <h5 class="card-title">Create new invoice</h5>
                            <form action="<?= base_url('admin/invoice/store') ?>" method="post" class="row g-3">
                                <div class="col-12">
                                    <label for="no_invoice" class="form-label">Number</label>
                                    <input type="text" class="form-control" name="no_invoice">
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
                    <form action="<?= base_url('admin/invoice/store') ?>" method="post" class="">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Create new invoice</h5>
                                <div class="row">

                                    <div class="col-4">
                                        <label for="no_invoice" class="form-label">Number</label>
                                        <input type="text" class="form-control" name="no_invoice" value="<?= $no_invoice ?>" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label for="tgl_invoice" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="tgl_invoice" value="<?= date('Y-m-d') ?>">
                                    </div>
                                    <div class="col-4">
                                        <label for="nominal" class="form-label">Total</label>
                                        <input type="text" class="form-control" name="nominal" id="nominal" value="0" readonly>
                                    </div>
                                    <div class="col-8">
                                        <label for="keterangan" class="form-label">Notes</label>
                                        <textarea name="keterangan" id="keterangan" cols="30" rows="1" class="form-control" oninput="this.value = this.value.toUpperCase()"></textarea>
                                    </div>
                                    <div class="col-4 text-end">
                                        <label for="keterangan" class="form-label">&nbsp;</label>
                                        <div class="mt-2">
                                            <a href="<?= base_url('admin/invoice') ?>" class="btn btn-sm btn-warning"><i class="bi bi-arrow-return-left"></i> Back</a>
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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
        });
    });
</script>