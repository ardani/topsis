<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Siswa</h3>
            </div>
            <?php echo isset($msg) ? $msg : "" ?>
            <form role="form" action="<?php echo  site_url("siswa/save")?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS</label>
                        <input type="text" name="nis" data-tag="input" class="form-control" placeholder="nis">
                        <input type="hidden" name="id" data-tag="input" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" name="nama_siswa" data-tag="input" class="form-control" placeholder="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">L/P</label>
                        <select data-tag="select" class="form-control" name="jenis_kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Agama</label>
                        <select data-tag="select" class="form-control" name="agama">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katholik">Katholik</option>
                            <option value="budha">Budha</option>
                            <option value="hindhu">Hindhu</option>
                            <option value="lain">Lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" name="alamat" data-tag="input" class="form-control" placeholder="alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" data-tag="input" class="form-control" placeholder="tempat lahir">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <input type="text" name="tgl_lahir" data-tag="input" class="form-control" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telp</label>
                        <input type="text" name="no_telp" data-tag="input" class="form-control" placeholder="no telp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Ayah</label>
                        <input type="text" name="nama_ayah" data-tag="input" class="form-control" placeholder="nama ayah">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Ibu</label>
                        <input type="text" name="nama_ibu" data-tag="input" class="form-control" placeholder="nama ibu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah" data-tag="input" class="form-control" placeholder="pekerjaan ayah">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pekerjaan Ibu</label>
                        <input type="text" name="pekerjaan_ibu" data-tag="input" class="form-control" placeholder="pekerjaan ibu">
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
            <h3 class="box-title">Data Siswa</h3>
        </div>
        <div class="box-body table-responsive">
           <table id="etable" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>L/P</th>
                    <th>Telp</th>
                    <th>Alamat</th>
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
        "sAjaxSource": "/siswa/get"
    });
    var doc =  $('#etable');
    doc.on('click','.edit',function(){
        var id = $(this).data('id');
        getdetail("/siswa/edit","id="+id);
    });

    doc.on('click','.delete',function(){
        var id = $(this).data('id');
        if(confirm("Anda yakin menghapus data ?")){
            getdelete("/siswa/delete","id="+id,function done_callback(){
                oTable.fnReloadAjax();
            });

        }
    });
</script>
