<?php

//從login傳來的修改值
$user=isset($_POST["account"]) ? $_POST["account"] : "" ;
$password=isset($_POST["password"]) ? $_POST["password"] : "" ;


//登入SQL資訊
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "account";

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
		header("Location:account_list.php");
	}
	else{
		die("密碼錯誤");
	}
}
else{
	die("無此帳號");
}
mysqli_close($con);

?>