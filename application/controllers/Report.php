<?php
class Report extends MY_Controller{
    public function __construct()
    {
        $this->need_login=TRUE;
        parent::__construct();
        $this->load->model('report_model');
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
            $temp=date("H");
            if($temp<=5)
            {
                $date=date("Y-m-d");
                $date=date('Y-m-d',strtotime("$date - 1 day"));
            }
            else
            {
                $date=date("Y-m-d");
            }
        }
        
        $data['table']=$this->report_model->get_report($date,"fault","maintain");
        $data['date']=$date;
        $this->load->view('report/index',$data); 
    }
    
    public function excel()
    {
        $this->load->helper('download'); 
        $this->load->helper('string');
        
        if($this->uri->segment(3)!=null && $this->uri->segment(3)!="0000-00-00 00:00:00" && $this->uri->segment(3)!=0)
        {
            $date=$this->uri->segment(3);
        }
        else
        {
            $date=date("Y-m-d");
        }
        
        $this->report_model->creat_excel($date,"fault","maintain");  
    }
}
?>