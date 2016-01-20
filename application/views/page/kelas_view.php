<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Kelas</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("kelas/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Kelas</label>
                        <input type="text" name="kd_kelas" data-tag="input" class="form-control" placeholder="kode kelas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kelas</label>
                        <input type="text" name="nama_kelas" data-tag="input" class="form-control" placeholder="nama kelas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jurusan</label>
                        <select name="kode_jurusan" class="form-control" data-tag="select">
                            <?php
                                foreach($jurusan as $row){
                                    echo "<option value='$row->kode_jurusan'>$row->jurusan</option>";
                                }
                            ?>
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
            <h3 class="box-title">Data Kelas</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Kode</th>
                    <th>Kelas</th>
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
        "sAjaxSource": "/kelas/get"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/kelas/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/kelas/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });

        }
    });
</script>
