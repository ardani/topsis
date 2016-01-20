<div class="row">
    <form action="<?php echo site_url("rekomendasi_siswa/save_rekomendasi")?>" method="post">
        <?php foreach($nilai as $row): ?>
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <?php
                        $check = array(
                            "nis" => $row['nis'],
                            "nama_siswa" => $row['siswa'],
                            "rata" => $row['rata'],
                        );
                        $all[$row['nis']] = $check;
                    ?>
                    <h3 style="font-size: 18px" class="box-title">
                        <input type="checkbox" name="siswa[<?=$row['nis']?>]" value="<?=base64_encode(json_encode($check))?>">
                        <?php echo ' NIS : '.$row['nis']." Nama : ".$row['siswa']?> </h3>
                </div>
                <div class="box-body" style="overflow: auto;overflow-y: hidden;width:100%;">
                    <canvas id="myChart<?=$row['nis']?>" width="3500" height="400"></canvas>
                </div>
            </div>
        </div>
        <?php
        $label = array();
        $dataset = array();
        $no = 0;
        foreach ($row['nilai'] as $data ) {
            if($no <= 5){
                $no++;
            }else{
                $no = 1;
            }
            $label[] = "'".$data['mapel'].$no."'";
            $dataset[] = $data['nilai'];
        }
        $str_label = implode(",",$label);
        $str_dataset = implode(",",$dataset);
        ?>
            <script type="text/javascript">
                var ctx = document.getElementById("myChart<?=$row['nis']?>").getContext("2d");
                var data = {
                    labels: [<?=$str_label?>],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(255,0,0,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(255,0,0,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [<?=$str_dataset?>]
                        },
                    ]
                };
                var myLineChart = new Chart(ctx).Line(data);
            </script>
        <?php endforeach;?>
        <input type="hidden" name="jurusan" value="<?=$jurusan?>">
        <input type="hidden" name="alldata" value="<?=base64_encode(json_encode($all))?>">
        <button type="submit" class="btn btn-success">SIMPAN</button>
    </form>
</div>



