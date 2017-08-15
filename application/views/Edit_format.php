<div class="row"> 
  <?php foreach($single_format as $single) ?>
      <form data-validate="parsley" action="<?php echo base_url(); ?>format_broadcast/update_format/<?php echo $single->id; ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-default" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Edit Format Sms</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                            </div>
                            <?php foreach($single_format as $single_format){ ?>
                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>FORMAT PERTAMA</label>
                                  <input type="text" class="form-control" data-required="true"placeholder="FORMAT PERTAMA" id="Keyword1" name="keyword1" value="<?php echo $single_format->keyword1; ?>">                        
                                <?php echo form_error('keyword1'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>FORMAT KEDUA</label>
                                  <input type="text" class="form-control" data-required="true"placeholder="FORMAT KEDUA" id="keyword2" name="keyword2" value="<?php echo $single_format->keyword2; ?>">                        
                                <?php echo form_error('keyword2'); ?></div></div>
                                  <div class="col-sm-12">
                                       <div class="form-group">
                                      <label>Result</label>
                                  <textarea type="text" class="form-control" rows="4" data-required="true" name="result" value="<?php echo $single_format->result; ?>">  <?php echo $single_format->result; ?></textarea>                      
                                <?php echo form_error('result'); ?></div></div>
                                 </br></br></br></br></br>
                                 <?php } ?>
                            <footer class="panel-footer text-right bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="SAVE">
                        <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>format_broadcast/cek" class="btn btn-danger">Lihat Daftar Format</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </footer>
                    </section>
                </form>
           </div>
      </div>
</div>
           