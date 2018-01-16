<?php
class acfilling_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }
    
    /*
     * $search
     * 1=查询所有
     * 2=按时间
     */
    public function get_count($table,$search,$starttime,$endtime,$vin)
    {
        if(isset($table)&&isset($search))
        {
            switch($search)
            {
                case 1:
                    $query=$this->db->count_all_results($table);
                    $count=$query;
                    break;
                
                case 2:
                    $sql="select count(*) as num from ".$table." where `INPUT_TIME` between '".$starttime."' and '".$endtime."'";
                    $query=$this->db->query($sql);
                    $row=$query->result_array();
                    $count=$row[0]['num'];
                    break;
                
                case 3:
                    $sql="select count(*) as num from ".$table." where VIN like '%".$vin."%'";
                    $query=$this->db->query($sql);
                    $row=$query->result_array();
                    $count=$row[0]['num'];
                    break;
                
                default:
                    echo "查询条件错误！";
                    return FALSE;
            }
            
            if(isset($query))
            {
                return $count;
            }
            else
            {
                echo "查询错误！";
                return FALSE;
            }
        }
        else
        {
            echo "未设定数据库或查询条件。";
            return FALSE;
        }
    }
    
    public function get_record($table,$offset,$limit)
    {
        $sql="select * from ".$table." order by ID desc limit ".($offset).",".($offset+$limit);
        $query=$this->db->query($sql);
        $row=$query->result_array();
        if($row)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function get_record_by_time($table,$offset,$limit,$starttime,$endtime)
    {
        $sql="select * from ".$table." where `INPUT_TIME` between '".$starttime."' and '".$endtime."' order by ID desc limit ".($offset).",".($offset+$limit);
        $query=$this->db->query($sql);
        $row=$query->result_array();
        if($row)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function get_record_by_vin($table,$offset,$limit,$vin)
    {
        $sql="select * from ".$table." where VIN like '%".$vin."%' order by ID desc limit ".($offset).",".($offset+$limit);
        
        $query=$this->db->query($sql);
        $row=$query->result_array();
        if($row)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }
    }
  
    public function creat_excel($starttime,$endtime)
    {
        header("Pragma: public");
        header("Content-type: text/html; charset=utf-8");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:filename=冷媒加注记录".$starttime."-".$endtime.".csv");
        
        $this->db->query("SET NAMES 'utf8'");
        
        $sql="select * from acfilling where `INPUT_TIME` between '".$starttime."' and '".$endtime."'";
        $query=$this->db->query($sql);
        $row=$query->result_array();
        
        echo "\xEF\xBB\xBF";
        
        if(isset($row))
        {
            //输出表头
            echo "序号,";
            echo "VIN,";
            echo "车型,";
            echo "真空值,";
            echo "保压泄露,";
            echo "加注量,";
            echo "循环时间,";
            echo "加注结果,";
            echo "加注时间,";
            echo "上传时间,";
            echo "设备名称\n";

            for($i=0;isset($row[$i]['ID']);$i++)
            {
                $row[$i]['VIN']=str_replace("\n","",$row[$i]['VIN']);
                $row[$i]['VIN']=str_replace("\r","",$row[$i]['VIN']);
                $row[$i]['VIN']=str_replace("\r\n","",$row[$i]['VIN']);
                
                echo ($i+1).",";
                echo $row[$i]['VIN'].",";
                echo $row[$i]['CARTYPE'].",";
                echo $row[$i]['VACUUM'].",";
                echo $row[$i]['VACUUM_TEST'].",";
                echo $row[$i]['FILL'].",";
                echo $row[$i]['CY_TIME'].",";
                echo $row[$i]['RESULT'].",";
                echo $row[$i]['INPUT_TIME'].",";
                echo $row[$i]['SEND_TIME'].",";
                echo $row[$i]['EQUIPMENT_NAME']."\n";
            }
        }
    }
   
}
?>