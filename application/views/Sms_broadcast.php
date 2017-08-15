<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/ui.theme.css" type="text/	css" media="all" />
		<script src="<?php echo base_url(); ?>assets/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
	    <meta charset="UTF-8">
	    <script type='text/javascript' src='<?php echo base_url(); ?>assets/artikel/js/plugins/cleditor/jquery.cleditor.js'></script>        
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/artikel/js/plugins/ckeditor/ckeditor.js'></script>    
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/artikel/js/plugins/select/select2.min.js"></script>
	  
	</head>
	<body><div class="row">  
      <form data-validate="parsley" action="<?php echo base_url(); ?>sms_broadcast/broadcast_all" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-default" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Sms Broadcast</h3>
                              <div class="panel-toolbar text-right">
                                 
                                </div>
                            </div>
                                 
                                  <div class="col-sm-12">
                                       <div class="form-group">
                                      <label>Pesan</label>
                                  <textarea type="text" class=" form-control" rows="12" data-required="true" name="TextDecoded" value="<?php echo set_value('TextDecoded'); ?>">  </textarea>                      
                                <?php echo form_error('TextDecoded'); ?></div></div>
                                 </br></br></br></br></br>
                            <footer class="panel-footer text-right bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="Kirim">
                        <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; 
                        <!-- <a class="btn btn-info" href="<?php echo base_url(); ?>sent" class="btn btn-danger">Lihat Daftar Sms Terkirim</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
                      </footer>
                    </section>
                </form>
           </div>
      </div>
</div>
           