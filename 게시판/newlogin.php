<body>

    <?php
session_start();
 $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");
  mysqli_set_charset($link,"utf8");
    $id = $_GET["id"];
    $pw = $_GET["pw"];
    $name= $_GET["name"]; 
    $date=$_GET["date"];
	echo "$완료";
    
     $q = "select * from client where id='$id' and pw='$pw'";
    $res = mysqli_query($link,$q);
    if($res==0) echo "$res : failed $q";
   $b=mysqli_num_rows($res);
 //echo "b: $b";
   if($b==1){
	$_SESSION['userid']=$id;
if(isset($_SESSION['userid'])){
echo "로그인를 환영합니다!\n";
//echo "$_SESSION['userid']";
}

} 
else {echo "아이디와 비밀번호를 다시 확인해주세요\n";}    ?>
<br>
<button type="button" onclick="location.href='boardread.php'">처음으로</button>
</body>
