<html>

    <head>
    <?php 
        $isLogin = $this->session->userdata('isLogin');
        $admin = $this->session->userdata('admin');

        $pesan = @$_GET['pesan'];
        $notif = @$_GET['notif'];
        if ($notif==1) {
            $warna = 'sukses';
        }else{
            $warna = 'gagal';
        }
    ?>
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/roboto.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/material.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/ripples.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <?php if (isset($notif)): ?>
        <div class="notifikasi <?php echo $warna ?> "><?php echo $pesan ?></div>
    <?php endif ?>
    <body class="white">
        <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/ripples.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/material.min.js'); ?>"></script>
        <script type="text/javascript">
            base_url = '<?php echo base_url(); ?>';
        </script>
        <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
        <script>
            $(document).ready(function() {
                $.material.init();
            });
        </script>

        <div class="navbar navbar-info">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" rel="home" href="#" title="Smart Identification">
                    <img class="img-header img-responsive" src="<?php echo base_url('assets/img/logo.png'); ?>">
                </a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if (current_url() == site_url('home')) echo "class='active'"; ?>><a href="<?php echo site_url('home'); ?>"><strong>Home</strong></a></li>
                    <?php if ($isLogin): ?>
                        <li <?php if (current_url() == site_url('misc/checkin')) echo "class='active'"; ?>><a href="<?php echo site_url('misc/checkin') ?>"><strong>Check In Ticket</strong></a></li>
                    <?php else: ?>
                        <li <?php if (current_url() == site_url('account/register')) echo "class='active'"; ?>><a href="<?php echo site_url('account/register') ?>"><strong>Register</strong></a></li>
                    <?php endif; ?>
                    <li <?php if (current_url() == site_url('misc/tutorial')) echo "class='active'"; ?>><a href="<?php echo site_url('misc/tutorial'); ?>"><strong>Tutorial</strong></a></li>
                    <li <?php if (current_url() == site_url('misc/terdaftar')) echo "class='active'"; ?>><a href="<?php echo site_url('misc/terdaftar'); ?>"><strong>User Terdaftar</strong></a></li>

                    <?php if ($admin): ?>
                    <li <?php if (current_url() == site_url('admin')) echo "class='active'"; ?>>
                        <a href="<?php echo site_url('admin'); ?>"><strong>Admin Area</strong></a>
                    </li>    
                    <?php endif ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($isLogin): ?>
                        <li><a href="<?php echo site_url('account/logout'); ?>" ><strong>Logout</strong></a></li>
                    <?php else: ?>
                        <li <?php if (current_url() == site_url('account/login')) echo "class='active'"; ?>><a href="<?php echo site_url('account/login'); ?>" ><strong>Login</strong></a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
