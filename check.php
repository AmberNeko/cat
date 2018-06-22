<?php

//從login傳來的修改值
$user=$_POST["user"]!="" ? $_POST["user"] : "沒輸入帳號" ;
$password=$_POST["password"]!="" ? $_POST["password"] : "沒輸入密碼" ;
// $user=$_POST["user"]!=""? $_POST["user"] : "沒輸入帳號";
// echo $user;

//登入SQL資訊
$servername = "sql313.byethost.com";
$username = "b32_21804395";
$dbpassword = "asdfghj";
$dbname = "b32_21804395_test";

$con=mysqli_connect($servername,$username,$dbpassword,$dbname) or die("失敗");

//判斷是否有這個帳號
$sql="SELECT * FROM account WHERE user='".$user."'";
$result=mysqli_query($con,$sql);
$str=mysqli_fetch_assoc($result);
$name=$str["user"];
$pin=$str["password"];

//如果有則執行驗證密碼

if($name==$user){
	if($pin==$password){
		echo("complete success");
	}
	else{
		echo("wrong password");
	}
}
else{
	echo("user not find");
}
mysqli_close($con);

?>