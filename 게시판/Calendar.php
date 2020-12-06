<?php
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        $month = isset($_GET['month']) ? $_GET['month'] : date('n');

        $date = "$year-$month-01";
        $time = strtotime($date);

    $start_week = date('w', $time);
    //이달의 시작하는 요일
        $total_day = date('t', $time);
    //이달의 총 날
        $total_week = ceil(($total_day + $start_week) / 7);
    //이달의 총 주
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Calendar</title>
        <style type="text/css">
        body {
            background-image: url('winter');
            background-size: 100%;
            background-repeat: no-repeat;
        }
        table {
                border-spacing: 4;
                background-color: #e0dcc3;
                opacity:0.8;
        }
        table td {
                text-align: center;
        }
        #Sunday {
            color: red;
        }
        #Saturday {
            color: blue;
        }
        </style>
</head>
<body>
    <table border="1" align=center width = 840 height = 700>

    <tr>
        <td colspan="2">
            <!-- 현재가 1월이라 이전 달이 작년 12월인 경우 -->
            <?php if ($month == 1): ?>
                <!-- 작년 12월 -->
                <a href="Calendar.php?year=<?php echo $year-1 ?>&month=12">이전 달</a>
            <?php else: ?>
                <!-- 이번 년 이전 월 -->
                <a href="Calendar.php?year=<?php echo $year ?>&month=<?php echo $month
-1 ?>">이전 달</a>
            <?php endif ?>
        </td>
        <td colspan="3">
           <?php echo "$year 년 $month 월" ?>
        </td>
        <td colspan="2">
            <!-- 다음 달이 내년 1월인경우 -->
            <?php if ($month == 12): ?>
                <!-- 내년 1월 -->
                <a href="Calendar.php?year=<?php echo $year+1 ?>&month=1">다음 달</a>
            <?php else: ?>
                <!-- 금년의 다음달 -->
                <a href="Calendar.php?year=<?php echo $year ?>&month=<?php echo $month
+1 ?>">다음 달</a>
            <?php endif ?>
            </td>
        </tr>
                <tr>
                        <th id="Sunday">일</th>
                        <th>월</th>
                        <th>화</th>
                        <th>수</th>
                        <th>목</th>
                        <th>금</th>
                        <th id="Saturday">토</th>
                </tr>

                <!-- 총 주차를 반복 -->
                <?php for ($n = 1, $i = 0; $i < $total_week; $i++): ?>
                        <tr>
<!--                                1주일-->
                                <?php for ($k = 0; $k < 7; $k++): ?>
                                        <td>
                                                <!-- 시작 요일부터 마지막 날짜까지만 날짜를 보여주도록 -->
                                                <?php if ( ($n > 1 || $k >= $start_week) && ($total_day >= $n) ): ?>
                                                        <!-- 현재 날짜를 보여주고 1씩 더함 -->
                                                        <?php echo "<a href='Calendar_Board.php?date=$year/$month/$n'>".$n++."</a>" ?>
                                                <?php endif ?>
                                        </td>
                                <?php endfor; ?>
                        </tr>
                <?php endfor; ?>
        </table>
    <p align=center>
        <a href="boardread.php"><button>게시판으로</button></a><br>
    </p>
</body>
</html>
