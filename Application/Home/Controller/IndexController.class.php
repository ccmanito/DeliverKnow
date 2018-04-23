<?php

namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController{
    //主页信息的显示
    public function home(){
    	$db = M('UserInfo');
        $user_info['u_id'] = $_SESSION['id'];
        $user_name = $db->where($user_info)->getField('u_name',1);
        $this->assign('username',$user_name);
        $con=A("Team");    
        $con->pro_con();    //调用Team控制器中的pro_con方法
        $this->display();
    }

    //个人中心的信息显示
    public function person_info(){
        $id = $_SESSION['id'];
        $data_user_info['u_id'] = $id;
        $con=A("Team");    
        $con->pro_con();    //调用Team控制器中的pro_con方法
        $db_user_info = M('UserInfo');
        $result = $db_user_info->where($data_user_info)->getField('u_name,u_class,u_school,u_label,u_exp',1);
        $this->assign('info',$result);
        $this->display();
    }

    //搜索的界面
    public function search(){
        $this->display();
    }

    //系统消息的显示
    public function notify(){
        $db = M('SystemMessage');
        $data['u_email'] = $_SESSION['username'];
        $arr = $db->where($data)->getField('ss_id,ss_title,ss_content,ss_time',1000);  //获取系统的消息
        $this->assign('ss',$arr);      
        $this->display();
    }

    //系统消息的删除
    public function del_message(){
        $ss_id = $_GET['id'];
        $db = M('SystemMessage');
        $data['ss_id'] = $ss_id;
        $result = $db->where($data)->delete();
        if($result){
            $this->ajaxReturn('1');
            exit;
        }else{
            $this->ajaxReturn('0');
        }   
    }
}


