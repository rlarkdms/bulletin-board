<body background="downloadfile.jpg">


<?php

  $de = $_POST['de'];//this part is wrong so i change this sentence.

  $pw = $_POST['pw'];
  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");
  mysqli_set_charset($link,"utf8");


$pw=$pw*10*18*19;
  if($pw!='') {

 $q = "delete from board where id=\"$de\" and pw=\"$pw\"";
    $res = mysqli_query($link,$q);
 echo ("<script name=javascript>self.window.alert('complete'); location.replace('boardread.php');</script><p>");
 
 }

?>

<form action="boarddel.php" method=post>
암호를 입력하세요: <input type=text name="pw"><br><br>
<input type=hidden name="de" value=<?php echo $_GET[id] ?>>
 <input type=submit> <input type=reset>
</form>


<p><a href="boardread.php">[목록보기]</a>
   <a href="boardwrite.php">[글쓰기]</a>
</body>
