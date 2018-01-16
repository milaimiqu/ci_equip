<!doctyoe html>
<html lang="zh-cn">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
  
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/dashboard.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/main.css?v=2">

        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/WdatePicker.js"></script>
        
        <script language="javascript" type="text/javascript">
            $(document).ready(function()
            {
                if($.cookie('search_mode')!=null)
                {
                    if(($.cookie('search_mode')==1))
                    {
                        $("#select1").val($.cookie('search_mode'));
                    }
                    else if($.cookie('search_mode')==2)
                    {
                        $("#select1").val($.cookie('search_mode'));
                        $("#starttime").val($.cookie('starttime'));
                        $("#endtime").val($.cookie('endtime'));
                    }
                    else if($.cookie('search_mode')==3)
                    {
                        $("#select1").val($.cookie('search_mode'));
                        $("#vin").val($.cookie('vin'));
                    }
                }
            });
            
            function go_search()
            {
               if($("#select1").val()==1)
                {
                    //写cookie
                    $.cookie('search_mode',$("#select1").val(),{ path: "/"});
                    
                    window.location.href="<?php echo base_url();?>index.php/brakefilling/index/0/"+$("#select1").val()+"/"+$("#starttime").val()+"/"+$("#endtime").val()+"/"+$("#vin").val();
                }
                else if($("#select1").val()==2)
                {
                    if($("#starttime").val()=="" || $("#endtime").val()=="")
                    {
                        alert("开始时间和结束时间均不能为空！");
                    }
                    else
                    {
                        $.cookie('search_mode',$("#select1").val(),{ path: "/"});
                        $.cookie('starttime',$("#starttime").val(),{ path: "/"});
                        $.cookie('endtime',$("#endtime").val(),{ path: "/"});
                        
                        window.location.href="<?php echo base_url();?>index.php/brakefilling/index/0/"+$("#select1").val()+"/"+$("#starttime").val()+"/"+$("#endtime").val()+"/"+$("#vin").val();
                    }
                }
                else if($("#select1").val()==3)
                {
                    if($("#vin").val()=="")
                    {
                        alert("VIN不能为空！");
                    }
                    else
                    {
                        $.cookie('search_mode',$("#select1").val(),{ path: "/"});
                        $.cookie('vin',$("#vin").val(),{ path: "/"});
                        window.location.href="<?php echo base_url();?>index.php/brakefilling/index/0/"+$("#select1").val()+"/"+$("#vin").val();
                    }
                }
            }
            
            function excel()
            {
                var st=$("#starttime").val();
                var et=$("#endtime").val();

                if(st==""||et=="")
                {
                    alert("时间不能为空");
                }
                else
                {
                    window.location.href="<?php echo base_url();?>index.php/brakefilling/excel/"+st+"/"+et;
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
            <div class="col-md-2 column">
                <form class="bs-example bs-example-form" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">查询方式</span>
                        <select class="form-control" name="select1" id="select1">
                            <option value=1>全部</option>
                            <option value=2>按时间</option>
                            <option value=3>VIN</option>
                        </select>
                    </div>
                </form>
            </div>
            
            <div class="col-md-2 column">
                <form class="bs-example bs-example-form" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">VIN</span>
                        <input class="form-control select" id=vin name=vin type="text"/>
                    </div>
                </form>    
            </div>
            
            <div class="col-md-3 column">
                <form class="bs-example bs-example-form" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">开始时间</span>
                        <input class="form-control select" id=starttime name=starttime value="" readonly class="Wdate" type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});"/>
                    </div>
                </form>    
            </div>
            
            <div class="col-md-3 column">
                <form class="bs-example bs-example-form" role="form">
                    <div class="input-group">
                        <span class="input-group-addon">结束时间</span>
                        <input class="form-control select" id=endtime name=endtime value="" readonly class="Wdate" type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});"/>
                    </div>
                </form>          
            </div>
            
            <div class="col-md-1 column">
                <input class="btn btn-primary btn-block" type="submit" value="查询" name="search" id="search" onclick="go_search()"/>
            </div>
            <div class="col-md-1 column">
                <input class="btn btn-primary btn-block" type="submit" value="导出" name="excel" id="excel" onclick="excel()" />
            </div> 
        </div>
        
            <div class="col-md-12 column">
                            <table class="table table-bordered" style="font-size:12px;text-align:center">
                                    <thead>
                                        <tr>
                                            <th>序号</th><th>VIN</th><th>车型</th><th>真空值</th><th>保压泄露</th><th>加注压力</th><th>压力泄露</th><th>加注量</th><th>加注枪</th><th>循环时间</th><th>加注结果</th><th>加注时间</th><th>上传时间</th><th>设备名称</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i=0;($i<10)&&isset($table[$i]['ID']);$i++)
                                            {
                                                if($i%2!=0)
                                                {
                                                    $color="success";
                                                }
                                                else
                                                {
                                                    $color="";
                                                }
                                                
                                                if($table[$i]['RESULT']=="NG")
                                                {
                                                    $color="danger";
                                                }
                                                
                                                echo "<tr class=".$color.">";
                                                echo "<td>".($i+$offset+1)."</td>";
                                                echo "<td>".$table[$i]['VIN']."</td>";
                                                echo "<td>".$table[$i]['CARTYPE']."</td>";
                                                echo "<td>".$table[$i]['VACUUM']."</td>";
                                                echo "<td>".$table[$i]['VACUUM_TEST']."</td>";
                                                echo "<td>".$table[$i]['PRESSURE']."</td>";
                                                echo "<td>".$table[$i]['PRESSURE_TEST']."</td>";
                                                echo "<td>".$table[$i]['FILL']."</td>";
                                                echo "<td>".$table[$i]['GUN']."</td>";
                                                echo "<td>".$table[$i]['CY_TIME']."</td>";
                                                echo "<td>".$table[$i]['RESULT']."</td>";
                                                echo "<td>".$table[$i]['INPUT_TIME']."</td>";
                                                echo "<td>".$table[$i]['SEND_TIME']."</td>";
                                                echo "<td>".$table[$i]['EQUIPMENT_NAME']."</td>";
                                                
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>                              
                            </table>
                            <?php echo $this->pagination->create_links();?>
            </div>
            
    </body>
    
</html>