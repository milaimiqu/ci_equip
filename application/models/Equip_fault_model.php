<?php
class Equip_fault_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }
    
    /*
     * $search
     * 1=查询所有
     * 2=按时间
     */
    public function get_count($table,$search,$starttime,$endtime)
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
                    $sql="select count(*) as num from ".$table." where `START_TIME` between '".$starttime."' and '".$endtime."'";
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
    
    public function get_fault($table,$offset,$limit)
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
    
    public function get_fault_by_time($table,$offset,$limit,$starttime,$endtime)
    {
        $sql="select * from ".$table." where `START_TIME` between '".$starttime."' and '".$endtime."' order by ID desc limit ".($offset).",".($offset+$limit);
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
        header( "Pragma: public" );
        header("Content-type: text/html; charset=utf-8");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:filename=故障记录".$starttime."-".$endtime.".csv");
        
        $this->db->query("SET NAMES 'utf8'");
        
        $sql="select * from fault where `START_TIME` between '".$starttime."' and '".$endtime."'";
        $query=$this->db->query($sql);
        $row=$query->result_array();
        
        echo "\xEF\xBB\xBF";
        
        if($row)
        {
            //输出表头
            echo "序号,";
            echo "故障现象,";
            echo "设备名称,";
            echo "开始时间,";
            echo "结束时间,";
            echo "故障原因,";
            echo "处理对策,";
            echo "更换部件,";
            echo "停止时间,";
            echo "故障类别,";
            echo "录入人\n";

            for($i=0;isset($row[$i]['ID']);$i++)
            {
                echo ($i+1).",";
                echo $row[$i]['NAME'].",";
                echo $row[$i]['EQUIP'].",";
                echo $row[$i]['START_TIME'].",";
                echo $row[$i]['END_TIME'].",";
                echo $row[$i]['CAUSE'].",";
                echo $row[$i]['CONT'].",";
                echo $row[$i]['PART'].",";
                echo ((strtotime($row[$i]['END_TIME'])-strtotime($row[$i]['START_TIME']))).",";
                echo $row[$i]['CLASSES'].",";
                echo $row[$i]['USER']."\n";
            }
        }
    }
}
?>