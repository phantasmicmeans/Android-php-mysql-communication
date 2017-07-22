<?header("Content-Type:text/html; charset=utf-8");

$id=$_POST[id];
$name=$_POST[name];

$connect=mysqli_connect("localhost","dlaak0630","tkdals12");

if(!$connect){
	echo "연결에 실패하였습니다";
	mysqli_error();
}

mysqli_set_charset($connect,"utf-8");

mysqli_select_db($connect,"dlaak0630");

$res=mysqli_query($connect,"select name from members where id='$id'");

$result=array();

$row=mysqli_fetch_array($res);

if($row[id]==$_POST[id]){
	$res=mysqli_query($connect,"update members set name='$name' where id='$id'");
}
else{
	echo dfdf;
}
mysqli_close;

?>