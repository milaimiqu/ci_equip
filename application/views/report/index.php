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
                var st=$("#starttime").val();

                window.location.href="<?php echo base_url();?>index.php/Report/index/"+st; 
            }
            
            function excel()
            {
                var st=$("#starttime").val();

                if(st==="")
                {
                    alert("时间不能为空");
                }
                else
                {
                    window.location.href="<?php echo base_url();?>index.php/Report/excel/"+st;
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
                        <span class="input-group-addon">选择日期</span>
                        <input class="form-control select" id=starttime name=starttime value="" readonly class="Wdate" type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});"/>
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
                <center><H2><?php echo $date."  业务日报"?></H2></chenter>
                <h4 align="left">设备故障实绩</h4>
                <h5 align="left">A-设计 B-制造 C-规格 D-修理不良 E-点检不良 F-润滑不良 G-保全失误 H-清洁不良 I-日常保养 J-自然老化 K-原因不明 L-设备改造 M-作业者失误</h5>
                            <table class="table table-bordered" style="font-size:6px;text-align:center">
                                    <thead>
                                        <tr>
                                            <th>序号</th><th>设备名称</th><th>发生时间</th><th>现象描述</th><th>原因</th><th>对策</th><th>担当</th><th>修复时间(s)</th><th>故障分类</th><th>图片</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i=0;isset($table[0][$i]['NAME']);$i++)
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
                                                echo "<td>".$table[0][$i]['EQUIP']."</td>";
                                                echo "<td>".$table[0][$i]['START_TIME']."</td>";
                                                echo "<td>".$table[0][$i]['NAME']."</td>";
                                                echo "<td>".$table[0][$i]['CAUSE']."</td>";
                                                echo "<td>".$table[0][$i]['CONT']."</td>";
                                                echo "<td>".$table[0][$i]['USER']."</td>";
                                                echo "<td>".((strtotime($table[0][$i]['END_TIME'])-strtotime($table[0][$i]['START_TIME'])))."</td>";
                                                echo "<td>".$table[0][$i]['CLASSES']."</td>";
                                                
                                                if($table[0][$i]['PIC']!="")
                                                {
                                                    echo '<td><img src="'.$table[0][$i]['PIC'].'" height="70" width="90" onclick="showpicture(\''.$table[0][$i]['PIC'].'\')"></td>';
                                                }
                                                else
                                                {
                                                    echo "<td></td>";
                                                }
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                            </table>
                
                <h4 align="left">保全业务实绩</h4>
                <h5 align="left">1-定期点检/调整 2-定期部品/润滑油更换 3-定期加油/加脂 4-设备清扫点检/锁紧 5-故障原因调查 6-故障原因对策 7-设备改良 8-事务所、作业场所、架台上3S</h5>
                <h5 align="left">9-不稼动管理/报告作成 10-计划/日程表作成 11-商讨/会议出席 12-休息日作业准备 13-业务环境改善 14-生产技术要望 15-现场作业要望 16-其他</h5>
                            <table class="table table-bordered" style="font-size:6px;text-align:center">
                                    <thead>
                                        <tr>
                                            <th>序号</th><th>设备名称</th><th>日期</th><th>工时(min)</th><th>保养内容</th><th>类别</th><th>担当</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i=0;isset($table[1][$i]['EQUIP']);$i++)
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
                                                echo "<td>".$table[1][$i]['EQUIP']."</td>";
                                                echo "<td>".$table[1][$i]['DATE']."</td>";
                                                echo "<td>".$table[1][$i]['TIME']."</td>";
                                                echo "<td>".$table[1][$i]['CONT']."</td>";
                                                echo "<td>".$table[1][$i]['CLASSES']."</td>";
                                                echo "<td>".$table[1][$i]['USER']."</td>";
                                                
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                            </table>
            </div>
            
    </body>
    
</html>