<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V16</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login_vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login_vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login_vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login_vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login_vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login_vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/login_util.css">
    <link rel="stylesheet" type="text/css" href="/css/login_main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.png');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Career Fair
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?php echo base_url('loginAuth') ?>">
                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-warning">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                    <div class="wrap-input100 validate-input" data-validate="User">
                        <input class="input100" type="text" name="index_no" placeholder="User" required>
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pin" placeholder="Password" required>
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                        <span> &nbsp&nbsp&nbsp</span>
                        <a href="<?php echo base_url() ?>" class="guest100-form-btn">
                            Guest &nbsp>
                        </a>

                    </div>


                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/login_vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login_vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login_vendor/bootstrap/js/popper.js"></script>
    <script src="/login_vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login_vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/login_vendor/daterangepicker/moment.min.js"></script>
    <script src="login_vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/login_vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/js/login_main.js"></script>

</body>

</html>