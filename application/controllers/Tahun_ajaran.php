<?php
class Tahun_ajaran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('tahun_ajaran_model','tahun_ajaran');
        $this->userauth->access_only(1);
    }

    public function index()
    {
        $data = array(
          'title' => 'Tahun Ajaran',
          'subtitle' => 'Manage Tahun Ajaran',
          'msg' => $this->flash->display('success',true)
        );
        $this->template->load('main_template','page/tahun_ajaran_view',$data);
    }

    public function get()
    {
        echo $this->tahun_ajaran->dataajax();
    }

    public function save()
    {
        methodpage();
        $data = $this->fungsi->accept_data(array_keys($_POST));
        $msg = $this->tahun_ajaran->save($data);
        $this->flash->success($msg);
        redirect('tahun_ajaran');
    }

    public function edit()
    {
        methodpage();
        $id = $this->input->post('id');
        $result = $this->tahun_ajaran->detail($id);
        echo json_encode($result);
    }
    public function delete()
    {
        methodpage();
        $id = $this->input->post('id');
        $result = $this->tahun_ajaran->delete($id);
    }

}
