<?php
class Xml_test_model extends CI_Model{
    
    public function __construct()
    {
        //$this->load->database();
    }
    
    public function save_xml($msg)
    {
        $save_file=fopen("d:\post_test.xml","w");
        fwrite($save_file,$msg);
        fclose($save_file);
    }
}
?>
