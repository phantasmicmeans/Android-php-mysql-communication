

<script>
 session_start();
</script>

<?
 if($_COOKIE['hwi']){?>


 <?=$id?>
 <?
 echo $_COOKIE['hwi']?>님 로그인하셨습니다
 
 
 <?}else{?>
 <? echo "not login"?>
 <br>
  
 <?}
  

