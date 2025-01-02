<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- <title>Dashboard - NiceAdmin Bootstrap Template</title> -->
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- title -->
    <title><?= $title ?> - Mlejit Coffee Shop</title>

    <?php $this->load->view('dashboard/layouts/_style'); ?>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url(); ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url(); ?>assets/img/logo_mlejit_crop.png" alt="">
                <!-- <span class="d-none d-lg-block">mlejit kopi</span> -->
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url('assets/dashboard/img/profile/') . $user['image']; ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['name'] ?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $user['name'] ?></h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item d-flex align-items-center btn-logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link <?php if ($this->uri->segment(2) != 'dashboard') echo 'collapsed' ?>" href="<?= base_url() ?>admin/dashboard">
                    <i class="bi bi-box"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php
            if ($this->session->userdata('role_id') == "3") {
            ?>
                <li class="nav-heading">Invoice Koperasi</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'koperasi' && $this->uri->segment(3) == "") echo 'collapsed' ?>" href="<?= base_url() ?>admin/koperasi">
                        <i class="bi bi-journal-check"></i>
                        <span>Invoice</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(3) != 'customer') echo 'collapsed' ?>" href="<?= base_url() ?>admin/koperasi/customer">
                        <i class="bi bi-journal-check"></i>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="nav-heading">Invoice Mlejit Coffee</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'invoice') echo 'collapsed' ?>" href="<?= base_url() ?>admin/invoice">
                        <i class="bi bi-journal-check"></i>
                        <span>Invoice</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'customer') echo 'collapsed' ?>" href="<?= base_url() ?>admin/customer">
                        <i class="bi bi-journal-check"></i>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="nav-heading">Transaction</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'transaction') echo 'collapsed' ?>" href="<?= base_url() ?>admin/transaction">
                        <i class="bi bi-journal-check"></i>
                        <span>Transaction</span>
                    </a>
                </li>
                <li class="nav-heading">Products</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'product') echo 'collapsed' ?>" href="<?= base_url() ?>admin/product">
                        <i class="bi bi-archive"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'category') echo 'collapsed' ?>" href="<?= base_url() ?>admin/category">
                        <i class="bi bi-list-check"></i>
                        <span>Categories</span>
                    </a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-heading">Invoice Mlejit Coffee</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'invoice') echo 'collapsed' ?>" href="<?= base_url() ?>admin/invoice">
                        <i class="bi bi-journal-check"></i>
                        <span>Invoice</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'customer') echo 'collapsed' ?>" href="<?= base_url() ?>admin/customer">
                        <i class="bi bi-journal-check"></i>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="nav-heading">Transaction</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'transaction') echo 'collapsed' ?>" href="<?= base_url() ?>admin/transaction">
                        <i class="bi bi-journal-check"></i>
                        <span>Transaction</span>
                    </a>
                </li>
                <li class="nav-heading">Products</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'product') echo 'collapsed' ?>" href="<?= base_url() ?>admin/product">
                        <i class="bi bi-archive"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'category') echo 'collapsed' ?>" href="<?= base_url() ?>admin/category">
                        <i class="bi bi-list-check"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="nav-heading">Invoice Mlejit Mart</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'invoicemart') echo 'collapsed' ?>" href="<?= base_url() ?>admin/invoicemart">
                        <i class="bi bi-journal-check"></i>
                        <span>Invoice</span>
                    </a>
                </li>
                <!-- <li class="nav-heading">Configuration</li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($this->uri->segment(2) != 'setting') echo 'collapsed' ?>" href="<?= base_url() ?>admin/setting">
                        <i class="bi bi-archive"></i>
                        <span>Settings</span>
                    </a>
                </li> -->
            <?php
            }
            ?>

            <li class="nav-item">
                <a href="<?= base_url('auth/logout') ?>" class="nav-link btn-logout <?php if ($this->uri->segment(2) != 'logout') echo 'collapsed' ?>">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </a>
            </li>

        </ul>

    </aside>
    <!-- End Sidebar-->

    <?php if (isset($pages)) $this->load->view($pages); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php $this->load->view('dashboard/layouts/_script'); ?>

</body>

</html>