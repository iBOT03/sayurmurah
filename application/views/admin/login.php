<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sayur Murah | Login</title>
    <link href="<?= base_url("asset/css/bootstrap/bootstrap.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("asset/css/styles.css"); ?>" rel="stylesheet">
</head>

<body>
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #f5f5f5">
        <div class="content-4-1 d-flex flex-column align-items-center h-100 flex-lg-row" style="font-family: 'Poppins', sans-serif">
            <div class="position-relative d-none d-lg-block h-100 width-left">
                <img class="position-absolute img-fluid centered" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-11.png" alt="" />
            </div>
            <div class="d-flex mx-auto align-items-left justify-content-left width-right mx-lg-0">
                <div class="right mx-lg-0 mx-auto">
                    <h3 class="title-text">Login</h3>
                    <p class="caption-text">
                        Selamat Datang, silahkan login untuk melanjutkan.
                    </p>
                    <br>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form style="margin-top: 1.75rem" action="" method="post">
                        <div style="margin-top: 1rem">
                            <label for="" class="d-block input-label">Email</label>
                            <div class="d-flex w-100 div-input">
                                <input class="input-field border-0" type="email" name="email" id="email" placeholder="Email Anda" autocomplete="on">
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div style="margin-top: 1rem">
                            <label for="" class="d-block input-label">Password</label>
                            <div class="d-flex w-100 div-input">
                                <input class="input-field border-0" type="password" name="password" id="password-content-4-1" placeholder="Password Anda">
                                <div onclick="togglePassword()">
                                    <svg style="margin-left: 0.75rem; cursor: pointer" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path id="icon-toggle" fill-rule="evenodd" clip-rule="evenodd" d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z" fill="#CACBCE" />
                                    </svg>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <button class="btn btn-fill text-white d-block w-100" type="submit">
                            Login
                        </button>
                    </form>
                    <p class="text-center bottom-caption">
                        Halaman ini khusus admin!
                        <a href="#"><span class="green-bottom-caption"> Kembali</span></a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Password toggle -->
        <script>
            function togglePassword() {
                var x = document.getElementById("password-content-4-1");
                if (x.type === "password") {
                    x.type = "text";
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#2ec49c");
                } else {
                    x.type = "password";
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#CACBCE");
                }
            }
        </script>
    </section>
    <script type="application/javascript" src="{{ asset('style/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="application/javascript" src="{{ asset('style/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>