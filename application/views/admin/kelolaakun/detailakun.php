<?php $this->load->view('admin/partials/header'); ?>

<body>
    <!-- Sidenav -->
    <?php $this->load->view('admin/partials/sidebar'); ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $this->load->view('admin/partials/navbar'); ?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Akun</li>
                                </ol>
                            </nav>
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
                            <a href="#" class="btn btn-icon btn-success" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                <span class="btn-inner--text">Aktif</span>
                            </a>
                            <a href="#" class="btn btn-icon btn-warning" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
                                <span class="btn-inner--text">Non-Aktif</span>
                            </a>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Nama Lengkap:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>Andrea Santana</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Email:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>andreasterben@gmail.com</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Status:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p><span class="badge badge-success">Aktif</span></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Telepon/Whatsapp:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>089513756156</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="my-auto col-sm-2">
                                            <p>Alamat:</p>
                                        </div>
                                        <div class="my-auto col-sm-9">
                                            <p>Jl. Mastrip 2 Gg 2 No. 29 Sumbersari Jember</p>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("admin/akun") ?>" class="btn btn-icon btn-danger" type="submit" style="margin-bottom: 0px">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                        <span class="btn-inner--text">Kembali</span>
                                    </a>
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
</body>

</html>