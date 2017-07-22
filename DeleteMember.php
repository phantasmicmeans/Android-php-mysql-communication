<?header("Content-Type:text/html; charset=utf8_decode");

$id=$_POST[id];

$connect=mysqli_connect("localhost","dlaak0630","tkdals12");
if(!$connect){
	echo "연결에 실패 하였습니다",mysqli_error();


}
mysqli_set_charset($connect,"utf8");  

mysqli_select_db($connect,"dlaak0630");


$query="delete from members where id='$id'";

mysqli_query($connect,$query);

mysqli_close($connect);
?>
