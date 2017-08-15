<form>
    Nama Depan<br />
    <input type="text" id="cek" name="nama_depan" /><br />
    Nama Belakang<br />
    <input type="text" id="cek" name="nama_belakang" /><br />
    Email<br />
    <input type="email" id="cek" name="email" /><br />     
    <input type="submit" id="add_data" value="ADD Data" disabled="disabled" />
</form>  <script>
(function() {
    $('form > input#cek').keyup(function() {
        var empty = false;
        $('form > input').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#add_data').attr('disabled', 'disabled');
        } else {
            $('#add_data').removeAttr('disabled');
        }
    });
})()
</script>