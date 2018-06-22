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

//判斷是否有這個帳號
$sqlchecked="SELECT user FROM account WHERE user='".$user."'";
$result=mysqli_query($con,$sqlchecked);
$str=mysqli_fetch_assoc($result);
$name=$str["user"];
//如果有則執行更新帳號密碼

if($name==$user){
	$sql="UPDATE account SET password='".$password."'";
	$sql.=", status='".$status."'";
	$sql.=" WHERE user='".$user."'";
	mysqli_query($con,$sql);

	echo "成功";
}
else{
	echo "失敗";
}
mysqli_close($con);
?>