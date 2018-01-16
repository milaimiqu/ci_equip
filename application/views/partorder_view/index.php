<!doctyoe html>
<html lang="zh-cn">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
  
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/dashboard.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/main.css?v=2">

        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/WdatePicker.js"></script>
        
        <script language="javascript" type="text/javascript">
            function go_search()
            {
                window.location.href="<?php echo base_url();?>index.php/partorder_view/index/"+$("#date").val();      
            }
            
            function excel()
            {
                var date=$("#date").val();

                if(date==="")
                {
                    alert("时间不能为空");
                }
                else
                {
                    window.location.href="<?php echo base_url();?>index.php/partorder_view/excel/"+date;
                }
            }
            
            function showpicture(source)
            {
                $("#ShowImage_Form").find("#img_show").html("<image src='"+source+"' class='carousel-inner img-responsive img-rounded' />");
                $("#ShowImage_Form").modal();
            }
            
        </script>
        
    </head>
    
    <body>
        <div id="ShowImage_Form" class="modal fade">         
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                    <div id="img_show">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12 column">
            <div class="col-md-3 column">
                <form class="bs-example bs-example-form" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">查询月份</span>
                        <input class="form-control select" id=date name=date value="" readonly class="Wdate" type="text" onclick="WdatePicker({dateFmt:'yyyy-MM'});"/>
                    </div>
                </form>    
            </div>
            
            <div class="col-md-1 column">
                <input class="btn btn-primary btn-block" type="submit" value="查询" name="search" id="search" onclick="go_search()"/>
            </div>
            <div class="col-md-2 column">
                <input class="btn btn-primary btn-block" type="submit" value="导出excel" name="excel" id="excel" onclick="excel()" />
            </div> 
        </div>
        
            <div class="col-md-12 column">
                <center><H2><?php echo $date."  备件申报汇总"?></H2></chenter>
                            <table class="table table-bordered" style="font-size:6px;text-align:center">
                                    <thead>
                                        <tr>
                                            <th>序号</th><th>备件名称</th><th>型号</th><th>品牌</th><th>申报数量</th><th>申报理由</th><th>申报日期</th><th>图片</th><th>申报人</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i=0;($i<10)&&isset($table[$i]['NAME']);$i++)
                                            {
                                                if($i%2!=0)
                                                {
                                                    $color="success";
                                                }
                                                else
                                                {
                                                    $color="";
                                                }
                                                    
                                                echo "<tr class=".$color.">";
                                                echo "<td>".($i+1)."</td>";
                                                echo "<td>".$table[$i]['NAME']."</td>";
                                                echo "<td>".$table[$i]['MODEL']."</td>";
                                                echo "<td>".$table[$i]['BRAND']."</td>";
                                                echo "<td>".$table[$i]['COUNT']."</td>";
                                                echo "<td>".$table[$i]['REASON']."</td>";
                                                echo "<td>".$table[$i]['DATE']."</td>";
                                
                                                
                                                if($table[$i]['PIC']!="")
                                                {
                                                    echo '<td><img src="'.$table[$i]['PIC'].'" height="70" width="90" onclick="showpicture(\''.$table[$i]['PIC'].'\')"></td>';
                                                }
                                                else
                                                {
                                                    echo "<td></td>";
                                                }
                                                echo "<td>".$table[$i]['USER']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>                              
                            </table>
            </div>
            
    </body>
    
</html>
