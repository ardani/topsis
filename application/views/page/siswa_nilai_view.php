<div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Data Nilai Siswa</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Nilai Siswa</th>
                    <th>Menu</th>
                </tr>
               </thead>
               <tbody>
               <tr>
                   <td colspan="5" class="dataTables_empty">Loading data..</td>
               </tr>
               </tbody>
           </table>
        </div>
    </div>
    </div>
</div>
<div class="row">
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Form Siswa</h3>
        </div>
        <?php echo isset($msg) ? $msg : "" ?>
        <form role="form" action="<?php echo  site_url("nilaisiswa/save")?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nilai Siswa</label>
                    <select name="nis" class="form-control nis" data-tag="select">
                        <?php foreach($siswas->result() as $siswa): ?>
                            <option value="<?=$siswa->nis?>"><?=$siswa->nama_siswa?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="id_nilai" class="id_nilai" data-tag="input" >
                </div>
                <?php foreach ($kriterias->result() as $item ):?>
                    <div class="form-group">
                        <label for=""><?=$item->nama_kriteria?></label>
                        <?php if($item->kode_kriteria == "C4"): ?>
                            <select name="nilai[<?=$item->kode_kriteria?>]" class="<?=$item->kode_kriteria?> form-control" data-tag="select">
                                <option value="1">IPA</option>
                                <option value="2">IPS</option>
                            </select>
                        <?php else: ?>
                            <input type="text" name="nilai[<?=$item->kode_kriteria?>]" data-tag="input" class="<?=$item->kode_kriteria?> form-control">
                        <?php endif ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
    </div>
<script type="text/javascript">
    var oTable = $('#etable').dataTable({
        "sAjaxSource": "/nilaisiswa/get"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "/nilaisiswa/edit",
            dataType: 'json',
            data:"id="+id,
            success: function(data) {
                jQuery.each(data, function(i, val) {

                    setvaleditclass(i,val);
                });
            }
        });

    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/nilaisiswa/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });

        }
    });

    function setvaleditclass(selector,value){
        var elem = $('.'+selector).data('tag');
        if(elem == "input"){
            $('.'+selector).val(value);
            console.log("select "+elem+" value "+value);
        }else if(elem == 'select'){
            $('.'+selector+' option[value="'+String(value)+'"]').prop("selected",true);
        }
    }
</script>
