<?header("Content-Type:text/html; charset=utf-8");

//$latitude=$_POST[latitude];
//$longtitude=$_POST[longtitude];


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
//$res=mysqli_query($connect,"select id,title,verification,sub_categories,x_point,y_point from MunhwaData_meta order by number desc");
//$res=mysqli_query($connect,"select id,title,sub_categories,x_point,y_point from myload");

$query="select id,title,sub_categories,verification,x_point,y_point from MunhwaData_meta";

$res=mysqli_query($connect,$query);

$result=array();

echo "{\"result\":[";

while($row=mysqli_fetch_array($res)){
	
	array_push($result,
	
		array('id'=>$row[0],'title'=>$row[1],'sub_categories'=>$row[2],'verification'=>$row[3],'x_point'=>$row[4],'y_point'=>$row[5]
));

echo "{\"id\":\"$row[id]\",\"title\":\"$row[title]\",\"sub_categories\":\"$row[sub_categories]\",\"verification\":\"$row[verification]\",\"x_point\":\"$row[x_point]\",\"y_point\":\"$row[y_point]\"},";
																											
}
echo "]}";

mysqli_close;

?>
