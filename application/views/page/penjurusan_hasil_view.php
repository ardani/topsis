<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Metode Perhitungan Penjurusan</h3>
            </div>
            <div class="box-body" 
                <?php if($debug): ?>
                <h4>Bobot Kriteria</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <?php foreach($kriteria as $row ):?>
                                <th><?=$row['nama_kriteria']?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($bobot as $row ):?>
                                <td><?=$row ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
                <h4>Pembagi</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <?php foreach($kriteria as $row ):?>
                            <th><?=$row['nama_kriteria']?></th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php foreach($pembagi as $row ):?>
                            <td><?=$row ?></td>
                        <?php endforeach; ?>
                    </tr>
                    </tbody>
                </table>
                <h4>Nilai  A+ A- </h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Tipe</th>
                        <?php foreach($kriteria as $row ):?>
                            <th><?=$row['nama_kriteria']?></th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Max</td>
                        <?php foreach($max as $row ):?>
                            <td><?=$row ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>Min</td>
                        <?php foreach($min as $row ):?>
                            <td><?=$row ?></td>
                        <?php endforeach; ?>
                    </tr>
                    </tbody>
                </table>
                <?php endif ?>
                <div class="scroll" style="overflow:auto;">
                <h4>Hasil Penjurusan Siswa </h4>
                <form method="post" action="<?=site_url('penjurusan/save')?>">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="100px">NIS</th>
                                <th width="10%">Nama</th>
                                <?php
                                    if($debug) {
                                        echo "<th width='5%'>Nilai</th>";
                                        echo "<th>Konversi</th>";
                                        echo "<th>Normalisasi Matrik</th>";
                                        echo "<th>Matrik Bobot</th>";
                                    }
                                ?>
                                <th>Preferensi</th>
                                <th>Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($siswas as $row):?>
                            <tr>
                                <td><?=$row['nis']?></td>
                                <td><?=$row['nama']?></td>
                                <?php if($debug): ?>
                                    <td><?=json_encode($row['normal'])?></td>
                                    <td><?=json_encode($row['raw_konversi'])?></td>
                                    <td><?=json_encode($row['raw_normal_matrik'])?></td>
                                    <td><?=json_encode($row['raw_matrik_bobot'])?></td>
                                <?php endif ?>
                                <td><?=$row['preferensi']?></td>
                                <td><?=$row['jurusan']?></td>
                                <input type="hidden" name="nis[<?=$row['nis']?>]" value="<?=$row['jurusan']?>">
                            </tr>
                        <?php endforeach?>
                    </table>
                    <p>
                        jumlah IPA : <?=$ipa?> <br>
                        jumlah IPS : <?=$ips?>
                    </p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>