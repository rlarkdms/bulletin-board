<body background="downloadfile.jpg">
<h3> 수정중</h3>
<?php
$de=$_POST['de'];
 $com = $_POST['com'];
  $tit = $_POST['tit'];
  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");

  mysqli_select_db($link,"kimgaeun");
 mysqli_set_charset($link,"utf8");
  if($com!='') {
    $q = "update board set content=\"$com\" where id=\"$de\"";
    $res = mysqli_query($link,$q);

$sq="update board set title=\"$tit\" where id=\"$de\"";
    $row = mysqli_query($link,$sq);
 echo ("<script name=javascript>self.window.alert('수정되었습니다'); location.replace('boardread.php');</script><p>"); 
  }
?>
 
<form action="boardchange.php" method=post>
&nbsp&nbsptitle &nbsp&nbsp&nbsp <input type="text" name="tit" style="width:500px;height:30px;font-size:20px;"><br><br>
&nbspContent <input type="text" name="com" style="width:500px;height:400px;font-size:20px;"><br><br>
<input type=hidden name="de" value=<?php echo $_GET[id] ?>>
 <input type=submit> <input type=reset>
</form>
</body>

