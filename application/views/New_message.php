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
	    <style>
	    	/* Autocomplete
			----------------------------------*/
			.ui-autocomplete { position: absolute; cursor: default; }	
			.ui-autocomplete-loading { background: white url('<?php echo base_url(); ?>assets/loader/ui-anim_basic_16x16.gif') right center no-repeat; }*/

			/* workarounds */
			* html .ui-autocomplete { width:1px; } 
			.ui-menu {
				list-style:none;
				padding: 2px;
				margin: 0;
				display:block;
			}
			.ui-menu .ui-menu {
				margin-top: -3px;
			}
			.ui-menu .ui-menu-item {
				margin:0;
				padding: 0;
				zoom: 1;
				float: left;
				clear: left;
				width: 100%;
				font-size:80%;
			}
			.ui-menu .ui-menu-item a {
				text-decoration:none;
				display:block;
				padding:.2em .4em;
				line-height:1.5;
				zoom:1;
			}
			.ui-menu .ui-menu-item a.ui-state-hover,
			.ui-menu .ui-menu-item a.ui-state-active {
				font-weight: normal;
				margin: -1px;
			}
	    </style>
	    
	    <script type="text/javascript">
	    $(this).ready( function() {
    		$("#DestinationNumber").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>new_message/cari_nomor_kontak",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            		$("#result").append(
            			"<li>"+ ui.item.value + "</li>"
            		);           		
         		},		
    		});
	    });
	    </script>
	    
	</head>
	<body><div class="row">  
      <form data-validate="parsley" action="<?php echo base_url(); ?>new_message/sent_message" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-default" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> New Message</h3>
                              <div class="panel-toolbar text-right">
                                 
                                </div>
                            </div>
                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>No HP</label>
                                  <input type="text" class="form-control" data-required="true"placeholder="NO.HP" id="DestinationNumber" name="DestinationNumber" value="<?php echo set_value('category'); ?>">                        
                                <?php echo form_error('DestinationNumber'); ?></div></div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Pesan</label>
                                  <textarea type="text" class=" form-control" rows="12" data-required="true" name="TextDecoded" value="<?php echo set_value('TextDecoded'); ?>">  </textarea>                      
                                <?php echo form_error('TextDecoded'); ?></div></div>
                                 </br></br></br></br></br>
                            <footer class="panel-footer text-right bg-light lter">
                          <input type="submit" class="btn btn-success btn-s-xs" value="Kirim">
                        <button type="reset" class="btn btn-danger">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-info" href="<?php echo base_url(); ?>sent" class="btn btn-danger">Lihat Daftar Sms Terkirim</a>&nbsp;&nbsp;&nbsp;&nbsp;
                      </footer>
                    </section>
                </form>
           </div>
      </div>
</div>
           