 <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="table-layout animation delay animating fadeInDown">
                                    <div class="col-xs-3 panel bgcolor-info text-center">
                                        <div class="ico-users3 fsize24"></div>
                                    </div>
                                   <div class="col-xs-10 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm"><?php
                                                    $ip = $_SERVER['REMOTE_ADDR'];
                                                    ?> <?php echo $ip; ?></h4>
                                            <p class="semibold text-muted mb0 mt5 ellipsis">Ip address</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="table-layout animation delay animating fadeInUp">
                                    <div class="col-xs-3 panel bgcolor-danger text-center">
                                        <div class="ico-globe fsize24"></div>
                                    </div>
                                    <div class="col-xs-10 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm"><?php echo $agent;
                                                                      ?></h4>
                                            <p class="semibold text-muted mb0 mt5 ellipsis">Browser   </p>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="col-sm-2">
                                <div class="table-layout animation delay animating fadeInUp">
                                    <div class="col-xs-3 panel bgcolor-warning text-center">
                                        <div class="ico-crown fsize24"></div>
                                    </div>
                                   <div class="col-xs-10 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm"><?php
                                            echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?></h4>
                                            <p class="semibold text-muted mb0 mt5 ellipsis">Computer</p>
                                        </div>
                                    </div>
                                </div>
                            </div><div class="col-sm-2">
                                <div class="table-layout animation delay animating fadeInUp">
                                    <div class="col-xs-3 panel bgcolor-teal text-center">
                                        <div class="ico-crown fsize24"></div>
                                    </div>
                                     <div class="col-xs-10 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm"><?php
                                 echo  $this->agent->platform(); ?></h4>
                                            <p class="semibold text-muted mb0 mt5 ellipsis">OS</p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                 <div class="table-layout animation delay animating fadeInDown">
                                    <div class="col-xs-3 panel bgcolor-primary text-center">
                                        <div class="ico-box-add fsize24"></div>
                                    </div>
                                    <div class="col-xs-10 panel">
                                        <div class="panel-body text-center">
                                            <h4 class="semibold nm">Tidak Diketahui</h4>
                                            <p class="semibold text-muted mb0 mt5 ellipsis"> Status Login</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                 <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                 <h3 class="panel-title"><i class="ico-info"></i> Panduan Aplikasi.</h3>
                                <div class="panel-toolbar text-right">
                                    <div class="option">
                                        <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                                        <button class="btn" data-toggle="panelremove" data-parent=".col-md-6"><i class="remove"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-collapse pull out">
                                <div class="panel-body">
                                    <div class="panel-body">
                                        <p>NOMOR SMS GATEWAY <font color="red">081210997334</font></p>
                                         <p>Berdampak pada pesatnya pertumbuhan data penduduk di Indonesia berdasarakan daerah provinsi ,kabupaten ,kecamatan ,dan kelurahan ,sehingga menimbulkan permasalahan-permasalahan yang sangat signifikan ,terutama untuk pemrosesan komunikasi yang realtime antar ADB Nasional dan tim teknis PDAK .
                                                  <p>Sistem ini diperuntukkan untuk menerima sms,konfirmasi password DMP ,serta membackup kebutuhan yang meliputi interaksi dengan Server FTP .
                                                 </br>
                                                    Dalam program ini dapat diperoleh informasi kependudukan seperti informasi contact person ADB Nasional ,broadcast system pesan secara realtime dan generate laporan ke dalam berbagai bentuk file secara live.</code>
                                                </p> 
                                              </br>
                                            </div><div class="col-md-12">      
                                     <div class="panel panel-info">
                                          <div class="panel-heading">
                                         <h3 class="panel-title ellipsis"><i class="ico-chrome mr5"></i>Keterangan Sms Gateway</h3>
                                    </div>
                                    <div class="table-responsive panel-collapse pull out">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>STATUS PENGIRIMAN SMS</th>
                                                    <th>STATUS PENERIMAAN SMS</th>
                                                    <th>PESAN TERKIRIM</th>
                                                    <th>PESAN DITERIMA</th>
                                                    <th>CLIENT </th>
                                                    <th>LAST TRANSAKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php foreach($status_koneksi_gammunya as $Send){ ?><?php echo strtoupper($Send["Send"]); ?> <?php }?></td>
                                                    <td><?php foreach($status_koneksi_gammunya as $Receive){ ?><?php echo strtoupper($Receive["Receive"]); ?> <?php }?></td>
                                                    <td><?php foreach($status_koneksi_gammunya as $Send){ ?><?php echo $Receive["Sent"]; ?> <?php }?></td>
                                                    <td><?php foreach($status_koneksi_gammunya as $Receive){ ?><?php echo $Receive["Received"]; ?> <?php }?></td>
                                                    <td><?php foreach($status_koneksi_gammunya as $client){ ?><?php echo strtoupper($client["Client"]); ?> <?php }?></td>
                                                     <td><?php foreach($status_koneksi_gammunya as $TimeOut){ ?><?php echo strtoupper($TimeOut["TimeOut"]); ?> <?php }?></td>
                                                         </tr>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="panel-heading"><h5 class="panel-title"><i class="ico-health mr5"></i>Latest Activity</h5></div>
                        
                                    <div class="panel-collapse pull out">
                                        <div class="panel-body">
                                           <ul class="media-list media-list-feed nm">
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-pencil bgcolor-danger"></i>
                                    </div> 
                                    <div id="henti">
                                    <div class="media-body">
                                        <p class="media-heading">STATUS INTEGRASI MODEM</p>
                                        <p class="media-text"><span class="text-danger semibold">GAMMU :</span>
                                        
                                <script>
                                     $(document).ready(function(){
                                          $("#jalankan_service").submit(function(e){
                                        e.preventDefault();
                                        var aktifkan= $("input#aktifkan").val();
                                        $.ajax({
                                            type: "POST",
                                            url: '<?php echo base_url() ?>index/aktifkan_gammu',
                                            data: {aktifkan:aktifkan},
                                            success:function(data)
                                            {
                                                alert('SERVICE GAMMU BERHASIL DIAKTIFKAN');
                                                var url = '<?php echo base_url() ?>index/load_page';  
                                                $('#henti').load(url + ' #henti'); 
                                            },
                                            error:function()
                                            {
                                                alert('SERVICE GAMMU GAGAL DIAKTIFKAN');
                                                var url = '<?php echo base_url() ?>index/load_page';  
                                                $('#henti').load(url + ' #henti'); 
                                            }
                                        });
                                     });
                                   });
                                </script>
                                <script>
                                     $(document).ready(function(){
                                          $("#hentikan_service").submit(function(e){
                                        e.preventDefault();
                                        var hentikan= $("input#hentikan").val();
                                        $.ajax({
                                            type: "POST",
                                            url: '<?php echo base_url() ?>index/stop_gammu',
                                            data: {hentikan:hentikan},
                                            success:function(data)
                                            {
                                                alert('SERVICE GAMMU BERHASIL DIHENTIKAN');
                                                var url = '<?php echo base_url() ?>index/load_page';  
                                                $('#henti').load(url + ' #henti'); 
                                               
                                            },
                                            error:function()
                                            {
                                                alert('SERVICE GAMMU GAGAL DIHENTIKAN');
                                                var url = '<?php echo base_url() ?>index/load_page';  
                                                $('#henti').load(url + ' #henti'); 
                                            }
                                        });
                                     });
                                   });
                                </script>
                                 <script>
                                     $(document).ready(function(){
                                          $("#cekpulsa").submit(function(e){
                                        e.preventDefault();
                                        var pulsa= $("input#pulsa").val();
                                        $.ajax({
                                            type: "POST",
                                            url: '<?php echo base_url() ?>index/cek_pulsa_modemnya',
                                            data: {cek_pulsa:pulsa},
                                            success:function(data)
                                            {
                                                var url = '<?php echo base_url() ?>index/load_page';  
                                                $('#cek_pulsa_modemnya').load(url + ' #cek_pulsa_modemnya'); 
                                               
                                            },
                                            error:function()
                                            {
                                                 alert('MEMERIKSA PULSA MODEM');
                                                var url = '<?php echo base_url() ?>index/load_page';  
                                                $('#cek_pulsa_modemnya').load(url + ' #cek_pulsa_modemnya'); 
                                            }
                                        });
                                     });
                                   });
                                </script>
                                        <?php
                                        passthru("net start > service.log");
                                        $handle = fopen("service.log", "r");
                                        $status = 0;
                                        while (!feof($handle))
                                        {
                                            $baristeks = fgets($handle);
                                            if (substr_count($baristeks, 'Gammu SMSD Service (GammuSMSD)') > 0)
                                            {
                                                $status = 1;
                                            }
                                        }
                                        fclose($handle);
                                        ?>
                                        <?php
                                        if($status == 1)
                                        {
                                         echo '<span class="text-primary semibold"> Connection Success</span>
                                            <form id="hentikan_service" method="post" action='.base_url().'program/stop_gammu>
                                            <input id="hentikan" type="submit" name="hentikan" class="btn btn-danger disabled" name="submit" value="STOP SERVICE GAMMU">
                                            </form>
                                        </span></br>
                                        <!-- <form id="cekpulsa" method="post" action='.base_url().'program/cek_pulsa_modemnya>
                                             <input id="pulsa" type="submit" name="pulsa" class="btn btn-primary disabled" name="submit" value="CEK PULSA">
                                            </form>-->
                                        ';
                                         ?> 



                                         <?php 
                                            }
                                            elseif($status == 0){
                                                 echo '<span class="text-danger semibold"> Connection Failed 
                                                 <form id="jalankan_service" method="post" action='.base_url().'program/aktifkan_gammu>
                                                 <input id="aktifkan" type="submit" name="aktifkan" class="btn btn-success disabled" name="submit" value="START SERVICE GAMMU">
                                                 </form>
                                             </span>
                                             </br>
                                         <!--<form id="cekpulsa" method="post" action='.base_url().'program/cek_pulsa_modemnya>
                                             <input id="pulsa" type="submit" name="pulsa" class="btn btn-primary disabled" name="submit" value="CEK PULSA">
                                            </form>-->';
                                             } 
                                         ?>.

                                           
                                     </p>
                                        <p class="media-meta">Just Now</p>
                                    </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-file-plus bgcolor-teal"></i>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading">IMEI MODEM</p>
                                        <p class="media-text"><span class="text-danger semibold">IMEI :</span><span class="text-primary semibold">
                                            <?php foreach($status_koneksi_gammunya as $gammu){ ?><?php echo $gammu["IMEI"]; ?> </span><?php } ?></p>
                                       <p class="media-meta">TIME OUT : <?php foreach($status_koneksi_gammunya as $TimeOut){ ?><?php echo $TimeOut["TimeOut"]; ?> <?php } ?></p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-upload22 bgcolor-info"></i>
                                    </div>
                                    <div class="media-body">
                                         <p class="media-heading">LAST UPDATE</p>
                                        <p class="media-text"><span class="text-danger semibold">DATE :</span><span class="text-primary semibold">
                                            <?php foreach($status_koneksi_gammunya as $last_update){ ?><?php echo $last_update["UpdatedInDB"]; ?> </span><?php } ?></p>
                                       <p class="media-meta">TIME OUT : <?php foreach($status_koneksi_gammunya as $TimeOut){ ?><?php echo $TimeOut["TimeOut"]; ?> <?php } ?></p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                        <i class="ico-upload22 bgcolor-warning"></i>
                                    </div>
                                    <div class="media-body">
                                         <p class="media-heading">TRAFFIC SIGNAL</p>
                                        <p class="media-text"><span class="text-danger semibold">SIGNAL :</span><span class="text-primary semibold">
                                            <?php foreach($status_koneksi_gammunya as $signal_modem){ ?><?php echo $signal_modem["Signal"]; ?> %</span><?php } ?></p>
                                       <p class="media-meta">TIME OUT : <?php foreach($status_koneksi_gammunya as $TimeOut){ ?><?php echo $TimeOut["TimeOut"]; ?> <?php } ?></p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-object pull-left">
                                    </div>
                                   <script>
                                  function reload() {
                                      location.reload();
                                  }
                                  </script>
                                         <div class="media-body">
                                            <a onclick="reload()" id="reload" class="media-heading text-primary "><button class="btn btn-default"><font color="red"><strong><code>REFRESH  <i class="ico-loop4"></i></code></strong></font></button></a>
                                                </div>
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-lg-12">
                               
<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Menu Disabled ,Anda Belum Login.</h4>
        </div>
        <div class="modal-body">
          <p>Maaf demi alasan keamanan ,semua fitur aplikasi di nonaktifkan ,
            Anda perlu <a href="<?php echo base_url(); ?>program" ><font color="gray"><i><strong>Login</strong></i></font></a> 
            untuk menggunakan program ini ,silahkan hubungi administrator/tim teknis PDAK ,terimakasih.</p>
        </div>
        <div class="modal-footer btn-default">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
$(window).load(function()
{
    $('#myModal').modal('show');
});
</script>