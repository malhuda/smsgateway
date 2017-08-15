  <script>
              $(function(){
            $('.disableButton').on('keyup change', function(){
                if ($('#PERIODE').val() == '') {
                        $('#button').prop('disabled', true);
                } else {
                        $('#button').prop('disabled', false);
                }
            });
           });
        </script>

         <label class="control-label col-md-4" for="PERIODE" >PERIODE</label>
                    <div class="col-md-8">
                      <select name="PERIODE" class="form-control disableButton" id="PERIODE" onChange="this.form.action=this.options[this.selectedIndex].value;">
                      <option value="">--Pilih Periode--</option>
                      <option value="<?php echo site_url("load_ajax/index");  ?>"><?php foreach($periode_pertama as $periode_pertama){ ?><?php echo $periode_pertama["PERIODE"]; ?> <?php } ?></option>
                      <option value="<?php echo base_url("load_ajax/empatbelaskosongdua"); ?>"><?php foreach($periode_kedua as $periode_kedua){ ?> <?php echo $periode_kedua["PERIODE"]; ?> <?php } ?></option>
                      <option value="<?php echo base_url("load_ajax/get_limabelaskosongsatu"); ?>"><?php foreach($periode_ketiga as $periode_ketiga){ ?><?php echo $periode_ketiga["PERIODE"]; ?> <?php } ?></option>
                      </select>
                      </div>
                  </div>
            </div>
       <div class="col-md-1">
        <div class="form-group">
                <div class="col-md-6">
                  <button id="button" type="submit" disabled="disabled" class="btn btn-sm btn-default" />
                    <strong>Load Data</strong> <i class='icon ico-search'></i></button>