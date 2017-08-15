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
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'inbox/index') ?>' + '/' + $(this).attr("id"),
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
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'inbox/index') ?>' + '/' + $(this).attr("id"),
                                'height': 550,
                                'type': 'question'
                            }},
                        width: 1000,
                        title: 'default Biodata'
                    });
                });
                $('.menu_button').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'inbox/index') ?>";
                });
                $('.menu_button4').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'inbox/index') ?>";
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
 function delete_inbox_by_id(ID)
    {
      if(confirm('Anda yakin akan menghapus data ini?'))
      {
          $.ajax({
            url : "<?php echo site_url('inbox/ajax_delete')?>/"+ID,
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

</script>                       
     <form action="<?php echo site_url($this->router->fetch_directory() . $this->router->fetch_class() . '/index') ?>" method="post" enctype="multipart/form-data" >
          <div class="col-md-12"><?php echo $this->session->flashdata('message'); ?>
                        <div class="panel panel-default" id="toolbar-showcase">
                           <div class="panel-heading"><div class="btn btn-default"><i class="glyphicon glyphicon-download"></i>   <strong>    
                            <a class="btn btn-default"  href="<?php echo base_url('inbox'); ?>"></i> Inbox Messages</a>      
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
                                         <button type="submit" formaction="<?php echo base_url(); ?>inbox/multiple_proses" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="top" title="Export Hanya Yang Dicentang"><strong>Generate To Excel <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>inbox/all_to_excel" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="right" title="Export Semua Data"><strong>Generate All To Excel <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </a></font>  
                                         <font id="csv" class="drop-down-show-hide">                             
                                         <button type="submit" formaction="<?php echo base_url(); ?>inbox/multiple_proses" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="top" title="Export Hanya Yang Dicentang"><strong>Generate To Csv <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>inbox/all_to_csv" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="right" title="Export Semua Data"><strong>Generate All To Csv <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </a></font> 
                                         <font id="pdf" class="drop-down-show-hide">                            
                                         <button type="submit" formaction="<?php echo base_url(); ?>inbox/multiple_proses" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="top" title="Export Hanya Yang Dicentang"><strong>Generate To Pdf <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>inbox/all_to_pdf" class="btn btn-teal"  target="_blank" data-toggle="tooltip" data-placement="right" title="Export Semua Data"><strong>Generate All To Pdf <i class="glyphicon glyphicon-refresh"></i></strong>
                                           </a></font> 
                                          <font id="hapus" class="drop-down-show-hide">               
                                         <button id="submitclose" type="submit" disabled="disabled" formaction="<?php echo base_url(); ?>inbox/multiple_proses" class="btn btn-teal" data-toggle="tooltip" data-placement="top" title="Hapus Hanya Yang Dicentang"><strong>Hapus <i class="glyphicon glyphicon-trash"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>inbox/hapus_semua" class="btn btn-teal"  data-toggle="tooltip" data-placement="right" title="Hapus Semua Data"  onClick="return confirm('Apakah anda yakin akan menghapus semua data ?');"><strong>Kosongkan Table<i class="glyphicon glyphicon-trash"></i></strong>
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
                      
                            <div class="table-responsive panel-collapse pull out">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>

                                    <!-- <tr class="gradeA">
                                            <th rowspan="0"  width="3%" class="text-center">
                                                <div class="checkbox custom-checkbox pull-left" data-toggle="tooltip" data-placement="right" title="Check all">  
                                                    <input type="checkbox" id="customcheckbox-two0" value="1" data-toggle="checkall" data-target="#toolbar-showcase">  
                                                    <label for="customcheckbox-two0"></label>  
                                                </div>
                                            </th>
                                      <th rowspan="0" align="center"><strong>NO.</div></strong>
                                         <th rowspan="0"><center><strong>DITERIMA</strong></center></th>
                                          <th rowspan="0" ><center><strong>STATUS<div></strong></center></th>
                                            <th  colspan="5" rowspan="1" align="center"  ><center><strong>PENGIRIM</strong></center></th>
                                           <th colspan="1" rowspan="0"  align="center" ><center><strong>PESAN</strong></center></th> 
                                           <th rowspan="0"  align="center" ><center><strong>#ACTION</strong></center></th> 
                                 </tr>
                               <tr>
                                
                                    <th align="center"><center><strong>KODE</center></strong></th> 
                                      <th align="center"><center><strong>WILAYAH</center></strong></th> 
                                         <th align="center" ><center><strong> NAMA </center></strong></th> 
                                         <th align="center" ><center><strong> NO.HP </center></strong></th> 
                                         <th align="center" ><center><strong> EMAIL </center></strong></th> 
                                 </tr> -->

                                 <tr class="gradeA">
                                            <th rowspan="0"  width="3%" class="text-center">
                                                <div class="checkbox custom-checkbox pull-left" data-toggle="tooltip" data-placement="right" title="Check all">  
                                                    <input type="checkbox" id="customcheckbox-two0" value="1" data-toggle="checkall" data-target="#toolbar-showcase">  
                                                    <label for="customcheckbox-two0"></label>  
                                                </div>
                                            </th>
                                            <th align="center"><center><strong>NO</center></strong></th> 
                                      <th align="center"><center><strong>DITERIMA</center></strong></th> 
                                      <th align="center"><center><strong>PENGIRIM</center></strong></th> 
                                         <th align="center" ><center><strong> STATUS </center></strong></th> 
                                         <th align="center" ><center><strong> PESAN </center></strong></th>
                                         <th align="center" ><center><strong> #ACTION </center></strong></th>
                                        
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
                                       echo '<div id="animasi" class="alert btn-teal"><p align ="center"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">
                                            <font size ="2" color="black">
                                                <strong>X</strong>
                                            </font></button><strong><p align="center">Maaf Data Belum Ada.</button> </p></div>'; 
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
                                             <td style="text-align:left"><?php echo $data["ReceivingDateTime"] ?></td>
                                             <td style="text-align:left"><?php echo $data["SenderNumber"] ?></td>
                                             <td style="text-align:left"><?php echo $data["Processed"] ?></td>
                                             <!-- <td style="text-align:left"><?php echo $data["KODE"] ?></td>
                                             <td style="text-align:left"><?php echo $data["WILAYAH"] ?></td>
                                             <td style="text-align:left"><?php echo $data["NAMA_ADB"] ?></td>
                                              <td style="text-align:left"><?php echo $data["SenderNumber"] ?></td>
                                             <td style="text-align:left"><?php echo $data["EMAIL"] ?></td>-->
                                             <td style="text-align:left"><?php echo word_limiter($data["TextDecoded"],"5"); ?></td>
                                             <td style="text-align:left"><p align="center"> <?php  echo '<a class="btn btn-teal" href="javascript:void()" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Pesan ?"  onclick="edit_inbox('."'".$data["ID"]."'".')"> <i class="glyphicon glyphicon-edit"></i></a>
                                             <a class="btn btn-success" href="javascript:void()" data-toggle="tooltip" data-placement="bottom" title="Balas Pesan ?" onclick="balas_inbox('."'".$data["ID"]."'".')"> <i class="glyphicon glyphicon-refresh"></i></a>'; ?>
                                             <a class="btn btn-danger" href="javascript:void()" onclick="delete_inbox_by_id('<?php echo $data["ID"]; ?>')" data-toggle="tooltip" data-placement="bottom" title="Hapus Data ?" ><span class="icon"></span> <i class="ico-trash"></i></a></p></td>
                                            </tr>
                                             <?php
                                                }
                                                ?>
                                    </tbody>  
                                      <tfoot> 
                                        <tr height="0"><td></td><td></td><td></td><td></td><td></td>
                                         <td align="center" class="paging"><?php echo $this->pagination->create_links(); ?></td>
                                          <td align="center" class="paging">TOTAL <?php echo $title; ?>: <?php echo $count_table; ?> <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Refresh" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button></td>
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
             
                function edit_inbox(ID)
              {
                  save_method = 'update';
                  $('#form')[0].reset(); 
                  $('.form-group').removeClass('has-error'); 
                  $('.help-block').empty(); 
                  $.ajax({
                      url : "<?php echo site_url('inbox/detail')?>/" + ID,
                      type: "GET",
                     dataType: "JSON",
                      success: function(data)
                      {
                          $('[name="ID"]').val(data.ID);
                          $('[name="SenderNumber"]').val(data.SenderNumber);
                          $('[name="ReceivingDateTime"]').val(data.ReceivingDateTime);
                           $('[name="UpdatedInDB"]').val(data.UpdatedInDB);
                            $('[name="Text"]').val(data.Text);
                          $('[name="Coding"]').val(data.Coding);
                           $('[name="SMSCNumber"]').val(data.SMSCNumber);
                            $('[name="Class"]').val(data.Class);
                          $('[name="RecipientID"]').val(data.RecipientID);
                          $('[name="Processed"]').val(data.Processed);
                           $('[name="TextDecoded"]').val(data.TextDecoded);
                          $('#modal_form').modal('show'); 
                          $('.modal-title').text('DETAIL INBOX');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Gagal mengambil data ,silahkan periksa koneksi database.');
                      }
                  });
              }function balas_inbox(ID)
              {
                  save_method = 'update';
                  $('#form_balas')[0].reset(); 
                  $('.form-group').removeClass('has-error');
                  $('.help-block').empty(); 
                  
                  $.ajax({
                      url : "<?php echo site_url('inbox/detail')?>/" + ID,
                      type: "GET",
                      dataType: "JSON",
                      success: function(data)
                      {
                         $('[name="ID"]').val(data.ID);
                          $('[name="SenderNumber"]').val(data.SenderNumber);
                          $('[value="<?php echo $data["TextDecoded"]; ?>"]').val(data.TextDecoded);
                          $('#modal_form_balas').modal('show'); 
                          $('.modal-title').text('DETAIL INBOX'); 
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Gagal mengambil data ,silahkan periksa koneksi database.');
                      }
                  });
              }
              function replay_inbox(ID)
{
    $('#btnReplay').text('Mencoba Mengirim Pesan...'); 
    $('#btnReplay').attr('disabled',true);  
    var url;

    if(save_method == 'replay') {
        url = "<?php echo site_url('inbox/replay')?>/" + <?php echo $data["ID"]; ?>;
    } else {
        url = "<?php echo site_url('inbox/replay')?>/" + <?php echo $data["ID"]; ?>;
    }

    $.ajax({
        url : url,
        type: "POST",
        data: $('#form_balas').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) 
            {
                $('#modal_form_balas').modal('hide');
             alert('Replay message success.');
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
                }
            }
            $('#btnReplay').text('Replay'); 
            $('#btnReplay').attr('disabled',false);  


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Processing Vailed.');
            $('#btnReplay').text('Replay'); 
            $('#btnReplay').attr('disabled',false);  

        }
    });
}

</script>                
                      <?php if(!empty($biodata)){
                        foreach ($biodata as $data){?>
                        <form id="form" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   <?php
                            $ID=explode(',',$data["ID"]);
                            $count=count($ID);
                            for($k=0;$k<$count;$k++)
                            {
                                $j=$k+1;
                            ?>

                  <div class="modal-dialog">
                      <div class="modal-content" style="width:1000px;margin-left:-200px">
                    <div class="modal-content" >
                      <div class="modal-header btn-teal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                        <h4 ><p align="center"><strong>DETAIL PESAN INBOX <i class="glyphicon glyphicon-user"></i></strong></p></h4>
                      </div>   
                         <div>
                         <div class="col-md-12">
                            <div class="panel-heading"></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->
                             <div class="form-group">
                                    <label class="control-label col-sm-4">SenderNumber</label>
                                    <div class="col-sm-8">
                                        <input name="SenderNumber" type="text" class="form-control" value="<?php echo $data["SenderNumber"]; ?>" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">UpdatedInDB</label>
                                    <div class="col-sm-8">
                                        <input name="UpdatedInDB" type="text" class="form-control" value="<?php echo $data["UpdatedInDB"]; ?>" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">Text</label>
                                    <div class="col-sm-8">
                                          <textarea name="Text" rows="4" type="text" class="form-control" value="<?php echo $data["Text"]; ?>" ><?php echo $data["Text"]; ?></textarea>
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">Coding</label>
                                    <div class="col-sm-8">
                                        <input name="Coding" type="text" class="form-control" value="<?php echo $data["Coding"]; ?>" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">Class</label>
                                    <div class="col-sm-8">
                                        <input name="Class" type="text" class="form-control" value="<?php echo $data["Class"]; ?>" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">ReceivingDateTime</label>
                                    <div class="col-sm-8">
                                        <input name="ReceivingDateTime" type="text" class="form-control" value="<?php echo $data["ReceivingDateTime"]; ?>" >
                                      <span class="help-block"></span></div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">Processed</label>
                                    <div class="col-sm-8">
                                        <input name="Processed" type="text" class="form-control" value="<?php echo $data["Processed"]; ?>" >
                                      <span class="help-block"></span></div>
                                </div>
                             </div>   <div class="form-group">
                                    <label class="control-label col-sm-4">TextDecoded </label>
                                    <div class="col-sm-8">
                                        <textarea name="TextDecoded" rows="4" type="text" class="form-control" value="<?php echo $data["TextDecoded"]; ?>" ><?php echo $data["TextDecoded"]; ?></textarea>
                                     </div>
                                </div>
                             </div>                    
                            <?php } ?>
                        </form>
                        </br>
                         </div>
                             <div class="modal-footer">
                         </div>
                            </div>
                              <div class="modal-footer btn-teal">
                              <p align="center"><button type="button" data-toggle="tooltip" data-placement="bottom" title="TUTUP." class="btn btn-default" data-dismiss="modal"><strong>Tutup <i class="glyphicon glyphicon-refresh"></i></strong></button></p>
                                </div>
                                     </div>
                                </div>
                        </div>
                  <?php
               }
             }
         ?>  
   
         <?php if(!empty($biodata)){
                        foreach ($biodata as $data){?>
                        <form id="form_balas" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="modal_form_balas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   <?php
                            $ID=explode(',',$data["ID"]);
                            $count=count($ID);
                            for($k=0;$k<$count;$k++)
                            {
                                $j=$k+1;
                            ?>

                  <div class="modal-dialog">
                      <div class="modal-content" style="width:1000px;margin-left:-200px;">
                    <div class="modal-content" >
                      <div class="modal-header btn-teal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                      </div>   
                         <div>
                         <div class="col-md-12">
                           <input type="hidden" value="" name="id"/> 
                            <div class="panel-heading"><h5 class="panel-title" data-toggle="tooltip" data-placement="left" title="Replay inbox.">REPLAY INBOX :</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><div class="form-group">
                                    <label class="control-label col-sm-4">Nomor Tujuan</label>
                                    <div class="col-sm-8">
                                        <input name="SenderNumber" type="text" class="form-control" value="<?php echo $data["SenderNumber"]; ?>" >
                                      <span class="help-block"></span></div>
                                </div>  <div class="form-group">
                                    <label class="control-label col-sm-4">Pesan </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="6"  name="TextDecoded" value="<?php echo set_value("TextDecoded"); ?>"></textarea>
                                         <span class="help-block"></span>
                                   </div>
                                     </div>
                                </div>
                             </div><?php } ?>
                        </form>
                        </br>
                         </div>
                             <div class="modal-footer">
                         </div>
                            </div>
                              <div class="modal-footer btn-teal">
                              <p align="center"><button type="button" id="btnReplay" onclick="replay_inbox()" data-toggle="tooltip" data-placement="bottom" title="Balas pesan ?" class="btn btn-default"><strong>Balas <i class="glyphicon glyphicon-pencil"></i></strong></button>
                                &nbsp;&nbsp;&nbsp;<button type="button" data-toggle="tooltip" data-placement="bottom" title="Cancel dan tutup form ini." class="btn btn-default" data-dismiss="modal"><strong>Tutup <i class="glyphicon glyphicon-refresh"></i></strong></button></p>
                                </div>
                                     </div>
                                </div>
                        </div>
                  <?php
               }
             }
         ?>  

                                    
</body>
</html>                