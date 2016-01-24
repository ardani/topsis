<?php
class Tahun_ajaran_model extends CI_Model {

    private $table  = "tahun_ajaran";

    public function __construct()
    {
        parent::__construct();
    }

    public function aktif(){
        $this->db->where("status","Y");
        $query = $this->db->get($this->table);
        return $query->row()->kode_tahun_ajaran;
    }

    public function get($id = "")
    {
        if(!empty($id))
        {
            $this->db->where('kode_tahun_ajaran',$id);
        }

        return $this->db->get($this->table);
    }

    public function delete($id)
    {
        $this->db->where('kode_tahun_ajaran',$id);
        $result = $this->db->delete($this->table);
        return $result;
    }

    public function save($data)
    {
        if($data['status'] == "Y"){
            $this->db->update($this->table,array("status" => "N"));
        }
        $exist = $this->check_exits($data['kode_tahun_ajaran']);
        if($exist){
            $this->db->where('kode_tahun_ajaran',$data['kode_tahun_ajaran']);
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

    private function check_exits($kd)
    {
        $this->db->where('kode_tahun_ajaran',$kd);
        $result = $this->db->get($this->table)->num_rows();
        if($result > 0){
            return true;
        }
        return false;
    }

    public function dataajax()
    {
        $this->datatables
          ->select('kode_tahun_ajaran,nama_tahun_ajaran,status')
          ->from($this->table)
          ->add_column("menu",'<div class="tools"><a class="edit" data-id="$1" href="javascript:void(0)"><i class="fa fa-edit"></i> edit</a>
          <a class="delete" data-id="$1" href="javascript:void(0)"><i class="fa fa-trash-o"></i> delete</a></div>','kode_tahun_ajaran');
        return  $this->datatables->generate();
    }

    public function detail($id)
    {
        $this->db->select('kode_tahun_ajaran,nama_tahun_ajaran,status');
        $this->db->where("kode_tahun_ajaran",$id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $data[] = $query->row_array() ;
        }
    }
}
