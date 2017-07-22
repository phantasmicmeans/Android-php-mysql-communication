<?header("Content-Type:text/html; charset=utf-8");
$userName=setcookie("userName","사악미소",time()+60);

if($userID and $userName){
	echo "쿠키 'userID'와 'userName' 생성 완료!<br/>";
	echo "쿠키 'userName'은 60포간 지속됨";
}

/*쿠키삭제

$a=setcookie("userID","");
쿠키의 값을 null로 입력
	?>


