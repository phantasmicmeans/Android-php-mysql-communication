<?header("Content-Type:text/html; charset=utf-8");

$num=$_POST[num];

$connect=mysqli_connect("210.117.134.88","root","dlsxjspt7510");

if(!$connect){
	echo "연결에 실패하였습니다"; 
	mysqli_error();
}

mysqli_set_charset($connect,"utf8");

$dbconnect=mysqli_select_db($connect,"munhwa");

if(!$dbconnect){
	echo "database no";
}


if($num=="s"){
$query="truncate table myload";
$res=mysqli_query($connect,$query);
}else
	echo "truncate cant done";


mysqli_close
?>