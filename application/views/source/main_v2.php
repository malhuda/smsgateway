<!DOCTYPE html>
<html class="backend">
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/Zebra/public/css/zebra_dialog.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/Zebra/public/css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/Zebra/libraries/highlight/public/css/ir_black.css" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Zebra/public/javascript/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Zebra/libraries/highlight/public/javascript/highlight.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Zebra/public/javascript/zebra_dialog.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Zebra/public/javascript/core.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.chainedselects.js"></script>
        <script src="<?= base_url() ?>assets/js/update_tgl.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/vendor.js"></script>   
        <script type="text/javascript">
        $(window).load(function() { $("#loading").fadeOut("slow"); })
        </script>
        <style>
          
  #loading {
position: fixed;
  left: 0px;
    top: 0px;
      width: 100%;
        height: 100%;
z-index: 9999;
   background: url(<?php echo base_url('assets/loader/loaders.gif'); ?>) 50% 50% no-repeat #fff;
    }
      .container{
          width: 730px;
        margin: 0 auto;
    padding: 20px;
  background: #fff;
  }
</style> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/image/icon-kemendagri.png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/selectize/css/selectize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/flot/css/flot.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/uielement.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/themes/theme4.css">  
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/modernizr/js/modernizr.js"></script>
    </head>
  <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
    <!-- START Body -->
  <body onload="setInterval('displayServerTime()', 1000); ">
        <div id="loading"></div>
        <header id="header" class="navbar">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(""); ?>">
            <font size="2" color="white"><img src="<?php echo base_url(); ?>assets/files/logo.png" height="40" weight="40"><strong>Kementerian Dalam Negeri </strong></font>          
                  </a>
            </div>
            <div class="navbar-toolbar clearfix">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                            <span class="meta"><span id="clock"><?php print date('H:i:s'); ?></span>&nbsp;&nbsp;&nbsp;
                                <span class="avatar"><img src="<?php echo base_url(); ?>assets/foto/<?php echo $pengguna->FOTO; ?>" class="img-circle" alt="" /></span>
                                <span class="text hidden-xs hidden-sm pl5"><?php echo $pengguna->NAMA; ?></span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="pa15">
                              <a href="<?php echo base_url('login/logout');?>" onClick="return confirm('Apakah anda ingin keluar dari aplikasi ?');" ><span class="icon"><i class="ico-exit"></i></span> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <aside class="sidebar sidebar-left sidebar-menu">
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li  class="active open">
                        <a href="<?php echo base_url(""); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-dashboard2"></i></span>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-target="#components" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-screwdriver"></i></span>
                            <span class="text">Siak</span>
                            <span class="arrow"></span>
                        </a>
                        <ul id="components" class="submenu collapse ">
                            <li>
                                <a href ="<?php echo base_url("data_anomali"); ?>">
                                    <span class="text">Data Anomali</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("data_ganda"); ?>">
                                    <span class="text">Data Ganda</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#form" data-parent=".topmenu">
                            <span class="figure"><i class="ico-quill2"></i></span>
                            <span class="text">KTP-el</span>
                            <span class="arrow"></span>
                        </a>
                        <ul id="form" class="submenu collapse ">
                            <li >
                                <a href="<?php echo base_url("status_perekaman"); ?>">
                                    <span class="text">Status Perekaman</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url("sudah_meninggal"); ?>">
                                    <span class="text">Sudah Meninggal</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url("sudah_merekam"); ?>">
                                    <span class="text">Sudah Merekam KTP-el</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url("belum_merekam"); ?>">
                                    <span class="text">Belum Merekam KTP-el</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url("nik_sama_biodata_beda"); ?>">
                                    <span class="text">NIK Sama Biodata Beda</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url("nik_beda_biodata_sama"); ?>">
                                    <span class="text">NIK Beda Biodata Sama</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url("jenis_kelamin_dan_foto_sama"); ?>">
                                    <span class="text">Jenis Kelamin &Foto Sama</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('login/logout');?>" onClick="return confirm('Apakah anda ingin keluar dari aplikasi ?');" data-toggle="submenu" data-target="#theme" data-parent=".topmenu">
                            <span class="figure"><i class="ico-droplet3"></i></span>
                            <span class="text">Logout</span>
                           </a>
                        </li>
                   </ul>
            </section>
        </aside>
        <footer id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <p ><strong>&copy;  KTP-el Indonesia 2015.</strong></p>
                    </div>
                    <div class="col-sm-9 text-right hidden-xs">
                        <a href="javascript:void(0);" ><strong>&copy; Copyright By : </strong><a href="javascript:void(0);"><span class="nm text-muted"><font color="gray">Tim Pengelolaan Database Administrasi Kependudukan .</font></a></span> <span ><strong>All Rights Reserved.</strong></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- START Template Main -->
        <section id="main" role="main">
            <div class="container-fluid">
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold"><?php echo $title; ?></h4>
                    </div>
                    <div class="page-header-section">
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                                <li class="active"><?php echo $title; ?></li>
                            </ol>
                        </div>
                    </div>
                </div> 

        

            <?php $this->load->view($main);?>

            </div> 
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
        </section>
        <!--/ END Template Main -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Application and vendor script : mandatory -->
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/vendor.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/core.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/app.js"></script>
        <!--/ Application and vendor script : mandatory -->

        <!-- Plugins and page level script : optional -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/selectize/js/selectize.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.categories.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.time.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.tooltip.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.spline.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/pages/dashboard-v1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/tables/default.js"></script>

        <!--/ Plugins and page level script : optional -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>