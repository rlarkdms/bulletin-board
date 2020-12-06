<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('cool-background_1');
            background-size: 100%;
            background-repeat: repeat;
        }

        div {
            margin: auto;
        }
    </style>
</head>

<body>
    <h1 align=center>Calendar Board</h1>
    <hr>
    <table width=1000 align=center>
        <tr bgcolor='#AED6F1'>
            <th width="70" height="50">번호</th>
            <th width="500" height="50">제목</th>
            <th width="120" height="50">작성자</th>
            <th width="120" height="50">작성일자</th>
            <th width="100" height="50">조회수</th>
        </tr>
        <?php
        date_default_timezone_set('Asia/Seoul');

        $date_for_search = $_GET['date'];

        $myid = "kimgaeun";
     	 $myidpw = "kimgaeun";
     	 $mydb = "kimgaeun";
     	 
     	 $link=mysqli_connect("localhost",$myid,"$myidpw") or die("DB Fail!");
     	 mysqli_select_db($link, $mydb);

        $q = "SELECT id, title, name, date, cook FROM board WHERE date LIKE '%".$date_for_search.",%' ORDER BY id desc;";
        $res = mysqli_query($link,$q);

        while( $row=mysqli_fetch_row($res) ) {
            echo "<tr bgcolor = 'white'><td align = center>".$row[0]."</td>";
            echo "<td align = center><a href = 'boardread.php?num=$row[0]'>$row[1]</a></td>
                    <td align = center>$row[2]</td>
                    <td align = center>$row[3]</td>
                    <td align = center>$row[4]</td>
                    </tr>";
        }
        ?>
    </table>

    <p align=center>
        <a href="Calendar.php"><button>달력으로</button></a>
        <a href="boardread.php"><button>게시판으로</button></a><br>
    </p>
</body>

</html>
