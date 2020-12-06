<body background="downloadfile.jpg">

<table>
<tr bgcolor='lightblue'>
<?php

  $de = $_POST['de'];
  $pw = $_POST['pw'];
  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");
  mysqli_set_charset($link,"utf8");
  $pw=$pw*10*18*19;

  if($de!='') {
    $q = "delete from board where id=\"$de\" and pw=\"$pw\"";
    $res = mysqli_query($link,$q);

 echo ("<script name=javascript>self.window.alert('complete'); location.replace('boardread.php');</script><p>"); 
  }
 /*
 echo "<th width='70'>번호</th>";
 echo "<th width='300'>제목</th>";
 echo "<th width='150'>작성자</th>";
 echo "<th width='150'>날짜</th>";
 
  echo "</tr>\n";
  $q = "select id,title,name,date from board";
  $res = mysqli_query($link,$q);
  while( $rec=mysqli_fetch_row($res) ) {
    echo "<tr bgcolor=honeydew>";
   foreach($rec as $v) echo "<td>".$v."</td>";
    echo "</tr>\n";
 }
*/
?>
</table>
<form action="boarddel1.php" method=post>
id 를 입력하세요:<input type=text name="de"><br>
암호를 입력하세요: <input type=text name="pw">
 <input type=submit> <input type=reset>
</form>
<p><a href="boardread.php">[목록보기]</a>
   <a href="boardwrite.php">[글쓰기]</a>
</body>
