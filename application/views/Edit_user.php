<div class="row">  <?php foreach ($single_user as $user) ?>
      <form data-validate="parsley" action="<?php echo site_url('webmaster_control/update_user_username');?>/<?php echo $user->ID; ?>" method="post" enctype="multipart/form-data">
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
                                      <label>USERNAME</label><?php foreach ($single_user as $user): ?> 
                                  <input type="text" class="form-control" data-required="true"placeholder="USERNAME" id="USERNAME" name="USERNAME" value="<?php echo $user->USERNAME; ?>">                        
                                <?php echo form_error('USERNAME'); ?></div></div>
                                   <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>PASSWORD</label>
                                  <input type="password" class="form-control" data-required="true"placeholder="PASSWORD" id="PASSWORD" name="PASSWORD" value="<?php echo $user->PASSWORD; ?>">                        
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
                                 <select name="LEVEL_LOGIN" class="form-control" value="<?php echo $user->LEVEL_LOGIN; ?>">
                                 <option value=""><font color="black">PILIH</font></option>
                                    <option value="<?php echo set_value($user->LEVEL_LOGIN); ?>">
                                        <?php if($user->LEVEL_LOGIN ==1){
                                        echo "AMDINISTRATOR";
                                    }else{
                                        echo "OPERATOR";
                                    }
                                     ?></option>
                                         </select>                     
                                <?php echo form_error('LEVEL_LOGIN'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>NAMA LENGKAP</label>
                                     <input type="text" class="form-control" data-required="true"placeholder="NAMA LENGKAP" id="NAMA" name="NAMA" value="<?php echo $user->NAMA; ?>">                            
                                <?php echo form_error('NAMA'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>FOTO</label>
                               <input type="file" class="form-control" name="FOTO" value="<?php echo $user->FOTO; ?>"><?php echo $user->FOTO;?><img src="<?php echo base_url(); ?>assets/foto/<?php echo $user->FOTO;?>" width="76" height="92" onError="this.onerror=null;this.src='<?php echo base_url(); ?>assets/foto/no-photo.jpg' ;" width="76" height="92"/>
                            <span class="help-block"> <?php echo form_error('FOTO'); ?> </span>
                               </div></div>
                                 </br></br></br></br></br>
                            <footer class="panel-footer text-right bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="SAVE">
                        <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>webmaster/cek" class="btn btn-danger">Lihat Daftar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </footer>
                    </section>
                </form><?php endforeach; ?>
           </div>
      </div>
</div>
           