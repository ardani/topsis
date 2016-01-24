<?php

class Siswa_model extends CI_Model {
    private $table  = "siswa";
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = "")
    {
        if(!empty($id))
        {
            $this->db->where('id_siswa',$id);
        }

        return $this->db->get('id_siswa');
    }

    public function delete($id)
    {
        $this->db->where('id_siswa',$id);
        $result = $this->db->delete($this->table);
        return $result;
    }

    public function save($data)
    {
        if($data['id_siswa'] != ''){
            $this->db->where('id_siswa',$data['id_siswa']);
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
            ->select('id_siswa,nis,nama_siswa')
            ->from($this->table)
            ->unset_column('id_siswa')
            ->add_column("menu",'<div class="tools"><a class="edit" data-id="$1" href="javascript:void(0)"><i class="fa fa-edit"></i> edit</a>
          <a class="delete" data-id="$1" href="javascript:void(0)"><i class="fa fa-trash-o"></i> delete</a></div>','id_siswa');
        return  $this->datatables->generate();
    }

    public function detail($id)
    {
        $this->db->select('id_siswa,nis,nama_siswa');
        $this->db->where("id_siswa",$id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $data[] = $query->row_array() ;
        }
    }
}