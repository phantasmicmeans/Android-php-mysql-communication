<?header("Content-Type:text/html; charset=utf-8");

$name=$_POST[name];
$text=$_POST[text];
$nowtime=$_POST[nowtime];

$connect=mysqli_connect("localhost","dlaak0630","tkdals12");

if(!connect){
	echo "연결에 실패하였습니다"; 
	mysqli_error();
}

mysqli_set_charset($connect,"utf8");

mysqli_select_db($connect,"dlaak0630");

$query="insert into community(name,text,nowtime)
				values('$name','$text','$nowtime')";
				
				
mysqli_query($connect,$query);

mysqli_close;

?>

