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
                if($.cookie('user')!=null)
                {
                    $("#user").val($.cookie('user'));
                    $('select').selectmenu('refresh', true);
                }
            });

            function clk()
            {
                var input_user=$("#user").val();
                $.cookie('user',input_user,{expires:30,path: "/"});
            }

            function check()
            {
                if($("#name").val()=="")
                {
                    alert("故障名不能为空！");
                    return false;
                }
                else if($("#equip").val()=="")
                {
                    alert("设备名不能为空！");
                    return false;
                }
                else if($("#start_time").val()=="" || $("#start_time").val()=="0000-00-00 00:00:00")
                {
                    alert("开始时间不能为空！");
                    return false;
                }
                else if($("#end_time").val()=="" || $("#start_time").val()=="0000-00-00 00:00:00")
                {
                    alert("结束时间不能为空！");
                    return false;
                }
                else if($("#cont").val()=="")
                {
                    alert("故障描述不能为空！");
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
        
        
        <title>故障录入</title>
    </head>
      
    <body>
               
        <div data-role="page">
            
            <div data-role="header">
                <h1>维修履历记录</h1>
            </div>
            
            <div data-role="content">
                <form method="post" id="form" name="form" action="<?php echo base_url();?>index.php/fault_input/save" data-ajax="false" enctype="multipart/form-data" onsubmit="return check()">
                    <label for="name">故障现象：</label>
                    <input type="text" name="name" id="name">
                    
                    <label for="equip">故障设备：</label>
                    <input name="equip" id="equip" list="equip_list" placeholder="故障设备"/>
                    <datalist id="equip_list">
                        <option value="过廊线">glx</option>
                        <option value="内饰线">nsx</option>
                        <option value="底盘一线">dpyx</option>
                        <option value="合装线">hzx</option>
                        <option value="底盘二线">dpex</option>
                        <option value="底盘二线">zzex</option>
                        <option value="车门线">cmx</option>
                        <option value="仪表线">ybx</option>
                        <option value="发动机线">fdjx</option>
                        <option value="EMS线">emsx</option>
                        <option value="座椅线">zyx</option>
                        <option value="轮胎线">ltx</option>
                        <option value="防盗标签打码机">fdbqdmj</option>
                        <option value="仪表台机械手">ybtjxs</option>
                        <option value="激光打码机">jgdmj</option>
                        <option value="前挡玻璃涂胶机器人">qdbltjjqr</option>
                        <option value="后档玻璃涂胶机器人">hdbltjjqr</option>
                        <option value="前减震器压装设备">qjzqyzsb</option>
                        <option value="后减震器压装设备">hjzqyzsb</option>
                        <option value="全景天窗防漏底剂工装">qjtcfldjgz</option>
                        <option value="ZC四轴差速器拧紧机">zcszcsqnjj</option>
                        <option value="ZC差速器分装线">zccsqfzx</option>
                        <option value="冷媒加注机">lmjzj</option>
                        <option value="ZC差速器涂胶机">zccsqtjj</option>
                        <option value="动力转向液加注机">dlzxyjzj</option>
                        <option value="制动液加注机">zdyjzj</option>
                        <option value="防冻液加注机">fdyjzj</option>
                        <option value="汽油加注机">qyjzj</option>
                        <option value="洗涤液加注泵">xdyjzb</option>
                        <option value="二合一加注机">ehyjzj</option>
                        <option value="三合一加注机">shyjzj</option>
                        <option value="电瓶助力机械手">dpzljxs</option>
                        <option value="左拆门助力机械手">zcmzljxs</option>
                        <option value="右拆门助力机械手">ycmzljxs</option>
                        <option value="左装门助力机械手">zzmzljxs</option>
                        <option value="右装门助力机械手">yzmzljxs</option>
                        <option value="左前座椅助力机械手">zqzyzljxs</option>
                        <option value="右前座椅助力机械手">yqzyzljxs</option>
                        <option value="油箱助力机械手">yxzljxs</option>
                        <option value="备胎助力机械手">btzljxs</option>
                        <option value="两柱举升机1">lzjsjy</option>
                        <option value="两柱举升机2">lzjsje</option>
                        <option value="四柱举升机1">szjsjy</option>
                        <option value="四柱举升机2">szjsje</option>
                        <option value="电烤箱1">dkxy</option>
                        <option value="电烤箱2">dkx2</option>
                        <option value="前档玻璃涂胶泵">qdbltjb</option>
                        <option value="后档玻璃涂胶泵">hdbltjb</option>
                        <option value="前挡玻璃输送线">qdblssx</option>
                        <option value="后挡玻璃输送线">hdblssx</option>
                        <option value="发动机油加注泵">fdjyjzb</option>
                        <option value="ZC AT油加注泵">zcatyjzb</option>
                        <option value="ZC CVT油加注泵">zccvtyjzb</option>
                        <option value="S3工位气动葫芦227KG">ssgwqdhleeqgj</option>
                        <option value="S4工位气动葫芦91KG">ssgwqdhljygj</option>
                        <option value="S5工位气动葫芦68KG">swgwqdhllbgj</option>
                        <option value="S6工位气动葫芦91KG">slgwqdhljygj</option>
                        <option value="S8-L工位气动葫芦91KG">sblgwqdhljygj</option>
                        <option value="S8-R工位气动葫芦91KG">sbrgwqdhljygj</option>
                        <option value="ZC、RE差速器60KG">zcrecsqllgj</option>
                        <option value="S14-L工位电动葫芦125KG">syslgwddhlyewgj</option>
                        <option value="S14-R工位电动葫芦125KG">sysrgwddhlyewgj</option>
                        <option value="E4-L工位电动葫芦68KG">eslgwddhllbgj</option>
                        <option value="E4-R工位电动葫芦68KG">esrgwddhllbgj</option>
                        <option value="发动机上线-L KBK500KG">fdjsxlkbkwllgj</option>
                        <option value="发动机上线-R KBK500KG">fdjsxrkbkwllgj</option>
                        <option value="1G工装">yggz</option>
                        <option value="油箱气密性及通气性检测设备">yxqmxjtqxjcsb</option>
                        <option value="轮毂轴承涂黄油设备">lgzcthysb</option>
                        <option value="轮胎拧紧机">ltnjj</option>
                        <option value="Pro-METS">promets</option>
                        <option value="备胎安装小车">btazxc</option>
                        <option value="恒温箱">hwx</option>
                        <option value="扭力追溯系统">nlzsxt</option>
                        <option value="电池合装AGV">dchzagv</option>
                        <option value="交流充电桩">jlcdz</option>
                        <option value="二排座椅助力机械手">epzyzljxs</option>
                        <option value="前减震器安装小车">qjzqazxc</option>
                        <option value="前挡玻璃安装KBK">qdblazkbk</option>
                        <option value="易恒制动液加注机">yhzdyjzj</option>
                    </datalist>
                                       
                    <label for="start">发生时间：</label>
                    <input type="datetime-local" name="start_time" id="start_time" /> 

                    <label for="end">结束时间:</label>
                    <input type="datetime-local" name="end_time" id="end_time" /> 
                    
                    <label for="cause">原因:</label>
                    <textarea name="cause" id="cause"></textarea>
                    
                    <label for="cont">对策:</label>
                    <textarea name="cont" id="cont"></textarea>
                    
                    <label for="part">更换零件:</label>
                    <input type="text" name="part" id="part"></input>
                    
                    <label for="pic">图片:</label>
                    <input type="file" name="file" id="file" />
                    
                    <label for="classes">故障分类：</label>
                    <select name="classes" id="classes">
                        <option value="A">A-设计</option>
                        <option value="B">B-制造</option>
                        <option value="C">C-规格</option>
                        <option value="D">D-修理不良</option>
                        <option value="E">E-点检不良</option>
                        <option value="F">F-润滑不良</option>
                        <option value="G">G-保全失误</option>
                        <option value="H">H-清洁不良</option>
                        <option value="I">I-日常保养</option>
                        <option value="J">J-自然老化</option>
                        <option value="K">K-原因不明</option>
                        <option value="L">L-设备改造</option>
                        <option value="M">M-作业则失误</option>
                    </select>
                    
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
                        <option value="蒋林">蒋林</option>
                        <option value="周坤">周坤</option>
                        <option value="叶立志">叶立志</option>
                        <option value="王达斌">王达斌</option>
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