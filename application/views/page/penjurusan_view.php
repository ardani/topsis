<div class="row">
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Metode Perhitungan Penjurusan</h3>
            </div>
            <div class="box-body">
                <form method="post" action="<?=site_url("penjurusan/proses")?>">
                    <div class="form-group">
                        <label>Metode Perhitungan</label>
                        <select class="form-control" name="metode">
                            <option value="1">Metode AHP+TOPSIS</option>
                            <option value="2">Metode AHP+TOPSIS IMPROVE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="debug">Tampilkan Perhitungan</label>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Proses</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>