<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Mata Pelajaran Jurusan</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("mapel_jurusan/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mata Pelajaran</label>
                        <input type="hidden" name="id" data-tag="input">
                        <select name="kd_mapel" class="form-control" data-tag="select">
                            <?php
                            foreach ($kode_mata_pelajaran as $row) {
                                echo "<option value='$row->kd_mapel'>$row->nama_mapel</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jurusan</label>
                        <select name="kode_jurusan" class="form-control" data-tag="select">
                            <?php
                            foreach ($kode_jurusan as $row) {
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
                <h3 class="box-title">Data guru</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="etable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Nama Mapel</th>
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
        "sAjaxSource": "/mapel_jurusan/get"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/mapel_jurusan/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/mapel_jurusan/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });

        }
    });
</script>
