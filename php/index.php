<?php
header("Content-Type:text/html;charset=utf-8");
error_reporting( E_ERROR | E_WARNING );
date_default_timezone_set("Asia/chongqing");
include "Uploader.class.php";
//上传配置
$config = array(
	"savePath"   => "../upload/" ,  //存储文件夹
	"maxSize"    => 3000 ,  //允许的文件最大尺寸，单位KB
	"allowFiles" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" )  //允许的文件格式
);

//背景保存在临时目录中

$type    = isset( $_REQUEST['type'] ) && !empty( $_REQUEST['type'] ) ? trim($_REQUEST['type']) : false;
$callback= isset( $_GET['callback'] ) && !empty( $_GET['callback'] ) ? trim($_GET['callback']) : false;
$result  = array( "errno"=> 2,"data" => array( ) );
$info    = array();
if( is_array( $_FILES) && !empty($_FILES ) ){
	foreach( $_FILES as $_m_key => $_m_val ){
		if( is_array( $_FILES[ $_m_key ] ) && !empty( $_FILES[ $_m_key ] ) ){
			$up      = new Uploader( $_m_key , $config );
			$info    = $up->getFileInfo();
			if( $info['state'] == 'SUCCESS'){
				$result['errno']  = 0;
				$result['data'][] = array( substr( $info["url"] , 3 ) );
			}
		}
	}
}

/**
* 返回数据
*/
if($callback) {
	echo '<script>'.$callback.'('.json_encode($result).')</script>';
} else {
	echo json_encode($result);
}

