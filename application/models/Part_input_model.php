<?php
class Part_input_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function getname($str)
    {
        $sql="select distinct `NAME` from part where `NAME` like '%".$str."%'";
        $query=$this->db->query($sql);
        $row=$query->result_array();
        
        return $row;
    }
    
    public function getmodel($str)
    {
        $sql="select `MODEL` from part where `NAME`='".$str."'";
        $query=$this->db->query($sql);
        $row=$query->result_array();
        
        return $row;
    }
    
    public function getcount($str1,$str2)
    {
        $sql="select `COUNT`,`BRAND` from part where `NAME`='".$str1."' and `MODEL`='".$str2."'";
        $query=$this->db->query($sql);
        $row=$query->result_array();
        
        return $row;
    }
    
    public function save($name,$model,$brand,$count,$reason,$user,$date)
    {
        $sql='insert into partorder set `NAME`="'.$name.
           '",`MODEL`="'.$model.'",`BRAND`="'.$brand.'",`COUNT`="'.$count.
           '",`REASON`="'.$reason.'",`USER`="'.$user.
           '",`DATE`="'.$date.'"';
        
        $result=$this->db->query($sql);
        
        if($result && $_FILES["file"]["name"]!=null)
        {
            $sql="select max(id) as ID from partorder";
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
                    if (file_exists( $_SERVER['DOCUMENT_ROOT']."/partorder/" . $_FILES["file"]["name"]))  
                    {  
                        echo $_FILES["file"]["name"] . " 已存在。 ";
                        return FALSE;
                    }  
                    else  
                    {  
                        if(move_uploaded_file($_FILES["file"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/partorder/".$id.".jpg"))
                        {
                            $sql="update partorder set `PIC`='".base_url()."partorder/".$id.".jpg' where ID=".$id;
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