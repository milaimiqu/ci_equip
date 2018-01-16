<?php
class Partorder_view extends MY_Controller{
    public function __construct()
    {
        $this->need_login=TRUE;
        parent::__construct();
        $this->load->model('partorder_view_model');
        $this->load->library('pagination');
    }
    
    public function index()
    {
        if($this->uri->segment(3)!=null && $this->uri->segment(3)!="0000-00-00 00:00:00" && $this->uri->segment(3)!=0)
        {
            $date=$this->uri->segment(3);
        }
        else
        {
            $date=date("Y-m");
        }
        
        //获取内容
        $data['table']=$this->partorder_view_model->get_order($date);
        $data['date']=$date;
        
        $this->load->view('partorder_view/index',$data);    
    }
    
    public function excel()
    {
        $this->load->helper('download'); 
        $this->load->helper('string');
        
        $date=urldecode($this->uri->segment(3));
        
        $this->partorder_view_model->creat_excel($date);  
    }
}
?>