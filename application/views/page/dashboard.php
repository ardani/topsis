<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo count_dashboard('siswa')?></h3>
                <p>Siswa baru</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo site_url('siswa'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo count_dashboard('guru')?></h3>
                <p>Guru</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo site_url('guru'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>0</h3>
                <p>Rekomendasi Siswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo site_url('rekomendasi_siswa'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia">
            <div class="inner">
                <h3><?php echo count_dashboard('kelas')?></h3>
                <p>Kelas</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios7-pricetag-outline"></i>
            </div>
            <a href="<?php echo site_url('kelas'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
            <div class="inner">
                <h3><?php echo count_dashboard('rombel')?></h3>
                <p>Rombel</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios7-people"></i>
            </div>
            <a href="<?php echo site_url('rombel'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>-</h3>
                <p>penilaian</p>
            </div>
            <div class="icon">
                <i class="ion ion-star"></i>
            </div>
            <a href="<?php echo site_url('penilaian'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
