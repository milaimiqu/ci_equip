<?php
class Fault_input_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function save($name,$equip,$start_time,$end_time,$cause,$cont,$part,$classes,$user)
    {
        $sql='insert into fault set `NAME`="'.$name.
         '",`EQUIP`="'.$equip.'",START_TIME="'.$start_time.
        '",END_TIME="'.$end_time.'",`CAUSE`="'.$cause.'",`CONT`="'.$cont.'",`PART`="'.$part.'",`CLASSES`="'.$classes.'",`USER`="'.$user.'"';
        
        $result=$this->db->query($sql);
        
        if($result && $_FILES["file"]["name"]!=null)
        {
            $sql="select max(id) as ID from fault";
            $query=$this->db->query($sql);
            $row=$query->result_array();
            $id=$row[0]['ID'];
            
            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")))
            {
                if ($_FILES["file"]["error"] > 0)  
                {  
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";  
                }  
                else
                {
                    if (file_exists( $_SERVER['DOCUMENT_ROOT']."/upload/" . $_FILES["file"]["name"]))  
                    {  
                        echo $_FILES["file"]["name"] . " 已存在。 ";
                        return FALSE;
                    }  
                    else  
                    {  
                        if(move_uploaded_file($_FILES["file"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/upload/".$id.".jpg"))
                        {
                            $sql="update fault set `PIC`='".base_url()."upload/".$id.".jpg' where ID=".$id;
                            $query=$this->db->query($sql);
                            if($query)
                            {
                                return TRUE;
                            }
                        }
                        else
                        {
                            echo "保存图片失败！";
                            return FALSE;
                        }
                    }
                }
            }
        }
        else if($result)
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