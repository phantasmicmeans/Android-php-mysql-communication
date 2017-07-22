<?header("Content-Type:text/html; charset=utf-8");

//mysql 데이터베이스 등록하기

include("config.php");
session_start();

if($_POST[id]!=""){

$id=$_POST[id];
$password=$_POST[password];


$sql="SELECT * FROM members WHERE id = '".$id."' password = '".$password."'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
//if(isset($data)){

if($count==1){

	session_register("id");
	$_SESSION['id']=$id;
   // $userID=setcookie("userID","wicked_miso",time()+60*60*24,'/');
	header("loaction:welcome.php");
	echo "sdfsd";

	//echo "success";
	//sleep(1);
	
}
else{
	$error="Yout Login Nanem Or Password is invalid";
	echo 'dsf';
	//header("Location:http://stylejonline.ddns.net/login_done.php");
	
}
}
?>

 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> <!--utf-8설정-->
<title>Login Page</title>
</head>
 
<br>
<br>

<form name="submitform" action="" method="post">
<div style="position:absolute;top:54px;left:54px;"><input type="text" name="uid" style="width:187px;height:17px;"></div>
<div style="position:absolute;top:82px;left:54px;"><input type="password" name="upwd" style="width:187px;height:17px;"></div>
<div style="position:absolute;top:110px;left:54px;"><input type="submit" value="login"/></div><br />
</form>
</body>
 
</html>