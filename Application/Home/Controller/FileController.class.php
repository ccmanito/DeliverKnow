<?php
namespace Home\Controller;
use Think\Controller;

class FileController extends CommonController{
    public function upload(){
    	$user_id=$_SESSION['id'];
    	$db_1=M('UserInfo');
    	$data['u_name']=$db_1->where("u_id=$user_id")->getField('u_name');
    	$data['t_number']=$_GET['number'];       //获得团队的编号

    	$data['f_filesummary']=$_POST['info'];   //获得文件内容介绍
    	$data['f_time']=time();                  //获取文件上传的时间
	    
	    $upload = new \Think\Upload();           // 实例化上传类
	    $upload->maxSize=314572800 ;               // 设置附件上传大小 300MB
	    $upload->exts=array('jpg', 'gif', 'png', 'jpeg', 'txt','rar','zip','tar');     // 设置附件上传类型
	    $upload->rootPath='D:\wapserver\wamp\wamp\www\zz\Public\Upload\\';           // 设置附件上传根目录
	    $upload->savePath='';                // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
	        foreach ($info as $file){
	        	$data['f_filename']=$file['name'];
	        	$data['f_filesize']=$file['size'];
	        	$file['savepath']=substr($file['savepath'],0,10);
	        	$data['f_filepath']=$file['savepath']."\\".$file['savename'];
	            
	        }
            $db=M('FileFrom');
            $result=$db->data($data)->add();
            if($result){
        	   $this->success('文件上传成功了!');
            }else{
               $this->error("出错了");
            }
	    }
    }

}


?>