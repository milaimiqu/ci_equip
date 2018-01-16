<?php
class Equip_fault extends MY_Controller{
    public function __construct()
    {
        $this->need_login=TRUE;
        parent::__construct();
        $this->load->model('equip_fault_model');
        $this->load->library('pagination');
    }
    
    public function index()
    {
        $offset=$this->uri->segment(3);
        $search=$this->uri->segment(4);
        $starttime=urldecode($this->uri->segment(5));
        $endtime=urldecode($this->uri->segment(6));
        $limit=10;
        
        if(!isset($offset))
        {
            $offset=0;
        }
        //设定分页参数
        $count=$this->equip_fault_model->get_count("fault",$search,$starttime,$endtime); 
        //$config['base_url'] = "/index.php/equip_fault/index";
        
        $data['count']=$count;
        
        $config['base_url'] = "/index.php/equip_fault/index";
        $config['suffix']="/".$search."/".$starttime."/".$endtime;
        $config['first_url'] = "/index.php/equip_fault/index/0/".$search."/".$starttime."/".$endtime;
        $config['total_rows'] = $count;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        
        //获取内容
        if($search==1)
        {
            $data['table']=$this->equip_fault_model->get_fault("fault",$offset,$limit);
        }
        else if($search==2)
        {
            if($starttime!="" && $endtime!="")
            {
                $data['table']=$this->equip_fault_model->get_fault_by_time("fault",$offset,$limit,$starttime,$endtime);
            }
            else
            {
                echo "必须输入时间范围！";
            }
        }
        $data['offset']=$offset;
        $data['search']=$search;
        
        $this->load->view('equip_fault/index',$data);    
    }
    
    public function excel()
    {
        $this->load->helper('download'); 
        $this->load->helper('string');
        
        $starttime=urldecode($this->uri->segment(3));
        $endtime=urldecode($this->uri->segment(4));
        
        $this->equip_fault_model->creat_excel($starttime,$endtime);  
    }
}
?>