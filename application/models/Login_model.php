<?php
class Login_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }
    
/*
 * 函数名：check_login
 * 通过用户提交的user名，读取对应的密码，并验证用户提交的密码是否正确。
 * 正确时返回用户名。
 */    
    public function check_login($user,$pwd)
    {
        $sql="select * from user where ID='".$user."'";
        $query=$this->db->query($sql);
        $row=$query->row_array();
        
        if(isset($row))
        {
            if($row['PWD']==$pwd)
            {
                return $row['NAME'];
            }
        }
        else
        {
            return false;
        }
    }
}