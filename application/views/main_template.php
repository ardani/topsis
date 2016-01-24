<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SPK AHP Topsis</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url()?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url() ?>asset/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>asset/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>asset/js/plugins/datatables/fnReloadAjax.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>asset/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>asset/js/Chart.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url()?>/asset/js/html5shiv.js"></script>
    <script src="<?php echo base_url()?>/asset/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="main.php" class="logo">
        SPK AHP
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php echo $this->session->userdata('nama') ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <p>
                                <?php echo $this->session->userdata('nama') ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo site_url("login/dologout")?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left info">
                    <p>Hello, <?php echo $this->session->userdata('nama') ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="<?php echo site_url("main")?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <?php
                if($this->session->userdata('role') == '1') {
                    include APPPATH.'views/admin_menu.php';
                }elseif($this->session->userdata('role') == '2') {
                    include APPPATH . 'views/kepsek_menu.php';
                }
                ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small><?php echo $subtitle?></small>
            </h1>
        </section>
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <?php echo $contents ?>
        </section>
    </aside>
</div>



<script src="<?php echo base_url()?>asset/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()?>asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()?>asset/js/raphael-min.js"></script>
<script src="<?php echo base_url()?>asset/js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url()?>asset/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>asset/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>asset/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>asset/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>asset/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->

<script src="<?php echo base_url()?>asset/js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asset/js/AdminLTE/dashboard.js" type="text/javascript"></script>
</body>
</html>
