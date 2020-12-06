
<body>
<h3></h3>
    <?php
 $link=mysqli_connect("localhost","kimgaeun","kimgaeun") or die("Read DB Fail!");
  mysqli_select_db($link,"kimgaeun");
  mysqli_set_charset($link,"utf8");
    $id = $_GET["id"];
    $pw = $_GET["pw"];
    $name= $_GET["name"]; 
    $date=$_GET["date"];
    
     $q = "insert into client(id,pw,name,date) values(\"$id\",\"$pw\",\"$name\",\"$date\")";
    $res = mysqli_query($link,$q);
    if($res==0) {echo "이미 존재하는 아이디 입니다.";
}
    else{
echo "회원가입완료";

}
    $q = "select * from client";
  $res = mysqli_query($link,$q);
  while( $rec=mysqli_fetch_row($res) ) {
    echo "<tr bgcolor='honeydew'>";
    foreach($rec as $v) echo "<td></td>";
    echo "</tr>\n";
  } 
    ?>
<br>
<button type="button" onclick="location.href='newclient.php'">회원가입</button>
<button type="button" onclick="location.href='login.php'">로그인</button>
<button type="button" onclick="location.href='boardread.php'">처음으로</button>


</body>

