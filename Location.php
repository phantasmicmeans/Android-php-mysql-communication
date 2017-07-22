<?header("Content-Type:text/html; charset=uff-8");

$latitude=$_POST[latitude];
$longtitude=$_POST[longtitude];

$connect=mysqli_connect('210.117.134.88',"root","dlsxjspt7510");

if(!$connect){
	 echo "연결에 실패 하였습니다.";
	 mysqli_error();
 }
mysqli_set_charset($connect,"utf-8");  

mysqli_select_db($connect,"munhwa");

$query="insert into myload(latitude,longtitude)
					values('$latitude','$longtitude')";

mysqli_query($connect,$query);


mysqli_close;


 ?>

