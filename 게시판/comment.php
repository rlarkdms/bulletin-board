
<body background="downloadfile.jpg">
<h3>가은이 게시판</h3>

<?php
  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");
  mysqli_set_charset($link,"utf8");
  $nam = $_POST["nam"];
  if($nam!='') {
$pass=$_POST["pass"];
    $com = $_POST["com"];
    $da = $_POST["da"];
    $id = $_POST["id"];


    $q = "insert into comment (id,name,content,date,pw) values(\"$id\",\"$nam\",\"$com\",\"$da\",password(\"$pass\"))";
    $res = mysqli_query($link,$q);
    if($res==0) echo "$res : failed $q";

 echo ("<script name=javascript>self.window.alert('complete'); location.replace('boardcon.php?id=$id');</script><p>"); ;
  }
 
 

 
?>
</table>
<p><a href="boardread.php">[글읽기]</a>
   <a href="boardwrite.php">[글쓰기]</a>
   <a href="boarddel.php">[글삭제]</a>
</body>

