<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <h4>Matirk Berpasangan</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php
                            foreach($kriterias->result() as $col) {
                                echo "<th>$col->nama_kriteria [$col->kode_kriteria]</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $jumlah = array();
                        foreach($kriterias->result() as $col) {
                            echo "<tr><td><strong>$col->nama_kriteria [$col->kode_kriteria]</strong></td>";
                                foreach($kriterias->result() as $row) {
                                    echo "<td>";
                                    echo $nilai = $post[$row->kode_kriteria][$col->kode_kriteria]=round($post[$row->kode_kriteria][$col->kode_kriteria],2);
                                    echo "</td>";
                                }
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                    <tfoot>
                     <tr>
                         <td><strong>Jumlah</strong></td>
                         <?php foreach( $kriterias->result() as $col ): ?>
                             <?php
                              echo "<td>" .$jumlah[$col->kode_kriteria] = array_sum($post[$col->kode_kriteria])."</td>";

                             ?>
                         <?php endforeach ?>
                     </tr>
                    </tfoot>
                </table>
                <!--NORMALISASI-->
                <h4>Matrik Normalisasi</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Kriteria</th>
                        <?php
                            foreach($kriterias->result() as $col) {
                                echo "<th>$col->nama_kriteria [$col->kode_kriteria]</th>";
                            }
                        ?>
                        <th>Jumlah</th>
                        <th>Bobot</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $normal = array();
                        $bobot = array();
                        foreach($kriterias->result() as $col) {
                            $jumlah_normal = 0;
                            echo "<tr><td><strong>$col->nama_kriteria [$col->kode_kriteria]</strong></td>";
                            foreach($kriterias->result() as $row) {
                                echo "<td>";
                                echo $normal[$row->kode_kriteria][$col->kode_kriteria] =
                                    round($post[$row->kode_kriteria][$col->kode_kriteria]/$jumlah[$row->kode_kriteria],2);
                                echo "</td>";
                                $jumlah_normal += $normal[$row->kode_kriteria][$col->kode_kriteria];
                            }
                            echo "<td>$jumlah_normal</td>";
                            echo "<td>".$bobot[$col->kode_kriteria] = $jumlah_normal/count($kriterias->result())."</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
                <!--KONSISTENSI-->
                <h4>Uji Konsistensi</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Kriteria</th>
                        <?php
                        foreach($kriterias->result() as $col) {
                            echo "<th>$col->nama_kriteria [$col->kode_kriteria]</th>";
                        }
                        ?>
                        <th>(λ)</th>
                        <th>(λ)/Bobot</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $jumlah = array();
                    $jumlah_lamda = array();
                    foreach($kriterias->result() as $col) {
                        echo "<tr><td><strong>$col->nama_kriteria [$col->kode_kriteria]</strong></td>";
                        $lamda = 0;
                        foreach($kriterias->result() as $row) {
                            echo "<td>";
                            echo  $n = $post[$row->kode_kriteria][$col->kode_kriteria]*$bobot[$row->kode_kriteria];
                            echo "</td>";
                            $lamda += $n;
                        }
                        echo "<td>$lamda</td>";
                        echo "<td>".$jumlah_lamda[$col->kode_kriteria] = round($lamda/$bobot[$col->kode_kriteria],2)."</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="<?php echo count($kriterias->result())+2 ?>"><strong>Jumlah</strong></td>
                        <td><?php echo $total = array_sum($jumlah_lamda) ?></td>
                    </tr>
                    </tfoot>
                </table>
                <h4>λmax</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Jumlah ((λ)/Bobot)</th>
                            <th>n</th>
                            <th>λmax</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $total?></td>
                            <td><?php echo $n = count($kriterias->result())?></td>
                            <td><?php echo $total/$n?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>t2</td>
                        <td><?php echo  $t2 = (2.7699*$n)-4.3513?></td>
                    </tr>
                    <tr>
                        <td>CI</td>
                        <td><?php echo $ci=(($total/$n)-$n)/($n-1)?></td>
                    </tr>
                    <tr>
                        <td>RI</td>
                        <td><?php echo $ri=($t2-$n)/($n-1)?></td>
                    </tr>
                    <tr>
                        <td>CR</td>
                        <td><?php echo $cr=$ci/$ri?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-body">
                <form method="post" action="<?php echo site_url('pembobotan_kriteria/save_bobot')?>">
                <?php
                if($cr <= 0.1){
                    echo '<div class="alert alert-success no-margin-left">KONSISTEN</div>';
                    foreach($kriterias->result() as $col) {
                        $val = $bobot[$col->kode_kriteria];
                        echo "<input type='hidden' name='bobot[$col->kode_kriteria]' value='$val' >";
                    }
                    echo "<button type='submit' class='btn btn-success'>Simpan Bobot Kriteria</button>";

                }else{
                    echo '<div class="alert alert-danger no-margin-left">TIDAK KONSISTEN</div>';
                    echo '<a class="btn btn-info" href="'.site_url('pembobotan_kriteria').'">Menghitung Ulang Bobot Kriteria</a>';
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>