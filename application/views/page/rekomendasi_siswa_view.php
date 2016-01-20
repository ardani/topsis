<div class="row">
    <div class="col-md-12">
<?php
$mapels = $mapel_jurusan->num_rows();
if (!$rombel || $mapels == 0)  {
    echo setpesan('error',"mapel jurusan atau rombel tingkat akhir tidak dapat ditemukan");
}else{
    $arr_rombel_id = array();
    foreach ($rombel as $row) {
        $arr_rombel_id[] = $row->id;
    }
   $data_siswa = $this->siswa->siswa_tingkat_akhir($arr_rombel_id,$jurusan);
    ?>
    <?php
	$msg = $this->input->get('msg');
    if(!empty($msg)){
        echo setpesan('success','Rekomendasi Berhasil disimpan');
    }
    ?>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Siswa Calon Rekomendasi</h3>
        </div>

    <div class="box-body scroll" style="overflow: auto;overflow-y: hidden;
    width:100%;">
    <form action="<?php echo site_url("rekomendasi_siswa/olah_nilai")?>" method="post">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th rowspan="2" class="text-center">NIS</th>
                <th rowspan="2" class="text-center">Nama Siswa</th>
                <?php
                $dmapel = $mapel_jurusan->result();
                foreach($dmapel as $mapel){
                    echo "<th colspan='6' class='text-center'>$mapel->nama_mapel</th>";
                }
                ?>
                <td rowspan="2">Rata</td>
            </tr>
            <tr>
                <?php
                foreach($dmapel as $mapel) {
                    $no = 1;
                    foreach ($semester as $row) {
                        echo "<td>S$no</td>";
                        $no++;
                    }
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
           foreach ($data_siswa as $siswa) {
            echo "<td>$siswa->nis</td><td>$siswa->nama_siswa</td>";
                $array_nilai = array();
                foreach($dmapel as $row1){
                    foreach ($semester as $row2) {
                        $nilai = $this->penilaian->get_nilai_semester_mapel($siswa->nis,$row2,$row1->mjurid);
                        $array_nilai[] = $nilai;
                        $temp_nilai[$siswa->nis][]= array(
                            "semester" => $row2,
                            "kd_jur_id" => $row1->mjurid,
                            "nilai" => $nilai,
                            "mapel" => $row1->inisial_mapel
                        );
                        echo "<td>".$nilai."</td>";
                    }
                }

                $array_siswa[$siswa->nis]['nilai'] = $temp_nilai[$siswa->nis];
                $array_siswa[$siswa->nis]['nis'] = $siswa->nis;
                $array_siswa[$siswa->nis]['siswa'] = $siswa->nama_siswa;
                $array_siswa[$siswa->nis]['rata'] = round(array_sum($array_nilai)/count($array_nilai),2);

                

                echo "<td>".$array_siswa[$siswa->nis]['rata']."</td>";
                echo  "</tr>";


            }
            ?>
            </tbody>
        </table>

        <input type="hidden" name="nilai" value="<?php echo base64_encode(json_encode($array_siswa));?>">
        <input type="hidden" name="jurusan" value="<?php echo $jurusan;?>">
        <br>
        <button type="submit" class="btn btn-success">OLAH NILAI</button>
    </form>
</div>
</div>
</div>
    <?php }?>
</div>
