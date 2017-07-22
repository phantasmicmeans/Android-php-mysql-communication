<?header("Content-Type:text/html; charset=utf8");

$name=$_POST[name];
$text=$_POST[text];
$nowtime=$_POST[nowtime];

$connect=mysqli_connect("localhost","dlaak0630","tkdals12");

if(!$connect){
	
	echo "연결에 실패하였습니다";
	mysqli_error();
}
mysqli_set_charset($connect,"utf8");

mysqli_select_db($connect,"dlaak0630");



$res=mysqli_query($connect,"select name,text,nowtime from community order by number desc");

$result=array();

echo "{\"result\":[";


while($row=mysqli_fetch_array($res)){
	array_push($result,
		array('name'=>$row[0],'text'=>$row[1],'nowtime'=>$row[2]
));

echo "{\"name\":\"$row[name]\",\"text\":\"$row[text]\",\"nowtime\":\"$row[nowtime]\"},";

}
echo "]}";

mysqli_close;
?>