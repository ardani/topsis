<div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Pilih Mata pelajaran dan Guru</h3>
            </div>

            <form role="form" action="<?php echo  site_url("penilaian/siswa")?>" method="get">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mata Pelajaran Jurusan</label>
                        <select name="mapel" class="form-control cbmapel">
                            <?php
                            foreach ($mata_pelajaran as $row) {
                                echo "<option value='$row->mjurid'>$row->kode_jurusan $row->nama_mapel</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Guru</label>
                        <select id="guru" name="guru" class="form-control">
                            <?php
/*                            foreach ($guru as $row) {
                                echo "<option value='$row->nip'>$row->nama_guru</option>";
                            }

                            */?>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">PILIH</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var cbmapel = $('.cbmapel');
    cbmapel.change(function(){
        var id  = $(this).val();
        $.ajax({
            url : " <?php echo base_url('penilaian/get_guru_mapel')?>",
            type: "post", //form method
            data: "mapel_jur_id="+id
         }).done(function( data ) {
            $("#guru").html(data);
        });
       //console.log();
    });
</script>
