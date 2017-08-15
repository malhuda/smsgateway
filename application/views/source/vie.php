<div class="col-md-6 col-sm-12 col-xs-12" id="NO_PERTANYAAN" style="display:none">
                               
                                <div class="x_panel">
                                <div class="x_title">
                                    <h2>PENYUSUNAN DATA PEMILIH BERDASARKAN HASIL SINGKRONISASI DP4</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                            
                          <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                            <label class="col-sm-3" for="name">Provinsi</label>
                               <div class="col-sm-6">  <span class="col-sm-12"><?= $this->widget_wilayah->get_propinsi(array('name' => 'NO_PROP', 'data_awal' => array('NO_PROP' => $NO_PROP, 'NO_KAB' => $NO_KAB), 'param' => '')) ?>
                                 </div></div></span>
                                 <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                                <label class="col-sm-3" for="name">Kabupaten </label>
                              <div class="col-sm-6">  <span class="col-sm-12"><?= $this->widget_wilayah->get_kabupaten(array('name' => 'NO_KAB', 'data_awal' => array('NO_PROP' => $NO_PROP, 'NO_KAB' => $NO_KAB), 'param' => '')) ?>
                               </div>
                               </div></span>
                                <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                                   <label class="col-sm-3" for="name">Tanggal </label>
                                  <div class="col-sm-9"> <span class="required"><?php echo form_error('TANGGAL'); ?></span>
                                  <span class="col-sm-8"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                                <input type="text" name="TANGGAL" class="form-control tcal" placeholder="DD/MM/YYYY" aria-describedby="inputSuccess2Status" value="<?php echo set_value('TANGGAL'); ?>" required="required">
                             </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                          <label class="col-sm-3" for="name">Permasalahan </label>
                         <div class="col-sm-9"> <span class="required"><?php echo form_error('PERMASALAHAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                           <textarea class="form-control" rows="6" name="PERMASALAHAN" value="<?php echo set_value('PERMASALAHAN'); ?>" required="required"></textarea>
                             </div></div> 
                              <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                              <label class="col-sm-3" for="name">Solusi </label>
                               <div class="col-sm-9"> <span class="required"><?php echo form_error('SOLUSI'); ?></span>
                              <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                              <textarea class="form-control" rows="6" name="SOLUSI" value="<?php echo set_value('SOLUSI'); ?>" required="required"></textarea>
                           </div></div>
                            <div class="line line-dashed b-b line-lg pull-in"></div><div class="form-group">
                             <label class="col-sm-3" for="name">Keterangan </label>
                              <div class="col-sm-9"> <span class="required"><?php echo form_error('KETERANGAN'); ?></span>
                           <span class="col-sm-12"><!-- <textarea class="resizable_textarea form-control" name="SOLUSI" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" value="NO_PERTANYAAN[<?php echo set_value('SOLUSI'); ?>" required>
                         </textarea> -->
                         <textarea class="form-control" rows="6" name="KETERANGAN" value="<?php echo set_value('KETERANGAN'); ?>" required="required"></textarea>
                        </div></div>
                          <div class="line line-dashed b-b line-lg pull-in"></div>
                           <div class="form-group">
                           <div class="col-sm-6 col-sm-offset-6">
                               <div class='paging'>   
                                                            
                                                                <select name="action" class="hidden">
                                                                      <option value="insert">SIMPAN</option>
                                                                </select> 
           
                          <button type="button" class='btn btn-default' href='javascript:void(0)' onclick='save_form_pilkada()'>Simpan</button>
<!--                          <a class='btn btn-primary' href='javascript:void(0)' onclick='document.formpilkada.reset()'>Reset</a>
 -->                        </div>
                         </div>
                      </div>
                  </form>
                 </div>
                </div>
