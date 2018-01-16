<?php
class Maintain_input extends MY_Controller{
    public function __construct()
    {
        $this->need_login=FALSE;
        parent::__construct();
        $this->load->model('maintain_input_model');
    }
    
    public function index()
    {
        $this->load->view('maintain_input/index');
    }
    
    public function save()
    {
        $equip=$this->input->post('equip');
        $date=$this->input->post('date');
        $time=$this->input->post('time');
        $cont=$this->input->post('cont');
        $classes=$this->input->post('classes');
        $user=$this->input->post('user');
        
        if(isset($equip)&&isset($cont))
        {
            $result=$this->maintain_input_model->save($equip,$date,$time,$cont,$classes,$user);
        }
        else
        {
            echo "提交的表单中有空值。";
            $this->load->view('maintain_input/fault');
        }
        
        if($result)
        {
            $this->load->view('maintain_input/sucess');
        }
        else
        {
            $this->load->view('maintain_input/fault');
        }
    }
}