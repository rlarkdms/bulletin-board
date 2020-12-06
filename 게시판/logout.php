<?php
session_start();
        $result = session_destroy();
 
        if($result) {
?>
        <script>
                alert("로그아웃완료");
                history.back();
        </script>
<?php   }
?>
 
