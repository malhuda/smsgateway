<input type="checkbox" class="NO_PERTANYAAN">

<form action="<?php echo base_url('home/multiple'); ?>" method="post" id="formpilkada" name='formpilkada' class="form-horizontal"> 
Hello World</form>
<style>
.form-horizontal { background-color:red; display:none;}
</style>
<script>
$('.NO_PERTANYAAN').change(function () {
    if ($(this).attr("checked")) 
    {
        
        $('.form-horizontal').fadeIn();
        return;
    }
   $('.form-horizontal').fadeOut();
});
</script>

