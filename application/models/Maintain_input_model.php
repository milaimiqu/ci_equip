<?php
class Maintain_input_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function save($equip,$date,$time,$cont,$classes,$user)
    {
        $sql='insert into maintain set `EQUIP`="'.$equip.'",DATE="'.$date.
        '",TIME="'.$time.'",`CONT`="'.$cont.'",`CLASSES`="'.$classes.'",`USER`="'.$user.'"';
        
        $result=$this->db->query($sql);
        
        if($result)
        {
            return TRUE;
        }
        else
        {
            echo "保存数据失败！";
            return FALSE;
        }
    }
}
