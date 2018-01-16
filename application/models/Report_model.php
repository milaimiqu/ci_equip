<?php
class Report_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
 
    public function get_report($date,$fault_table,$maintain_table)
    {
        $date1=date('Y-m-d',strtotime("$date + 1 day"));
        
        $sql_fault="select * from ".$fault_table." where `START_TIME` between '".$date." 06:00:00' and '".$date1." 05:00:00'";
        $sql_maintain="select * from ".$maintain_table." where `DATE` between '".$date." 06:00:00' and '".$date1." 05:00:00'";
        
        $query=$this->db->query($sql_fault);
        $fault_row=$query->result_array();
        
        $query=$this->db->query($sql_maintain);
        $maintain_row=$query->result_array();
        
        $row[0]=$fault_row;
        $row[1]=$maintain_row;
        
        return $row;
    }
    
    public function creat_excel($date,$fault_table,$maintain_table)
    {
        header( "Pragma: public" );
        header("Content-type: text/html; charset=utf-8");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:filename=业务日报".$date.".csv");
        
        $this->db->query("SET NAMES 'utf8'");
        
        $date1=date('Y-m-d',strtotime("$date + 1 day"));
        
        $sql_fault="select * from ".$fault_table." where `START_TIME` between '".$date." 06:00:00' and '".$date1." 05:00:00'";
        $sql_maintain="select * from ".$maintain_table." where `DATE` between '".$date." 06:00:00' and '".$date1." 05:00:00'";
        $query=$this->db->query($sql_fault);
        $fault_row=$query->result_array();
        $query=$this->db->query($sql_maintain);
        $maintain_row=$query->result_array();
        
        echo "\xEF\xBB\xBF";
        
        if($fault_row)
        {
            //输出表头
            echo "设备故障实绩,";
            echo "设备名称,";
            echo "开始时间,";
            echo "故障现象,";
            echo "故障原因,";
            echo "处理对策,";
            echo "现场担当,";
            echo "结束时间,";
            echo "停止时间,";
            echo "影响主线时间,";
            echo "修复担当,";
            echo "故障类别,";
            echo "维修确认,";
            echo "总稼动率,";
            echo "故障合计\n";

            for($i=0;isset($fault_row[$i]['ID']);$i++)
            {
                echo ",";
                echo $fault_row[$i]['EQUIP'].",";
                echo $fault_row[$i]['START_TIME'].",";
                echo $fault_row[$i]['NAME'].",";
                echo $fault_row[$i]['CAUSE'].",";
                echo $fault_row[$i]['CONT'].",";
                echo $fault_row[$i]['USER'].",";
                echo $fault_row[$i]['END_TIME'].",";
                echo ((strtotime($fault_row[$i]['END_TIME'])-strtotime($fault_row[$i]['START_TIME']))).",";
                echo ",,";
                echo $fault_row[$i]['CLASSES'].",,,,\n";
            }
        }
        
        echo "\n";
        
        if($maintain_row)
        {
            //输出表头
            echo "保养实绩,";
            echo "设备名称,";
            echo "开始时间,";
            echo "保养内容,";
            echo "类别,";
            echo "实施担当,";
            echo "作业工时,";
            echo "实施确认\n";
            
            for($i=0;isset($maintain_row[$i]['ID']);$i++)
            {
                echo ",";
                echo $maintain_row[$i]['EQUIP'].",";
                echo $maintain_row[$i]['DATE'].",";
                echo $maintain_row[$i]['CONT'].",";
                echo $maintain_row[$i]['CLASSES'].",";
                echo $maintain_row[$i]['USER'].",";
                echo $maintain_row[$i]['TIME'].",";
                echo ",\n";
            }
        }
    }
}