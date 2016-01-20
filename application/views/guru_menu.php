<?php

$guru = guru_mapel();
$userid = $this->session->userdata('userid');
if($guru){
?>
<li>
    <a href="<?php echo site_url("penilaian/siswa?mapel=$guru->kd_mapel&guru=".$userid)?>">
        <i class="fa fa-dashboard"></i> <span>1. Penilaian</span>
    </a>
</li>
<?php }?>