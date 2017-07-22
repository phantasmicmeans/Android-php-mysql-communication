<?php  
 
 //mysql 데이터베이스 가져오기

$con=mysqli_connect("localhost","dlaak0630","tkdals12");  
mysqli_select_db($con,"dlaak0630");
  
if (mysqli_connect_errno($con))  
{  
   echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
 
   
$res = mysqli_query($con,"select * from Members");  
   
$result = array();  
   
while($row = mysqli_fetch_array($res)){  
  array_push($result,  
    array('number'=>$row[0],'name'=>$row[1],'id'=>$row[2],'password'=>$row[3]  
    ));  
}  
   
echo json_encode(array("result"=>$result));  
   
mysqli_close($con);  
   
?>  



