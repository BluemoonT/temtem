<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php
    $conn = mysql_connect("localhost", root, 1111);
    mysql_select_db($conn, user);
    $sql = "SELECT * FROM user where id='".$_GET['memid']"' AND password='".$_GET['mempw']"'";
    $result = mysql_query($conn, $sql);
    if($result->num_rows=="0") {
        echo "<meta http-equiv='refresh' content='0;url=login.html'>";
      }

    if($_COOKIE[counter]){
      setcookie("counter", $_COOKIE[counter] + 1);
    }
    else{
      setcookie("counter", "1");
    }
    $nm = $_GET['memnm'];
    echo "안녕하세요.".$nm"님의 ".$_COOKIE[counter]"번째 방문을 환영합니다.";
    echo "<p><a href='logout.php'>로그아웃</a><br><a href='index.php'>메인 페이지로</a></p>";
    ?>
    <title>Hello</title>
  </head>
  <body>
  </body>
</html>
