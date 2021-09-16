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
                            <div class="row align-items-center">
                                <div class="col">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Nama</label>
                                                    <input class="form-control" type="text" placeholder="Masukkan nama lengkap ..." id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-search-input" class="form-control-label">No
                                                        Telepon</label>
                                                    <input class="form-control" type="search" placeholder="Masukkan no telepon ..." id="example-search-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-email-input" class="form-control-label">Email</label>
                                                    <input class="form-control" type="email" placeholder="Masukkan email ..." id="example-email-input">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-password-input" class="form-control-label">Upload Foto</label>
                                                    <input name="foto" id="foto" accept="image/*" onchange="tampilkanPreview(this, 'preview')" class="form-control" type="file" placeholder="Upload foto" id="example-password-input">
                                                    <h6 class="text-danger">*Harap upload file berekstensi gambar
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <img id="preview" src="" alt="" width="300px" /> <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input" class="form-control-label">Alamat</label>
                                            <textarea class="form-control" placeholder="Masukkan alamat lengkap ..." id="example-email-input"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-password-input" class="form-control-label">Password</label>
                                                    <input class="form-control" type="password" placeholder="Masukkan password ..." id="example-password-input">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-password-input" class="form-control-label">Konfirmasi Password</label>
                                                    <input class="form-control" type="password" placeholder="Masukkan password kembali ..." id="example-password-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url("admin/akun") ?>" class="btn btn-icon btn-danger" type="submit" style="margin-bottom: 0px">
                                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                                <span class="btn-inner--text">Kembali</span>
                                            </a>
                                            <button href="akun" class="btn btn-icon btn-success" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                                <span class="btn-inner--text">Tambah Akun</span>
                                            </button>
                                        </div>
                                    </form>
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