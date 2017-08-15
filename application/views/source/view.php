<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>     
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
        <script src="<?= base_url() ?>assets/js/jquery.chainedselects.js"></script>
        <script src="<?= base_url() ?>assets/js/update_tgl.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.keluargaShow').bind('click', function(e) {
                    e.preventdefault();
                    $.Zebra_Dialog('', {
                        source: {'iframe': {
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'load_ajax/get_limabelaskosongsatu') ?>' + '/' + $(this).attr("id"),
                                'height': 350,
                                'type': 'question'
                            }},
                        width: 1050,
                        title: 'default Keluarga'
                    });
                });
                $('.biodataShow').bind('click', function(e) {
                    e.preventdefault();
                    $.Zebra_Dialog('', {
                        source: {'iframe': {
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'load_ajax/get_limabelaskosongsatu') ?>' + '/' + $(this).attr("id"),
                                'height': 550,
                                'type': 'question'
                            }},
                        width: 1000,
                        title: 'default Biodata'
                    });
                });
                $('.menu_button').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'load_ajax/get_limabelaskosongsatu') ?>";
                });
                $('.menu_button4').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'load_ajax/get_limabelaskosongsatu') ?>";
                });
                $("#frmDaftar").submit(function() {
                    var allMessage = "";
                    var msgDetail = "";
                    var allIndicator = new Array();
                    if ($("#NO_PROP").val() == "0") {
                        if (document.getElementById("NO_PROP").value == "0") {
                            msgDetail = msgDetail + "LEVEL PROVINSI\n";
                        } else {
                        }
                    }
                    if (msgDetail != "") {
                        msgDetail = "\tSilahkan Pilih\n" + msgDetail;
                        alert(msgDetail);
                        return false;
                    }

                    var valid = true;
                    if ($("#page").val() != undefined) {
                        valid = valid_paging();
                    }
                    if (valid)
                        return true;
                    else
                        alert("Halaman yang dimasukkan diluar dari jumlah halaman");
                    return false;
                });
                $("#kword").focus(function() {
                    if ($(this).val() == "*") {
                        $(this).val("");
                    }
                });
                $("#kword").blur(function() {
                    if ($(this).val() == "") {
                        $(this).val("*");
                    }
                });
            });
        </script> 
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     </head>
  <body>
<div id="main-container">
  <div id="frmDaftar">
    <form method="post" id="frmDaftar">
               <script type="text/javascript" language="javascript">
               $(document).ready(function()
          {
              //using $.ajax() function
              $(document).on('submit', '#frmDaftar', function()
              {
                 
                  var data = $(this).serialize();
                  $.ajax({
                      type : 'POST',
                              url: "<?php echo site_url();  ?>load_ajax/get_limabelaskosongsatu",
                      data : data,
                      success :  function(data)
                      { 
                          $("#frmDaftar").fadeOut(500).show(function()
                          {
                              $(".result").fadeIn(500).show(function()
                              {
                                  $(".result").html(data);
                              });
                          });
                      }
                  });
                  return false;
              });
          });
            </script>
                <script>
              $(function(){
            $('.disableButton').on('keyup change', function(){
                if ($('#PERIODE').val() == '') {
                        $('#button').prop('disabled', true);
                } else {
                        $('#button').prop('disabled', false);
                }
            });
           });
        </script>
      <?= $this->widget_wilayah->begin_wiget(array('prop' => 'NO_PROP', 'kab' => 'NO_KAB'), site_url('Pdak_source')) ?>
                        <div class="row"></div>
                      <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> FORM DATA ANOMALI</h3>
                                <div class="panel-toolbar text-right">
                                </div>
                            </div>
                             <div class="panel-body">
                            <div class="table-responsive">
                            <div class="portlet-title">
                               </div>
                                 <div class="portlet-body form">
                                 <div class="form-body">
                                   <div class="col-md-12">          
                                      <div class="col-md-6"></br>
                                    <div class="form-group">
                                <label class="control-label col-md-4">
                               PROVINSI
                  <span class="requidefault">*</span>
            </label>
      <div class="col-md-8">
  <?= $this->widget_wilayah->get_propinsi(array('name' => 'tabel[NO_PROP]', 'data_awal' => array('NO_PROP' => $NO_PROP, 'NO_KAB' => $NO_KAB), 'param' => '')) ?></div>
        </div>
            </div>
                </br>
                <div class="col-md-6">
                <div class="form-group">
            <label class="control-label col-md-4">KABUPATEN/KOTA</label>
      <div class="col-md-8">                             
  <?= $this->widget_wilayah->get_kabupaten(array('name' => 'tabel[NO_KAB]', 'data_awal' => array('NO_PROP' => $NO_PROP, 'NO_KAB' => $NO_KAB), 'param' => '')) ?>
      </div>
        </div>
           </div>
             </br>
              </br> 
               </br>
              <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-4" for="PERIODE" >PERIODE</label>
                    <div class="col-md-8">
                      <select name="PERIODE" class="form-control disableButton" id="PERIODE" onChange="this.form.action=this.options[this.selectedIndex].value;">
                      <option value="">--Pilih Periode--</option>
                      <option value="<?php echo site_url("load_ajax/index");  ?>"><?php foreach($periode_pertama as $periode_pertama){ ?><?php echo $periode_pertama["PERIODE"]; ?> <?php } ?></option>
                      <option value="<?php echo base_url("load_ajax/empatbelaskosongdua"); ?>"><?php foreach($periode_kedua as $periode_kedua){ ?> <?php echo $periode_kedua["PERIODE"]; ?> <?php } ?></option>
                      <option value="<?php echo base_url("load_ajax/get_limabelaskosongsatu"); ?>"><?php foreach($periode_ketiga as $periode_ketiga){ ?><?php echo $periode_ketiga["PERIODE"]; ?> <?php } ?></option>
                      </select>
                      </div>
                  </div>
            </div>
       <div class="col-md-1">
        <div class="form-group">
                <div class="col-md-6">
                  <button id="button" type="submit" disabled="disabled" class="btn btn-sm btn-default" class="formobj11" onClick="return performSubmit();"/>
                    <strong>Load Data</strong> <i class='icon ico-search'></i></button>
              </div>
       </div>
   </div>
     </div>
          </div>
              </div>
            </div>
            <div class="panel-footer" >
          </div>
          </div>
       </div> 
       <div class="result">
      