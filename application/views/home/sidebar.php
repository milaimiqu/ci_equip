<script src="<?php echo base_url();?>resource/js/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
    
$(document).ready(function()
{
    $("#ul3").hide();
    $("#ul1").hide();
    
    $("#li1").click(function()
    {
        $("#ul1").toggle();
    });
    
    
    $("#li5").click(function()
    {
        $("#ul3").toggle();
    });
    
});
</script>

<body >  

<ul id="ul2">

<li id="li1">设备管理</li>    
    <ul id="ul1">
        <li id="li2"><a <?php echo 'href="'.base_url().'index.php/home/test" target="main"'?>>设备台账</a></li>
        <li id="li3"><a href="fault.php" target="main">设备备件</a></li>
    </ul>

<li id="li5">工具管理</li>
    <ul id="ul3">
        <li id="li6"><a <?php echo 'href="'.base_url().'index.php/tools/tools_stock_index/1" target="main"'?>>工具库存</a></li>
        <li id="li7"><a <?php echo 'href="'.base_url().'index.php/tools/tools_index/1" target="main"'?>>工具台账</a></li>
        <li id="li8"><a href="" target="main">工具备件</a></li>
        <li id="li9"><a href="route.php?control=tools_stock&action=in" target="main">工具入库</a></li>
        <li id="li10"><a href="route.php?control=tools_stock&action=out" target="main">工具维修</a></li>
        <li id="li11"><a href="route.php?control=event&action=display&page=1" target="main">事件记录</a></li>
    </ul>
</ul>

</body>