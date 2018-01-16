<?php
class Partorder_view_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_order($date)
    {
        $sql="select * from `partorder` where date_format(DATE, '%Y-%m' )='".$date."'";
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

    public function creat_excel($date)
    {
        header( "Pragma: public" );
        header("Content-type: text/html; charset=utf-8");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:filename=备件申报表".$date.".csv");
        
        $this->db->query("SET NAMES 'utf8'");
        
        $sql="select * from `partorder` where date_format(DATE, '%Y-%m' )='".$date."'";
        $query=$this->db->query($sql);
        $row=$query->result_array();
        
        echo "\xEF\xBB\xBF";
        
        if($row)
        {
            //输出表头
            echo "序号,";
            echo "备件名称,";
            echo "型号,";
            echo "品牌,";
            echo "申报数量,";
            echo "申报原因,";
            echo "申报日期,";
            echo "申报人\n";

            for($i=0;isset($row[$i]['ID']);$i++)
            {
                echo ($i+1).",";
                echo $row[$i]['NAME'].",";
                echo $row[$i]['MODEL'].",";
                echo $row[$i]['BRAND'].",";
                echo $row[$i]['COUNT'].",";
                echo $row[$i]['REASON'].",";
                echo $row[$i]['DATE'].",";
                echo $row[$i]['USER']."\n";
            }
        }
    }
}
?>