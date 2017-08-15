<!DOCTYPE html>
  <html lang="en">
   <head>        
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
          <meta name="author" content="Andre Marbun (tulisan-digital.com)"> 
          <meta http-equiv="Content-Type" content="text/html; charset=iso-6659-1" /> <script type="text/javascript" src="<?php echo base_url();?>assets/source/javascript/jquery.js"></script>
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
<body>

 <script type='text/javascript'>
    function save_form_pilkada()
    {
        send_form(document.formpilkada,"ajax/multiple","#content");
    }
    function edit(id)
    {
        $('input[name=TANGGAL]').val($('#TANGGAL'+id).val());
        $('input[name=KETERANGAN]').val($('#KETERANGAN'+id).val());
        $('input[name=SOLUSI]').val($('#SOLUSI'+id).val());
        $('input[name=NO_PERTANYAAN]').val(id);
    }
    $(document).ready(function() {

        $(".delbutton").click(function(){
         var element = $(this);
         var del_id = element.attr("id");
         var info = 'id=' + del_id;
         if(confirm("Anda yakin akan menghapus?"))
         {
             $.ajax({
             type: "POST",
             url : "<?php echo site_url('ajax/hapus')?>",
             data: info,
             success: function(){
             }
             });    
         $(this).parents(".content").animate({ opacity: "hide" }, "slow");
            }
         return false;
         });
    })
</script><div class="row">
 <?= $this->widget_wilayah->begin_wiget(array('prop' => 'NO_PROP', 'kab' => 'NO_KAB'), site_url('Pdak_source')) ?> 
  <form name='formpilkada' action='' method='post' class="form-horizontal">
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
                                  <span class="col-sm-8"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
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
           
                          <button type="button" class='btn btn-default' id="valid" name="valid" href='javascript:void(0)' onclick='save_form_pilkada()'>Simpan</button>
<!--                          <a class='btn btn-primary' href='javascript:void(0)' onclick='document.formpilkada.reset()'>Reset</a>
 -->                        </div>
                       </div>
                    </div>
                  </form>
                 </div>
                </div></div>
         
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Wizards <small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <!-- Smart Wizard -->
                                    <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                            <li>
                                                <a href="#step-1">
                                                    <span class="step_no">1</span>
                                                    <span class="step_descr">
                                            Step 1<br />
                                            <small>Step 1 description</small>
                                        </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2">
                                                    <span class="step_no">2</span>
                                                    <span class="step_descr">
                                            Step 2<br />
                                            <small>Step 2 description</small>
                                        </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-3">
                                                    <span class="step_no">3</span>
                                                    <span class="step_descr">
                                            Step 3<br />
                                            <small>Step 3 description</small>
                                        </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-4">
                                                    <span class="step_no">4</span>
                                                    <span class="step_descr">
                                            Step 4<br />
                                            <small>Step 4 description</small>
                                        </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div id="step-1">
                                            <form class="form-horizontal form-label-left">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                                            </label>
                                                            <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="female" checked=""> Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                        <div id="step-2">
                                            <h2 class="StepTitle">Step 2 Content</h2>
                                            <p>
                                                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>
                                        <div id="step-3">
                                            <h2 class="StepTitle">Step 3 Content</h2>
                                            <p>
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>
                                        <div id="step-4">
                                            <h2 class="StepTitle">Step 4 Content</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>

                                    </div>
                                    <!-- End SmartWizard Content -->





                                    <h2>Example: Vertical Style</h2>
                                    <!-- Tabs -->
                                    <div id="wizard_verticle" class="form_wizard wizard_verticle">
                                        <ul class="list-unstyled wizard_steps">
                                            <li>
                                                <a href="#step-11">
                                                    <span class="step_no">1</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-22">
                                                    <span class="step_no">2</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-33">
                                                    <span class="step_no">3</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-44">
                                                    <span class="step_no">4</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div id="step-11">
                                            <h2 class="StepTitle">Step 1 Content</h2>
                                            <form class="form-horizontal form-label-left">

                                                <span class="section">Personal Info</span>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">First Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="last-name">Last Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input type="text" id="last-name2" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3">Middle Name / Initial</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input id="middle-name2" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3">Gender</label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div id="gender2" class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                                            </label>
                                                            <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="female" checked=""> Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3">Date Of Birth <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input id="birthday2" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div id="step-22">
                                            <h2 class="StepTitle">Step 2 Content</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>
                                        <div id="step-33">
                                            <h2 class="StepTitle">Step 3 Content</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>
                                        <div id="step-44">
                                            <h2 class="StepTitle">Step 4 Content</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- End SmartWizard Content -->


                                </div>
                            </div>
                      
   <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- chart js -->
    <!-- bootstrap progress js -->
    <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <!-- form wizard -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wizard/jquery.smartWizard.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Smart Wizard   
            $('#wizard').smartWizard();

            function onFinishCallback() {
                $('#wizard').smartWizard('showMessage', 'Finish Clicked');
                //alert('Finish Clicked');
            }
        });

        $(document).ready(function () {
            // Smart Wizard 
            $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
            });

        });
    </script>

</body>

</html>