<?php
class Fault_input extends MY_Controller{
    public function __construct()
    {
        $this->need_login=FALSE;
        parent::__construct();
        $this->load->model('fault_input_model');
    }
    
    public function index()
    {
        $this->load->view('fault_input/index');
    }
    
    public function save()
    {
        $name=$this->input->post('name');
        $model=$this->input->post('model');
        $count=$this->input->post('count');
        $reason=$this->input->post('reason');
        $user=$this->input->post('user');
        
        if(isset($name)&&isset($cont))
        {
            $result=$this->fault_input_model->save($name,$equip,$start_time,$end_time,$cause,$cont,$part,$classes,$user);
        }
        else
        {
            echo "提交的表单中有空值。";
            $this->load->view('fault_input/fault');
        }
        
        if($result)
        {
            $this->load->view('fault_input/sucess');
        }
        else
        {
            $this->load->view('fault_input/fault');
        }
    }
}