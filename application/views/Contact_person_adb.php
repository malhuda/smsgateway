<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>     
       <!--  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet"> -->
     <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/vendor.js"></script>  
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/artikel/js/plugins/cleditor/jquery.cleditor.js'></script>        
         <script type='text/javascript' src='<?php echo base_url(); ?>assets/artikel/js/plugins/ckeditor/ckeditor.js'></script>    
        <script src="<?= base_url() ?>assets/js/jquery.chainedselects.js"></script>
        <script src="<?= base_url() ?>assets/js/update_tgl.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.keluargaShow').bind('click', function(e) {
                    e.preventdefault();
                    $.Zebra_Dialog('', {
                        source: {'iframe': {
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'contact_person_adb/index') ?>' + '/' + $(this).attr("id"),
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
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'contact_person_adb/index') ?>' + '/' + $(this).attr("id"),
                                'height': 550,
                                'type': 'question'
                            }},
                        width: 1000,
                        title: 'default Biodata'
                    });
                });
                $('.menu_button').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'contact_person_adb/index') ?>";
                });
                $('.menu_button4').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'contact_person_adb/index') ?>";
                });
                $("#frmDaftar").submit(function() {
                    var allMessage = "";
                    var msgDetail = "";
                    var allIndicator = new Array();
                    if ($("#ID").val() == "0") {
                        if (document.getElementById("ID").value == "0") {
                            msgDetail = msgDetail + "NOMOR HP\n";
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
  <body> <script>
            $(function(){
            $('.disableButton').on('keyup change', function(){
                if ($('#action').val() == '') {
                        $('#submitclose').prop('disabled', true);
                } else {
                        $('#submitclose').prop('disabled', false);
                          $('#frmDaftar').attr({'action':$('option:selected').attr('data-action')});
                     }
                     });
                 });
           </script>   
        <script>
 function delete_contact_person(ID)
    {
      if(confirm('Anda yakin akan menghapus data ini?'))
      {
          $.ajax({
            url : "<?php echo site_url('contact_person_adb/ajax_delete')?>/"+ID,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
              
               alert('Data Berhasil Dihapus.');
                location.reload();
               
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                 alert('Gagal gan xory yaa');
                  $('#myModal').modal('hide');
                  location.reload();
            }
        });
         
      }
    }

</script>     <div id="myDiv"><div class="row">  
            <form action="<?php echo base_url(); ?>contact_person_adb/cari" method="post" enctype="multipart/form-data">
                        <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->
                                    <div class="form-group">
                                    <label class="control-label col-sm-4">WILAYAH</label>
                                    <div class="col-sm-4">
                                        <input name="WILAYAH" placeholder="Nama Wilayah" type="text" class="form-control" >
                                      <span class="help-block"></span></div><button class="btn btn-info" type="submit">Cari <i class="ico-search"></i></button>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </form>
                    </div>                  
     <form action="<?php echo site_url($this->router->fetch_directory() . $this->router->fetch_class() . '/index') ?>" method="post" enctype="multipart/form-data" >
          <div class="col-md-12"><?php echo $this->session->flashdata('message'); ?>
                        <div class="panel panel-default" id="toolbar-showcase">
                           <div class="panel-heading"><div class="btn btn-default"><i class="ico-group"></i>   <strong>    
                            <a class="btn btn-default"  href="<?php echo base_url('contact_person_adb'); ?>"></i> Contact Person Adb</a>      
                            </strong></div>
                            <div class="panel-toolbar-wrapper pl10 pr10 pt5 pb5">
                                <div class="panel-toolbar hide" id="toolbar-toshow">
                                     <div class="col-md-12">
                                          <div class="form-group">
                                           <label class="control-label col-md-4"> 
                                            <select name="action" class="form-control disableButton" id="action" onChange="this.form.action=this.options[this.selectedIndex].value;">
                                            <option value="">--Pilih--</option>
                                             <option value="excel">Excel</option> 
                                            <option value="csv">Csv</option>
                                             <option value="pdf">Pdf</option>
                                             <option value="hapus">Hapus</option>
                                          </select> </label>
                                        <font id="excel" class="drop-down-show-hide">                             
                                         <button type="submit" formaction="<?php echo base_url(); ?>contact_person_adb/multiple_proses" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="top" title="Export Hanya Yang Dicentang"><strong>Generate To Excel <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>contact_person_adb/all_to_excel" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="right" title="Export Semua Data"><strong>Generate All To Excel <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </a></font>  
                                         <font id="csv" class="drop-down-show-hide">                             
                                         <button type="submit" formaction="<?php echo base_url(); ?>contact_person_adb/multiple_proses" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="top" title="Export Hanya Yang Dicentang"><strong>Generate To Csv <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>contact_person_adb/all_to_csv" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="right" title="Export Semua Data"><strong>Generate All To Csv <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </a></font> 
                                         <font id="pdf" class="drop-down-show-hide">                            
                                         <button type="submit" formaction="<?php echo base_url(); ?>contact_person_adb/multiple_proses" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="top" title="Export Hanya Yang Dicentang"><strong>Generate To Pdf <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>contact_person_adb/all_to_pdf" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="right" title="Export Semua Data"><strong>Generate All To Pdf <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </a></font> 
                                          <font id="hapus" class="drop-down-show-hide">               
                                         <button id="submitclose" type="submit" disabled="disabled" formaction="<?php echo base_url(); ?>contact_person_adb/multiple_proses" class="btn btn-teal" data-toggle="tooltip" data-placement="top" title="Hapus Hanya Yang Dicentang"><strong>Hapus <i class="glyphicon glyphicon-trash"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>contact_person_adb/hapus_semua" class="btn btn-teal"  data-toggle="tooltip" data-placement="right" title="Hapus Semua Data"  onClick="return confirm('Apakah anda yakin akan menghapus semua data ?');"><strong>Kosongkan Table<i class="glyphicon glyphicon-trash"></i></strong>
                                           </a></font> 
                                       </div>
                                       <script type="text/javascript">    
                                       $('.drop-down-show-hide').hide();
                                          $('#action, #hapus').change(function(){
                                               $(this).find('option').each(function(){
                                                 $('#'+$(this).val()).hide();
                                                 }
                                               );
                                              $('#' + this.value).show();
                                             }
                                         )
                                      ;
                                   </script>
                                         </div>
                                         </div>
                                     </div>
                                   </div>
                        
                           <div class="table-responsive panel-collapse pull out"><p align="right">
                               <a class="btn btn-success" onclick="add_contact()" data-toggle="tooltip" data-placement="bottom" title="Tambah Kontak ?"><i class="ico-group"></i><strong> 
                                TAMBAH KONTAK</strong></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Upload Kontak Adb (Format.xls)?"  href="<?php echo base_url(); ?>upload_kontak"><i class="ico-upload"></i><strong> 
                                UPLOAD KONTAK</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" id="info" data-toggle="tooltip" data-placement="bottom" title="Cari Kontak Adb ?"><i class="ico-search"></i><strong> 
                                CARI KONTAK</strong></a>
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
                                </script></p><table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                         <tr class="gradeA">
                                            <th width="3%" class="text-center">
                                                <div class="checkbox custom-checkbox pull-left" data-toggle="tooltip" data-placement="right" title="Check all">  
                                                    <input type="checkbox" id="customcheckbox-two0" value="1" data-toggle="checkall" data-target="#toolbar-showcase">  
                                                    <label for="customcheckbox-two0"></label>  
                                                </div>
                                            </th>
                  <td colspan="1" align="left" ><strong>NO</td></strong>
                 <td colspan="1" align="left" ><strong>KODE WILAYAH</td></strong>
                <td colspan="1" align="left" ><strong>WILAYAH</td></strong>
                <td colspan="1" align="left" ><strong>NAMA ADB</td></strong>
                <td colspan="1" align="left" ><strong>KONTAK</td></strong>
                 <td colspan="1" align="center" ><strong>PASSWORD DKB,GANDA,ANOMALI</td></strong>
                 <td colspan="1" align="center" ><strong>PASSWORD DEM</td></strong>
                 <td colspan="1" align="center" ><strong>PASSWORD DUPLICATE RECORD</td></strong>
                 <td colspan="1" align="center" ><strong>PASSWORD WKTP NON REKAM</td></strong>
                 <td colspan="1" align="center" ><strong>PASSWORD CAPIL</td></strong>
                 <td colspan="1" align="center" ><strong>PASSWORD EKTP MISSING</td></strong>
                 <td colspan="1" align="center" ><strong>PASSWORD EKTP CETAK</td></strong> 
                 <td colspan="1" align="center" ><strong>COUNTER</td></strong> 
                <td colspan="1" align="center" ><strong>#ACTION</td></strong>
                          </tr>
                               </thead>
                               <tbody>
                             <?php
                                if(empty($biodata))
                                {
                                      echo "<script type='text/javascript' src='http://code.jquery.com/jquery-latest.js'></script>
                                      <script type='text/javascript'> 
                                        $('div').ready( function() {
                                          $('#animasi').delay(4000).fadeOut();
                                        });
                                      </script>";
                                       echo '<div id="animasi" class="alert btn-info"><p align ="center"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">
                                            <font size ="2" color="black">
                                                <strong>X</strong>
                                            </font></button><strong><p align="center">Data Tidak Ditemukan.</button> </p></div>'; 
                                       }
                                      else
                                         {
                                            $i=1;
                                         foreach($biodata as $data) {
                                    ?>
                     <tr class="gradeA">
                      <td>  <div class="checkbox custom-checkbox nm">  
                    <?php 
                    $set_id_multiple_and_call_jquery_by_id = array(
                        'data-toggle'        => "selectrow",
                        'data-target'        => "tr",
                        'data-contextual'        => "danger",
                        'name'        => "ID[]",
                        'id'          => "customcheckbox-two2".($page+$i+1),
                        'class'       => 'confirm',
                        'value'       => $data["ID"]
                        );
                         echo form_checkbox($set_id_multiple_and_call_jquery_by_id); ?> 
                         <label for="customcheckbox-two2<?php echo ($page+$i+1); ?>"></label>   
                          </div></td>
                                <td colspan="1" align="center" ><?php echo ($page+$i++); ?>.</td>
                                <td><?php echo $data["KODE"] ?></td>
                                <td><?php echo $data["WILAYAH"] ?></td>
                                <td><?php echo $data["NAMA_ADB"] ?></td>
                                <td><?php echo $data["NOMOR_KONTAK"] ?></td>
                                 <td><?php echo $data["PASSWORD_DKB_GANDA_ANOMALI"]; ?></td>
                                <td><?php echo $data["PASSWORD_DEM"]; ?></td>
                                <td><?php echo $data["PASSWORD_DUPLICATE_RECORD"]; ?></td>
                                <td><?php echo $data["PASSWORD_WKTP_NON_REKAM"]; ?></td>
                                <td><?php echo $data["PASSWORD_CAPIL"]; ?></td>
                                <td><?php echo $data["PASSWORD_EKTP_MISSING"]; ?></td>
                                <td><?php echo $data["PASSWORD_EKTP_CETAK"]; ?></td> 
                                <td><?php echo $data["COUNTER"]; ?></td> 
                                            <td><p align="center"> 
                                    <?php  echo '<a class="btn btn-info" href="javascript:void()" data-toggle="tooltip" data-placement="bottom" title="Edit Contact ?"  onclick="edit_contact('."'".$data["ID"]."'".')"><i class="glyphicon glyphicon-edit"></i></a>
                                             '; ?>
                                             <a class="btn btn-danger" href="javascript:void()" onclick="delete_contact_person('<?php echo $data["ID"]; ?>')" data-toggle="tooltip" data-placement="bottom" title="Hapus Data ?" ><span class="icon"></span><i class="ico-trash"></i></a></p></td>
                                         </tr>
                                             <?php
                                                }
                                                ?>
                                    </tbody>  
                                      <tfoot> 
                                        <tr height="0"><td></td><td></td><td></td><td></td><td></td><td></td><td align="center" class="paging"><?php echo $this->pagination->create_links(); ?></td><td align="center" class="paging">TOTAL <?php echo $title; ?>: <?php echo $count_table; ?> <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Refresh" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button></td><td> </td><td></td><td></td><td></td>
                                         <td></td><td></td>
                                          
                                        </tr>
                                    </tfoot>     
                                    </table>
                                  <script>
                          function reload() {
                              location.reload();
                          }
                          </script>
                                <script>
                                   jQuery(function ($) {
                                         var $checks = $('input[name="ID[]"]');
                                           $("#submitclose").click(function () {
                                           if ($checks.filter(':checked').length == 0) {
                                             alert('DATA BELUM DI PILIH !');
                                            return false;
                                         }  else {
                                            return confirm('Apakah anda yakin untuk menghapus data ini???');
                                         }
                                        });
                                     }); 
                            </script>
                        </form>
                              <?php
                             }
                          ?>
                      </td>
                  </tr>
                <tr>
              </tr>
           </table>


<link rel="stylesheet" href="<?php echo base_url() ?>assets/media/plugins/js/ui/themes/base/jquery.ui.all.css">
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/media/plugins/js/ui/ui/jquery.ui.position.js"></script>
    <script src="<?php echo base_url() ?>assets/media/plugins/js/ui/ui/jquery.ui.menu.js"></script>
    <script src="<?php echo base_url() ?>assets/media/plugins/js/ui/ui/jquery.ui.autocomplete.js"></script>
    <script src="<?php echo base_url() ?>assets/media/plugins/js/ui/ui/jquery.ui.datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/media/plugins/js/ui/ui/jquery.ui.tooltip.js"></script>
   
    <script>
    function detail_passwordnya(KODE){
        var KODE=$("#KODE").val();
        $.ajax({
                url:'<?php echo base_url(); ?>contact_person_adb/detail_passwordnya/',       
                type:'POST',
                data:"KODE="+KODE,
                success:function(data){ 
                     if(data!=''){
                        msg = data.split("|"); $('#WILAYAH').val(msg[0]); 
                        $('#PASSWORD_DKB_GANDA_ANOMALI').val(msg[1]);
                        $('#PASSWORD_DEM').val(msg[2]);
                        $('#PASSWORD_DUPLICATE_RECORD').val(msg[3]);
                        $('#PASSWORD_WKTP_NON_REKAM').val(msg[4]);
                        $('#PASSWORD_CAPIL').val(msg[5]);
                        $('#PASSWORD_EKTP_MISSING').val(msg[6]);
                        $('#PASSWORD_EKTP_CETAK').val(msg[7]);
                    } else {
                        $( "#infodlg" ).html("Data Keluarga Tidak Ditemukan !!!");
                        $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});  
                         $('#WILAYAH').val('');
                         $('#PASSWORD_DKB_GANDA_ANOMALI').val('');
                         $('#PASSWORD_DEM').val('');
                         $('#PASSWORD_DUPLICATE_RECORD').val('');
                         $('#PASSWORD_WKTP_NON_REKAM').val('');
                         $('#PASSWORD_CAPIL').val('');
                         $('#PASSWORD_EKTP_MISSING').val('');
                         $('#PASSWORD_EKTP_CETAK').val('');
                        return false;   
                    }
                }
            });
    }
    </script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/prettify/js/prettify.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/components/typography.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/tables/default.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables/tabletools/js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables/js/datatables-bs3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/backend/tables/datatable.js"></script>
      <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
      <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
            <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
              <script type="text/javascript">
              var save_method;
              var table;
              $(document).ready(function() {
                  $('.datepicker').datepicker({
                      autoclose: true,
                      format: "yyyy-mm-dd",
                      todayHighlight: true,
                      orientation: "top auto",
                      todayBtn: true,
                      todayHighlight: true,  
                  });
                  $("input").change(function(){
                      $(this).parent().parent().removeClass('has-error');
                      $(this).next().empty();
                  });

              });
             function add_contact()
            {
                save_method = 'add';
                $('#form')[0].reset(); 
                $('.form-group').removeClass('has-error'); 
                $('.help-block').empty(); 
                $('#modal_form').modal('show'); 
                $('.modal-title').text('Add Contact Adb'); 
            }

                function edit_contact(ID)
              {
                  save_method = 'edit';
                  $('#form')[0].reset(); 
                  $('.form-group').removeClass('has-error'); 
                  $('.help-block').empty(); 
                  $.ajax({
                      url : "<?php echo site_url('contact_person_adb/edit')?>/" + ID,
                      type: "GET",
                     dataType: "JSON",
                      success: function(data)
                      {
                          $('[name="ID"]').val(data.ID);
                          $('[name="KODE"]').val(data.KODE);
                          $('[name="WILAYAH"]').val(data.WILAYAH);
                           $('[name="NAMA_ADB"]').val(data.NAMA_ADB);
                            $('[name="NOMOR_KONTAK"]').val(data.NOMOR_KONTAK);
                          $('[name="EMAIL"]').val(data.EMAIL);
                           $('[name="PASSWORD_DKB_GANDA_ANOMALI"]').val(data.PASSWORD_DKB_GANDA_ANOMALI);
                            $('[name="PASSWORD_DEM"]').val(data.PASSWORD_DEM);
                          $('[name="PASSWORD_DUPLICATE_RECORD"]').val(data.PASSWORD_DUPLICATE_RECORD);
                          $('[name="PASSWORD_WKTP_NON_REKAM"]').val(data.PASSWORD_WKTP_NON_REKAM);
                           $('[name="PASSWORD_CAPIL"]').val(data.PASSWORD_CAPIL);
                           $('[name="PASSWORD_EKTP_MISSING"]').val(data.PASSWORD_EKTP_MISSING);
                           $('[name="PASSWORD_EKTP_CETAK"]').val(data.PASSWORD_EKTP_CETAK);
                           $('[name="OPERATOR"]').val(data.OPERATOR);
                          $('#modal_form').modal('show'); 
                          $('.modal-title').text('EDIT KONTAK ADB');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Gagal mengambil data ,silahkan periksa koneksi database.');
                      }
                  });
              } 
    function update_contact(ID)
{
    $('#btnUpdate').text('Mencoba Memproses Data...'); 
    $('#btnUpdate').attr('disabled',true);  
    var url;

    if(save_method == 'add') {
         url = "<?php echo site_url('contact_person_adb/ajax_save')?>";
    } else {
         url = "<?php echo site_url('contact_person_adb/ajax_update')?>";
    }

    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) 
            {
                $('#modal_form').modal('hide');
             alert('Processing success.');
             location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
                }
            }
            $('#btnUpdate').text('Proses'); 
            $('#btnUpdate').attr('disabled',false);  


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Processing Vailed.');
            $('#btnUpdate').text('Proses'); 
            $('#btnUpdate').attr('disabled',false);  

        }
    });
}

</script>                
                      
                        <form id="form" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <input type="hidden" value="" name="ID"/> 
                  <div class="modal-dialog">
                      <div class="modal-content" style="width:1000px;margin-left:-200px">
                    <div class="modal-content" >
                      <div class="modal-header btn-teal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                        <h3 class="modal-title"><p align="center"><strong>FORM UPDATE CONTACT ADB <i class="glyphicon glyphicon-user"></i></strong></p></h3>
                      </div>   
                         <div>
                         <div class="col-md-12">
                            <div class="panel-heading"></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->
                            <?php echo $table ?><div class="form-group">
                                    <label class="control-label col-sm-4">WILAYAH</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="WILAYAH" class="form-control" onChange="return detail_passwordnya()" name="WILAYAH" value="" style="width:300px" placeholder="WILAYAH">
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">NAMA ADB</label>
                                    <div class="col-sm-8">
                                          <input name="NAMA_ADB" type="text" class="form-control" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">NOMOR KONTAK</label>
                                    <div class="col-sm-8">
                                        <input name="NOMOR_KONTAK" type="text" class="form-control" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">EMAIL</label>
                                    <div class="col-sm-8">
                                        <input name="EMAIL" type="text" class="form-control" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">PASSWORD DKB,GANDA & ANOMALI</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="PASSWORD_DKB_GANDA_ANOMALI"  class="form-control" onChange="return detail_passwordnya()" name="PASSWORD_DKB_GANDA_ANOMALI" value="" style="width:300px" placeholder="PASSWORD_DKB_GANDA_ANOMALI">
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">PASSWORD DEM</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="PASSWORD_DEM"  class="form-control" onChange="return detail_passwordnya()" name="PASSWORD_DEM" value="" style="width:300px" placeholder="PASSWORD_DEM">
                                      <span class="help-block"></span></div>
                             </div> 
                             <div class="form-group">
                                    <label class="control-label col-sm-4">PASSWORD DUPLICATE RECORD</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="PASSWORD_DUPLICATE_RECORD"  class="form-control" onChange="return detail_passwordnya()" name="PASSWORD_DUPLICATE_RECORD" value="" style="width:300px" placeholder="PASSWORD_DUPLICATE_RECORD">
                                      <span class="help-block"></span></div>
                                </div>
                             <div class="form-group">
                                    <label class="control-label col-sm-4">PASSWORD WKTP NON REKAM</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="PASSWORD_WKTP_NON_REKAM"  class="form-control" onChange="return detail_passwordnya()" name="PASSWORD_WKTP_NON_REKAM" value="" style="width:300px" placeholder="PASSWORD_WKTP_NON_REKAM">
                                      <span class="help-block"></span></div>
                                </div>
                             <div class="form-group">
                                    <label class="control-label col-sm-4">PASSWORD CAPIL</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="PASSWORD_CAPIL"  class="form-control" onChange="return detail_passwordnya()" name="PASSWORD_CAPIL" value="" style="width:300px" placeholder="PASSWORD_CAPIL">
                                      <span class="help-block"></span></div>
                             </div> 
                             <div class="form-group">
                                    <label class="control-label col-sm-4">PASSWORD EKTP MISSING</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="PASSWORD_EKTP_MISSING"  class="form-control" onChange="return detail_passwordnya()" name="PASSWORD_EKTP_MISSING" value="" style="width:300px" placeholder="PASSWORD_EKTP_MISSING">
                                      <span class="help-block"></span></div>
                             </div>  <div class="form-group">
                                    <label class="control-label col-sm-4">PASSWORD EKTP CETAK</label>
                                    <div class="col-sm-8">
                                        <input type="text"  readonly="readonly" class="form-control"  id="PASSWORD_EKTP_CETAK"  class="form-control" onChange="return detail_passwordnya()" name="PASSWORD_EKTP_CETAK" value="" style="width:300px" placeholder="PASSWORD_EKTP_CETAK">
                                      <span class="help-block"></span></div>
                             </div>    <div class="form-group">
                                    <label class="control-label col-sm-4">OPERATOR</label>
                                    <div class="col-sm-8">
                                        <input name="OPERATOR" type="text" class="form-control">
                                      <span class="help-block"></span></div>
                                </div>
                             </div>   
                        </form>
                        </br>
                         </div>
                             <div class="modal-footer">
                         </div>
                            </div>
                              <div class="modal-footer btn-teal">
                               <p align="center"><button type="button" id="btnUpdate" onclick="update_contact()" data-toggle="tooltip" data-placement="top" title="Proses Form ?" class="btn btn-default"><strong>Proses <i class="glyphicon glyphicon-pencil"></i></strong></button>
                                &nbsp;&nbsp;&nbsp;<button type="button" data-toggle="tooltip" data-placement="top" title="Cancel dan tutup form ini." class="btn btn-default" data-dismiss="modal"><strong>Tutup <i class="glyphicon glyphicon-refresh"></i></strong></button></p>
                                </div>
                                     </div>
                                </div>
                        </div>
             