<?php
 
 namespace Home\Controller;
 use Think\Controller;

 class ChatInfoController extends Controller{
 	 
 	 //保存已发送的数据
 	 public function setchat(){
 	 	$content=$_GET['content'];
        //$number=$_GET['number'];
        $db=M('ChatInfo');     
        if($content){
        	$data['u_id']=$_SESSION['id'];
        	$data['c_content']=$content;
        	$data['c_time']=time();
        	//$data['c_number']=$number;
            $result=$db->data($data)->add();
            if($result==null){
               $this->error("您的消息走丢了!!!");   
            }else{
               $this->show('1');
            }
        }
 	 }
     
     //展示所有聊天消息的内容
     public function outputchat(){
        $flag=$_GET['flag'];
        if($flag){
        	$db=M('ChatInfo');
        	$data['c_number']=0;
        	$result=$db->where($data)->getField('c_content,c_time',1000);         
            if($result){
            	$this->ajaxReturn($result);
            }else{
            	$this->error("您的消息走丢了!!!");
            }
        }else{
        	$this->error("亲,您的消息迷路了!!!");
        }
     }

 }

?>