<?php
class Siswanilai_model extends CI_Model {
    private $table  = "nilai";
    private $tahun;
    public function __construct()
    {
        parent::__construct();
        $this->tahun = $this->tahun_ajaran->aktif();
    }

    public function get($id = "")
    {
        if(!empty($id))
        {
            $this->db->where('id_nilai',$id);
        }

        return $this->db->get($this->table);
    }

    public function delete($id)
    {
        $this->db->where('id_nilai',$id);
        $result = $this->db->delete($this->table);
        return $result;
    }

    public function save($data)
    {
        if($data['id_nilai'] != ''){
            $this->db->where('id_nilai',$data['id_nilai']);
            $this->db->update($this->table,$data);
            if($this->db->affected_rows()>0){
                return "Data Berhasil Diubah";
            }
        }else{
            $this->db->insert($this->table,$data);
            if($this->db->affected_rows()>0){
                return "Data Berhasil Disimpan";
            }
        }
    }

    public function dataajax()
    {
        $this->datatables
            ->select('id_nilai,nilai.nis,nama_siswa,nilai')
            ->from($this->table)
            ->join('siswa','siswa.nis = nilai.nis')
            ->where('kode_tahun_ajaran',$this->tahun)
            ->unset_column('id_nilai')
            ->add_column("menu",'<div class="tools"><a class="edit" data-id="$1" href="javascript:void(0)"><i class="fa fa-edit"></i> edit</a>
          <a class="delete" data-id="$1" href="javascript:void(0)"><i class="fa fa-trash-o"></i> delete</a></div>','id_nilai');
        return  $this->datatables->generate();
    }

    public function detail($id)
    {
        $this->db->select('id_nilai,nis,nilai');
        $this->db->where("id_nilai",$id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            $result =  $query->row_array();
            $result['nis'];
            $data = json_decode($result['nilai'],true);
            $data['nis'] = $result['nis'];
            $data['id_nilai'] = $result['id_nilai'];
            return $data;
        }
    }
}