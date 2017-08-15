
<?php 
   foreach($checkbox as $param_checkbox){ 
      $param_checkbox['NO_PERTANYAAN'] =$param_checkbox['NO_PERTANYAAN'];
        $PARAM_CHECKBOXNYA =$param_checkbox['NO_PERTANYAAN']+1;
         echo "<script type='text/javascript'>
         function CENTANG_PILIHAN_PILKADA(NILAI_CHECKBOXNYA) {
          var GET_LOOPING_CHECKBOXNYA= 0;
          for(var PARAM_CHECKBOX_PERTAMA=0; 
          PARAM_CHECKBOX_PERTAMA < document.formpilkada.NO_PERTANYAAN.length; 
          PARAM_CHECKBOX_PERTAMA++){
          if(document.formpilkada.NO_PERTANYAAN[PARAM_CHECKBOX_PERTAMA].checked){
          GET_LOOPING_CHECKBOXNYA = GET_LOOPING_CHECKBOXNYA+1;}
          if(NILAI_CHECKBOXNYA > $param_checkbox[NO_PERTANYAAN]+1){
          alert('Anda Harus Mengisi Pilihan Yang Ke \t.$PARAM_CHECKBOXNYA Terlebih Dahulu !') 
          document.formpilkada.NO_PERTANYAAN[NILAI_CHECKBOXNYA].checked = false ;
          return true;
          }
        }
      } $('#NO_PERTANYAAN' ).blur(function() {
  alert( 'Handler for ' );
});
  </script>"; 
?>


<script>
$( "#target" ).blur(function() {
  alert( "Handler for .blur() called." );
});
</script><form>
  <input id="target" type="text" value="Field 1">
  <input type="text" value="Field 2">
</form>
<div id="other">
  Trigger the handler
</div>
The event handler can be bound to the first input field:
