$(document).ready(function()
{
    $("#fault").click(function()
    {
        document.getElementById("main_view").src="http://www.baidu.com";
        $("#main_view").attr('src','http://www.baidu.com');
    });
    
    
    $("#tools").click(function()
    {
        $("#ul3").toggle();
    });
    
});

