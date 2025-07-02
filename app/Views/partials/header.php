<!doctype html>
<html lang="en">

<head>
    <title> Career Fair</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/toastr.css">

    <?php if ($view == 'index') { ?>
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/candidate.css">
    <?php } ?>
    <?php if ($view == 'modify') { ?>

        <link rel="stylesheet" href="/css/modify.css">
    <?php } ?>
    <?php if ($view == 'admin') { ?>
        <link rel="stylesheet" href="/css/admin.css">
    <?php } ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h1><a href="<?php echo base_url('login') ?>" class="logo"> Career Fair</a></h1>
            <ul class="list-unstyled components mb-5">
                <?php if (session()->get('index_no') == 'admin') { ?>
                    <li>
                        <a href="<?php echo base_url('admin') ?>"><span class="fa fa-wrench mr-3"></span> Admin</a>
                    </li>
                <?php } ?>
                <li class="active">
                    <a href="<?php echo base_url() ?>"><span
                            class="fa fa-user mr-3"></span> Candidates</a>
                </li>
                <?php if (session()->get('isLoggedIn')) { ?>
                    <li>
                        <a href="<?php echo base_url('modify') ?>"><span
                                class="fa fa-cogs mr-3"></span> Modify</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('logout') ?>"><span
                                class="fa fa-sign-out mr-3"></span> Logout | <?= session()->get('editor') ?></a>
                    </li>
                <?php } ?>


            </ul>

        </nav>