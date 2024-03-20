<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon/esemkita-lg.png" type="image/x-ic
    on">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>/assets/css/style.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>/node_modules/bootstrap-social/bootstrap-social.css">
    <title>Login | SPPKITA</title>
</head>

<body>
    <section class="section">c
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                    <div class="card card-primary mt-5">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">
                            <?= $this->session->flashdata('error') ?>
                            <form class="user" method="post" action="<?= base_url('auth') ?>">
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username Anda" value="<?= set_value('username'); ?>" autocomplete="off">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="auth-register.html">Create One</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/template/') ?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url('assets/template/') ?>/assets/js/scripts.js"></script>


</body>

</html>