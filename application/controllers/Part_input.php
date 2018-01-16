<?php
class Part_input extends MY_Controller{
    public function __construct()
    {
        $this->need_login=FALSE;
        parent::__construct();
        $this->load->model('part_input_model');
    }
    
    public function index()
    {
        $this->load->view('part_input/index');
    }
    
    public function getname()
    {
        $str=$this->input->get('str');
        $date=$this->part_input_model->getname($str);
        
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $callback = $this->input->get('callback');
        echo $callback.'('.json_encode($date).')';
    }
    
    public function getmodel()
    {
        $str=$this->input->get('str');
        $date=$this->part_input_model->getmodel($str);
        
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $callback = $this->input->get('callback');
        echo $callback.'('.json_encode($date).')';
    }
    
    public function getcount()
    {
        $str1=$this->input->get('str1');
        $str2=$this->input->get('str2');
        $date=$this->part_input_model->getcount($str1,$str2);
        
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $callback = $this->input->get('callback');
        echo $callback.'('.json_encode($date).')';
    }
    
    public function save()
    {
        $name=$this->input->post('name');
        $model=$this->input->post('model');
        $brand=$this->input->post('brand');
        $count=$this->input->post('count');
        $reason=$this->input->post('reason');
        $user=$this->input->post('user');
        $date=date("Y-m-d");
        
        if(isset($name)&&isset($model)&&isset($count))
        {
            $result=$this->part_input_model->save($name,$model,$brand,$count,$reason,$user,$date);
        }
        else
        {
            echo "提交的表单中有空值。";
            $this->load->view('part_input/fault');
        }
        
        if($result)
        {
            $this->load->view('part_input/sucess');
        }
        else
        {
            $this->load->view('part_input/fault');
        }
    }
}