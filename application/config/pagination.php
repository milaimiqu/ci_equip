<?php
$config['uri_segment'] = 3;

$config['full_tag_open'] = '<ul class="pagination">';
//把打开的标签放在所有结果的左侧。
 
$config['full_tag_close'] = '</ul>';
//把关闭的标签放在所有结果的右侧。
 
//自定义起始链接
 
$config['first_link'] = '第一页';
//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
 
$config['first_tag_open'] = '<li>';
//“第一页”链接的打开标签。
 
$config['first_tag_close'] = '</li>';
//“第一页”链接的关闭标签。
 
//自定义结束链接
 
$config['last_link'] = '最后一页';
//你希望在分页的右边显示“最后一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
 
$config['last_tag_open'] = '<li>';
//“最后一页”链接的打开标签。
 
$config['last_tag_close'] = '</li>';
//“最后一页”链接的关闭标签。
 
//自定义“下一页”链接
 
$config['next_link'] = '>';
//你希望在分页中显示“下一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
 
$config['next_tag_open'] = '<li>';
//“下一页”链接的打开标签。
 
$config['next_tag_close'] = '</li>';
//“下一页”链接的关闭标签。
 
//自定义“上一页”链接
 
$config['prev_link'] = '<';
//你希望在分页中显示“上一页”链接的名字。如果你不希望显示，可以把它的值设为 FALSE 。
 
$config['prev_tag_open'] = '<li>';
//“上一页”链接的打开标签。
 
$config['prev_tag_close'] = '</li>';
//“上一页”链接的关闭标签。
 
//自定义“当前页”链接
 
$config['cur_tag_open'] = '<li class="active"><a href="#">';
//“当前页”链接的打开标签。
 
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
//“当前页”链接的关闭标签。
 
//自定义“数字”链接
 
$config['num_tag_open'] = '<li>';
//“数字”链接的打开标签。
 
$config['num_tag_close'] = '</li>';
//“数字”链接的关闭标签。
?>
