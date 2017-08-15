<div class="row">  
                <?php
            if ($this->session->flashdata('msg_excel')){
            ?>
           <div class="alert btn-primary"><p align ="center"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">
                      <font size ="2" color="black">
                          <strong>X</strong>
            </font></button><strong><p align="center"><?php echo $this->session->flashdata('msg_excel'); ?></button> </p></div><?php } ?>
           <form data-validate="parsley" action="<?php echo base_url(); ?>upload_kontak/saving_data" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-default" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Upload Kontak Adb</h3>
                              <div class="panel-toolbar text-right">
                                 
                                </div>
                            </div>
                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-3">
                                       <div class="form-group">
                                      <label>UPLOAD FILE :</label>
                                      <input type="file" class="form-control" id="file_upload" name="userfile" size="20" />
                                  </div></div>
                                 </br></br></br></br></br>
                                 </br></br></br></br></br>
                            <footer class="panel-footer text-center bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="Upload">
                        &nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>contact_person_adb" class="btn btn-danger">Lihat Kontak Adb</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </footer>
                    </section>
               </form>
           </div>
      </div>
</div>
           