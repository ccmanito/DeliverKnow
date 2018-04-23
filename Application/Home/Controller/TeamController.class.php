<?php
namespace Home\Controller;
use Think\Controller;

//团队各项接口的实现

class TeamController extends CommonController{     
    
    //构造方法用于模型的实例化 
    // public function __construct(){
    //     $db=M("TeamInfo"); 
    //     $db_add=M("AddTeam");
    // }

     //进入团队添加页面
    
    public function add_pro(){
    	$this->display();
    }

     //增加一个新的团队
     public function add(){
         $db=M("TeamInfo");
         $data['t_name']=$_POST['name'];    //获得新建团队名称
         $data['t_abstract']=$_POST['abs']; //获得新建团队介绍
         $data['u_id']=$_SESSION['id'];              //创建人id
         $data['t_number']=time();               //团队编号
         $data['t_num']=1 ;                 //团队人数 
         $data['t_time']=time();            //团队创建时间
         $result=$db->data($data)->add();
         if($result){
         	$db_add=M("AddTeam");       //将创建的用户写入加入团队表中
         	$data_add['u_id']=$_SESSION['id'];
         	$data_add['t_id']=$result;
         	$data_add['a_time']=time();
         	$result_add=$db_add->data($data_add)->add();
         	if($result_add){    
         	   $this->success('团队创建成功!',U('Index/home'));
            }
         }else{
         	$this->error('团队创建失败!');
         }
     }

     //在主页上显示各个团队的信息   
     public function pro_con(){
     	$db_add=M("AddTeam");
     	$data_id['u_id']=$_SESSION['id'];
     	$data_add=$db_add->where($data_id)->getField('t_id',1000);   //从加入表中查询到这个id所对应拥有的所有团队id

        if($data_add){
           $db=M("TeamInfo");
           $create_id=$db->where($data_id)->getField('t_id',1000); //用户创建的团队的ID
           if($create_id){
	           $create['t_id']=array('in',$create_id);
	           $list_create=$db->where($create)->getField('t_id,t_name');  //获取创建团队的id和名称
	           $this->assign('team_create',$list_create);
           }else{
           	   $create_id=array();         //如果没有创建的则将其置为空
           }
           $add_id=array_diff($data_add,$create_id);    //找到自己加入而非创建的团队的ID    
		   if($add_id){
			   $add['t_id']=array('in',$add_id);   
			   $list_add=$db->where($add)->getField('t_id,t_name');  //获取加入团队的id和名称
			   $this->assign('team_add',$list_add); 
      	   }
      	   $show['t_id']=array('in',$data_add);   
	       $list_show=$db->where($show)->getField('t_id,t_name,t_num,t_abstract,t_time,t_number');  //获取所有团队的id和名称
	       $this->assign('team_show',$list_show);

      	}
     }

     //进入具体团队中去
     public function pro_show(){
     	$id=$_GET['id'];
        $db=M("TeamInfo"); 
        $data['t_id']=$id;
        $number=$db->where($data)->getField('t_number');   //获得对应团队的编号
        $this->assign('number',$number);
        $db_1=M('FileFrom');
        $_data['t_number']=$number;
        $arr=$db_1->where($_data)->getField('f_filepath,f_filename,f_filesummary');   //获得文件名和路径
     	$this->assign('file',$arr);
     	$db_message=M('SetMessage');
     	//分别获取发帖人姓名，时间，标题，类型，文章首部,帖子ID。
     	$data_message['t_number']=$number;
     	$arr_message=$db_message->where($data_message)->getField('s_time,u_name,s_title,s_type,s_content,s_id',1000); 
     	$this->assign('message',$arr_message);   //帖子的基本信息
      	$this->display();
     }


     //团队添加人员           
     public function add_people(){
     	$t_id=$_GET['id'];
     	$u_email=$_POST['u_email'];
     	$db_user=M("UserLogin");
     	$user['u_email']=$u_email;
     	$u_id=$db_user->where($user)->getField('u_id');  //获得账号的ID
     	if($u_id){
            $db=M("AddTeam");
            $data_select['u_id']=$u_id;
            $data_select['t_id']=$t_id;
            $data['u_id']=$u_id;
            $data['t_id']=$t_id;
            $data['a_time']=time();
            $select=$db->where($data_select)->find();   //查看是否重复添加用户
            if(!$select){
	            $result=$db->data($data)->add();     //添加用户信息到添加表中
	     	    if($result){                         //更新用户信息表中人员的个数
	                $db_team=M("TeamInfo");
	                $team['t_id']=$t_id;
	                $flag=$db_team->where($team)->setInc('t_num',1);  //添加成后给团队人数加1
	     	        if($flag){
	     	        	$this->success("用户添加成功!");
	     	        }else{
	     	        	$this->error("用户添加失败!");
	     	        }
	     	    }else{
	     	    	$this->error("用户添加失败!");
	     	    }
	     	}else{
	     		$this->error("该用户已在团队内,请勿重复添加！");
	     	}    
     	}else{
     		$this->error("该用户不存在!");
     	}
     }

     //获取团队成员信息
    public function show_people(){
     	$id=$_GET['id'];  //获得团队ID
     	$db=M('AddTeam');
        $arr=$db->where("t_id=$id")->getField('u_id',1000);  //获得该团队的所有人的u_id
        $array['u_id']=array('in',$arr);    
        $db_user=M('UserInfo');
        $result=$db_user->where($array)->getField('u_name',1000);  
    	if($result){
    	   $this->ajaxReturn($result);
        }else{
           $show_error('读取信息出错!');
        }
    }

     //团队删除
     public function del_team(){
         $db=M('UserLogin');
         $data['u_paswd']=md5($_GET['password']);
         $data['u_email']=$_SESSION['username'];
         $data_team['t_id']=$_GET['id'];    //获得对应团队的ID
         $result=$db->where($data)->find();   //判断账号密码是否匹配
    
         if($result){
             $db_aad=M('AddTeam');          //删除对应的团队加入信息
             $result_add_del=$db_aad->where($data_team)->delete();
             $db_info=M('TeamInfo');        
             
             $data_number['t_id'] = $data_team['t_id'];   
             $team_number['t_number'] = $db_info->where($data_number)->getField('t_number');   //拿到对应团队的团队编号
             $result_info_del=$db_info->where($data_team)->delete();     //删除对应的团队信息
             $db_file = M('FileFrom');
             $db_file->where($team_number)->delete();    //删除对应文件信息
             $db_set = M('SetMessage');
             $db_set->where($team_number)->delete();     //删除发布帖子
             $db_reply = M('ReplyMessage');
             $db_reply->where($team_number)->delete();   //删除回复帖子

             if(!empty($result_add_del)&&!empty($result_info_del)){
              	 $this->success('删除成功!');
             }else{
               	 $this->error('删除失败!');
             }
             
         }else{
             $this->error('密码错误!');
         }
        
     }

     public function del_appeal(){
        $db = M('ReportMessage');
         $data_team['r_id']=$_GET['id'];
         $db_set->where($team_number)->delete();     //删除发布帖子
             $db_reply = M('ReplyMessage');
             $db_reply->where($team_number)->delete();   //删除回复帖子
     }

     //团队成员的显示
     public function people(){
     	 $id=$_GET['id'];   //获得团队的ID
         $db=M('AddTeam');  
         $where['t_id']=$id;
         $count=$db->where($where)->count();

         $arr=$db->where($where)->getField('u_id',1000);  //拿到该团队的所有用户ID 
         $data['u_id']=array('in',$arr);             
         $db_user=M('UserInfo');                    //找寻用户的个人信息
         $user_info=$db_user->where($data)->getField('u_id,u_name',1000); 
         $result = array();
         if($user_info){
             $i=0;
             foreach ($user_info as $key => $value) {
                 $return['id'][$i]=$key;
                 $return['name'][$i]=$value;
                  $i++;
             }
             echo json_encode($return);
         }else{
             $this->error('风太大成员走丢了');
         }
     } 

     //删除团队成员
     public function del_people(){
        $db = M('AddTeam');
        $t_id = $_GET['id'];
        $arr = $_GET['user_name'];
        if($arr){
            $data['u_id'] = array('in',$arr);
            $data['t_id'] = $t_id;
            $result = $db->where($data)->delete();
            $data_team['t_id'] = $_GET['id'];
            if($result){
                $db_team = M('TeamInfo');
                $dec = $db_team->where($data_team)->setDec('t_num',1);  //删除成员的时候更新下团队信息的数据
                if($dec){
                    $this->success('删除成功!');
                }else{
                    $this->error('删除失败!');
                }
            }else{
                $this->error('删除失败!');
            }
        }else{
            $this->error('您没有选择成员!');
        }
     }
     
     //自我退出团队
     public function my_del(){
         $data['t_id']=$_GET['id'];
         $data['u_id']=$_SESSION['id'];
         $db=M('AddTeam');
         $result=$db->where($data)->delete();
         if($result){
             $this->ajaxReturn('1');
         }else{
             $this->ajaxReturn('0');
         }
     }

     //管理员删除团队
     public function sup_del_team(){
             $data_team['t_id']=$_GET['id'];    //获得对应团队的ID
             $db_aad=M('AddTeam');          //删除对应的团队加入信息
             $result_add_del=$db_aad->where($data_team)->delete();
             $db_info=M('TeamInfo');        
             
             $data_number['t_id'] = $data_team['t_id'];   
             $team_number['t_number'] = $db_info->where($data_number)->getField('t_number');   //拿到对应团队的团队编号
             $result_info_del=$db_info->where($data_team)->delete();     //删除对应的团队信息
             $db_file = M('FileFrom');
             $db_file->where($team_number)->delete();    //删除对应文件信息
             $db_set = M('SetMessage');
             $db_set->where($team_number)->delete();     //删除发布帖子
             $db_reply = M('ReplyMessage');
             $db_reply->where($team_number)->delete();   //删除回复帖子

             if(!empty($result_add_del)&&!empty($result_info_del)){
                 $this->success('删除成功!');
             }else{
                 $this->error('删除失败!');
             }
     }

}
?>