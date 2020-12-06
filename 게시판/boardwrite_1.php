<body background="downloadfile.jpg">

<h3></h3>
<form action="boardread.php" method=post enctype="multipart/form-data">
  &nbsp&nbsp&nbsp title &nbsp&nbsp&nbsp<input type="text" name="title" style="width:500px;height:30px;font-size:20px;"><br><br>
 <!--&nbsp name &nbsp  &nbsp<input type="text" name="na" style="width:500px;height:30px;font-size:20px;"><br><br>-->
&nbspContent &nbsp<input type="text" name="co" style="width:500px;height:300px;font-size:20px;"><br><br>
 password <input type="password" name="pw" style="width:500px;height:30px;font-size:20px;"><br>
screct box<input type="checkbox" value="1" name="check"><br>

<?php
  date_default_timezone_set('Asia/Seoul');
  $d = Date("Y/n/j,H:i:s D");
  $ip = $_SERVER["REMOTE_ADDR"];
  echo "IP: $ip<br>Date: $d";
?>

 <input type=hidden name="da" value=<?php echo $d ?>><br>
 <input type=hidden name="ip" value=<?php echo $ip ?>>
파일첨부: <input type="file" name="file"><br>
 <input type="submit" name="submit">완료</input> <input type=reset> 
 
</form>
<meta http-equiv="refresh"/>
<p><a href="boardread.php">[목록보기]</a>
 
</body>

