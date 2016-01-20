<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Jurusan</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("master/save_jurusan")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Jurusan</label>
                        <input type="text" name="kode_jurusan" data-tag="input" class="form-control" placeholder="kode jurusan">
                        <input type="hidden" name="id" data-tag="input" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Jurusan</label>
                        <input type="text" name="jurusan" data-tag="input" class="form-control" placeholder="nama jurusan">
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
            <h3 class="box-title">Data Jurusan</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Kode</th>
                    <th>Jurusan</th>
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
        "sAjaxSource": "/master/get_jurusan"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/master/edit_jurusan","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/master/del_jurusan","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });
        }
    });
</script>
