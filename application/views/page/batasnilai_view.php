<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Batas Nilai</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo site_url("batasnilai/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kritaeria</label>
                        <select class="form-control" data-tag="select" name="kode_kriteria">
                            <?php foreach($kriterias->result() as $item): ?>
                                <option value="<?=$item->kode_kriteria?>"><?=$item->nama_kriteria?></option>
                            <?php endforeach ?>
                        </select>
                        <input type="hidden" name="id_batas_nilai" data-tag="input" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Variable</label>
                        <select class="form-control" data-tag="select" name="variable">
                            <?php foreach($variable as $item): ?>
                                <option value="<?=$item?>"><?=$item?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nilai Awal</label>
                        <input type="text" name="nilai_awal" data-tag="input" class="form-control" placeholder="nilai awal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nilai Akhir</label>
                        <input type="text" name="nilai_akhir" data-tag="input" class="form-control" placeholder="nilai akhir">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Low</label>
                        <input type="text" name="l" data-tag="input" class="form-control" placeholder="nilai low">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mid</label>
                        <input type="text" name="m" data-tag="input" class="form-control" placeholder="nilai mid">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">High</label>
                        <input type="text" name="h" data-tag="input" class="form-control" placeholder="nilai high">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Data Batas Nilai</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Variable</th>
                    <th>Nilai Awal</th>
                    <th>Nilai Akhir</th>
                    <th>Low</th>
                    <th>Mid</th>
                    <th>High</th>
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
        "sAjaxSource": "/batasnilai/get",
        "order": [[ 0, 'asc' ], [ 2, 'asc' ]]
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/batasnilai/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/batasnilai/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });
        }
    });
</script>
