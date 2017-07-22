<?header("Content-Type:text/html; charset=utf-8");

$newpwd=$_POST[newpwd];
$id=$_POST[id];
$password=$_POST[password];


$connect=mysqli_connect("localhost","dlaak0630","tkdals12");



if(!$connect){
	echo "연결에 실패하였습니다"; mysqli_error();
}
mysqli_set_charset($connect,"utf8");  

mysqli_select_db($connect,"dlaak0630");
//
$res=mysqli_query($connect,"select password from members where id='$id'");
$result=array();

$row=mysqli_fetch_array($res);
echo $row[password];

if($row[password]==$_POST[password]){
	$res=mysqli_query($connect,"update members set password='$newpwd' where id='$id'");
}
else 
	echo dfsdf;

/*
echo "{\"result\":[";
while($row=mysqli_fetch_array($res)){
	array_push($result,
		array('name'=>$row[0],'password'=>$row[1]
		));
echo "{\"name\":\"$row[name]\",\"password\":\"$row[password]\"},";
}

echo "]}";
*/

mysqli_close;


//
/*
$query="select password from members where id='$id'";
$result=mysqli_query($connect,$query);

$row=mysqli_fetch_array($result);
if($password==$row[password]){
	
	$query="update members set password='$newpwd' where id='$id'";
	mysqli_query($connect,$query);
	echo "fidi";
	
}else
	echo "fuck you";



mysqli_query($connect,$query);

mysqli_close($connect);
*/
?>