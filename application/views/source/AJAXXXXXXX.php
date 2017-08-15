<div class="row">
             <script>
                     jQuery(function ($) {
                         var $checks = $('input[name="checkboxnya[]"]');
                         $("#submitclose").click(function () {
                             if ($checks.filter(':checked').length == 0) {
                                 alert('DATA PINDAH BELUM DI CONTRENG !');
                                 return false;
                             }  else {
                                 return confirm('APAKAH DATA AKAN DIPINDAHKAN SESUAI PILIHAN WILAYAH ???');
                             }
                         });
                     }); 
                 </script> 
                  <?php
                        if ($show == 1) {
                          if (count($biodata) != 0) {
                        foreach ($biodata as $data) 
                      ?>   
                   <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-users"></i></span> DAFTAR ANOMALI <?php foreach($periode_ketiga as $periode_ketiga){ ?>
                                  <?php echo $periode_ketiga["PERIODE"]; ?> <?php } ?></h3>
                                <div class="panel-toolbar text-right">
                                </div>
                            </div>
                        <div class="table-responsive panel-collapse pull out">
                                <table class="table table-bordered table-hover" id="table1">           
                    <div class="col-lg-12">
                    <thead>
                      <tr class="gradeA">
                        <th width="3%" class="text-center">
                          <div class="checkbox custom-checkbox pull-left">  
                                        <input type="checkbox" name="customcheckbox" id="customcheckbox-one<?php echo $data["NIK"] ?>" value="<?php echo $data["NIK"] ?>" data-toggle="checkall" data-target="#table1">  
                                        <label for="customcheckbox-one<?php echo $data["NIK"] ?>">&nbsp;&nbsp;</label>  
                                    </div>
                          <i class="ico-long-arrow-down"></i></th>
                           <th><strong>NO</th></strong>
                               <th><strong>KETERANGAN ANOMALI</th></strong>
                                <th><strong>NIK</th></strong>
                               <th><strong>NAMA LENGKAP</th></strong>
                               <th><strong>TEMPAT LAHIR</th></strong>
                               <th><strong>TANGGAL LAHIR</th></strong>
                               <th><strong>UBAH </th></strong>
                                <th weigth="30%"><strong>QUERY UPDATE </th></strong>
                                <th><strong>UPLOAD REFERENSI </th></strong>
                          </tr>
                       </thead>
                    <tbody>
                   <?php
                     foreach ($biodata as $data) {
                    ?>
                  <tr class="gradeA">
                      <td>  
                    <div class="checkbox custom-checkbox nm">
                       <input type="checkbox" name="checkboxnya[]" id="customcheckbox-one<?php echo $data["NIK"] ?>" value="<?php echo $data["NIK"] ?>" data-toggle="selectrow" data-target="tr" data-contextual="info">  
                        <label for="customcheckbox-one<?php echo $data["NIK"] ?>"></label>   
                        </div>
                          </td>
                     <td><?php echo $offset; ?>.</td>                                            
                             <td><?php echo $data["KET_ANOMALI"] ?></td>
                                 <td><?php echo $data["NIK"] ?></td>
                                     <td><?php echo $data["NAMA_LGKP"] ?></td>
                                   <td><?php echo $data["TMPT_LHR"] ?></td>
                               <td><?php echo $data["TGL_LHR"] ?></td>
                             <td><p align="center"> <?php  echo "<a href='#myModal_".$data["NIK"]."'class='btn btn-default' data-toggle='modal'>Edit <i class='glyphicon glyphicon-pencil'></i></a>"; ?></p></td>
                                <td weigth="30%"> <?php if(empty($data["QUERY_U"])){ ?>
                                  <?php echo $data["QUERY_U"] ?>
                                  <?php }else{ ?>
                                  <!--<pre class="prettyprint linenums text-primary"></pre>-->
                                 <?php echo $data["QUERY_U"] ?><?php } ?></td>
                                 <td><?php if($data["QUERY_U"]== NULL){
                                  ?>
                                  <?php }else{ ?>
                                  <p align="center"> <?php  echo "<a href='#myModal_".$data["NIK"]."'class='btn btn-default' data-toggle='modal'>Upload <i class='icon ico-upload'></i></a>"; ?></p></td>
                                  <?php } ?>
                                 
                                 </tr>
                         <?php
                             $offset++;
                                  }
                                     ?>
                                    </tbody>  
                               
                                   
                                      <tfoot>
                                          <tr height="0">
                                            <td align="center">  
                                            <td colspan="25" align="right" class="paging">Total : <?= number_format($this->widget_paging->jumlah, 0, ',', '.') ?> baris | Total : <?= number_format($this->widget_paging->jumlah_halaman, 0, ',', '.') ?> halaman. <?= $this->widget_paging->masukkan_halaman(array('prev' => base_url() . 'assets/images/gallery/btn_prev.gif', 'next' => base_url() . 'assets/images/gallery/btn_next.gif', 'id_form' => 'frmDaftar')) ?>&nbsp;&nbsp;<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button></td>
                                           </tr>
                                        </tfoot>   
                                      </tr> 
                                    </table>

                                    <tr>
                                  </tr>

                                <?php 
                                  }
                                 else
                                  {
                                   ?>
                                  <script>
                          function reload() {
                              location.reload();
                          }
                          </script>
                                   <table width="1077" cellpadding="0" cellspacing="0" border="0" align="center" background="<?php echo base_url(); ?>assets/images/btn_prev.jpg" style="font-size:12px;">
                                    <tbody>
                                        <tr>
                                          <?php  
           echo "<script type='text/javascript' src='http://code.jquery.com/jquery-latest.js'></script>
 
    <script type='text/javascript'> 
      $('div').ready( function() {
        $('#animasi').delay(2000).fadeOut();
      });
    </script>";
     echo '<div id="animasi" class="alert alert-danger"><p align ="center"><strong>Data Tidak Ditemukan!</strong> &nbsp;&nbsp;<button class="btn btn-default" onclick="reload()"><i class="glyphicon glyphicon-refresh"></i></button></p></div>'; ?>
                                        </tr>
                                    </tbody>
                                  </table>
                              <?php
                             }
                            }
                          ?>
                      </td>
                  </tr>
                <tr>
              </tr>
                </table>
              </form>


 <script>
      $(function () {
        $('#myModal').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>load_ajax/ajax_update_201501/<?php echo $data["NIK"]; ?>',
            data: $('#myModal').serialize(),
             success:function(data)
                {
/*                  location.reload();
*/                   alert('DATA BERHASIL DIRUBAH');

               $('#myModal').hide();
               window.location.replace("<?php echo base_url(); ?>load_ajax/index");
               /* location.reload();*/
                },
              
                error:function()
                {
                    alert('DATA GAGAL DIRUBAH');
                }
            });
        });

      });
    </script>
<form id="myModal" class="panel panel-default form-horizontal form-bordered" method="post" enctype="multipart/form-data">
 

            <?php if(!empty($biodata)){
                        foreach ($biodata as $data){?>
                <div class="modal fade" id="myModal_<?php echo $data["NIK"];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <?php
                            $NIK=explode(',',$data["NIK"]);
                            $count=count($NIK);
                            for($k=0;$k<$count;$k++)
                            {
                                $j=$k+1;
                            ?>
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title" id="myModalLabel" data-toggle="tooltip" data-placement="bottom" title="Silahkan Lengkapi Form.">FORM UPDATE BIODATA WNI</h4> </div>
                              </br>
                        <div class="col-md-6">
                            <div class="panel-heading"><h5 class="panel-title" data-toggle="tooltip" data-placement="left" title="Ini adalah data sebelumnya." >DATA SEBELUMNYA</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->
                                 <div class="form-group">
                                    <label class="control-label col-sm-4">NIK</label>
                                    <div class="col-sm-8">
                                        <input name="NIK" type="text" class="form-control" value="<?php echo $data["NIK"]; ?>" >
                                    </div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">NAMA LENGKAP</label>
                                    <div class="col-sm-8">
                                        <input name="NAMA_LGKP" type="text" class="form-control" value="<?php echo $data["NAMA_LGKP"]; ?>" >
                                    </div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">TMPT LHR </label>
                                    <div class="col-sm-8">
                                        <input name="TMPT_LHR" type="text" class="form-control" value="<?php echo $data["TMPT_LHR"]; ?>" >
                                    </div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">TGL LHR </label>
                                    <div class="col-sm-8">
                                       <input name="TGL_LHR" placeholder="DD/MM/YYYY" class="form-control datepicker" type="text" value="<?php echo $data["TGL_LHR"]; ?>" >
                                    </div>
                                </div>
                                 </br></br></br></br></br>
                            </div>
                    </div>                    
                    <div>
                        <div class="col-md-6">
                            <input type="hidden" value="" name="id"/> 
                            <div class="panel-heading"><h5 class="panel-title" data-toggle="tooltip" data-placement="left" title="Ini adalah data yang akan diganti.">DIGANTI</h5></div>
                            <div class="panel-body pt0">
                                <div class="form-group message-container"></div><!-- will be use as done/fail message container -->
                               <div class="form-group">
                                    <label class="control-label col-sm-4">NIK</label>
                                    <div class="col-sm-8">
                                        <input name="NIK_U" type="text" class="form-control" value="<?php echo $data["NIK_U"]; ?>" >
                                        <span class="help-block"></span>
                                    </div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">NAMA LENGKAP</label>
                                    <div class="col-sm-8">
                                        <input name="NAMA_LGKP_U" type="text" class="form-control" value="<?php echo $data["NAMA_LGKP_U"]; ?>" >
                                        <span class="help-block"></span>
                                    </div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">TMPT LHR </label>
                                    <div class="col-sm-8">
                                        <input name="TMPT_LHR_U"  type="text"  class="form-control" value="<?php echo $data["TMPT_LHR_U"]; ?>" >
                                        <span class="help-block"></span>
                                    </div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-4">TGL LHR </label>
                                    <div class="col-sm-8">
                                     <input name="TGL_LHR_U"  placeholder="DD/MM/YYYY" class="form-control datepicker" type="text" value="<?php echo $data["TGL_LHR_U"]; ?>" >
                                     <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">REFERENSI </label>
                                    <div class="col-sm-8">
                                        <input name="REFERENSI"  value="<?php echo $data["REFERENSI"]; ?>" type="text" class="form-control">
                                        <span class="help-block"></span>
                                    </div>
                                  </div>
                                 
                            </div>
                        </form>
                        </br>
                         </div>
                             <div class="modal-footer">
                             <p align="center">
                              </p>
                         </div>
                            </div>
                              <div class="modal-body">
                              <p align ="right"><button type="submit" data-toggle="tooltip" data-placement="bottom" title="Anda Yakin Akan Mengupdate Data Ini ?" class="btn btn-default" >UPDATE <i class="glyphicon glyphicon-pencil"></i></button>
                                &nbsp;&nbsp;&nbsp;<button type="button" data-toggle="tooltip" data-placement="bottom" title="Cancel dan tutup form ini." class="btn btn-default" data-dismiss="modal">BATAL <i class="glyphicon glyphicon-refresh"></i></button></p>
                                </div>
                                     </div>
                                     </div>
                                      </div>
                                   </div> 
                               </div>
                             </div>
                          </div>
       
<?php }}} ?>
</body>
</html>