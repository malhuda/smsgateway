

<div id="response">
    <div>
<form id="formpilkada" name='formpilkada' class="form-horizontal">
  <script>
    (function($){
        function processForm( e ){
            $.ajax({
                url: '<?php echo site_url();  ?>ajax/multiple',
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
<input type="text" name="KETERANGAN" value="<?php echo set_value('KETERANGAN'); ?>">
<button type="submit" class='btn btn-primary'>Submit</button>

</div></div></form>