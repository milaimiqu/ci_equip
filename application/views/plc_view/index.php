<!doctype html>
<html>
    
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/jquery.mobile-1.4.5.min.css" />
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.mobile-1.4.5.min.js"></script>
        
        <script type="text/javascript">
        $(document).ready(function(){
            
                var url = "<?php echo base_url();?>resource/json/plc_view_select.json";
                var areaJson;
                var temp_html;

                //初始化设备名称
                var equip = function(){
                    $.each(areaJson,function(i,equip){
                        temp_html+="<option value='"+equip.equip+"'>"+equip.equip+"</option>";
                    });
                    $("#equip").html(temp_html);
                    $('select').selectmenu('refresh', true);
                    drive();
                };
                //赋值驱动名称
                var drive = function(){
                    temp_html = ""; 
                    var n = $("#equip").get(0).selectedIndex;
                    $.each(areaJson[n].drive,function(i,drive){
                        temp_html+="<option value='"+drive.drive_name+"'>"+drive.drive_name+"</option>";
                    });
                    $("#drive").html(temp_html);
                    $('select').selectmenu('refresh', true);
                    action();
                };
                //赋值动作
                var action = function(){
                    temp_html = ""; 
                    var m = $("#equip").get(0).selectedIndex;
                    var n = $("#drive").get(0).selectedIndex;
                    if(typeof(areaJson[m].drive[n].action) == "undefined"){
                        $("#drive_action").css("display","none");
                    }else{
                        $("#drive_action").css("display","inline");
                        $.each(areaJson[m].drive[n].action,function(i,action){
                            temp_html+="<option value='"+action.action_name+"'>"+action.action_name+"</option>";
                        });
                        $("#drive_action").html(temp_html);
                        $('select').selectmenu('refresh', true);
                    };
                };
                //选择设备改驱动
                $("#equip").change(function(){
                    drive();
                });
                //选择驱动改动作
                $("#drive").change(function(){
                    action();
                });
                //获取json数据
                $.getJSON(url,function(data){
                    areaJson = data;
                    equip();
                });
             
        });
        
        function check()
            {   
                if($("#equip").val()=="" || $("#equip").val()=="请选择")
                {
                    alert("线体不能为空！");
                    return false;
                }
                else if($("#drive").val()=="" || $("#drive").val()=="请选择")
                {
                    alert("驱动不能为空！");
                    return false;
                }
                else if($("#drive_action").val()=="" || $("#drive_action").val()=="请选择")
                {
                    alert("动作不能为空！");
                    return false;
                }
                else
                {
                    form1.submit();
                    return true;
                }
            }
        
        </script>
              
        <title>现场IO查看</title>
    </head>
      
    <body>
               
        <div data-role="page">
            
            <div data-role="header">
                <h1>现场IO查看</h1>
            </div>
            
            <div data-role="content">
                <form method="post" id="form1" name="form1" action="<?php echo base_url();?>index.php/plc_view/show_state"  onsubmit="return check()">

                        <label for="equip">设备名称：</label>
                        <select name="equip" id="equip">
                            <option>请选择</option>
                        </select>

                        <label for="drive">驱动名称：</label>
                        <select name="drive" id="drive">
                            <option>请选择</option>
                        </select>

                        <label for="drive_action">动作：</label>
                        <select name="drive_action" id="drive_action">
                            <option>请选择</option>
                        </select>

                    
                    <input type="submit" value="提交" onclick="check()">
                </form>
            </div>
 
            <div data-role="footer">
                <h1>copyright 谜来谜去</h1>
            </div>
            
        </div>
    </body>
    
</html>
