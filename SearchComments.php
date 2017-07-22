<?header("Content-Type:text/html; charset=utf8");

$name=$_POST[name];
$comment=$_POST[comment];
$writername=$_POST[writername];

$connect=mysqli_connect("localhost","dlaak0630","tkdals12");

if(!$connect){
	echo "연결에 실패하였습니다"; 
	mysqli_error();
}

mysqli_set_charset($connect,"utf8");

mysqli_select_db($connect,"dlaak0630");

$res=mysqli_query($connect,"select writername,comment from comments where name='$name' order by number desc");
$result=array();


echo "{\"result\":[";

while($row=mysqli_fetch_array($res)){
	array_push($result,
		array('name'=>$row[0],'comment'=>$row[1]
));

echo "{\"name\":\"$row[name]\",\"writername\":\"$row[writername]\",\"comment\":\"$row[comment]\"},";

}
echo "]}";

mysqli_close;

?>
