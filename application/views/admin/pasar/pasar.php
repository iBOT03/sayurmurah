<?php $this->load->view('admin/partials/header'); ?>

<body>
    <!-- Sidenav -->
    <?php $this->load->view('admin/partials/sidebar'); ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $this->load->view('admin/partials/navbar', $profil); ?>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Pasar</li>
                                </ol>
                            </nav>
                            <?= $this->session->flashdata('pesan'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-white">
                        <div class="card-header bg-transparent">
                            <a href="<?= base_url("admin/pasar/tambah"); ?>" class="btn btn-icon btn-success" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                <span class="btn-inner--text">Tambah Pasar</span>
                            </a>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="table-responsive">
                                        <div>
                                            <table class="table align-items-center">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="name">No</th>
                                                        <th scope="col" class="sort" data-sort="budget">Nama Pasar</th>
                                                        <th scope="col" class="sort" data-sort="status">Daerah</th>
                                                        <th scope="col" class="sort" data-sort="status">Alamat Pasar</th>
                                                        <th scope="col">Foto</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <?php $no = 1;
                                                    foreach ($pasar as $row) : ?>
                                                        <tr>
                                                            <td>
                                                                <?= $no; ?>
                                                            </td>
                                                            <td>
                                                                <?= $row->nama_pasar; ?>
                                                            </td>
                                                            <td>
                                                                <?= $daerah[0]->nama_daerah; ?>
                                                            </td>
                                                            <td>
                                                                <?= $row->alamat_pasar; ?>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="avatar rounded-circle mr-3">
                                                                    <img alt="Image" src="<?= base_url('./uploads/admin/foto/') . $row->foto_pasar ?>">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url("admin/pasar/detail/" . $row->id_pasar); ?>" class="btn btn-icon btn-warning" type="button" style="margin-bottom: 0;">
                                                                    <span class="btn-inner--icon text-light"><i class="ni ni-ruler-pencil"></i></span>
                                                                    <span class="btn-inner--text text-light">Edit</span>
                                                                </a>
                                                                <a href="<?= site_url("admin/pasar/detail/" . $row->id_pasar); ?>" class="btn btn-icon btn-danger" type="button">
                                                                    <span class="btn-inner--icon text-light"><i class="ni ni-fat-remove"></i></span>
                                                                    <span class="btn-inner--text text-light">Delete</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                            <nav aria-label="...">
                                                <ul class="pagination justify-content-end">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">
                                                            <i class="fa fa-angle-left"></i>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item ">
                                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">
                                                            <i class="fa fa-angle-right"></i>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <?php $this->load->view('admin/partials/footer') ?>
</body>

</html>