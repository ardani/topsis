<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Rombel</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("rombel/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Rombel</label>
                       <input type="text" class="form-control" name="nama_rombel" data-tag="input">
                        <input type="hidden" name="id" data-tag="input" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tingkat</label>
                        <select name="tingkat" class="form-control" data-tag="select">
                            <?php
                            $tingkat = array(
                                "I" => "I",
                                "II" => "II",
                                "III" => "III"
                            );
                            foreach ($tingkat as $row) {
                                echo "<option value='$row'>$row</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kelas</label>
                        <select name="kd_kelas" class="form-control" data-tag="select">
                            <?php
                            foreach ($kelas as $row) {
                                echo "<option value='$row->kd_kelas'>$row->nama_kelas</option>";
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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Rombel</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="etable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nama Rombel</th>
                        <th>Nama Kelas</th>
                        <th>Tingkat</th>
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
        "sAjaxSource": "/rombel/get"
    });
    ;

    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/rombel/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/rombel/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });
        }
    });
</script>
