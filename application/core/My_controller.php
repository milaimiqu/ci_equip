<?php
/*
 * 这个类用于全局登陆验证，其他需要验证的类继承该类。
 * 在构造时（ __construct ），需将 $need_login 赋值为 true。
 * 再继承该类的构造函数。
 */

class MY_Controller extends CI_Controller{
    
    public $need_login=false;
    
    public function __construct() {
        parent::__construct();
        $this->check_login();
    }

/*
 * 函数名：check_login
 * 用于检测当前页面是否需要登陆，需登陆时会检查全局变量$SESSION['name']是否赋值。
 * 若未赋值则跳转到未登陆的提示页面。
 */
    private function check_login()
    {
        if($this->need_login)
        {
            if(!isset($_SESSION['name']))
            {
                redirect('/login/unlogin','refresh');
            }
        }
    }   
}
?>
