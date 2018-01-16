<!doctype html>

<html>
    
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/jquery.mobile-1.4.5.min.css" />
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>resource/js/jquery.mobile-1.4.5.min.js"></script>
        
        <style>
        .ui-block-a, 
        .ui-block-b, 
        .ui-block-c,
        .ui-block-d
        {
        background-color: lightgray;
        border: 1px solid black;
        height: 50px;
        font-size: 10px;
        text-align: center;
        padding: 1px;
        }
        </style>
        
        <title>IO状态</title>
    </head>
  
    <body>
               
        <div data-role="page">
            <div data-role="header">
                <p><?php echo $equip." ".$drive." ".$action." "?>IO状态</p>
            </div>
            
            <div data-role="content">
                <div class="ui-grid-c">
                <?php
                    echo '<div class="ui-block-a"><span style="vertical-align:middle;text-align:center">名称</span></div>';
                    echo '<div class="ui-block-b"><span>地址</span></div>';
                    echo '<div class="ui-block-c"><span>状态</span></div>';
                    echo '<div class="ui-block-d"><span>备注</span></div>';
                    
                    for($i=0;isset($io_list[$i]['NAME']);$i++)
                    {
                        echo '<div class="ui-block-a"><span>'.$io_list[$i]['NAME'].'</span></div>';
                        echo '<div class="ui-block-b"><span>'.$io_list[$i]['ADDRESS'].'</span></div>';
                        if(isset($io_state[$i]))
                        {
                            if($io_state[$i]=="True"&&$io_list[$i]['NC']==0  || $io_state[$i]=="False"&&$io_list[$i]['NC']==1 )
                            {
                                $color="#00ff00";//绿色
                            }
                            else
                            {
                                $color="#ff0000";//红色
                            }
                            
                            echo '<div class="ui-block-c" style="background:'.$color.'"><span>'.$io_state[$i].'</span></div>';
                        }
                        else
                        {
                            echo '<div class="ui-block-c"><span>未获取</span></div>';
                        }
                        echo '<div class="ui-block-d"><span>'.$io_list[$i]['NOTIC'].'</span></div>';
                    }
                ?>
              </div>
            </div>
            
             <div data-role="footer">
                <h1>copyright 谜来谜去</h1>
            </div>
        </div>
    </body>
</html>