<?php
class Kriteria_model extends CI_Model {

    private $table  = "kriteria";
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = "")
    {
        if(!empty($id))
        {
            $this->db->where('id_kriteria',$id);
        }

        return $this->db->get('id_kriteria');
    }

    public function delete($id)
    {
        $this->db->where('id_kriteria',$id);
        $result = $this->db->delete($this->table);
        return $result;
    }

    public function save($data)
    {
        if($data['id_kriteria'] != ''){
            $this->db->where('id_kriteria',$data['id_kriteria']);
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
            ->select('id_kriteria,kode_kriteria,nama_kriteria')
            ->from($this->table)
            ->unset_column('id_kriteria')
            ->add_column("menu",'<div class="tools"><a class="edit" data-id="$1" href="javascript:void(0)"><i class="fa fa-edit"></i> edit</a>
          <a class="delete" data-id="$1" href="javascript:void(0)"><i class="fa fa-trash-o"></i> delete</a></div>','id_kriteria');
        return  $this->datatables->generate();
    }

    public function detail($id)
    {
        $this->db->select('id_kriteria,kode_kriteria,nama_kriteria');
        $this->db->where("id_kriteria",$id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $data[] = $query->row_array() ;
        }
    }
}