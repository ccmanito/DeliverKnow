<?php

namespace Home\Controller;
use Think\Controller;
/*
   @功能:登陆模块的实现
   @修改时间:2016-09-20
   @修改人员:koocookie
*/
class  LoginController extends Controller {
	//显示登陆界面
	public function index(){
		$this->display();
	}
    
    //判断登陆
	public function dologin(){
		$db=M("UserLogin");
		$data['u_email']=$_POST['username'];
		$data['u_paswd']=md5($_POST['password']);
        $data['u_status'] = 1;
		$code=$_POST['code'];
        $verify = new \Think\Verify();   //判断验证的内置方法
        if($verify->check($code, $id)){
            $id=$db->where($data)->getField('u_id');
            if($id){
            	$_SESSION['username'] = $data['u_email'];
                $_SESSION['id'] = $id; 
            	if($data['u_email'] == 'admin@123.com'){
                    $this->success('登录成功',U('Super/index'));
                }else{
                    $this->success('登录成功',U('Index/home'));
                }
            }else{
            	$this->error('登录失败');
            }
        }else{
        	$this->error("验证码错误!");
        }
    }
     
    //找回密码
    public function zhpw(){
        $this->display();   
    }
    
    //重置密码
    public function password(){
        $u_email = $_POST['username'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];
        $code = $_POST['code'];
        if($password == $password1){   //判断两次密码是否一致
            $db = M('UserLogin');
            $data['u_email'] = $u_email;
            $data['u_code'] = $code;
            $u_id = $db->where($data)->getField('u_id',1);   //判断验证码是否正确
            if($u_id){
                $data_up['u_id'] = $u_id;
                $data_up['u_paswd'] = md5($password);
                $result = $db->save($data_up);  //将密码更新
                if($result){
                    $this->success('密码修改成功!!!');
                }else{
                    $this->error('密码修改成功!!!');
                }        
            }else{
                $this->error('验证码错误!!!');
            }
        }else{
            $this->error('密码不一致!!!');
        }
    } 
    
    //退出登录
    public function outlogin(){
     	if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}
			session_unset();
			session_destroy();
			$this->redirect('Login/index');
        }
}
?>