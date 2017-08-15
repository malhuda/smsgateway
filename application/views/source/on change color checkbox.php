<style type="text/css">

  input[type="checkbox"]:required:invalid + label { color: red; }
  input[type="checkbox"]:required:valid + label { color: green; }

</style>

<form ...>
...
<p><input id="field_terms" type="checkbox" required name="terms">
<label for="field_terms">I accept the <u>Terms and Conditions</u></label></p>
...
</form>