
<?php

  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");
 mysqli_set_charset($link,"utf8");
$id=$_GET['id'];
$pw=$_GET['pw'];
$pw2=$_POST['pw2'];

$pw2=$pw2*10*18*19;
if(isset($_POST['pw2'])){

if($pw==$pw2){

echo ("<script name=javascript>self.window.alert('complete'); location.replace('boardcon.php?id=$id');</script><p>");

}else{

echo ("<script name=javascript>self.window.alert('password fail'); location.replace('boardread.php?');</script><p>");

}


}
?>
<form action="" method=post>
암호를 입력하세요: <input type=text name="pw2"><br><br>
 <input type=submit> <input type=reset>
</form>

