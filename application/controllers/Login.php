<?php
/*
 * Login 类用于登陆验证，index函数默认为首页。
 */

class Login extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    
    public function index()
    {
        $this->load->view('login/index');
    }
    
    /*
     * 函数：login
     * 1、读取登陆账号密码，验证密码是否正确。
     * 2、正确后将用户名写入全局变量SESSION['name']。
     * 3、不正确则输出提示。
    */
    public function login()
    {
        //获取提交的账号密码
        $user=$this->input->post('user');
        $pwd=$this->input->post('pwd');
        
        //密码MD5加密
        $pwd=md5($pwd);
        
        //验证账号密码
        $result=$this->login_model->check_login($user,$pwd);
        
        //判断密码是否正确
        if($result)
        {
            $_SESSION['name']=$result;
            $_SESSION['LV']=1;
            redirect('/home/index','refresh');
        }
        else
        {
            echo "用户名或密码错误！";
        }
    }
    
    /*
     * 函数名：unlogin
     * 各页面验证是否已登陆状态时若判断未登陆则调用此函数。跳转到未登陆的提示页面。
     */
    public function unlogin()
    {
        $this->load->view('login/unlogin');
    }
    
    /*
     * 函数名：loginout
     * 登出，清除SESSION。
     * 跳转回登陆页面。
     */
    public function loginout()
    {
        unset($_SESSION['name']);
        redirect('','refresh');
    }
}

?>