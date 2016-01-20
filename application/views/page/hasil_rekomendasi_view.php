<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Hasil Rekomendasi Siswa</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="etable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Nilai Rata Rata</th>
                        <th>Rekomendasi</th>
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
        "sAjaxSource": "/hasil_rekomendasi/get"
    });
    var doc = $('#etable');
    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/hasil_rekomendasi/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });

        }
    });
</script>
