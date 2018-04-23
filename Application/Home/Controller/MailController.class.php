<?php
namespace Home\Controller;
use Think\Controller;

class MailController extends Controller{

    //注册时发送邮件
    public function index($u_email,$u_code,$u_id){
    	$address = $u_email;
    	$title="账号注册";
    	$body="<a href='http://localhost/zz/index.php/Home/Registered/info/id/$u_id'>进入完成注册</a>"." "."验证码:".$u_code;
    	$status=SendMail($address,$title,$body);   //邮件的整体格式
    	if(!$status) {
    		$this->error("邮件发送失败,请重试!:" . $mail->ErrorInfo);
    	}else{
    		$this->redirect('Login/index');   //发送成功跳转到登陆界面
    	}
    }
   
    //找回密码发送邮件
    public function pass(){
        $u_email = $_POST['username'];
        $code = $_POST['code'];
        $verify = new \Think\Verify();   //判断验证的内置方法
        $u_code ='';
        for ($i=0; $i < 4; $i++) { 
             $u_code .= rand(0,9);
        } 
        if($verify->check($code, $id)){
            $db = M('UserLogin');   
            $data['u_email'] = $u_email;
            $u_id = $db->where($data)->getField('u_id',1);  //获取用户u_id
            if($u_id){
                $data_ins['u_id'] = $u_id;  
                $data_ins['u_code'] = $u_code;
                $result = $db->save($data_ins);   //将用户验证码更新
                if($result){
                    $title="找回密码";
                    $body="<a href='http://localhost/zz/index.php/Home/Login/czpw'>进入找回密码</a>"." "."验证码:".$u_code;
                    $status=SendMail($u_email,$title,$body);   //邮件的整体格式
                    if(!$status) {
                        $this->error("邮件发送失败,请重试!:" . $mail->ErrorInfo);
                    }else{
                        $this->success('邮件发送成功!!!');
                    }
                }else{
                    $this->error('您的验证码走丢了!!!');
                }   
            }else{
                $this->error('该用户不存在!!!');
            }    
        }else{
            $this->error('验证码错误!');
        }     
    }
}
?>