<?php
class Plc_view extends MY_Controller{
    public function __construct()
    {
        $this->need_login=FALSE;
        parent::__construct();
        $this->load->model('plc_view_model');
    }
       
    public function index()
    {
        $this->load->view('plc_view/index');
    }
    
    public function show_state()
    {
        $equip=$this->input->post('equip');
        $drive=$this->input->post('drive');
        $drive_action=$this->input->post('drive_action');
        
        if(isset($equip)&&isset($drive)&&isset($drive_action))
        {
            $io_list=$this->plc_view_model->get_io($equip,$drive,$drive_action);
        }
        else
        {
            echo "未选定设备！";
            return false;
        }
        
        if(isset($io_list))
        {
            $io_state=$this->plc_view_model->get_state($io_list);
        }
        else
        {
            echo "获取IO地址失败！";
            return false;
        }
        
        if(isset($io_state))
        {
            $data["io_state"]=$io_state;
            $data['io_list']=$io_list;
            $data['equip']=$equip;
            $data['drive']=$drive;
            $data['action']=$drive_action;
        }
        else
        {
            echo "获取IO状态失败！";
            return false;
        }
        
        $this->load->view('plc_view/show',$data);
    }
}