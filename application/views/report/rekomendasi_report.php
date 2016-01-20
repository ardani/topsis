<html>
<head>
    <title>Surat Rekomendasi</title>
    <link href="<?php echo base_url()?>asset/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>asset/css/cetak.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="pagewrap">
    <header>
            <h3>PEMERINTAH KABUPATEN KARANGANYAR</h3>
            <h3>DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA </h3>
            <h4>SMA NEGERI KEBAKKRAMAT</h4>
            <h4>TERAKREDITASI : A</h4>
            <p>Alamat: Dk.Nayan, Nangsri, Kebakkramat, Karanganyar Telp. (0271) 654881 kode pos 57762</p>
    </header>
    <section id="middle">
    <p class="title-content">SURAT REKOMENDASI</p>
        Assalamualikum Wr.Wb <br>
        <br>
        Yang bertanda tangan di bawah ini <br>
        <div class="info">
        <span class="label">Nama</span>: Sobirin M.Pd<br>
        <span class="label">Jabatan</span>: Kepala Sekolah<br>
        </div>
        <br>
        <?php
            if($status == 'Y'){
                echo 'Memberikan rekomendasi kepada nama yang tercantum di bawah ini:';
            }else{
                echo 'Tidak dapat memberikan rekomendasi kepada nama yang tercantum di bawah ini:';
            }

        ?>
        <br>
        <div class="info">
        <span class="label">Nama</span>: <?=$nama_siswa;?><br>
        <span class="label">NIS</span>: <?=$nis;?><br>
        <span class="label">Nilai Rata</span>: <?=$rata;?> <br>
        </div>
        <br>
        <?php
            if($status == 'Y') {
                echo '<p>Untuk menjadi mahasiswa Universitas Sebelas Maret Surakarta jenjang
            Strata Satu .Demikian Surat ini di buat untuk di gunakan sebagai mana mestinya.</p>';
            }else{
                echo '<p>Demikian Surat ini di buat untuk di gunakan sebagai mana mestinya.</p>';
            }
        ?>

        Wassalamualikum Wr. Wb
        <br><br>
        Surakarta, <?=date("d F Y")?> <br>
        Kepala SMA NEGERI KEBAKKRAMAT
        <br>
        <br>
        <br>
        ( Sobirin. Mpd )
    </section>
    <footer>
        <h4>Dicetak oleh</h4>
        <p>Aplikasi Rekomendasi Perguruan Tinggi. &copy; 2015</p>
    </footer>
</div>
</body>
</html>
