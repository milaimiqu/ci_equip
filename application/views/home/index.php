<!doctyoe html>
<html lang="zh-cn">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
  
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/dashboard.css">

        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/bootstrap.min.js"></script>
       
        
        <script language="javascript" type="text/javascript">
        $(document).ready(function()
        {
            $("#fault").click(function()
            {
                $("#li2").attr("class","active");
                $("#li1").attr("class","");
                $("#li3").attr("class","");
                $("#li4").attr("class","");
                $("#li5").attr("class","");
                $("#li6").attr("class","");
                $("#li7").attr("class","");
            });

            $("#brakefilling").click(function()
            {
                $("#li3").attr("class","active");
                $("#li1").attr("class","");
                $("#li2").attr("class","");
                $("#li4").attr("class","");
                $("#li5").attr("class","");
                $("#li6").attr("class","");
                $("#li7").attr("class","");
            });
            
            $("#acfilling").click(function()
            {
                $("#li4").attr("class","active");
                $("#li1").attr("class","");
                $("#li2").attr("class","");
                $("#li3").attr("class","");
                $("#li5").attr("class","");
                $("#li6").attr("class","");
                $("#li7").attr("class","");
            });
            
            $("#llcfilling").click(function()
            {
                $("#li5").attr("class","active");
                $("#li1").attr("class","");
                $("#li2").attr("class","");
                $("#li3").attr("class","");
                $("#li4").attr("class","");
                $("#li6").attr("class","");
                $("#li7").attr("class","");
            });
            
            $("#report").click(function()
            {
                $("#li6").attr("class","active");
                $("#li1").attr("class","");
                $("#li2").attr("class","");
                $("#li3").attr("class","");
                $("#li4").attr("class","");
                $("#li5").attr("class","");
                $("#li7").attr("class","");
            });
            
            $("#partorder").click(function()
            {
                $("#li7").attr("class","active");
                $("#li1").attr("class","");
                $("#li2").attr("class","");
                $("#li3").attr("class","");
                $("#li4").attr("class","");
                $("#li5").attr("class","");
                $("#li6").attr("class","");
            });

        });
        </script>
        
        
        </head>
    
        <body class="main_body">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b>总装科设备系管理系统</b></a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><?php echo "欢迎 ".$_SESSION['name'];?></a></li>
                        <li><a class="top_info" <?php echo "href='".base_url()."index.php/login/loginout'";?>>退出</a></li>
                    </ul>
                  </div>
                  </div>
                </nav>
            
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-1 sidebar">
                      <ul class="nav nav-sidebar">
                        <li id="li1" class="active"><a href="">主页</a></li>
                        <li id="li2"><a id="fault" <?php echo "href='".base_url()."index.php/equip_fault/index/0/1'";?> target="main_view">故障履历</a></li>
                        <li id="li6"><a id="report" <?php echo "href='".base_url()."index.php/report/index'";?> target="main_view">业务日报</a></li>
                        <li id="li7"><a id="partorder" <?php echo "href='".base_url()."index.php/partorder_view/index/0/1'";?> target="main_view">备件申报</a></li>
                        <li id="li3"><a id="brakefilling" <?php echo "href='".base_url()."index.php/brakefilling/index/0/1'";?> target="main_view">制动液记录</a></li>
                        <li id="li4"><a id="acfilling" <?php echo "href='".base_url()."index.php/acfilling/index/0/1'";?> target="main_view">冷媒记录</a></li>
                        <li id="li5"><a id="llcfilling" <?php echo "href='".base_url()."index.php/llcfilling/index/0/1'";?> target="main_view">防冻液记录</a></li>
                      </ul>
                    </div>
                        
                    <div class="col-md-11 col-md-offset-1 main">
                        <div id="main" height="100%">
                            <iframe id="main_view" name="main_view" width="100%" height="700" scrolling="auto" frameborder="no" border="0" marginwidth="0" marginheight="0" allowtransparency="yes" src="" ></iframe>
                        </div>
                    </div>
                    </div>
                </div>
           
        </body>
</html>  

