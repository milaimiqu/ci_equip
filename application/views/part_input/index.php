<!doctype html>
<html>
    
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/jquery.mobile-1.4.5.min.css" />
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.mobile-1.4.5.min.js"></script>

        <script language="javascript" type="text/javascript">  
            $(document).ready(function()
            {
                if($.cookie('user')!==null)
                {
                    $("#user").val($.cookie('user'));
                    $('select').selectmenu('refresh', true);
                }
            });

            function getname(str)
            {
                if (str.length===0)
                {
                  document.getElementById("name").value="";
                  return;
                }

                
                $.ajax({
                    type:"GET",
                    url:"<?php echo base_url();?>index.php/part_input/getname",
                    data:{"str":str},
                    dataType:"jsonp",
                    async:true,
                    success:function(back){
                        //var obj = back.parseJSON();
                        $("#name_list option").remove();
                        
                        $.each(back, function (infoIndex,info){
                            $("#name_list").append("<option value='"+info["NAME"]+"'>"+info["NAME"]+"</option>");
                        }); 
                    },
                    error:function(e){
                        alert(arguments[1]);
                    }
                
                });
            }
            
            function getmodel()
            {
                var str=document.getElementById("name").value;
               
                
                $.ajax({
                    type:"GET",
                    url:"<?php echo base_url();?>index.php/part_input/getmodel",
                    data:{"str":str},
                    dataType:"jsonp",
                    async:true,
                    success:function(back){
                        //var obj = back.parseJSON();
                        $("#model_list option").remove();
                        
                        $.each(back, function (infoIndex,info){
                            $("#model_list").append("<option value='"+info["MODEL"]+"'>"+info["MODEL"]+"</option>");
                        }); 
                    },
                    error:function(e){
                        alert(arguments[1]);
                    }
                
                });
            }
            
            function getcount()
            {
                var str1=document.getElementById("name").value;
                var str2=document.getElementById("model").value;
                
                $.ajax({
                    type:"GET",
                    url:"<?php echo base_url();?>index.php/part_input/getcount",
                    data:{"str1":str1,"str2":str2},
                    dataType:"jsonp",
                    async:true,
                    success:function(back){
                        //var obj = back.parseJSON();
                        $("#nowcount").empty();
                         $.each(back, function (infoIndex,info){
                            $("#nowcount").append("仓库数量："+info["COUNT"]);
                            $("#brand").val(info["BRAND"]);
                        });
                    },
                    error:function(e){
                        alert(arguments[1]);
                    }
                
                });
            }
            
            function clk()
            {
                var input_user=$("#user").val();
                $.cookie('user',input_user,{expires:30,path: "/"});
            }

            function check()
            {
                if($("#name").val()=="")
                {
                    alert("备件名不能为空！");
                    return false;
                }
                else if($("#model").val()=="")
                {
                    alert("型号不能为空！");
                    return false;
                }
                else if($("#count").val()=="")
                {
                    alert("申报数量不能为空！");
                    return false;
                }
                else if($("#reason").val()=="")
                {
                    alert("申报理由不能为空！");
                    return false;
                }
                else
                {
                    var input_user=$("#user").val();
                    $.cookie('user',input_user,{expires:30});
                    form.submit();
                }
            }
        </script>
        
        
        <title>备件申报</title>
    </head>
      
    <body>
               
        <div data-role="page">
            
            <div data-role="header">
                <h1>备件申报</h1>
            </div>
            
            <div data-role="content">
                <form method="post" id="form" name="form" action="<?php echo base_url();?>index.php/part_input/save" data-ajax="false" enctype="multipart/form-data" onsubmit="return check()">
                    
                    <label for="name">备件名称：</label>
                    <input type="text" list="name_list" onkeyup="getname(this.value)" name="name" id="name" placeholder="设备名称"/>
                    <datalist name="name_list" id="name_list">
                    </datalist>
                    
                    <label for="model">备件型号：</label>
                    <input type="text" list="model_list" onclick="getmodel()" onchange="getcount()" name="model" id="model" placeholder="型号"/>
                    <datalist name="model_list" id="model_list">
                    </datalist>
                    <p name="nowcount" id="nowcount">仓库数量：0</p>
                    
                    <label for="brand">品牌：</label>
                    <input type="text" name="brand" id="brand" placeholder="品牌"/>
                    
                    <label for="count">申报数量:</label>
                    <input type="number" name="count" id="count" />
                    
                    <label for="reason">申报理由:</label>
                    <textarea name="reason" id="cont"></textarea>
                    
                    <label for="pic">图片:</label>
                    <input type="file" name="file" id="file" />
                    
                    <label for="user">录入人：</label>
                    <select name="user" id="user">
                        <option value="段旭波">段旭波</option>
                        <option value="陈广">陈广</option>
                        <option value="吴浩">吴浩</option>
                        <option value="武翔">武翔</option>
                        <option value="李兴良">李兴良</option>
                        <option value="黄茂青">黄茂青</option>
                        <option value="殷跃宇">殷跃宇</option>
                        <option value="田智超">田智超</option>
                        <option value="王祖强">王祖强</option>
                        <option value="谭亚泓">谭亚泓</option>
                        <option value="范瑶">范瑶</option>
                        <option value="王磊">王磊</option>
                    </select>
                    
                    <input type="button" data-inline="true" value="提交" onclick="check()">
                </form>
            </div>
            
            <div data-role="footer">
                <h1>copyright 谜来谜去</h1>
            </div>
            
        </div>
    </body>
    
</html>