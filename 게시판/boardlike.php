<?php
  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");

  mysqli_set_charset($link,"utf8");
$q = "update board set heart=heart+1 where id=$_GET[id]";
    mysqli_query($link,$q);


 echo ("<script name=javascript>self.window.alert('좋아요를 클릭하셨습니다'); location.replace('boardcon.php?id=$_GET[id]');</script><p>");
?>
