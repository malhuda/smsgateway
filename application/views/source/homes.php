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
     


  </head>
<body>
 <div id="response"><div><form id="formpilkada" name='formpilkada' class="form-horizontal"> 
<script>
    (function($){
        function processForm( e ){
            $.ajax({
                url: '<?php echo site_url();  ?>home/multiple',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    $('#response div').html( data );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            e.preventDefault();
        }

        $('#formpilkada').submit( processForm );
    })(jQuery);
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
<script>
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
</script>    
 <style type="text/css">
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
</style><?php 
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
                           <script>
jQuery(document).ready(function($) {
    var intputElements = document.getElementsByTagName("textarea");
    for (var i = 0; i < intputElements.length; i++) {
        intputElements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                if (e.target.name == "TANGGAL") {
                    e.target.setCustomValidity("Harus Diisi");
                } else {
                    e.target.setCustomValidity("Harus Diisi");
                }
            }
        }
    }
});
</script>

<script>
jQuery(document).ready(function($) {
    var intputElements = document.getElementsByTagName("input");
    for (var i = 0; i < intputElements.length; i++) {
        intputElements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                if (e.target.name == "TANGGAL") {
                    e.target.setCustomValidity("Harus Diisi");
                } else {
                    e.target.setCustomValidity("Harus Diisi");
                }
            }
        }
    }
});
</script>
 <?= $this->widget_wilayah->begin_wiget(array('prop' => 'NO_PROP', 'kab' => 'NO_KAB'), site_url('Pdak_source')) ?> 
<div class="row">
   <div class="clearfix"></div>  <?php echo $this->session->flashdata('message'); ?><div class="col-md-6 col-sm-6 col-xs-12">
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


<div class="col-md-6 col-sm-12 col-xs-12">
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
                                  <span class="col-sm-3"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                        <input type="text" id="single_cal1" name="TANGGAL" class="form-control tcal" placeholder="DD/MM/YYYY" aria-describedby="inputSuccess2Status" name="TANGGAL"  value="<?php echo set_value('TANGGAL'); ?>">
                             </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                          <label class="col-sm-3" for="name">Permasalahan </label>
                         <div class="col-sm-9"> <span class="required"><?php echo form_error('PERMASALAHAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                           <textarea class="form-control" rows="4" name="PERMASALAHAN" value="<?php echo set_value('PERMASALAHAN'); ?>"></textarea>
                             </div></div> 
                              <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                              <label class="col-sm-3" for="name">Solusi </label>
                               <div class="col-sm-9"> <span class="required"><?php echo form_error('SOLUSI'); ?></span>
                              <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                              <textarea class="form-control" rows="4" name="SOLUSI" value="<?php echo set_value('SOLUSI'); ?>"></textarea>
                           </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                             <label class="col-sm-3" for="name">Keterangan </label>
                              <div class="col-sm-9"> <span class="required"><?php echo form_error('KETERANGAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                         <textarea class="form-control" rows="4" name="KETERANGAN" value="<?php echo set_value('KETERANGAN'); ?>"></textarea>
                        </div></div>
                          <div class="line line-dashed b-b line-lg pull-in"></div>
                           <div class="form-group">
                           <div class="col-sm-6 col-sm-offset-6">
                               <div class='paging'>   <button type="submit" class='btn btn-dark' >Simpan</button></div></div></form></div></div></div></div></div>

        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="<?php echo base_url(); ?>assets/js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>
        <!-- tags -->
            <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/tags/jquery.tagsinput.min.js"></script>
        <!-- switchery -->
        <script src="<?php echo base_url(); ?>assets/js/switchery/switchery.min.js"></script>
        <!-- daterangepicker -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/daterangepicker.js"></script>
        <!-- richtext editor -->
         <script src="<?php echo base_url(); ?>assets/js/colorpicker/bootstrap-colorpicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/colorpicker/docs.js"></script>

    
        <!-- select2 -->
        <script src="<?php echo base_url(); ?>assets/js/select/select2.full.js"></script>
        <!-- form validation -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parsley/parsley.min.js"></script>
        <!-- textarea resize -->
        <script src="<?php echo base_url(); ?>assets/js/textarea/autosize.min.js"></script>
        <script>
            autosize($('.resizable_textarea'));
        </script>
           <script src="<?php echo base_url(); ?>assets/js/cropping/cropper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/cropping/main2.js"></script>


        <!-- Autocomplete -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autocomplete/countries.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>


        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>
        <!-- /select2 -->
        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->
        <!-- form validation -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {}
        </script>
        <!-- /form validation -->
        <!-- editor -->

 <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };

            $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange_right').daterangepicker(optionSet1, cb);

            $('#reportrange_right').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange_right').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange_right').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange_right').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });

            $('#options1').click(function () {
                $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
            });

            $('#options2').click(function () {
                $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
            });

            $('#destroy').click(function () {
                $('#reportrange_right').data('daterangepicker').remove();
            });

        });
    </script>
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <!-- /datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_2"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal3').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_3"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal4').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>
    <!-- /datepicker -->
    <!-- input_mask -->
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>
    <!-- /input mask -->
    <!-- ion_range -->
  