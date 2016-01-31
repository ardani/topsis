<?php
class Batasnilai_model extends CI_Model {

    private $table  = "batas_nilai";
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = "")
    {
        if(!empty($id))
        {
            $this->db->where('id_batas_nilai',$id);
        }

        return $this->db->get($this->table);
    }

    public function delete($id)
    {
        $this->db->where('id_batas_nilai',$id);
        $result = $this->db->delete($this->table);
        return $result;
    }

    public function save($data)
    {
        if($data['id_batas_nilai'] != ''){
            $this->db->where('id_batas_nilai',$data['id_batas_nilai']);
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
            ->select('id_batas_nilai,nama_kriteria,variable,nilai_awal,nilai_akhir,l,m,h')
            ->from($this->table)
            ->join('kriteria','kriteria.kode_kriteria = batas_nilai.kode_kriteria')
            ->unset_column('id_batas_nilai')
            ->add_column("menu",'<div class="tools"><a class="edit" data-id="$1" href="javascript:void(0)"><i class="fa fa-edit"></i> edit</a>
          <a class="delete" data-id="$1" href="javascript:void(0)"><i class="fa fa-trash-o"></i> delete</a></div>','id_batas_nilai');
        return  $this->datatables->generate();
    }

    public function detail($id)
    {
        $this->db->select('id_batas_nilai,kode_kriteria,nilai_awal,nilai_akhir,variable,l,m,h');
        $this->db->where("id_batas_nilai",$id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $data[] = $query->row_array() ;
        }
    }
}