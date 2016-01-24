<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Tahun Ajaran</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("tahun_ajaran/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Tahun Ajaran</label>
                        <input type="text" name="kode_tahun_ajaran" data-tag="input" class="form-control" placeholder="kode tahun ajaran">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Tahun Ajaran</label>
                        <input type="text" name="nama_tahun_ajaran" data-tag="input" class="form-control" placeholder="nama tahun ajaran">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Status</label>
                        <select name="status" class="form-control" data-tag="select">
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
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
            <h3 class="box-title">Data Tahun Ajaran</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tahun Ajaran</th>
                    <th>Status</th>
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
        "sAjaxSource": "/tahun_ajaran/get"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/tahun_ajaran/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/tahun_ajaran/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });
        }
    });
</script>
