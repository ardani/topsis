<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Guru Walikelas</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("walikelas/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Guru</label>
                        <select name="guru_id" class="form-control">
                            <?php
                            foreach ($guru as $row) {
                                echo "<option value='$row->guru_id'>$row->nama_guru</option>";
                            }

                            ?>
                        </select>
                        <input type="hidden" name="id" data-tag="input" >
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
    <div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Data Walikelas</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Nama Guru</th>
                    <th>Nama Kelas</th>
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
        "sAjaxSource": "/walikelas/get"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/walikelas/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/walikelas/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });
        }
    });
</script>
