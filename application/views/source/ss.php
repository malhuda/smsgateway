<!DOCTYPE html>
  <html lang="en">
   <head>        
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
          <meta name="author" content="Andre Marbun (tulisan-digital.com)"> 
          <meta http-equiv="Content-Type" content="text/html; charset=iso-6659-1" /> 

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
</script><script>
    function showMe (box) {
        var chboxs = document.getElementsByClassName("tableflat");
        var vis = "none";
        for(var i=0;i<chboxs.length;i++) { 
            if(chboxs[i].checked){
             vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;
        }
</script>     <style type="text/css">
body {
  margin-top:1px;
}
.stepwizard-step p {
  margin-top: 10px;
}
.stepwizard-row {
  display: table-row;
}
.stepwizard {
  display: table;
  width: 50%;
  position: relative;
}
.stepwizard-step button[disabled] {
  opacity: 1 !important;
  filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
  top: 14px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 100%;
  height: 1px;
  background-color: #ccc;
  z-order: 0;
}
.stepwizard-step {
  display: table-cell;
  text-align: center;
  position: relative;
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style> <div class="row">
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
                                   <table  id="example" class="table table-striped responsive-utilities jambo_table">
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
   foreach($checkbox as $param_checkbox){ 
      $param_checkbox['NO_PERTANYAAN'] =$param_checkbox['NO_PERTANYAAN'];
        $PARAM_CHECKBOXNYA =$param_checkbox['NO_PERTANYAAN']+1;
         echo "<script type='text/javascript'>
         function CENTANG_PILIHAN_PILKADA(NILAI_CHECKBOXNYA) {
          var GET_LOOPING_CHECKBOXNYA= 0;
          for(var PARAM_CHECKBOX_PERTAMA=0; 
          PARAM_CHECKBOX_PERTAMA < document.formpilkada.NO_PERTANYAAN.length; 
          PARAM_CHECKBOX_PERTAMA++){
          if(document.formpilkada.NO_PERTANYAAN[PARAM_CHECKBOX_PERTAMA].checked){
          GET_LOOPING_CHECKBOXNYA = GET_LOOPING_CHECKBOXNYA+1;}
          if(NILAI_CHECKBOXNYA > $param_checkbox[NO_PERTANYAAN]+1){
          alert('Anda Harus Mengisi Pilihan Yang Ke .$PARAM_CHECKBOXNYA Terlebih Dahulu !') 
          document.formpilkada.NO_PERTANYAAN[NILAI_CHECKBOXNYA].checked = false ;
          return true;
          }


          $('#NO_PERTANYAAN' ).blur(function() {
  alert( 'Handler for ' );
});
        }
      } 
  </script>"; 
?>


                      <?php 
                           }
                            ?>
                              <?php
                         foreach ($biodata as $data) {
                         ?> 
                        
                       <?php    
                          if ($show == 1) {
                             if (count($data["STATUS"]) == 1) {
                                if($data["STATUS"] == 0){
                          ?>

      <script type="text/javascript">
  checkDisplay("NO_PERTANYAAN", "form");
  </script><script type="text/javascript">
    var checkDisplay = function(NO_PERTANYAAN, form) { //check ID, form ID
      form = document.getElementById(form), NO_PERTANYAAN = document.getElementById(NO_PERTANYAAN);
      NO_PERTANYAAN.onclick = function(){
        form.style.display = (this.checked) ? "block" : "none";
        form.reset();
      };
      NO_PERTANYAAN.onclick();
    };
  </script>
                                   <td class="a-center ">
                                     <div class="checkbox">
                                         <label title="item1">
<!--   <input type="checkbox" class="tableflat" class="NO_PERTANYAAN" name="NO_PERTANYAAN[]" value="<?php echo $data["NO_PERTANYAAN"]; ?>" onclick="showMe('NO_PERTANYAAN')" >
 -->
                <input type="checkbox" id="NO_PERTANYAAN" class="tableflat" name="NO_PERTANYAAN[]" value=<?php echo $data["NO_PERTANYAAN"]; ?> onclick='CENTANG_PILIHAN_PILKADA(<?php echo $data["NO_PERTANYAAN"]; ?>)';><img/>
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
                                        <input type="checkbox" checked="checked" name="NO_PERTANYAAN" value=<?php echo $data["NO_PERTANYAAN"]; ?> onclick='showMe(<?php echo $data["NO_PERTANYAAN"]; ?>)'; disabled readonly>
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



                          <div class="col-md-6 col-sm-12 col-xs-12" id="form">
                               
                                <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Verifikasi Data Pemilih</h2>
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
                        <input type="text" name="TANGGAL" class="form-control tcal" placeholder="DD/MM/YYYY" aria-describedby="inputSuccess2Status" name="TANGGAL"  value="<?php echo set_value('TANGGAL'); ?>">
                             </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                          <label class="col-sm-3" for="name">Permasalahan </label>
                         <div class="col-sm-9"> <span class="required"><?php echo form_error('PERMASALAHAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                           <textarea class="form-control" rows="4" name="PERMASALAHAN" value="<?php echo set_value('PERMASALAHAN'); ?>" required="required"></textarea>
                             </div></div> 
                              <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                              <label class="col-sm-3" for="name">Solusi </label>
                               <div class="col-sm-9"> <span class="required"><?php echo form_error('SOLUSI'); ?></span>
                              <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                              <textarea class="form-control" rows="4" name="SOLUSI" value="<?php echo set_value('SOLUSI'); ?>" required="required"></textarea>
                           </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                             <label class="col-sm-3" for="name">Keterangan </label>
                              <div class="col-sm-9"> <span class="required"><?php echo form_error('KETERANGAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                         <textarea class="form-control" rows="4" name="KETERANGAN" value="<?php echo set_value('KETERANGAN'); ?>" required="required"></textarea>
                        </div></div>
                          <div class="line line-dashed b-b line-lg pull-in"></div>
                           <div class="form-group">
                           <div class="col-sm-6 col-sm-offset-6">
                               <div class='paging'>   
                                                            
                                                                <select name="action" class="hidden">
                                                                      <option value="insert">SIMPAN</option>
                                                                </select> 
           
                          <button type="button" class='btn btn-default' href='javascript:void(0)' onclick='save_form_pilkada()'>Simpan</button>
<!--                          <a class='btn btn-primary' href='javascript:void(0)' onclick='document.formpilkada.reset()'>Reset</a>
 -->                        </div>
                         </div>
                      </div>
                  </form>
                 </div>
                </div>
<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
      allWells = $('.setup-content'),
      allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
        $item = $(this);

    if (!$item.hasClass('disabled')) {
      navListItems.removeClass('btn-primary').addClass('btn-default');
      $item.addClass('btn-primary');
      allWells.hide();
      $target.show();
      $target.find('input:eq(0)').focus();
    }
  });

  allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
      isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
      if (!curInputs[i].validity.valid){
        isValid = false;
        $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
    }

    if (isValid)
      nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
  </script>

   
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