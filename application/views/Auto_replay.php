<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/selectize/css/selectize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/flot/css/flot.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/uielement.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheet/themes/theme1.css">  
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/modernizr/js/modernizr.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>media/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>media/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/foto/icon-kemendagri.png">
    <script src="<?php echo base_url(); ?>media/assets/js/jquery.2.1.1.min.js"></script>
    <script>
$(document).ready(function() {
$("#responsecontainer").load("<?php echo base_url(); ?>auto_replay/proses_auto_replay");
var refreshId = setInterval(function()
{
$("#responsecontainer").load('<?php echo base_url(); ?>auto_replay/proses_auto_replay');
}, 1000);
});
</script>
      <link href="<?php echo base_url(); ?>media/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>media/assets/css/style-responsive.css" rel="stylesheet">
    <style>
.loader {
  margin: 60px auto;
  font-size: 10px;
  position: relative;
  text-indent: -9999em;
  border-top: 1.1em solid rgba(255, 255, 255, 0.2);
  border-right: 1.1em solid rgba(255, 255, 255, 0.2);
  border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
  border-left: 1.1em solid #ff865c;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
.loader,
.loader:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

</style>
  </head>
  <body>
       
        <div class="container">
        <div class="loader"></div>
        <div id="responsecontainer"></div>
        <center><button class="btn btn-inverse"><font color="white" size="3"><strong>
          Auto Replay Is Running.<img src="<?php echo base_url(); ?>assets/loader/loading.gif">
         </font></strong></button></center>
        </div>
            <script src="<?php echo base_url(); ?>media/assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>media/assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url(); ?>assets/foto/transparant_auto_replay.jpg", {speed: 500});
    </script>
  </body>
</html>
