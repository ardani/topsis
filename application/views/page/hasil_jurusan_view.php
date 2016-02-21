<div class="row">
    <div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Hasil Penjurusan Siswa</h3>
        </div>
        <?php echo isset($msg) ? $msg : "" ?>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
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
        "sAjaxSource": "/hasil_jurusan/get"
    });
</script>
