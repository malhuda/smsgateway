<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<form>
  <p>
    <label>
      <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0">
      Checkbox</label>
    <br>
    <label>
      <input type="checkbox" name="CheckboxGroup1_" value="checkbox" id="CheckboxGroup1_1">
      Checkbox</label>
    <br>
  </p>
  <p>
    <input type="reset" value="Reset">
    <input type="submit" id="buttoncheck" value="Check">
  </p>
  <p class="checkboxStatus"></p>
</form>

<script>
$(function(){
   $("#buttoncheck").click(function(){
        if($('[type="checkbox"]').is(":checked")){
            $('.checkboxStatus').html("Congregation ! "+$('[type="checkbox"]:checked').length+" checkbox checked");
        }else{
            $('.checkboxStatus').html("Sorry! Checkbox is not checked");
         }
         return false;
   })
    
});
</script>