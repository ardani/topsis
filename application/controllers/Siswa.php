<?php
class Siswa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('siswa_model','siswa');
        $this->userauth->access_only(1);
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Siswa',
            'subtitle' => 'Data Siswa',
            'msg' => $this->flash->display('success',true)
        );
        $this->template->load('main_template','page/siswa_view',$data);
    }

    public function get()
    {
        echo $this->siswa->dataajax();
    }

    public function save()
    {
        methodpage();
        $data = $this->fungsi->accept_data(array_keys($_POST));
        $msg = $this->siswa->save($data);
        $this->flash->success($msg);
        redirect('siswa');
    }

    public function edit()
    {
        methodpage();
        $id = $this->input->post('id');
        $result = $this->siswa->detail($id);
        echo json_encode($result);
    }
    public function delete()
    {
        methodpage();
        $id = $this->input->post('id');
        $result = $this->siswa->delete($id);
    }

}
