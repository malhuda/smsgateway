 <!DOCTYPE html>
  <html lang="en">
   <head>        
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
          <meta name="author" content="Andre Marbun (tulisan-digital.com)"> 
          <meta http-equiv="Content-Type" content="text/html; charset=iso-6659-1" /> 
          <link rel='stylesheet' href='//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css'>
            <script src='//code.jquery.com/jquery-1.10.2.js'></script>
              <script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
               <link href="<?php echo base_url(); ?>assets/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
                 <script src="<?php echo base_url(); ?>assets/opensource/js/jquery.min.js"></script>
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/opensource/js/Zebra/public/css/zebra_dialog.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/opensource/js/Zebra/public/css/style.css" type="text/css" />
               <link rel="stylesheet" href="<?php echo base_url(); ?>assets/opensource/js/Zebra/libraries/highlight/public/css/ir_black.css" type="text/css" />
               <script type="text/javascript" src="<?php echo base_url(); ?>assets/opensource/js/Zebra/public/javascript/jquery-1.9.1.js"></script>
              <script type="text/javascript" src="<?php echo base_url(); ?>assets/opensource/js/Zebra/libraries/highlight/public/javascript/highlight.js"></script>
             <script type="text/javascript" src="<?php echo base_url(); ?>assets/opensource/js/Zebra/public/javascript/zebra_dialog.js"></script>
             <script type="text/javascript" src="<?php echo base_url(); ?>assets/opensource/js/Zebra/public/javascript/core.js"></script>
           <script src="<?= base_url() ?>assets/opensource/js/jquery.chainedselects.js"></script>
          <script src="<?= base_url() ?>assets/opensource/js/update_tgl.js"></script>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/tcal.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tcal.js"></script> 
         <script type="text/javascript">
            //hljs.initHighlightingOnLoad();
            $(document).ready(function() {
                $('.keluargaShow').bind('click', function(e) {
                    e.preventdefault();
                    $.Zebra_Dialog('', {
                        source: {'iframe': {
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'user/user_pilkada_update') ?>' + '/' + $(this).attr("id"),
                                'height': 650,
                                'type': 'question'
                            }},
                        width: 1050,
                        title: 'info Keluarga'
                    });
                });
                $('.biodataShow').bind('click', function(e) {
                    e.preventdefault();
                    $.Zebra_Dialog('', {
                        source: {'iframe': {
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'user/user_pilkada_update') ?>' + '/' + $(this).attr("id"),
                                'height': 550,
                                'type': 'question'
                            }},
                        width: 1000,
                        title: 'info Biodata'
                    });
                });
                $('.menu_button').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'user/user_pilkada_update') ?>";
                });
                $('.menu_button6').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'user/user_pilkada_update') ?>";
                });
                $("#frmDaftar").submit(function() {
                    var allMessage = "";
                    var msgDetail = "";
                    var allIndicator = new Array();
                   

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
     
        <meta http-equiv="Content-Type" content="text/html; charset=iso-6659-1" />
     </head>
      <body> 
      <div class="row"></div><?php echo $this->session->flashdata('message'); ?>
        <div class="panel panel-default" id="toolbar-showcase">
                            <!-- panel heading/header -->
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-users"></i></span>Update User
                                    <p class="pull-right"> 
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal" ></i>
                                                <font size="2">
                                                    <strong>TAMBAH USER</strong>
                                                        </font>
                                                            &nbsp;
                                                                &nbsp;
                                                                    <i class="halflings-icon white plus-sign"></i>
                                                                </button>
                                                            </p>
                                                        </br>
                                                    </br>
                                                </br></h3>
                                <!-- panel toolbar -->
                               
                                <!--/ panel toolbar -->
                            </div>
                                         
          <?php foreach($single_user as $user) ?> 
           <?= $this->widget_wilayah->begin_wiget(array('prop' => 'NO_PROP', 'kab' => 'NO_KAB'), site_url('Pdak_source')) ?> 
           <form action="<?php echo site_url('user/user_pilkada_update');?>/<?php echo $user->USERNAME; ?>" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data">
           <?php foreach ($single_user as $user){ ?> 
           </br></br></br>

           <div class="form-group">
           <label class="control-label col-md-3" for="selectError">Level Login</label>
           <span class="required"><?php echo form_error('LEVEL_LOGIN'); ?></span>
           <div class="col-md-9">
            <?php
                  if ($user->LEVEL_LOGIN  == 1) 
                     {
                        echo '<div class="col-md-6"><select id="selectError" data-rel="chosen" name="LEVEL_LOGIN" class="form-control"><option value="1">ADMINISTRATOR</option>"><option value="2">OPERATOR KABUPATEN/KOTA</option></select></div>';
                            } 
                              elseif 
                                  ($user->LEVEL_LOGIN == 2)
                                    {
                                 echo '<div class="col-md-6"><select id="selectError" data-rel="chosen" name="LEVEL_LOGIN" class="form-control"><option value="2">OPERATOR KABUPATEN/KOTA</option><option value="1">ADMINISTRATOR</option>"></select></div>';
                               }   
                            ?>
                          </div>
                   </div>
                </br></br></br>
           
               <div class="form-group">
                  <label class="control-label col-md-3">Nama Lengkap</label><span class="required"><?php echo form_error('NAMA'); ?></span>
                  <div class="col-md-9">
                  <div class="col-md-6"><input id="NAMA" type="text" name="NAMA"  placeholder="Nama Lengkap"  class="form-control"  value="<?php echo $user->NAMA; ?>" required="required">
                  </div></div>
             </div>
              </br></br></br>
             <div class="form-group">
                  <label class="control-label col-md-3">Status</label><span class="required"><?php echo form_error('NAMA'); ?></span>
                  <div class="col-md-9">
                  <?php if($user->STATUS == 0){
                     echo '<div class="col-md-6"><select name="STATUS" class="form-control"><option value="0">TIDAK AKTIF</option><option value="1">AKTIF</option></select></div>';
                 }elseif($user->STATUS == 1){
                     echo '<div class="col-md-6"><select name="STATUS" class="form-control"><option value="1">AKTIF</option><option value="0">TIDAK AKTIF</option></select></div>';
                     } ?></select></div>
             </div></br></br></br>
            <div class="drop-down-show-hide" id="2">
             <div class="form-group">
              <label class="control-label col-md-3" for="2">Provinsi</label>
              <div class="col-md-9"><div class="col-md-6">
               <?= $this->widget_wilayah->get_propinsi(array('name' => 'NO_PROP', 'data_awal' => array('NO_PROP' => $user->NO_PROP, 'NO_KAB' => $user->NO_KAB), 'param' => '')) ?><?php echo form_error('NO_PROP'); ?>
              </div></div>
            </div></br></br></br>
            <div class="form-group">
              <label class="control-label col-md-3" for="2">Kabupaten</label>
              <div class="col-md-9">
               <div class="col-md-6"><?= $this->widget_wilayah->get_kabupaten(array('name' => 'NO_KAB',  'data_awal' => array('NO_PROP' => $user->NO_PROP, 'NO_KAB' => $user->NO_KAB), 'param' => '')) ?> <?php echo form_error('NO_KAB'); ?>
              </div>
            </div>
            </div>
             </div> </br></br></br>
             <div class="form-group" id="myDiv">
              <label class="control-label col-md-3" for="2">Foto</label>
              <div class="col-md-9">
               <div class="col-md-6">
              <input type="file" name="FOTO"></br></br></br><?php echo $user->FOTO;?><img src="<?php echo base_url(); ?>assets/foto/<?php echo $user->FOTO;?>" width="76" height="92" onError="this.onerror=null;this.src='<?php echo base_url(); ?>assets/foto/no-photo.jpg' ;" width="76" height="92"/>
              </div>
              </div>
            </div>         
          </div></br></br></br>
         <div class="col-md-7">
            <p align="right"><input type="submit" class='btn btn-default' value='Simpan'>
               <input id="info" class='btn btn-default' type="button" value="Upload Foto">
      </p>
        </div>
         </form><?php } ?>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
 </div>
              </div>
                 <script type="text/javascript">    
                           $('.drop-down-show-hide').hide();
                              $('#selectError, #1').change(function(){
                                   $(this).find('option').each(function(){
                                     $('#'+$(this).val()).hide();
                                     }
                                   );
                                  $('#' + this.value).show();
                                 }
                             )
                          ;
                       </script>
                 <script>
                    var button = document.getElementById("info");
                    var myDiv = document.getElementById("myDiv");
                   function show() {
                    myDiv.style.visibility = "visible";
                   }
                     function hide() {
                     myDiv.style.visibility = "hidden";
                     }
                     function toggle() {
                    if (myDiv.style.visibility === "hidden") {
                        show();
                    } else {
                        hide();
                        }
                         }
                         hide();
                      button.addEventListener("click", toggle, false);
                </script>


                 <!--<script>
$(document).ready(function(){
    $("a").click(function(){
        $.get("<?php echo base_url("user/show_list/".$get_by_ajax); ?>", function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});
</script>-->