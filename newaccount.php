<?php
//從account_list傳來的修改值
$user=isset($_POST["user"]) ? $_POST["user"] : "" ;
$password=isset($_POST["password"]) ? $_POST["password"] : "" ;
$status=isset($_POST["status"]) ? $_POST["status"] : "" ;

//登入SQL資訊
$servername = "sql313.byethost.com";
$username = "b32_21804395";
$dbpassword = "asdfghj";
$dbname = "b32_21804395_test";

$con=mysqli_connect($servername,$username,$dbpassword,$dbname) or die("失敗");
$sqlcheck="SELECT * FROM account WHERE user='".$user."'";
$result=mysqli_query($con,$sqlcheck);
$str=mysqli_fetch_assoc($result);
$name=$str["user"];

//加入時間
date_default_timezone_set("Asia/Taipei");
$date=date("Y-m-d H:i:s");
//加入帳號進資料表
if($name!=$user){
$sql="INSERT INTO account (user,password,status,date) VALUES ('";
$sql.=$user."'";
$sql.=",'".$password."'";
$sql.=",'".$status."'";
$sql.=",'".$date."')";
if(mysqli_query($con,$sql)){
	echo "成功";
}else{
	echo "失敗";
}
}
else{
	echo "已有此帳號";
}

mysqli_close($con);
?>