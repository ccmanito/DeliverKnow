<?php

namespace Home\Controller;
use Think\Controller;

class UserController extends  CommonController{

    //修改密码
	public function savepw(){
        $oldpw=md5($_POST['oldpw']);
        $newpw=md5($_POST['newpw']);
        $nextpw=md5($_POST['nextpw']);
        $db=M('UserLogin');
        $data['u_paswd']=$oldpw;
        $data['u_email']=$_SESSION['username'];
        $result=$db->where($data)->getField('u_id');
        if($result){
            if(!strcmp($newpw,$nextpw)){
                $db_user=M('UserLogin');
                $data_user['u_id']=$_SESSION['id'];
                $data_user['u_paswd']=$nextpw;
                $result_user=$db->save($data_user);
                if($result_user){
                	$this->success('密码修改成功,当前登录过期',U('Login/outlogin'));
                }
            }else{
            	$this->error("两次密码输入不一致!");
            } 
        }else{
        	$this->error("密码错误!");
        }
	}
    
    //用户信息修改
	public function user(){

	}

}

?>