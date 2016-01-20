<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>1. Data Dasar</span>
        <i class="fa pull-right fa-angle-left"></i>
    </a>
    <ul class="treeview-menu" style="display: none;">
        <li><a href="<?php echo site_url("tahun_ajaran") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>1.1 Tahun Ajaran</a>
        </li>
        <li><a href="<?php echo site_url("master/jurusan") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>1.2 Jurusan</a>
        </li>
        <li><a href="<?php echo site_url("master/mata_pelajaran") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>1.3 Mata Pelajaran</a>
        </li>

        <li><a href="<?php echo site_url("mapel_jurusan") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>1.4 Mapel Jurusan</a>
        </li>
        <li><a href="<?php echo site_url("kkm") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>1.5 Mapel KKM</a>
        </li>
        <li><a href="<?php echo site_url("kelas") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>1.6 Kelas</a>
        </li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>2. Data Guru</span>
        <i class="fa pull-right fa-angle-left"></i>
    </a>
    <ul class="treeview-menu" style="display: none;">

        <li><a href="<?php echo site_url("guru") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>2.1 Data Identitas Guru</a>
        </li>
        <li><a href="<?php echo site_url("guru_mengajar") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>2.2 Guru Mengajar</a>
        </li>
        <li><a href="<?php echo site_url("walikelas") ?>" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>2.3 Guru Walikelas</a>
        </li>

    </ul>
</li>
<li>
    <a href="<?php echo site_url("siswa")?>">
        <i class="fa fa-dashboard"></i> <span>3. Siswa</span>
    </a>
</li>
<li>
    <a href="<?php echo site_url("rombel")?>">
        <i class="fa fa-dashboard"></i> <span>4. Rombongan Belajar</span>
    </a>
</li>
<li>
    <a href="<?php echo site_url("penilaian")?>">
        <i class="fa fa-dashboard"></i> <span>5. Penilaian</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>6. Rekomendasi Siswa</span>
        <i class="fa pull-right fa-angle-left"></i>
    </a>
    <ul class="treeview-menu" style="display: none;">
        <?php
        $kode_jurusan = $this->jurusan->get()->result();
        foreach ($kode_jurusan as $row) {
            echo '
                <li><a href="'.site_url("rekomendasi_siswa?jurusan=".$row->kode_jurusan).'" style="margin-left: 10px;">
                <i class="fa fa-angle-double-right"></i>'.$row->jurusan.'</a>
        </li>
            ';
        }
        ?>
    </ul>
</li>
<li>
    <a href="<?php echo site_url("hasil_rekomendasi")?>">
        <i class="fa fa-dashboard"></i> <span>7. Hasil Rekomendasi</span>
    </a>
</li>
<li>
    <a href="<?php echo site_url("hasil_tidak_rekomendasi")?>">
        <i class="fa fa-dashboard"></i> <span>8. Hasil Tidak Rekomendasi</span>
    </a>
</li>

