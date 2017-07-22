<?


session_start();
$is_logged = $_SESSION['is_logged'];
if($is_logged=='YES') {
    $id = $_SESSION['id'];
    $message = $id . ' 님, 로그인 했습니다.';
}
else {
    $message = '로그인이 실패했습니다.';
}

//var_dump($_SESSION);

?>
