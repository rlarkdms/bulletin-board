<?php
  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");

  mysqli_set_charset($link,"utf8");
$q = "update board set piopo=piopo+1 where id=$_GET[id]";
    mysqli_query($link,$q);
$q1="select * from board where id=$_GET[id]";

    $res=mysqli_query($link,$q1);
while($row=mysqli_fetch_array($res)){
$pio=$row['piopo'];

}
 echo ("<script name=javascript>self.window.alert('신고 하셨습니다,누적신고 횟수는 $pio'); location.replace('boardread.php');</script><p>");

?>
