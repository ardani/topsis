<?php
class Penjurusan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('penjurusan_model','penjurusan');
        $this->load->model('kriteria_model','kriteria');
        $this->load->model('siswanilai_model','siswanilai');
        $this->userauth->access_only(1);
    }

    public function index()
    {
        $data = array(
            'title' => 'Penjurusan',
            'subtitle' => 'perhitungan penjurusan',
            'msg' => $this->flash->display('success', TRUE)
        );
        $this->template->load('main_template','page/penjurusan_view',$data);
    }

    public function proses()
    {
        $metode = $this->input->post('metode');
        $debug = $this->input->post('debug');
        if($metode == 1){
            $data = $this->metode_lama();
        }else{
            $data = $this->metode_baru();
        }
        $data += array(
            'title' => 'Hasil Penjurusan',
            'subtitle' => 'perhitungan penjurusan',
            'debug' => $debug,
            'metode' => $metode
        );
        $this->template->load('main_template','page/penjurusan_hasil_view',$data);
    }

    private function konversi_nilai($kode,$nilai)
    {
        $query = $this->db->query("select round((l+m+h)/3,2) as rata from batas_nilai where
              kode_kriteria = '$kode' and $nilai >= nilai_awal AND
              $nilai <= `nilai_akhir`");
        return $query->row()->rata;
    }

    public function metode_lama()
    {
        $siswas = $this->siswanilai->get();
        $siswa_array = array();
        $result = array();

        $jml = array();
        foreach($siswas->result() as $siswa) {
            $origin = array();
            $nilais = json_decode($siswa->nilai,true);
            foreach($nilais as $key => $nilai){
                $konversi_nilai = $this->konversi_nilai($key,$nilai);
                $origin[$key] = $konversi_nilai*$konversi_nilai;
                $jml[$key][] = $origin[$key];
            }

            $siswa_array[$siswa->nis] = array(
                "nis" => $siswa->nis,
                "nama" => $siswa->nama_siswa,
                "normal" => $nilais,
                "raw_konversi" => $origin,
                "raw_normal_matrik" => array(),
                "raw_matrik_bobot" => array(),
                "original" => $origin,
            );
        }

        //pembagi
        foreach($jml as $key => $val) {
            $pembagi[$key] = sqrt(array_sum($val));
        }

        $result['pembagi'] = $pembagi;
        // normalisasi matrik
        foreach($siswa_array as $val) {
            foreach($val['original'] as $key => $row) {
                $siswa_array[$val['nis']]['original'][$key] = $row/$pembagi[$key];
                $siswa_array[$val['nis']]['raw_normal_matrik'][$key] = $siswa_array[$val['nis']]['original'][$key];
            }
        }

        // ambil bobot kriteria
        $bobot = array();
        $kriterias = $this->kriteria->get();
        foreach ($kriterias->result() as $kriteria) {
            $bobot[$kriteria->kode_kriteria] = $kriteria->bobot;
        }

        $result['bobot'] = $bobot;
        $result['kriteria'] = $kriterias->result_array();
        // matrik terbobot
        $a = array();
        foreach($siswa_array as $val) {
            foreach($val['original'] as $key => $row) {
                $siswa_array[$val['nis']]['original'][$key] = $row*$bobot[$key];
                $siswa_array[$val['nis']]['raw_matrik_bobot'][$key] = $siswa_array[$val['nis']]['original'][$key];
                $a[$key][] = $siswa_array[$val['nis']]['original'][$key];
            }
        }

        // A+ A-
        $max = array();
        $min = array();
        foreach ($a as $key => $val) {
            $max[$key] = max($val);
            $min[$key] = min($val);
        }
        $result['max'] = $max;
        $result['min'] = $min;

        // SA+ SA-
        $ipa = 0;
        $ips = 0;
        foreach($siswa_array as $val) {
            $sum_min = 0;
            $sum_max = 0;
            foreach($val['original'] as $key => $row) {
                $siswa_array[$val['nis']]['plus'][$key] = ($row-$max[$key])*($row-$max[$key]);
                $sum_max += $siswa_array[$val['nis']]['plus'][$key];
                $siswa_array[$val['nis']]['minus'][$key] = ($row-$min[$key])*($row-$min[$key]);
                $sum_min += $siswa_array[$val['nis']]['minus'][$key];
            }
            $d_plus = sqrt($sum_max);
            $siswa_array[$val['nis']]['dplus'] = $d_plus;
            $d_min = sqrt($sum_min);
            $siswa_array[$val['nis']]['dmin'] = $d_min;
            $siswa_array[$val['nis']]['preferensi'] = $d_min/($d_plus+$d_min);
            $siswa_array[$val['nis']]['jurusan'] = ($siswa_array[$val['nis']]['preferensi'] > 0.5) ? "IPA" :"IPS";
            if($siswa_array[$val['nis']]['jurusan'] == "IPA") {
                $ipa++;
            }else{
                $ips++;
            }
        }
        $result['siswas'] = $siswa_array;
        $result['ipa'] = $ipa;
        $result['ips'] = $ips;

        return $result;
    }

    public function metode_baru()
    {
        $siswas = $this->siswanilai->get();
        $siswa_array = array();
        $result = array();
        $jml = array();
        foreach($siswas->result() as $siswa) {
            $origin = array();
            $nilais = json_decode($siswa->nilai,true);
            foreach($nilais as $key => $nilai){
                $konversi_nilai = $this->konversi_nilai($key,$nilai);
                $origin[$key] = $konversi_nilai*$konversi_nilai;
                $jml[$key][] = $origin[$key];
            }

            $siswa_array[$siswa->nis] = array(
                "nis" => $siswa->nis,
                "nama" => $siswa->nama_siswa,
                "normal" => $nilais,
                "raw_konversi" => $origin,
                "raw_normal_matrik" => array(),
                "raw_matrik_bobot" => array(),
                "original" => $origin
            );
        }

        //pembagi
        foreach($jml as $key => $val) {
            $pembagi[$key] = sqrt(array_sum($val));
        }

        $result['pembagi'] = $pembagi;

        // normalisasi matrik
        foreach($siswa_array as $val) {
            foreach($val['original'] as $key => $row) {
                $siswa_array[$val['nis']]['original'][$key] = $row/$pembagi[$key];
                $siswa_array[$val['nis']]['raw_normal_matrik'][$key] = $siswa_array[$val['nis']]['original'][$key];
            }
        }

        // ambil bobot kriteria
        $bobot = array();
        $kriterias = $this->kriteria->get();
        foreach ($kriterias->result() as $kriteria) {
            $bobot[$kriteria->kode_kriteria] = $kriteria->bobot;
        }
        $result['kriteria'] = $kriterias->result_array();
        // bobot
        $result['bobot'] = $bobot;
        // matrik terbobot
        $a = array();
        foreach($siswa_array as $val) {
            foreach($val['original'] as $key => $row) {
                $siswa_array[$val['nis']]['original'][$key] = $row*$bobot[$key];
                $a[$key][] = $siswa_array[$val['nis']]['original'][$key];
            }
        }

        // A+ A-
        $max = array();
        $min = array();
        foreach ($a as $key => $val) {
            $max[$key] = max($val);
            $min[$key] = min($val);
        }
        $result['max'] = $max;
        $result['min'] = $min;

        // SA+ SA-
        $ipa = 0;
        $ips = 0;
        foreach($siswa_array as $val) {
            $hasil = 0;
            foreach($val['original'] as $key => $row) {
                $siswa_array[$val['nis']]['t'][$key] = ($row-$max[$key]);
                $siswa_array[$val['nis']]['h'][$key] = ($max[$key]-$min[$key]);
                $hasil += $siswa_array[$val['nis']]['t'][$key]*$siswa_array[$val['nis']]['h'][$key];
            }

            $siswa_array[$val['nis']]['preferensi'] = $hasil;
            $siswa_array[$val['nis']]['jurusan'] = ($siswa_array[$val['nis']]['preferensi'] < 0.5) ? "IPA" :"IPS";
            if($siswa_array[$val['nis']]['jurusan'] == "IPA") {
                $ipa++;
            }else{
                $ips++;
            }
        }
        $result['siswas'] = $siswa_array;
        $result['ipa'] = $ipa;
        $result['ips'] = $ips;
        return $result;
    }

    public function save()
    {
        methodpage();
        $nis = $this->input->post('nis');
        foreach($nis as $key => $val) {
            $this->db->where("nis",$key);
            $this->db->update("siswa",array("jurusan" => $val));
        }
        $this->flash->success("Hasil Perhitungan Jurusan Berhasil Disimpan");
        redirect('hasil_jurusan');
    }
}
