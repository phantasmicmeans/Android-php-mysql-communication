<?header("Content-Type:text/html; charset=utf8_decode");

$nowtime=$_POST[nowtime];
$name=$_POST[name];

$connect=mysqli_connect("localhost","dlaak0630","tkdals12");

if(!$connect){
	echo "연결에 실패하였습니다";
	mysqli_error();

}

mysqli_set_charset($connect,"utf-8");

mysqli_select_db($connect,"dlaak0630");

$query="delete from community where nowtime='$nowtime' and name='$name'";

mysqli_query($connect,$query);



/*
$result=array();

$row=mysqli_fetch_array($res);

if($row[name]==$_POST[name]){
	$res=mysqli_query($connect,"delete * from community where name='$name' and nowtime='$nowtime'");
	
}
else{
	echo dfs;
}
	*/
	/*
$result=array();
echo "{\"result\":[";
}

while($row=mysqli_fetch_array($res)){

	array_push($result,
		array('name'=>$row[0],'shop'=>$row[1],'point'=>$row[2],'text'=>$row[3],'timenow'=>$row[4]
));
echo "{\"name\":\"$row[name]\",\"shop\":\"$row[shop]\",\"point\":\"$row[point]\",\"text\":\"$row[text]\",\"timenow\":\"$row[timenow]\"},";
}

echo "]}";
*/

	sleep(0.9);

mysqli_close($connect);

?>




