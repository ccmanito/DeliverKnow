<?php
 namespace Home\Controller;
 use Think\Controller;
 
 //管理员模块
 class SuperController extends CommonController{
 	 
 	 //进入管理员界面
 	 public function index(){ 
 	 	$this->display();   
 	 }

 	 //团队管理
 	 public function team(){
 	 	$db = M('TeamInfo');
 	 	$count = $db->count();
 	 	$arr = $db->getField('t_id,t_number,t_name,u_id,t_time,t_num',1000);   //获取团队信息
 	 	$this->assign('info',$arr);
 	 	$this->assign('count',$count);   
 	 	$this->display();
 	 }

 	 //管理员发布用户消息
 	 public function send_message(){
        $this->display();
 	 }
     
     //发送消息的处理
 	 public function admin_send(){
 	 	$data['u_email'] = $_POST['username'];
        $data['ss_title'] = $_POST['title'];
        $data['ss_content'] = $_POST['content'];
 	    $data['ss_time'] = time();
 	    $db = M('SystemMessage');
        $result = $db->data($data)->add();
 	    if($result){
 	    	$this->success('消息发送成功!');
 	    }else{
 	    	$this->error('消息发送失败!');
 	    }
 	 }

 	 //投诉信息的处理
 	 public function report(){
        $data_set['s_id'] = $_GET['id'];
        $db_set = M('SetMessage');
        $data['s_title'] = $db_set->where($data_set)->getField('s_title');  //获得被举报帖子的名称
 	 	$db = M('ReportMessage');
 	    $data['s_id'] = $s_id;
 	    $data['u_email'] = $_SESSION['username'];
 	    $data['r_content'] = $_POST['content'];
 	    $data['r_time'] = time();  
 	    $result = $db->data($data)->add();
 	    if($result){
           $this->success('举报成功,系统已受理!');
 	    }else{
 	       $this->error('举报失败!');
 	    }
 	 }

 	 //投诉信息的显示
 	 public function appeal(){
 	 	$db = M('ReportMessage');
 	 	$arr = $db->select();
 	 	$this->assign('report',$arr); //展示投诉界面
 	 	$this->display();
 	 }
     
 }