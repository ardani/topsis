<div class="row">
    <div class="col-md-3">
        <?php
		$msg = $this->input->get('msg');
        if(!empty($msg)){
            echo setpesan('success','Nilai Berhasil disimpan');
        }
        ?>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Pilih Kelas</h3>
            </div>
            <form role="form" action="<?php echo  site_url("penilaian/siswa/getkelas")?>" method="get">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mata Pelajaran</label>
                        <input type="hidden" name="mapel" value="<?php echo $mata_pelajaran->mjurid ?>">
                        <input type="text" class="form-control" readonly="readonly" value="<?php echo $mata_pelajaran->kode_jurusan." ".$mata_pelajaran->nama_mapel ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Guru</label>
                        <input type="hidden" name="guru" value="<?php echo $guru_id ?>">
                        <input type="text" readonly="readonly" class="form-control" value="<?php echo $guru->nama_guru ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Rombel</label>
                        <select name="rombel_id" class="form-control">
                            <?php
                            foreach ($rombel as $row) {
                                if($row->id == $rombel_post){
                                    echo "<option selected value='$row->id'>$row->nama_rombel</option>";
                                }else{
                                    echo "<option value='$row->id'>$row->nama_rombel</option>";
                                }

                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">PILIH</button>
                </div>
            </form>
        </div>
    </div>

    <?php if(!empty($rombel_post)){
        $data = $this->rombel->data_siswa_rombel($rombel_post);
        $nilai = $this->penilaian->get($kd_mapel_jurusan);
    ?>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Nilai Siswa</h3>
            </div>
      <form method="post" action="<?php echo  site_url("penilaian/siswa/simpan")?>">
          <input type="hidden" name="kd_mapel_jurusan" value="<?php echo $kd_mapel_jurusan?>">
          <input type="hidden" name="guru_id" value="<?php echo $guru_id?>">
      <table class="table table-bordered">
          <thead>
            <tr>
                <td width="5%">NIS</td>
                <td>Nama Siswa</td>
                <td width="5%">UH</td>
                <td width="5%">UTS</td>
                <td width="5%">US</td>
                <td width="10%">Kepribadian</td>
                <td width="10%">Kedisiplinan</td>
                <td width="10%">Kerapian</td>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($data as $row) {
              echo "<tr>
                <td>$row->nis</td>
                <td>$row->nama_siswa</td>
                <td><input type='text' name='nilai[$row->nis][uh]' class='form-control' value='".check_exist_value($row->nis,$nilai,'UH')."'></td>
                <td><input type='text' name='nilai[$row->nis][uts]' class='form-control' value='".check_exist_value($row->nis,$nilai,'UTS')."'></td>
                <td><input type='text' name='nilai[$row->nis][us]' class='form-control' value='".check_exist_value($row->nis,$nilai,'US')."'></td>
                <td><input type='text' name='nilai[$row->nis][kepribadian]' class='form-control' value='".check_exist_letter($row->nis,$nilai,'kepribadian')."'></td>
                <td><input type='text' name='nilai[$row->nis][kedisiplinan]' class='form-control' value='".check_exist_letter($row->nis,$nilai,'kedisiplinan')."'></td>
                <td><input type='text' name='nilai[$row->nis][kerapian]' class='form-control' value='".check_exist_letter($row->nis,$nilai,'kerapian')."'></td>
             </tr>";
          }
          ?>
          </tbody>
      </table>
        <button type="submit" class="btn btn-success">SIMPAN</button>
      </form>
        </div>
    </div>
    <?php } ?>

</div>
