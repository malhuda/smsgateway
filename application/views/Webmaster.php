<div class="row">  
      <form data-validate="parsley" action="<?php echo site_url('webmaster/proses');?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-default" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> New User</h3>
                              <div class="panel-toolbar text-right">
                                 
                                </div>
                            </div>
                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>USERNAME</label>
                                  <input type="text" class="form-control" data-required="true"placeholder="USERNAME" id="USERNAME" name="USERNAME" value="<?php echo set_value('USERNAME'); ?>">                        
                                <?php echo form_error('USERNAME'); ?></div></div>
                                   <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>PASSWORD</label>
                                  <input type="password" class="form-control" data-required="true"placeholder="PASSWORD" id="PASSWORD" name="PASSWORD" value="<?php echo set_value('PASSWORD'); ?>">                        
                                <?php echo form_error('PASSWORD'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>STATUS</label>
                                  <input type="radio" name="STATUS" class="flat-red" value="1" checked="checked"  /> AKTIF
                                <input type="radio" name="STATUS" class="flat-red" value="0"  /> TIDAK AKTIF
                                <?php echo form_error('STATUS'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>LEVEL LOGIN</label>
                                 <select name="LEVEL_LOGIN" class="form-control" value="<?php echo set_value('LEVEL_LOGIN'); ?>">
                                 <option value=""><font color="black">PILIH</font></option>
                                    <option value="1">ADMINISTRATOR</option>
                                    <option value="2">OPERATOR</option>
                                         </select>                     
                                <?php echo form_error('LEVEL_LOGIN'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>NAMA LENGKAP</label>
                                     <input type="text" class="form-control" data-required="true"placeholder="NAMA LENGKAP" id="NAMA" name="NAMA" value="<?php echo set_value('NAMA'); ?>">                            
                                <?php echo form_error('NAMA'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>FOTO</label>
                                <input type="file" class="form-control" name="FOTO">
                               </div></div>
                                 </br></br></br></br></br>
                            <footer class="panel-footer text-right bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="SAVE">
                        <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>webmaster/cek" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </footer>
                    </section>
                </form>
           </div>
      </div>
</div>
           