<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ADMINISTRATOR AREA</title>
    <script src="<?php echo base_url(); ?>assets/opensource/js/jquery.min.js"></script>
      
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/files/icon-kemendagri.png" />

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">


    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:url('<?php echo base_url(); ?>assets/design/background.png') center no-repeat fixed; background-size:cover;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                   <form action="<?php echo base_url('Login/login_form'); ?>" method="post">
                        <h1><font color="white"><p align="center"><img src="<?php echo base_url(); ?>assets/design/pancasila.png" height="65" width="80"></br></br>
       <strong><h1><font size="4" color="white">DITJEN. KEPENDUDUKAN</font></br><font size="4" color="white">DAN PENCATATAN SIPIL KEMENTERIAN DALAM NEGERI</font></strong></p></h1></font></h1>
                        <div>
                            <input name="USERNAME"  type="text" class="form-control" placeholder="Username" required=""  value="<?php echo set_value('USERNAME');?>" />
                        </div><?php echo form_error('USERNAME');?>
                        <div>
                            <input name="PASSWORD"  type="password" class="form-control" placeholder="Password" required="" value="<?php echo set_value('PASSWORD');?>"/>
                        </div>
                        <div><?php echo form_error('PASSWORD');?>
                            <button type="submit" class="btn btn-lg btn-danger lt b-red b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">MASUK</span></button>
         
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> SMS GATEWAY PDAK </h1>

                                <p><font size="2" color="white">©2015 Copyright  By : Tim Pengelolaan Database Administrasi Kependudukan</a> </font>- <strong><font color="white" size="2">All Right Reserved</strong></font></font></p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
          
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>