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
                                    <li class="breadcrumb-item" aria-current="page"><a href="akun">Data Pasar</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Pasar</li>
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
                                    <form method="post" action="<?= site_url('admin/pasar/tambah') ?>" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Nama Pasar</label>
                                                    <input name="nama" id="nama" class="form-control" type="text" placeholder="Masukkan nama pasar ..." id="example-text-input">
                                                    <?= form_error('nama', '<small style="padding-left: 0; margin-left: 0;" class="text-danger pl-2">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-search-input" class="form-control-label">Daerah Pasar</label>
                                                    <select class="form-control" id="daerah" name="daerah">
                                                        <option value="<?= set_value('daerah') ?>">--- Pilih ---</option>
                                                        <?php foreach ($daerah as $row) { ?>
                                                            <option value="<?php echo $row->id_daerah; ?>"><?php echo $row->nama_daerah; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?= form_error('daerah', '<small style="padding-left: 0; margin-left: 0;" class="text-danger pl-2">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-password-input" class="form-control-label">Upload Foto</label>
                                                    <input name="foto" id="foto" accept="image/*" onchange="tampilkanPreview(this, 'preview')" class="form-control" type="file" placeholder="Upload foto" id="example-password-input">
                                                    <h6 class="text-danger">*Harap upload file berekstensi gambar
                                                    </h6>
                                                    <?= form_error('foto', '<small style="padding-left: 0; margin-left: 0;" class="text-danger pl-2">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <img id="preview" src="" alt="" width="300px" /> <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input" class="form-control-label">Lokasi</label>
                                            <textarea name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan alamat detail pasar ..." id="example-email-input"></textarea>
                                            <?= form_error('lokasi', '<small style="padding-left: 0; margin-left: 0;" class="text-danger pl-2">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <a href="<?= base_url("admin/oasar") ?>" class="btn btn-icon btn-danger" type="submit" style="margin-bottom: 0px">
                                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                                <span class="btn-inner--text">Kembali</span>
                                            </a>
                                            <button href="<?= base_url("admin/pasar") ?>" class="btn btn-icon btn-success" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                                <span class="btn-inner--text">Tambah Pasar</span>
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