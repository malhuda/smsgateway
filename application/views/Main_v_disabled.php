<!DOCTYPE html>
<html class="backend">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="author" content="Andre Marbun S.Kom">
        <meta name="description" content="APLIKASI SMS GATEWAY PDAK">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="refresh" content="180">   
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/foto/icon-kemendagri.png">        <!--/ END META SECTION -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/selectize/css/selectize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/flot/css/flot.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/uielement.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/vendor.js"></script>  
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/themes/theme1.css">  
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/modernizr/js/modernizr.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/css/datatables.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/css/tabletools.css">
       <script type="text/javascript">
        $(window).load(function() { $("#loading").fadeOut("slow"); })
        </script>
         <!--<script type="text/javascript">
        window.top.close();
        </script>
        <script language="JavaScript">
        <!-- begin
        if (this.name!='fullscreen'){ 
          window.open("location.href",'fullscreen','fullscreen,scrollbars') 
        } 
        </script>
          -->
        <style>
          #loading {
        position: fixed;
          left: 0px;
            top: 0px;
              width: 100%;
                height: 100%;
        z-index: 9999;
           background: url(<?php echo base_url('assets/loader/brspin.gif'); ?>) 50% 50% no-repeat #fff;
            }
              .container{
                  width: 730px;
                margin: 0 auto;
            padding: 20px;
          background: #fff;
          }
        </style> 

      

      <script type="text/javascript">
          <?php date_default_timezone_set('Asia/Jakarta'); ?>
            var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
            var clientTime = new Date();
              var Diff = serverTime.getTime() - clientTime.getTime();    
                function displayServerTime(){
                var clientTime = new Date();
                var time = new Date(clientTime.getTime() + Diff);
              var sh = time.getHours().toString();
            var sm = time.getMinutes().toString();
          var ss = time.getSeconds().toString();
         document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
        }
      </script>
      
      <script type="text/javascript">
          <?php date_default_timezone_set('Asia/Jakarta'); ?>
            var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
            var clientTime = new Date();
              var Diff = serverTime.getTime() - clientTime.getTime();    
                function displayServerTime(){
                var clientTime = new Date();
                var time = new Date(clientTime.getTime() + Diff);
              var sh = time.getHours().toString();
            var sm = time.getMinutes().toString();
          var ss = time.getSeconds().toString();
         document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
        }
      </script>
      <style>
        .disabled {
       pointer-events: none;
       cursor: default;
         } 
        </style>
        <body onload="setInterval('displayServerTime()', 1000); ">
           <div id="loading"></div>
          <header id="header" class="navbar">
            <div class="navbar-header">
                <a class="navbar-brand disabled" href="<?php echo base_url(""); ?>">
            <font size="2" color="white"><img src="<?php echo base_url(); ?>assets/files/logo.png" height="40" weight="40"><strong><font color="black">Kementerian Dalam Negeri </font></strong></font>          
                  </a>
            </div>
             <div class="navbar-toolbar clearfix">
                <ul class="nav navbar-nav navbar-left">
                    <li class="hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                            <span class="meta">
                                <span class="icon"></span>
                            </span>
                        </a>
                    </li>
                    <li class="navbar-main hidden-lg hidden-md hidden-sm">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                            </span>
                        </a>
                    </li>
                    <?php $no =1;
                         foreach($cek_inbox_adb as $cek_inbox_adb){
                         ?> 
                         <?php if($cek_inbox_adb["belum_dibaca"] == 0){  ?>
                    <li class="dropdown custom" id="header-dd-notification">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bell"></i></span>
                                <span class="hasnotification hasnotification-default"></span>
                            </span>
                        </a>
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="javascript:void(0);" class="media border-dotted new">
                                <span class="media-object pull-left">
                                    <i class="{{icon}}"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">{{{text}}}</span>
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                        
                        </script>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notification <span class="count"></span></span>
                                <span class="option text-right"><a class="disabled" href="<?php echo base_url(); ?>inbox">Lihat Semua Inbox</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <div class="indicator inline"><span class="spinner spinner16"></span></div>
                                <div class="media-list">
                                    
                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-basket2 bgcolor-info"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text"><span class="text-primary semibold">Tidak Ada Pesan Baru. </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                     <?php 
                           } 
                         else
                         { 
                            ?>
                            <li class="dropdown custom" id="header-dd-notification">
                             <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><font color="white"> <?php echo $cek_inbox_adb["belum_dibaca"]; ?>  </font><i class="ico-bubbles3"></i></span>
                                <span class="hasnotification hasnotification-danger"> </span>
                            </span>
                        </a>
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="javascript:void(0);" class="media border-dotted new">
                                <span class="media-object pull-left">
                                    <i class="{{icon}}"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">{{{text}}}</span>
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                        
                        </script>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notification <span class="count"></span></span>
                                <span class="option text-right"><a class="disabled" href="<?php echo base_url(); ?>inbox">Lihat Semua Inbox</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <div class="indicator inline"><span class="spinner spinner16"></span></div>
                                <div class="media-list">
                                    <?php $no=1; 
                                    foreach($inbox as $inbox){
                                     ?>
                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-user bgcolor-success"></i>
                                        </span>

                                        <span class="media-body">
                                            <span class="media-text"><?php echo $inbox["NAMA_ADB"]; ?> - &nbsp;&nbsp;<?php echo $inbox["KODE"]; ?> - &nbsp;&nbsp;<?php echo $inbox["WILAYAH"]; ?></span>
                                              <span class="media-text">No.Hp : <?php echo $inbox["SenderNumber"]; ?> </span>
                                         <span class="text-primary semibold">Pesan : <?php echo $inbox["TextDecoded"]; ?>.</span>
                                            <span class="media-meta pull-right"><?php echo $no++; ?></span>
                                        </span>
                                        
                                    </a>
                                    <?php 
                                      }
                                      ?>
                                </div>
                            </div>
                        </div>
                    </li>  
                     <div hidden="hidden" id="respons">
                    </div>    
                    <script type="text/javascript">
                      function Ajax()
                      {
                          var
                              $http,
                              $self = arguments.callee;

                          if (window.XMLHttpRequest) {
                              $http = new XMLHttpRequest();
                          } else if (window.ActiveXObject) {
                              try {
                                  $http = new ActiveXObject('Msxml2.XMLHTTP');
                              } catch(e) {
                                  $http = new ActiveXObject('Microsoft.XMLHTTP');
                              }
                          }

                          if ($http) {
                              $http.onreadystatechange = function()
                              {
                                  if (/4|^complete$/.test($http.readyState)) {
                                      document.getElementById('respons').innerHTML = $http.responseText;
                                      setTimeout(function(){$self();}, 10000);
                                  }

                              };
                              $http.open('GET', '<?php echo base_url("index/load"); ?>' + '?' + new Date().getTime(), true);
                              $http.send(null);
                          }
                          else  {
                              document.getElementById('respons').innerHTML = $http.responseText;
                          }

                      }
                  </script>
                    <script type="text/javascript">
                        setTimeout(function() {Ajax();}, 10000);
                    </script>
                        <?php
                          }
                         }
                         ?>
                         <li class="navbar-main hidden-lg hidden-md hidden-sm">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                            </span>
                        </a>
                    </li>
                    <?php $no =1;
                         foreach($cek_inbox as $belum_dibaca){
                         ?> 
                         <?php if($belum_dibaca["belum_dibaca"] == 0){  ?>
                      <li class="dropdown custom" id="header-dd-notification">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-user"></i></span>
                                <span class="hasnotification hasnotification-default"></span>
                            </span>
                        </a>
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="javascript:void(0);" class="media border-dotted new">
                                <span class="media-object pull-left">
                                    <i class="{{icon}}"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">{{{text}}}</span>
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                        
                        </script>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notification <span class="count"></span></span>
                                <span class="option text-right"><a class="disabled" href="<?php echo base_url(); ?>inbox">Lihat Semua Inbox</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <div class="indicator inline"><span class="spinner spinner16"></span></div>
                                <div class="media-list">
                                    
                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-basket2 bgcolor-info"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text"><span class="text-primary semibold">Tidak Ada Nomor Baru. </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                     <?php 
                           } 
                         else
                         { 
                            ?>
                            <li class="dropdown custom" id="header-dd-notification">
                             <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><font color="white"> <?php echo $belum_dibaca["belum_dibaca"]; ?>  
                                </font><i class="ico-user"></i></span>
                                <span class="hasnotification hasnotification-danger"> </span>
                            </span>
                        </a>
                        <script class="mustache-template" type="x-tmpl-mustache">
                        
                            {{#data}}
                            <a href="javascript:void(0);" class="media border-dotted new">
                                <span class="media-object pull-left">
                                    <i class="{{icon}}"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">{{{text}}}</span>
                                    <span class="media-meta pull-right">{{meta.time}}</span>
                                </span>
                            </a>
                            {{/data}}
                          </script>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notification <span class="count"></span></span>
                                <span class="option text-right"><a class="disabled" href="<?php echo base_url(); ?>inbox">Lihat Semua Inbox</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <div class="indicator inline"><span class="spinner spinner16"></span></div>
                                <div class="media-list">
                                    <?php 
                                      $no=1; 
                                      foreach($inbox_baru as $inbox_baru){ 
                                      ?>
                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-user bgcolor-success"></i>
                                        </span>
                                        <span class="media-body">
                                              <span class="media-text">No.Hp : <?php echo $inbox_baru["SenderNumber"]; ?> </span>
                                         <span class="text-primary semibold">Pesan : <?php echo $inbox_baru["TextDecoded"]; ?>.</span>
                                            <span class="media-meta pull-right"><?php echo $no++; ?></span>
                                        </span>                                       
                                    </a>
                                    <?php 
                                    }
                                  ?>
                                </div>
                            </div>
                        </div>
                    </li>  
                     <div hidden="hidden" id="respons">
                    </div>    
                 <?php                           
                    }
                   }
                 ?>
                </ul>               
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                            <span class="meta">
                                <strong><font color="white">
                                <!-- Tanggal :
                                <?
                                $tgl=date('d-m-Y');
                                echo $tgl;
                                ?> --> &nbsp;&nbsp;&nbsp; Waktu Asia Jakarta :                 
                                    <span id="clock"><?php print date('H:i:s'); ?></span>&nbsp;&nbsp;&nbsp;</font></strong> &nbsp;<!-- Waktu :  <span id="clock"><?php print date('H:i:s'); ?></span> -->&nbsp;&nbsp;&nbsp;
                                <span class="avatar"><img src='<?php echo base_url(); ?>assets/foto/LOGO.png' class="img-circle" /></span>
                                <span class="text hidden-xs hidden-sm pl5"><strong><font color="white">User Pdak</font></strong></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="pa15">
                              <a class="disabled" href="<?php echo base_url('login/logout');?>" onClick="return confirm('Apakah anda ingin keluar dari aplikasi ?');" ><span class="icon"><i class="ico-exit"></i></span> Log Out</a>
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
                        <a class="disabled" href="<?php echo base_url(); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-home"></i></span>
                            <span class="text">DASHBOARD</span>
                        </a>
                    </li>
                    <li>
                        <a class="disabled" href="<?php echo base_url("new_message"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-pencil"></i></span>
                            <span class="text">NEW MESSAGE</span>
                        </a>
                    </li>
                     <li>
                        <a class="disabled" href="<?php echo base_url("inbox"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-download"></i></span>
                            <span class="text">INBOX</span>
                        </a>
                    </li>
                    <li>
                        <a class="disabled" href="<?php echo base_url("outbox"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-upload2"></i></span>
                            <span class="text">OUTBOX</span>
                        </a>
                    </li>
                    <li>
                        <a class="disabled" href="<?php echo base_url("sent"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-upload"></i></span>
                            <span class="text">SENT ITEMS</span>
                        </a>
                    </li>
                    <li>
                        <a class="disabled" href="<?php echo base_url("format_broadcast"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-info"></i></span>
                            <span class="text">FORMAT SMS GATEWAY</span>
                        </a>
                    </li>
                  <!--  <li>
                        <a href="<?php echo base_url("auto_replay"); ?>" target="_blank" onClick="return confirm('Anda akan mengaktifkan fitur sms auto replay otomatis ?');" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-refresh"></i></span>
                            <span class="text">AUTO REPLAY SMS ADB</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("auto_replay_broadcast"); ?>" target="_blank" onClick="return confirm('Anda akan mengaktifkan fitur sms auto replay otomatis ?');" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-user"></i></span>
                            <span class="text">SMS BROADCAST</span>
                        </a>
                    </li> -->
                   <li>
                        <a class="disabled" href="<?php echo base_url("sms_broadcast"); ?>" target="_blank" onClick="return confirm('Anda akan mengirim pesan ke semua kontak adb ?');" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-user"></i></span>
                            <span class="text">SMS BROADCAST</span>
                        </a>
                    </li>
                    <li>
                        <a class="disabled" href="<?php echo base_url("contact_person_adb"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-group"></i></span>
                            <span class="text">CONTACT PERSON ADB</span>
                        </a>
                    </li>   <li>
                        <a class="disabled" href="<?php echo base_url("webmaster"); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-user22"></i></span>
                            <span class="text">USER</span>
                        </a>
                    </li> 
                     <li>
                        <a class="disabled" href="<?php echo base_url("login/logout"); ?>"  onClick="return confirm('Apakah anda ingin keluar dari aplikasi ?');" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-key"></i></span>
                            <span class="text">LOGOUT</span>
                        </a>
                    </li>  
                       
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
        <footer id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10">
                        <p><strong><font color="black">SMS GATEWAY PDAK 2015 - <?php echo date('Y'); ?></strong></font> <font color="gray">  &copy; Copyright By :</font><a><span><font color="gray">
                            Tim Pengelolaan Database Administrasi Kependudukan .</font></a></span>
                             <span><strong><font color="red">All Rights Reserved. </strong></font></span></p>
                            </div>
                         <div class="col-sm-2 text-right hidden-xs">
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
                                <li><a class="disabled" href="<?php echo base_url(); ?>">HOME</a></li>
                                <li class="active"><?php echo $title; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            <!--  Mulai load halaman dinamis dan set interval waktu ajax untuk notifikasi sms baru dan jalankan perintah auto replay berdasarkan nomor dan keyword sms -->
                 <?php $this->load->view($main);?>
                  <script>
                  $(document).ready(function() {
                  $("#responsecontainer").load("<?php echo base_url(); ?>auto_replay_disabled/proses_auto_replay");
                  var refreshId = setInterval(function()
                  {
                  $("#responsecontainer").load('<?php echo base_url(); ?>auto_replay_disabled/proses_auto_replay');
                  }, 1000);
                  });
                  </script>
                  <div id="responsecontainer"></div>

                  <script>
                  $(document).ready(function() {
                  $("#responsecontainer").load("<?php echo base_url(); ?>auto_replay_broadcast_disabled/proses_auto_replay");
                  var refreshId = setInterval(function()
                  {
                  $("#responsecontainer").load('<?php echo base_url(); ?>auto_replay_broadcast_disabled/proses_auto_replay');
                  }, 1000);
                  });
                  </script>
            <!-- Akhiri content dan terima perubahan data langsung dari database-->
                <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            </section>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/core.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/prettify/js/prettify.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/components/typography.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/tables/default.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables/tabletools/js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables/js/datatables-bs3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/tables/datatable.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/selectize/js/selectize.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.categories.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.time.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.tooltip.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flot/js/jquery.flot.spline.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/tables/default.js"></script>
        <script src="<?php echo base_url();?>assets/theme/js/highcharts.js"></script>
        <script src="<?php echo base_url();?>assets/theme/js/exporting.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/prettify/js/prettify.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/components/typography.js"></script>
    </body>
</html>