<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Mata Pelajaran</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("master/save_mata_pelajaran")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Mata Pelajaran</label>
                        <input type="text" name="kd_mapel" data-tag="input" class="form-control" placeholder="kode mata pelajaran">
                        <input type="hidden" name="id" data-tag="input" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Inisial Mapel</label>
                        <input type="text" name="inisial_mapel" data-tag="input" class="form-control" placeholder="inisial mata pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" data-tag="input" class="form-control" placeholder="kode mata pelajaran">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Mata Pelajaran</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="etable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Inisial Mapel</th>
                        <th>Mata Pelajaran</th>
                        <th>Menu</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2" class="dataTables_empty">Loading data..</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var oTable = $('#etable').dataTable({
        "sAjaxSource": "/master/get_mata_pelajaran"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/master/edit_mata_pelajaran","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/master/del_mata_pelajaran","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });
        }
    });
</script>
