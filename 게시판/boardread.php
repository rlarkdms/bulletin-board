
<script>
function pop_up_post()
{
 window.open("", "mypop", "width=850, height=650, scrollbars=yes");
 document.diagram.action = "boardread.php";
 document.diagram.target = "mypop";
 document.diagram.submit();
}
</script>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body background="downloadfile.jpg">
<h3>가은이 게시판</h3>
<iframe width="1" height="1" src="https://www.youtube.com/embed/D1PvIWdJ8xo?amp;autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<button type="button" onclick="location.href='Calendar.php'">달력</button>

<?php
 session_start();
 if(isset($_SESSION['userid'])) {
                        echo $_SESSION['userid']; 
 ?>
님 로그인 중
<button type="button" onclick="location.href='logout.php'">로그아웃</button>
 <button type="button" onclick="location.href='boardwrite.php'">글쓰기</button>
<br>
<?php
}
else{
제
?>
<button type="button" onclick="location.href='login.php'">로그인</button>
 <button type="button" onclick="location.href='newclient.php'">회원가입</button>

<br>
<?php
}
?> 
<button type="button" onclick="location.href='boardread.php'">새로고침</button>
 <button type="button" onclick="location.href='boarddel1.php'">글삭제</button><br>


<table>
<tr bgcolor='orange'>
<?php 

$key=$_POST['key'];
$board=$_POST['board'];
  $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");

 mysqli_set_charset($link,"utf8");
/*if(isset($_POST['check'])){
$lo_post='1';
}else{
$lo_post='0';
}


*/


    $q = "select count(id) from board";
//else $q="select count(id) from boardt where $_GET[fields] like '%".$_GET['search']."%' ";  
$result=mysqli_query($link, $q);
    $row=mysqli_fetch_row($result);
    $num=$row[0];
   
    $page = ($_GET['page'])?$_GET['page']:1;
    $list=10;
    $block=3;
   
    $pageNum = ceil($num/$list); // 총 페이지
    $blockNum = ceil($pageNum/$block); // 총 블록
    $nowBlock = ceil($page/$block);

    $s_page = ($nowBlock * $block) - ($block - 1);

if ($s_page <= 1) {
    $s_page = 1;
}
$e_page = $nowBlock*$block;
if ($pageNum <= $e_page) {
    $e_page = $pageNum;
}


echo "페이지:";
for ($p=$s_page; $p<=$e_page; $p++) {
?>


   <a href="<?=$PHP_SELP?>?page=<?=$p?>"> <?=$p?> </a>


<?php
}
?>

<?php

if(isset($_POST['submit'])){
    $file=$_FILES['file'];
    $file_name=$_FILES['file']['name'];
     $file_Tmpname=$_FILES['file']['tmp_name'];
     $file_size=$_FILES['file']['size'];
     $file_error=$_FILES['file']['error'];
     $file_type=$_FILES['file']['type'];
   
    $fileExt=explode('.',$file_name);
    $fileactualExt = strtolower(end($fileExt));
   
    $allowed = array('jpg','jpeg','png','txt');
   

    if(in_array($fileactualExt,$allowed)){
        if($file_error==0){
            if($file_size<1000000){
                $fileNameNew=uniqid('',true).".".$fileactualExt;
                $filedestination='/home/kimgaeun/public_html/project/upload/'.$fileNameNew;
                move_uploaded_file($file_Tmpname,$filedestination);
               
            }else{
                echo "too big";
            }
        }
    }
    else{
       
       
    }
}

?>

<?php

//$na = $_POST["na"];
 
$title=$_POST["title"];
if($title!='') {
    $co = $_POST["co"];
    $da = $_POST["da"];
    $ip = $_POST["ip"];
    $pw = $_POST["pw"];
$check=$_POST["check"];


$pw=$pw*10*18*19;

if(isset($_SESSION['userid'])) {
$name=$_SESSION['userid'];
 $sql1 = "insert into board (title,name,content,date,ip,pw,`check`,file) values(\"$title\",\"$name\",\"$co\",\"$da\",\"$ip\",\"$pw\",\"$check\",\"$fileNameNew\")";
    $row = mysqli_query($link,$sql1);
    if($row==0) echo "$row : failed $sql1";

}
  }


echo("<br><form name=\"fona\" action=\"boardread.php\" method=post><select name=\"board\"><option values=\"id\">id</option><option values=\"title\">title</option><option values=\"name\">name</option><option values=\"date\">date</option></select>
     <input type=text name=\"key\">");

echo ("<input type=submit name=\"submit1\" value='입력'></form><br>");








echo "<th width='70'>번호</th>";
echo "<th width='300'>제목</th>";
 echo "<th width='200'>작성자</th>";

 echo "<th width='300'>날짜</th>";
echo "<th width='150'>조회수</th>";
echo "<th width='150'>좋아요</th>";
 echo "<th width='150'>삭제</th>";
echo "<th width='150'>신고</th>";
echo "</tr>\n";


$q="select * from board where id=1 ";
   $res = mysqli_query($link, $q);
  while( $row=mysqli_fetch_array($res) ) {


		echo ("<tr bgcolor='#B2EBF4' align='center'>
		<td>$row[id]</td>
   	<td><a href=\"boardcon.php?id=$row[id]\">$row[title][$row[check]]</a></td>
</td>
       <td>$row[name]</td>
		<td>$row[date]</td>
<td>$row[cook]</td>
<td>$row[heart]</td>
<td><a href='boarddel.php?id=$row[id]'>[삭제]</a></td>
<td> </td>
		</tr>");
}


 

    $s_point = ($page-1) * $list;
if(isset($_POST['submit1'])) $q="select * from board where $board like '%$key%' order by id desc ";
else {  

$q = "select * from board order by id desc limit $s_point,$list";
    }

 $res = mysqli_query($link,$q);
while( $row=mysqli_fetch_array($res)) {
if($row[piopo]<3){
if($row[check]==0){


		echo ("<tr bgcolor='#FAF4C0' align='center'>
		<td>$row[id]</td>
   	<td><a href=\"boardcon.php?id=$row[id]\">$row[title][$row[check]]</a></td>
</td>
       <td>$row[name]</td>
		<td>$row[date]</td>
<td>$row[cook]</td>
<td>$row[heart]</td>
<td><a href='boarddel.php?id=$row[id]'>[삭제]</a></td>
<td><a href='boardpiopo.php?id=$row[id]'>[신고]</a></td>
		</tr>");
}
else{
if(isset($_SESSION['userid'])){

		echo ("<tr bgcolor='#FAF4C0' align='center'>
		<td>$row[id]</td>
   	<td><a href=\"boardcon.php?id=$row[id]\">$row[title][$row[check]]</a></td>
</td>
       <td>$row[name]</td>
		<td>$row[date]</td>
<td>$row[cook]</td>
<td>$row[heart]</td>
<td><a href='boarddel.php?id=$row[id]'>[삭제]</a></td>
<td><a href='boardpiopo.php?id=$row[id]'>[신고]</a></td>

		</tr>");



}else{
echo ("<tr bgcolor='#FAF4C0' align='center'>
		<td>$row[id]</td>
   	<td><a href=\"boardcheck.php?id=$row[id]&pw=$row[pw]\">$row[title][$row[check]]</a></td>
</td>
       <td>$row[name]</td>
		<td>$row[date]</td>
<td>$row[cook]</td>
<td>$row[heart]</td>
<td><a href='boarddel.php?id=$row[id]'>[삭제]</a></td>
<td><a href='boardpiopo.php?id=$row[id]'>[신고]</a></td>

		</tr>");

}
}
}


	}  




$real_data = mysql_query("SELECT * FROM board ORDER BY id DESC LIMIT $s_point,$list");

for ($i=1; $i<=$num; $i++) {
$fetch = mysqli_fetch_array($real_data);


?>


<div>
<?= $fetch['list_no'] ?>
</div>

<?php
if ($fetch == false) {
exit;
}
}
?> 
</table>

</body>
</html>
