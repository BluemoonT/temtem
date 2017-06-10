<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?
      $conn = mysql_connect("localhost", root, 1111);
      mysql_select_db($conn, user);
      $sql = "SELECT * FROM user where id='".$_GET['memid']"' AND password='".$_GET['mempw']"'";
      $result = mysql_query($conn, $sql);
     ?>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="default.css" media="screen"><!-- default.css에서 지정한 대로 html 요소를 꾸며줄 수 있다-->
    <style type="text/css" media="screen">
      h1 {font-family: sans-serif; text-shadow: 10px 10px 30px dimgrey;}/*h1에게 텍스트 그림자를 부여한다*/
      .bold {font-weight:bold; color: blue;}/*볼드체로 만든다*/
      .log {font-weight: bold; font-size: 10pt}
    </style>
  </head>
  <body>
    <header>
      <p>Blueback Amusement Center for Music Games</p>
      <!--헤더로 등장하는 사이트 로고의 문구다-->
    </header>
    <h1>Welcome to Blueback Amusement Center!</h1>
    <h2 style="font-weight: normal;">You can <span class="bold">easily</span> buy or sell various music games from this site!</h2>
    <!-- 소개문이다. bold class에서만 볼드체가 되도록 기본값을 normal로 했다 -->
    <p><strong>Links</strong></p>
    <ul>
      <li><a href="introduce.html">Introduction about owner and the reason the site is made</a></li>
      <li><a href="benefit.html">Benefits that you can get by using this site</a></li>
      <li><a href="item.html">Items that we deal with</a></li>
      <li><a href="form.php">Form that you have to write to buy things</a></li>
    </ul><!-- 다음 사이트들로 넘어갈 수 있는 링크들 모음집이다. 즉, 이 사이트는 대문임과 동시에 후속 사이트로 들어갈 수 있는 입구다.-->
    <div class="log">
      <?php
        if($result->num_rows=="0"){
          echo "<p><a href='login.html'>로그인</a><br><a href='register.html'>회원가입</a></p>";
        }
        else{
          echo "<p><a href='logout.php'>로그아웃</a></p>";
        }
      ?>
    </div>
    <footer>
      <p>Contact Number: 010-2338-4342</p>
      <p>Owner of copywrite of Page: &copy;Blueback Amusement Center</p>
      <p>Owner of copywrite of games: &copy;KONAMI Digital Entertainment</p>
      <p>Copywrite of background: freesource</p>
  </footer><!--저작권 표시를 덧붙인다.-->
  </body>
</html>
