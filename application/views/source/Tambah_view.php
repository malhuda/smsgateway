
<div class="col-md-6 col-sm-12 col-xs-12" id="response">
	 <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Verifikasi Data Pemilih</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
    <div>
<form id="formpilkada" name='formpilkada' class="form-horizontal">
  <script>
    (function($){
        function processForm( e ){
            $.ajax({
                url: '<?php echo site_url();  ?>crud/simpan_tambah',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    $('#response div').html( data );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            e.preventDefault();
        }

        $('#formpilkada').submit( processForm );
    })(jQuery);
</script>

NO <input type="text" name="NO_PERTANYAAN" class="form-control" placeholder="NOMOR" name="NO_PERTANYAAN"  value="<?php echo set_value('NO_PERTANYAAN'); ?>">
ISI <input type="text" name="ISI_PERTANYAAN" class="form-control" placeholder="ISI_PERTANYAAN" name="ISI_PERTANYAAN"  value="<?php echo set_value('ISI_PERTANYAAN'); ?>">
<button type="submit">Submit</button></div></div></form>