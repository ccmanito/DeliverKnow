<?php

namespace Home\Controller;
use  Think\Controller;

class MessageController extends CommonController{
	//获取发表的帖子
	public function getmessage(){
        $db_user=M("UserInfo");
        $u_id=$_SESSION['id'];
        $name=$db_user->where("u_id=$u_id")->getField('u_name');   //获取发送人的姓名
        if($name){
	        $db=M("SetMessage");
	        $data['u_name']=$name;
	        $data['s_title']=$_POST['title'];        //获取帖子标题
	        $data['s_type']=$_POST['choice'];        //获取帖子类型
	        $data['s_content']=$_POST['content'];    //获取发表内容
	        $data['t_number']=$_GET['id'];           //获得团队编号
		    $data['s_time']=time();                  //获得发表时间
            $result=$db->data($data)->add();
            if($result){
                $this->success("发表成功!");
            }else{
            	$this->error('发表失败!');
            }
		}else{
			$this->error('发表人找不到了!');
		}   
	}

	//显示贴子的内容及其回帖内容
	public function content_show(){
		$db=M('SetMessage');
		$data['s_id']=$_GET['id'];
		$number=$_GET['number'];
		$username = $db->where($data)->getField('u_name'); 
		$this->assign('name',$username); 
		$arr=$db->where($data)->select();
		if($arr){
            $this->assign('message',$arr);         //帖子的详情
		    $this->assign('id',$_GET['id']);       //帖子的ID
		    $this->assign('number',$number);       //团队的ID
		}else{
			$this->error("帖子走丢了!");
		}

		//通过被回复的ID  找寻回复贴子
	
		$re_message=M('ReplyMessage');   //回帖信息
		$re_data['s_id']=$data['s_id'];      //获得帖子的ID
		$count = $re_message->where($re_data)->count();    //获取回帖人数
        $arr=$re_message->where($re_data)->getField('r_time,u_name,r_content',1000);   //
        //获得回复帖子的用户名，时间和内容
        $this->assign('reply',$arr);
        $this->assign('re_count',$count);   
		$this->display();
	}

	//获取回复的帖子
	public function response(){
       $data_user['u_id']=$_SESSION['id'];
       $db_user=M('UserInfo');
       $data['u_name']=$db_user->where($data_user)->getField('u_name');  //获得用户姓名
       $db=M('ReplyMessage');
       $data['s_id']=$_GET['id'];                //被回复消息的ID
       $data['r_time']=time();                   //时间
       $data['r_content']=$_POST['response'];    //回复内容
       $data['t_number']=$_GET['number'];        //团队编号
       $result=$db->data($data)->add();
       if($result){
           $this->success('回复成功！');
       }else{
           $this->error('回复失败！');  
       }
	}

	
}

?>