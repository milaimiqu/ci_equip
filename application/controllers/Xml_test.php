<?php
class Xml_test extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('xml_test_model');
    }
    
    public function index()
    {
        if(isset($_POST['xml']))
        {
            $xml_msg=$_POST['xml'];
            $this->xml_test_model->save_xml($xml_msg);
        }
        else
        {
            $xml_msg="未接收到数据！";
            $this->xml_test_model->save_xml($xml_msg);
        }
        
        $data['xml']=$xml_msg;
        
        $this->load->view('xml_test/index',$data);
    }
    
}
?>

