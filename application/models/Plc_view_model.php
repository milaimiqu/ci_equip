<?php
class Plc_view_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_io($equip,$drive,$drive_action)
    {
        $sql="select NAME,ADDRESS,NC,TAG,NOTIC from io_list where `EQUIP`='".$equip.
             "' and `DRIVE`='".$drive."' and `ACTION`='".$drive_action."'";
        
        $query=$this->db->query($sql);
        $row=$query->result_array();
        if($row)
        {
            return $row;
        }
        else
        {
            echo "查询失败！";
            return FALSE;
        }
    }
    
    public function get_state($io_list)
    {
        $send_data=" start ";
        
        for($i=0;isset($io_list[$i]['TAG']);$i++)
        {
            $send_data=$send_data.$io_list[$i]['TAG']." ";
        }
        
        $send_data=$send_data."end";
        
        $command="E:/OPC_FOR_PHP/OPC_FOR_PHP.exe ".$send_data;
        exec($command,$state);
        
        return $state;

    }
}