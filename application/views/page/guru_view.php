<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form guru</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("guru/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="text" name="nip" data-tag="input" class="form-control" placeholder="NIP">
                        <input type="hidden" name="guru_id" data-tag="input" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" name="nama_guru" data-tag="input" class="form-control" placeholder="nama">
                    </div><div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" name="alamat" data-tag="input" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telp</label>
                        <input type="text" name="no_telp" data-tag="input" class="form-control" placeholder="Telp">
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
            <h3 class="box-title">Data guru</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Nip</th>
                    <th>Nama Guru</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
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
<script type="text/javascript">
    var oTable = $('#etable').dataTable({
        "sAjaxSource": "/guru/get"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/guru/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/guru/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });
        }
    });
</script>
