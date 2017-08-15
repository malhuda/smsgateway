<script type="text/javascript" src="<?php echo base_url();?>assets/source/javascript/jquery.js"></script>
                <script type="text/javascript" src="<?php echo base_url();?>assets/source/javascript/app.js" ></script>
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
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'ajax/simpan') ?>' + '/' + $(this).attr("id"),
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
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'ajax/simpan') ?>' + '/' + $(this).attr("id"),
                                'height': 550,
                                'type': 'question'
                            }},
                        width: 1000,
                        title: 'info Biodata'
                    });
                });
                $('.menu_button').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'ajax/simpan') ?>";
                });
                $('.menu_button6').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'ajax/simpan') ?>";
                });
                $("#frmDaftar").submit(function() {
                    var allMessage = "";
                    var msgDetail = "";
                    var allIndicator = new Array();
                    if ($("#NO_KAB").val() == "0") {
                        if (document.getElementById("NO_KAB").value == "0") {
                            msgDetail = msgDetail + "LEVEL KABUPATEN\n";
                            //siakHighlight(document.getElementById("NO_PROP"),"inputError");   
                        } else {
                            //siakHighlight(document.getElementById("NO_PROP"),"");
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
       <script>
    function showMe (box) {
        var chboxs = document.getElementsByName("NO_PERTANYAAN[]");
        var vis = "none";
        for(var i=0;i<chboxs.length;i++) { 
            if(chboxs[i].checked){
             vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;
        }
</script>

<style type="text/css">div.checkbox > label > input {
    visibility: hidden;
}

div.checkbox > label {
    display: block;
    margin: 0 0 0 -5px;
    padding: 0 0 20px 0;  
    height: 20px;
    width: 70px;
    
}

div.checkbox > label > img {
    display: inline-block;
    padding: 0px;
    height:15px;
    width:30px;
    background: none;
}

div.checkbox > label > input:checked +img {  
    background: url(http://cdn1.iconfinder.com/data/icons/onebit/PNG/onebit_34.png);
    background-repeat: no-repeat;
    background-position:center center;
    background-size:10px 10px;
}

</style>

<style type="text/css">div.disabled > label > input {
    visibility: hidden;
}

div.disabled > label {
    display: block;
    margin: 0 0 0 -22px;
    padding: 0 0 20px 0;  
    height: 20px;
    width: 70px;
    
}

div.disabled > label > img {
    display: inline;
    padding: 0px;
    height:15px;
    width:30px;
    background: none;
}

div.disabled > label > input:checked +img {  
    background: url(http://cdn1.iconfinder.com/data/icons/onebit/PNG/onebit_36.png);
    background-repeat: no-repeat;
    background-position:center center;
    background-size:10px 10px;
}

</style>
  </head>
<body><script> 
$(document).on("submit", "form", function(event)
{
    event.preventDefault();

    var url=$(this).attr("action");
    $.ajax({
        url: url,
        type: 'POST',            
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {

        }
    });
});
</script> 

 <?= $this->widget_wilayah->begin_wiget(array('prop' => 'NO_PROP', 'kab' => 'NO_KAB'), site_url('Pdak_source')) ?> 
<form name="form" id="form" action="<?php echo base_url(); ?>ajax/multiple" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data" class="form-horizontal">
    <?php echo $this->session->flashdata('message'); ?>
   <div class="clearfix"></div> <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Pilihan Verifikasi Data Pemilih Nasional </h2>
                                       
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                            <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Pilihan
                                                </th>
                                                <th>Daftar Verifikasi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="even pointer">
                                                                    <?php
                                                                      foreach ($biodata as $data) {
                                                                    ?> <?php    
                                          if ($show == 1) {
                                              if (count($data["STATUS"]) == 1) {
                                          if($data["STATUS"] == 0){
                                         ?> 
                                                <td class="a-center ">
                                                    <div class="checkbox">
                                                    <label title="item1">
                                                    <input type="checkbox" class="tableflat" id="NO_PERTANYAAN" class="NO_PERTANYAAN" name="NO_PERTANYAAN[]" value="<?php echo $data["NO_PERTANYAAN"]; ?>">
                                                
                                                 
                                                <img/>
                                  </label>
                                  </div></td><td class="a-center "><?php echo $data["ISI_PERTANYAAN"]; ?></td>
                                                <?php
                                              } 
                                              else
                                            { 
                                          ?>
                                            <?php 
                                               } 
                                                }
                                              ?>
                                                <?php  if (count($data["STATUS"]) ==  1) {
                                                     if($data["STATUS"] != 0){
                                                    ?> <td class="a-center "><div class="disabled">
                                          <label title="item1">
                                                    <style>
                                            input[type="checkbox"] {
                                            -webkit-appearance: checkbox; 
                                            -moz-appearance: checkbox;    
                                            -ms-appearance: checkbox;     
                                        }
                                        </style>
                                        <input type="checkbox" checked="checked" disabled readonly>
                                              <img/>
                                  </label>
                                  </div></td> <td class="a-center "><?php echo $data["ISI_PERTANYAAN"]; ?></td> <?php }}} ?>
                                            </tr>
                                         <?php 
                                            } ?>
                                        </tbody>
                                    </table>
                                        <div class="">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                   
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>PENYUSUNAN DATA PEMILIH BERDASARKAN HASIL SINGKRONISASI DP4</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                            
                          <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                            <label class="col-sm-3" for="name">Provinsi</label>
                               <div class="col-sm-6">  <span class="col-sm-12"><?= $this->widget_wilayah->get_propinsi(array('name' => 'NO_PROP', 'data_awal' => array('NO_PROP' => $NO_PROP, 'NO_KAB' => $NO_KAB), 'param' => '')) ?>
                                 </div></div></span>
                                 <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                                <label class="col-sm-3" for="name">Kabupaten </label>
                              <div class="col-sm-6">  <span class="col-sm-12"><?= $this->widget_wilayah->get_kabupaten(array('name' => 'NO_KAB', 'data_awal' => array('NO_PROP' => $NO_PROP, 'NO_KAB' => $NO_KAB), 'param' => '')) ?>
                               </div>
                               </div></span>
                                <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                                   <label class="col-sm-3" for="name">Tanggal </label>
                                  <div class="col-sm-9"> <span class="required"><?php echo form_error('TANGGAL'); ?></span>
                                  <span class="col-sm-4"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                                <input type="text" name="TANGGAL" class="form-control tcal" placeholder="DD/MM/YYYY" aria-describedby="inputSuccess2Status" value="<?php echo set_value('TANGGAL'); ?>" required="required">
                             </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                          <label class="col-sm-3" for="name">Permasalahan </label>
                         <div class="col-sm-9"> <span class="required"><?php echo form_error('PERMASALAHAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                           <textarea class="form-control" rows="6" name="PERMASALAHAN" value="<?php echo set_value('PERMASALAHAN'); ?>" required="required"></textarea>
                             </div></div> 
                              <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                              <label class="col-sm-3" for="name">Solusi </label>
                               <div class="col-sm-9"> <span class="required"><?php echo form_error('SOLUSI'); ?></span>
                              <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                              <textarea class="form-control" rows="6" name="SOLUSI" value="<?php echo set_value('SOLUSI'); ?>" required="required"></textarea>
                           </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                             <label class="col-sm-3" for="name">Keterangan </label>
                              <div class="col-sm-9"> <span class="required"><?php echo form_error('KETERANGAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                         <textarea class="form-control" rows="6" name="KETERANGAN" value="<?php echo set_value('KETERANGAN'); ?>" required="required"></textarea>
                        </div></div>
                          <div class="line line-dashed b-b line-lg pull-in"></div>
                           <div class="form-group">
                           <div class="col-sm-6 col-sm-offset-6">
                               <div class='paging'>   <script>
                                                         jQuery(function ($) {
                                                             var $checks = $('input[name="NO_PERTANYAAN[]"]');
                                                             $("#valid").click(function () {
                                                                 if ($checks.filter(':checked').length == 0) {
                                                                     alert('DATA VERIFIKASI BELUM DIPILIH !');
                                                                     return false;
                                                                 }  else {
                                                                     return ('APAKAH PILIHAN VERIFIKASI SUDAH BENAR ?');
                                                                 }
                                                             });
                                                           }); 
                                                          </script> 
                                                                <select name="action" class="hidden">
                                                                      <option value="insert">SIMPAN</option>
                                                                </select> 
           
                         <input type="submit" id="valid" name="valid" class='btn btn-primary' value="SIMPAN">
<!--                          <a class='btn btn-primary' href='javascript:void(0)' onclick='document.formpilkada.reset()'>Reset</a>
 -->                        </div>
                       </div>
                    </div>
                  </form>