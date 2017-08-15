<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>     
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
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'webmaster/index') ?>' + '/' + $(this).attr("id"),
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
                                'src': '<?php echo site_url($this->router->fetch_directory() . 'webmaster/index') ?>' + '/' + $(this).attr("id"),
                                'height': 550,
                                'type': 'question'
                            }},
                        width: 1000,
                        title: 'default Biodata'
                    });
                });
                $('.menu_button').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'webmaster/index') ?>";
                });
                $('.menu_button4').bind('click', function(e) {
                    window.location = "<?php echo site_url($this->router->fetch_directory() . 'webmaster/index') ?>";
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
 function delete_useritems_by_id(ID)
    {
      if(confirm('Anda yakin akan menghapus data ini?'))
      {
          $.ajax({
            url : "<?php echo site_url('webmaster/ajax_delete')?>/"+ID,
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
                           <div class="panel-heading"><div class="btn btn-default"><i class="glyphicon glyphicon-user"></i>   <strong>    
                            <a class="btn btn-default"  href="<?php echo base_url('webmaster/cek'); ?>"></i> LIST USER</a>      
                            </strong></div>
                            <div class="panel-toolbar-wrapper pl10 pr10 pt5 pb5">
                                <div class="panel-toolbar hide" id="toolbar-toshow">
                                     <div class="col-md-12">
                                          <div class="form-group">
                                           <label class="control-label col-md-4"> 
                                            <select name="action" class="form-control disableButton" id="action" onChange="this.form.action=this.options[this.selectedIndex].value;">
                                            <option value="">--Pilih--</option>
                                             <option value="hapus">Hapus</option>
                                          </select> </label>
                                         <font id="hapus" class="drop-down-show-hide">               
                                         <button id="submitclose" type="submit" disabled="disabled" formaction="<?php echo base_url(); ?>webmaster/multiple_proses" class="btn btn-teal" data-toggle="tooltip" data-placement="top" title="Hapus Hanya Yang Dicentang"><strong>Hapus <i class="glyphicon glyphicon-trash"></i></strong>
                                           </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Proses Semua Data :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>webmaster/hapus_semua" class="btn btn-teal"  data-toggle="tooltip" data-placement="right" title="Hapus Semua Data"  onClick="return confirm('Apakah anda yakin akan menghapus semua data ?');"><strong>Kosongkan Table<i class="glyphicon glyphicon-trash"></i></strong>
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
                        
                           <div class="table-responsive panel-collapse pull out">  <p align="right"><a class="btn btn-info" href="<?php echo base_url(); ?>webmaster"><i class="ico-users"></i><strong> 
                                ADD USER</strong></a></p>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                         <tr class="gradeA">
                                            <th width="3%" class="text-center">
                                                <div class="checkbox custom-checkbox pull-left" data-toggle="tooltip" data-placement="right" title="Check all">  
                                                    <input type="checkbox" id="customcheckbox-two0" value="1" data-toggle="checkall" data-target="#toolbar-showcase">  
                                                    <label for="customcheckbox-two0"></label>  
                                                </div>
                                            </th>
                  <td colspan="1" align="center" ><strong>NO</td></strong>
                 <td colspan="1" align="center" ><strong>NAMA</td></strong>
                 <td colspan="1" align="center" ><strong>USERNAME</td></strong>
                <td colspan="1" align="center" ><strong>PASSWORD</td></strong>
                <td colspan="1" align="center" ><strong>STATUS</td></strong>
                <td colspan="1" align="center" ><strong>LEVEL LOGIN</td></strong>
                <td colspan="1" align="center" ><strong>FOTO</td></strong>
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
                                             <td style="text-align:center"><?php echo $data["NAMA"] ?></td>
                                             <td style="text-align:center"><?php echo $data["USERNAME"] ?></td>
                                             <td style="text-align:center"><?php echo $data["PASSWORD"] ?></td>
                                             <td style="text-align:center"><?php
                                                                    if ($data["STATUS"]  == 0) {
                                                                        echo "TIDAK AKTIF";
                                                                            } 
                                                                                elseif ($data["STATUS"] == 1) {
                                                                                  echo "AKTIF";
                                                                                     }
                                                                                        ?>
                                                                                   </td>
                                             <td style="text-align:center"><?php
                                                                                if ($data["LEVEL_LOGIN"]  == 1) 
                                                                             {
                                                                        echo "ADMINISTRATOR";
                                                                     } 
                                                                elseif 
                                                        ($data["LEVEL_LOGIN"] == 2)
                                                     {
                                                      echo "OPERATOR";
                                                    }  
                                                    ?></td>
                                             <td style="text-align:center"><img src="<?php echo base_url(); ?>assets/foto/<?php echo $data["FOTO"];?>" height="72" width="72" onError="this.onerror=null;this.src='<?php echo base_url(); ?>assets/foto/no-photo.jpg' ;" height="72" width="72"/></td>
                                             <td style="text-align:left"><p align="center"> <a class="btn btn-success" href="<?php echo base_url(); ?>webmaster_control/edit/<?php echo $data["ID"]; ?>" data-toggle="tooltip" data-placement="left" title="Edit Data ?" ><span class="icon"></span> <i class="ico-pencil"></i></a> 
                                             <a class="btn btn-danger" href="javascript:void()" onclick="delete_useritems_by_id('<?php echo $data["ID"]; ?>')" data-toggle="tooltip" data-placement="bottom" title="Hapus Data ?" ><span class="icon"></span> <i class="ico-trash"></i></a></p></td>
                                            </tr>
                                             <?php
                                                }
                                                ?>
                                    </tbody>  
                                      <tfoot> 
                                        <tr height="0"><td></td><td></td><td></td><td></td><td></td><td></td><td align="center" class="paging"><?php echo $this->pagination->create_links(); ?></td> <td></td>                                        
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
                     
</body>
</html>                