<?php

$user=isset($_POST['user'])?$_POST['user']:"";

$servername = "sql313.byethost.com";
$username = "b32_21804395";
$dbpassword = "asdfghj";
$dbname = "b32_21804395_test";

$con=mysqli_connect($servername,$username,$dbpassword,$dbname) or die("失敗");

$sql="DELETE FROM account WHERE user='".$user."'";
if(mysqli_query($con,$sql)){
	echo("成功");
}
else{
	echo("失敗");
}





?>