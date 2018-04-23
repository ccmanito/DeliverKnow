<?php

namespace Home\Controller;
use Think\Controller;
/*
   @功能:注册模块的实现
   @修改时间:2016-09-21
   @修改人员:koocookie
*/


class RegisteredController extends Controller{
	//进入注册页面
	public function reg(){
		$this->display();
	}

	//检测账号是否被注册
	public function checkName(){
        //echo header("Access-Control-Allow-Origin:*");    //解决跨域问题
    	$username=$_GET['username'];
    	$db=M('UserLogin');
    	$where['u_email']=$username;
    	$where['u_status'] = 1;
        $result=$db->where($where)->find();	  
    	if($result){
    	   $data['status']=1;
    	   $this->ajaxReturn($data);
        }else{
           $data['status']=0;
    	   $this->ajaxReturn($data);
        }
    }
    
    //完善用户信息
    public function user_info(){
       $db_login = M('UserLogin');
       $data_code['u_code'] = $_POST['code'];   //获取验证码
       $data_code['u_id'] = $_GET['id'];
       $count = $db_login->where($data_code)->select(); 
       if($count){                  //如果验证码不匹配
	       $db = M('UserInfo');
	       $data['u_id'] = $data_code['u_id'];
	       $data['u_name'] = $_POST['user_name'];   
	       $data['u_school'] = $_POST['school'];
	       $data['u_class'] = $_POST['class'];
	       $data['u_label'] = $_POST['abstract'];
	       
	       $result = $db->data($data)->add();

	       if($result){	
				$data_login['u_status'] = 1;
				$data_login['u_id'] = $data_code['u_id'];
				$result_login = $db_login->save($data_login);
				if($result_login){
		       		$this->success('用户注册成功!',U('Login/login'));    
		       	}else{
		       	   	$this->error('用户信息添加失败!');
		        }
		   	}else{
		      	$this->error('用户注册失败!');
		   	}
        }else{
        	$this->error('验证码输入有误!');
        }
    }
    
    //跳转到完善个人信息的页面
    public function info(){
        $data['u_id'] = $_GET['id'];
        $this->assign('id',$data['u_id']);
        $db = M('UserLogin');
        $status = $db->where($data)->getField('u_status');
        if($status)
           $this->error('你已经注册成功了!请登录!');         
        else{ 
           $this->display();
        }
    }


    //注册成功将数据保存数据库
	public function reg_succ(){
		$db=M("UserLogin");
		$code = "";
        for($i = 0; $i < 4; $i++){
           	$code .= rand(0,9); 
       	}
       	$data['u_code'] = $code;
		$data['u_email']=$_POST['username'];
		if(!strcmp($_POST['password'],$_POST['password1'])){
			$data['u_paswd'] = md5($_POST['password']);
	        $user['u_email'] = $_POST['username'];
	        $data_update['u_id'] = $db->where($user)->getField('u_id');  //如果账户信息已经存在
	        $data_update['u_paswd'] = md5($_POST['password']);
	        $data_update['u_code'] = $code;
	        if($data_update['u_id']){
                $flag = $db->save($data_update);           //更新最新的密码
	            $user_id = $data_update['u_id'];
	        }else{
		        $result = $db->data($data)->add();           //将用户的登陆信息添加到表中		    	
	            $user_id = $result;
	        }
	        
	        if(isset($result)||isset($flag)){              //如果加入或者修改成功
	           	$mail = A("Mail");
	           	$mail -> index($data['u_email'],$code,$user_id);   //用户注册完后发送邮件，让其确认个人信息。
	        }else{
	           	$this->error('注册失败!');
	        }		   
           
	
		}else{
			$this->error("密码不一致!"); 
		}	
	}


}







