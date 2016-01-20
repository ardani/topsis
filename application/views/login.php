<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Sistem Informasi Penilaian</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>asset/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url()?>/asset/js/html5shiv.js"></script>
          <script src="<?php echo base_url()?>/asset/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">Sistem Informasi Penilaian</div>
            <form action="<?php echo site_url("login/dologin")?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Login</button>
                </div>
            </form>
        </div>
        <div class="form-box">
            <?php echo $msg; ?>
        </div>
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url() ?>asset/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url() ?>asset/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
