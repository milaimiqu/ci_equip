<?php
class Brakefilling extends MY_Controller{
    public function __construct()
    {
        $this->need_login=TRUE;
        parent::__construct();
        $this->load->model('brakefilling_model');
        $this->load->library('pagination');
    }
    
    public function index()
    {
        $offset=$this->uri->segment(3);
        $search=$this->uri->segment(4);
        $starttime=urldecode($this->uri->segment(5));
        $endtime=urldecode($this->uri->segment(6));
        $vin=urldecode($this->uri->segment(5));
        $limit=10;
        
        if(!isset($offset))
        {
            $offset=0;
        }
        //设定分页参数
        $count=$this->brakefilling_model->get_count("brakefilling",$search,$starttime,$endtime,$vin); 
        //$config['base_url'] = "/index.php/equip_fault/index";
        
        $data['count']=$count;
        
        $config['base_url'] = "/index.php/brakefilling/index";
        
        if($search!=3)
        {
            $config['suffix']="/".$search."/".$starttime."/".$endtime;
            $config['first_url'] = "/index.php/brakefilling/index/0/".$search."/".$starttime."/".$endtime;
        }
        else if($search==3)
        {
            $config['suffix']="/".$search."/".$starttime."/".$endtime."/".$vin;
            $config['first_url'] = "/index.php/brakefilling/index/0/".$search."/".$starttime."/".$endtime."/".$vin;
        }
        $config['total_rows'] = $count;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
  
        //获取内容
        if($search==1)
        {
            $data['table']=$this->brakefilling_model->get_record("brakefilling",$offset,$limit);
        }
        else if($search==2)
        {
            if($starttime!="" && $endtime!="")
            {
                $data['table']=$this->brakefilling_model->get_record_by_time("brakefilling",$offset,$limit,$starttime,$endtime);
            }
            else
            {
                echo "必须输入时间范围！";
            }
        }
        else if($search==3)
        {
            if(isset($vin))
            {
                $data['table']=$this->brakefilling_model->get_record_by_vin("brakefilling",$offset,$limit,$vin);
            }
            else
            {
                echo "必须输入VIN！";
            }
        }
        $data['offset']=$offset;
        $data['search']=$search;
        
        $this->load->view('brakefilling/index',$data);    
    }
    
    public function excel()
    {
        $this->load->helper('download'); 
        $this->load->helper('string');
        
        $starttime=urldecode($this->uri->segment(3));
        $endtime=urldecode($this->uri->segment(4));
        
        $this->brakefilling_model->creat_excel($starttime,$endtime);  
    }
}
?>