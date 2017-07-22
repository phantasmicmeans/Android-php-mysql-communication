<?
header("Content-Type:text/html; charset=utf-8");
//게시판 정보 php에 출력하기
//mysql 데이터베이스 등록하기
/*
$mobilechk = '/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/i'; 

 // 모바일 접속인지 PC로 접속했는지 체크합니다.
 if(preg_match($mobilechk, $_SERVER['HTTP_USER_AGENT'])) {
    echo 'You are using Mobile.'; 
 } else { 
    echo 'You are using PC .'; 
 } 

$query="select * from Members(name) 
					values('$name')";
					*/

$shop=$_POST[shop];
$point=$_POST[point];
$text=$_POST[text];
$timenow=$_POST[timenow];


$connect=mysqli_connect("localhost","dlaak0630","tkdals12");
 
//$res=mysqli_query($connect,"select name,id from Members");

if(!$connect){
	 echo "연결에 실패 하였습니다.". mysqli_error();
 }

mysqli_set_charset($connect,"utf8");  

mysqli_select_db($connect,"dlaak0630");

//$query="select * from board(shop,point,text)
						//	values('$shop','$point','$text')";

$res=mysqli_query($connect,"select shop,point,text,timenow from board");
//$res=mysqli_query($connect,$query);


$result=array();
echo "{\"result\":[";
while($row=mysqli_fetch_array($res)){

	//echo '[shop] : '.$row['shop'];
	//echo '  [point] : '.$row['point'];
	//echo '  [text] : '.$row['text'];
	array_push($result,
	array('shop'=>$row[0],'point'=>$row[1],'text'=>$row[2],'timenow'=>$row[3]
//echo "{\"shop\":\"$row[shop]\",\"point\":\"$row[point]\,\text\":$row[text]\"}";
	


));
//echo "result";   \"shop\":$row[shop]
//echo ":[";              echo "{\"shop\":\"$row[shop]\",\"point\":\"$row[point]\",\"text\":\"$row[text]\"},";
echo "{\"shop\":\"$row[shop]\",\"point\":\"$row[point]\",\"text\":\"$row[text]\",\"timenow\":\"$row[timenow]\"},";

}
// echo json_encode(array("result"=>$result));

//$result_array=json_encode($result); 
//print_r($result_array);
echo "]}";

mysqli_close;
?>