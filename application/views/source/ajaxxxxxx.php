<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>     
<!--     <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
 -->    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
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
    <div id="form" class="result">
    <form method="post" id="reg-form">
     <script type="text/javascript" language="javascript">
     $(document).ready(function()
{
    //using $.ajax() function
    $(document).on('submit', '#reg-form', function()
    {
        if($.trim($('#201401').val()) == ''){
            alert('Please select periode..');
            $('#201401').focus()
            return false;
        }
 
        var data = $(this).serialize();
        $.ajax({
            type : 'POST',
                    url: "<?php echo site_url();  ?>load_ajax/get_limabelaskosongsatu",
            data : data,
            success :  function(data)
            { 
                $("#reg-form").fadeOut(500).hide(function()
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
                      <select name="PERIODE" class="form-control">
                      
                       <?php foreach($periode as $periode){ ?> 
                    <option value="<?php echo $periode["PERIODE"]; ?>"><?php echo $periode["PERIODE"]; ?></option>
                    <?php }?>
                    </select>

                      </div>
                  </div>
            </div>
       <div class="col-md-1">
        <div class="form-group">
                <div class="col-md-6">
                <button type="submit">Submit</button>
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
        </form>
      </body>
</html>