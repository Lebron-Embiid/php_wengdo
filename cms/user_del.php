<?php 
	include "include/init.php";
	//删除导航
	if(isset($_GET) && !empty($_GET)){
		$did = $_GET['did'];
		$sql = "DELETE FROM wd_user WHERE user_id=$did";
		mysql_query($sql);
		if(mysql_affected_rows()){
            alert("删除成功!","user.php");
        }
	}
 ?>