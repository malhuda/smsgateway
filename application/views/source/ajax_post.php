       <script>
    $(document).ready(function(){
        $("#myModal").submit(function(e){
            e.preventDefault();
            var NIK = $("input#NIK").val();;
            var NIK_U = $("input#NIK_U").val();;
            var NAMA_LGKP_U= $("input#NAMA_LGKP_U").val();
            var TMPT_LHR_U= $("input#TMPT_LHR_U").val();
            var TGL_LHR_U= $("input#TGL_LHR_U").val();
            var REFERENSI= $("input#REFERENSI").val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>load_ajax/ajax_update_201501/<?php echo $data["NIK"]; ?>',
                data: {NIK:NIK,NIK_U:NIK_U,NAMA_LGKP_U:NAMA_LGKP_U,TMPT_LHR_U:TMPT_LHR_U,TGL_LHR_U:TGL_LHR_U,REFERENSI:REFERENSI},
                success:function(data)
                {
                    alert('DATA BERHASIL DIRUBAH!!');
                },
                error:function()
                {
                    alert('DATA GAGAL DIRUBAH');
                }
            });
        });
    });
</script>
<form id="myModal" class="panel panel-default form-horizontal form-bordered" method="post" enctype="multipart/form-data">
 
      <input name="NIK_U" type="text" class="form-control" id="NIK_U" value="<?php echo $data["NIK_U"]; ?>" >
                                 
                            </form>
                                  <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Anda Yakin Akan Mengupdate Data Ini ?" class="btn btn-default" >UPDATE <i class="glyphicon glyphicon-pencil"></i></button>
                                