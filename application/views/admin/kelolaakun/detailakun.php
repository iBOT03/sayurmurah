<?php $this->load->view('admin/partials/header'); ?>

<body>
    <!-- Sidenav -->
    <?php $this->load->view('admin/partials/sidebar'); ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $this->load->view('admin/partials/navbar', $profil); ?>
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="../admin"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page"><a href="akun">Kelola Akun</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Akun</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <form action="" method="POST">
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card bg-white">
                            <div class="card-header bg-transparent">
                                <button class="btn btn-icon btn-success" type="submit" name="aktif" id="aktif">
                                    <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                    <span class="btn-inner--text">Aktif</span>
                                </button>
                                <button class="btn btn-icon btn-warning" type="submit" name="mati" id="mati">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
                                    <span class="btn-inner--text">Non-Aktif</span>
                                </button>
                                <div class="row align-items-center">
                                    <div class="col">
                                        <?php foreach ($admin as $detail) : ?>
                                            <img src="<?= base_url('./uploads/admin/foto/') . $detail->foto ?>" alt="Foto Profil" class="logo mx-auto d-block mb-5 rounded-circle" width="200px">
                                            <div class="row">
                                                <div class="my-auto col-sm-2">
                                                    <p>Nama Lengkap:</p>
                                                </div>
                                                <div class="my-auto col-sm-9">
                                                    <p><?= $detail->nama ?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="my-auto col-sm-2">
                                                    <p>Email:</p>
                                                </div>
                                                <div class="my-auto col-sm-9">
                                                    <p><?= $detail->email ?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="my-auto col-sm-2">
                                                    <p>Status:</p>
                                                </div>
                                                <div class="my-auto col-sm-9">
                                                    <p><?php
                                                        if ($detail->status == 1) {
                                                            echo '<span class="badge badge-success">Aktif</span>';
                                                        } elseif ($detail->status == 2) {
                                                            echo '<span class="badge badge-danger">Non-Aktif</span>';
                                                        }
                                                        ?> </p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="my-auto col-sm-2">
                                                    <p>Telepon/Whatsapp:</p>
                                                </div>
                                                <div class="my-auto col-sm-9">
                                                    <p><?= $detail->no_hp ?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="my-auto col-sm-2">
                                                    <p>Alamat:</p>
                                                </div>
                                                <div class="my-auto col-sm-9">
                                                    <p><?= $detail->alamat ?></p>
                                                </div>
                                            </div>
                                            <a href="<?= base_url("admin/akun") ?>" class="btn btn-icon btn-danger" type="submit" style="margin-bottom: 0px">
                                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                                <span class="btn-inner--text">Kembali</span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('admin/partials/footer') ?>

                    <script>
                        function tampilkanPreview(gambar, idpreview) {
                            //                membuat objek gambar
                            var gb = gambar.files;
                            //                loop untuk merender gambFar
                            for (var i = 0; i < gb.length; i++) {
                                //                    bikin variabel
                                var gbPreview = gb[i];
                                var imageType = /image.*/;
                                var preview = document.getElementById(idpreview);
                                var reader = new FileReader();
                                if (gbPreview.type.match(imageType)) {
                                    //                        jika tipe data sesuai
                                    preview.file = gbPreview;
                                    reader.onload = (function(element) {
                                        return function(e) {
                                            element.src = e.target.result;
                                        };
                                    })(preview);
                                    //                    membaca data URL gambar
                                    reader.readAsDataURL(gbPreview);
                                } else {
                                    //                        jika tipe data tidak sesuai
                                    alert(
                                        "Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
                                }
                            }
                        }
                    </script>
        </form>
</body>

</html>