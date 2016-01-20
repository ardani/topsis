<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Siswa</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="esiswa" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Siswa Rombel</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="etable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
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
        "sAjaxSource": "/rombel/data_siswa_rombel",
        "fnServerParams": function ( aoData ) {
            aoData.push( { "name": "rombel_id", "value": "<?php echo $rombel_id; ?>" } );
        }
    });

    var oSiswa = $('#esiswa').dataTable({
        "sAjaxSource": "/rombel/siswa"
    });

    var doc =  $('#etable');
    var siswa =  $('#esiswa');
    siswa.on('click','.add',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menambahkan data ?")){
            postdata("/rombel/add_siswa_rombel","id="+id+"&rombel_id="+<?php echo $rombel_id; ?>,function done_callback(){
                oTable.fnReloadAjax();
                oSiswa.fnReloadAjax();
                console.log("add");
            });
        }
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data siswa rombel ?")){
             postdata("/rombel/delete_siswa_rombel","id="+id,function done_callback(data){
                 oTable.fnReloadAjax();
                 oSiswa.fnReloadAjax();
                 console.log('remove');
            });
        }
    });
</script>
