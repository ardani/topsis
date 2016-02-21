<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form role="form" action="<?php echo site_url("pembobotan_kriteria/matrik")?>" method="post">
                <div class="box-body">
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
                            foreach($kriterias->result() as $col) {
                                echo "<tr><td><strong>$col->nama_kriteria [$col->kode_kriteria]</strong></td>";
                                    foreach($kriterias->result() as $row) {
                                        echo "<td>";
                                        if($row->kode_kriteria >= $col->kode_kriteria) {
                                            echo "<select class='form-control' name='kriteria[$row->kode_kriteria][$col->kode_kriteria]'>";
                                            foreach ($options as $option) {
                                                echo "<option>$option</option>";
                                            }
                                            echo "</select>";
                                        }else{
                                            echo "<input type='hidden' name='kriteria[$row->kode_kriteria][$col->kode_kriteria]' value='1'>";
                                        }
                                        echo "</td>";
                                    }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-body">
                    <button class="btn btn-success" type="submit">Hitung Matrik</button>
                </div>
            </form>
        </div>
    </div>
</div>