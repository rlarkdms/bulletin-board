<html>
<body background="downloadfile.jpg">
<h3>가은이 게시판</h3>

<table>
<tr bgcolor='orange'>
<?php

date_default_timezone_set('Asia/Seoul');
  $d = Date("Y/n/j,H:i:s D");
$id=$_GET[id];

  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");
  mysqli_set_charset($link,"utf8");

  //$fields = mysql_list_fields('kimgaeu1004','board',$link);
 // $ncols = mysql_num_fields($fields);
$sq="update board set cook=cook+1 where id=$_GET[id]";
mysqli_query($link,$sq);

echo "<th width='70'>번호</th>";
echo "<th width='150'>제목</th>";
 echo "<th width='150'>작성자</th>";

 echo "<th width='300'>날짜</th>";
 echo "<th width='150'>ip</th>";
 echo "<th width='300'>내용</th>";
 echo "<th width='100'>좋아요</th>";
echo "<th width='100'>조회수 </th>";
echo "<th width='300'>파 일</th>";
echo "</tr>\n";
  $q = "select id,title,name,date,ip,content,heart,cook,file from board where id=$id";

 $res = mysqli_query($link,$q);

  while( $rec=mysqli_fetch_row($res) ) {

 echo "<tr bgcolor='#FAF4C0' align='center'>";

//echo "<td>".$rec['id']."</td><td>".$rec['title']."</td><td>".$rec['name']."</td><td>".$rec['date']."</td>";
 //  foreach($rec as $v) echo "<td>".$v."</td>";
   for($i=0; $i<8; $i++){
echo "<td>$rec[$i]</td>";
}

  if($rec[8]!=''){
    ?> 
    <td><img src="upload/<?php echo $rec[8] ?>" width="100" height="100" /></td>
    <?php
 echo "</tr>\n";
        } 
 }



echo ("</table> <br><br>댓글<table>");


 $q1 = "select * from comment where id=$_GET[id]";

echo $title;
 $row1 = mysqli_query($link,$q1);

  while( $row=mysqli_fetch_array($row1) ) {
//$cookie=$rec[cook]++;
//$q1= "update board set=\"$cookie\" where id=$_GET[id]";


//echo "<td>".$rec['id']."</td><td>".$rec['title']."</td><td>".$rec['name']."</td><td>".$rec['date']."</td>";
   echo ("<tr bgcolor='#FAF4C0' align='center'>
		<td width='150'>$row[name]</td>
   
       <td width='300'>$row[content]</td>
		<td width='150'>$row[date]</td>
<td width='150'><a href='delomment.php?number=$row[number]&id=$id'>[삭제]</a></td>
		</tr>");
 }


?>
</table>
<form action="comment.php" method=post>
&nbspname&nbsp &nbsp <input type="text" name="nam" style="width:500px;height:30px;font-size:20px;"><br><br>
 &nbspContent <input type="text" name="com" style="width:500px;height:400px;font-size:20px;"><br><br>
password<input type="text" name="pass" style="width:500px;height:30px;font-size:20px;"><br>
<input type=hidden name="da" value=<?php echo $d ?>><br>
<input type=hidden name="id" value=<?php echo $id ?>>
<input type=submit onclick="location.href='boardread.php'"> <input type=reset>
</form>
<p><a href="boardread.php">[목록가기]</a>
  <!-- <a href="boardwrite.php">[글쓰기]</a>-->
<?php echo "<a href='boardchangecheck.php?id=$_GET[id]'>[수정]</a>" ?>
<?php echo "<a href='boarddel.php?id=$_GET[id]'>[삭제]</a>" ?>
<?php echo "<a href='boardlike.php?id=$_GET[id]'>[좋아요]</a>" ?>
</body>
</html>
