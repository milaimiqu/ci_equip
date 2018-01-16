<?php
class Home extends MY_Controller{
    public function __construct()
    {
        $this->need_login=TRUE;
        parent::__construct();
        $this->load->model('login_model');
    }
    
    public function index()
    {
        $this->load->view('home/index');
    }
}
?>