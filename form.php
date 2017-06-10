<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript">
    <?php
      $conn = mysql_connect("localhost", root, 1111);
      mysql_select_db($conn, user);
      $sql = "SELECT * FROM user where id='".$_GET['memid']"' AND password='".$_GET['mempw']"'";
      $result = mysql_query($conn, $sql);
      if($result->num_rows=="0") {
        echo "<script>window.alert('로그인을 해야합니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=login.html'>";
      }
     ?>
     </script>
    <title>Forms for trading</title>
    <link rel="stylesheet" type="text/css" href="default.css" media="screen"><!-- default.css에서 지정한 대로 html 요소를 꾸며줄 수 있다-->
    <style type="text/css" media="screen">
      span {color: red; font-size: 10px; height: 1em; position:relative; bottom: -1ex}/*form 중간중간에 나오는 세부 설명을 form 자체 내용과 구분가게 해준다*/
      h1 {font-family: fantasy;}/*h1을 독특한 글씨체로 꾸며준다*/
    </style>
  </head>
  <body>
    <header>
      <p>Blueback Amusement Center for Music Games</p><!--헤더로 등장하는 사이트 로고의 문구다-->
    </header>
    <h1>Forms you have to write to trade games</h1><!-- form의 제목-->
    <p>Please fill out this form if you want to buy, or sell games</p><!--form에 대한 설명이다-->
    <form action="6.html" method="post" autocomplete="on"><!--form을 제출하면 6.html로 넘어간다. autocomplete는 켜진 상태다-->
      <p><label>Name: <input type="text" name="name" size="25" placeholder="Park YiJae" autofocus required /><span>(Tell me your name)</span></label></p><!--사용자의 이름을 입력하는 칸이다-->
      <p><label>Game Center Name: <input type="text" name="ArcadeName" size="50" placeholder="Blueback Gamecenter" required /><span>(Tell me the name of your game center)</span></label></p>
      <!--게임 센터의 이름을 입력하는 칸이다-->
      <p><label>Email: <input type="email" placeholder="blueback@game.com"></label></p><!--email을 입력하는 칸이다. 꼭 입력할 필요는 없다-->
      <p><label>Password: <input type="password" name="password" size="10" autocomplete="off" required /><span>(This password is needed to check if an orderer is correct)</span></label></p>
      <!--password를 입력하는 칸이다. 주문자가 맞는지 확인하기 위함이다.-->
      <p><label>Tel: <input type="tel" name="tel" placeholder="010-****-****" required></label></p><!-- 전화번호를 입력하는 칸이다-->
      <p><label>Address: <br><textarea name="address" rows="5" cols="50" required ></textarea></label></p><!--주문 주소를 입력하는 칸이다-->
      <p><strong>Games you want to buy</strong><br><!--사고 싶은 게임과 그 수를 선택한다. 원하는 기종은 checkbox로, 원하는 수량은 number로 구현했다.-->
        <label>SOUND VOLTEX HEAVENLY HAVEN
          <input type="checkbox" name="gametobuy" value="SDVX">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>pop'n music うさぎと猫と少年の夢
          <input type="checkbox" name="gametobuy" value="pop'n">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>GITADORA GUITARFREAKS
          <input type="checkbox" name="gametobuy" value="guitar">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>GITADORA DRUMMANIA
          <input type="checkbox" name="gametobuy" value="drum">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>REFLEC BEAT 悠久のリフレシア
          <input type="checkbox" name="gametobuy" value="IIDX">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>beatmania IIDX 24 SINOBUZ
          <input type="checkbox" name="gametobuy" value="IIDX">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>jubeat Qubell
          <input type="checkbox" name="gametobuy" value="jubeat">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>MÚSECA
          <input type="checkbox" name="gametobuy" value="MÚSECA">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>DanceDanceRevolution
          <input type="checkbox" name="gametobuy" value="DDR">
          <input type="number" min="0" max="4" step="1" value="0">
        </label>
        <label>Nostalgia
          <input type="checkbox" name="gametobuy" value="Nostalgia">
          <input type="number" min="0" max="4" step="1" value="0">
        </label>
      </p>
      <p><strong>Games you want to sell</strong><br><!--팔고 싶은 게임과 그 수를 선택한다. 원하는 기종은 checkbox로, 원하는 수량은 number로 구현했다.-->
        <label>SOUND VOLTEX HEAVENLY HAVEN
          <input type="checkbox" name="gametobuy" value="SDVX">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>pop'n music うさぎと猫と少年の夢
          <input type="checkbox" name="gametobuy" value="pop'n">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>GITADORA GUITARFREAKS
          <input type="checkbox" name="gametobuy" value="guitar">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>GITADORA DRUMMANIA
          <input type="checkbox" name="gametobuy" value="drum">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>REFLEC BEAT 悠久のリフレシア
          <input type="checkbox" name="gametobuy" value="IIDX">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>beatmania IIDX 24 SINOBUZ
          <input type="checkbox" name="gametobuy" value="IIDX">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>jubeat Qubell
          <input type="checkbox" name="gametobuy" value="jubeat">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>MÚSECA
          <input type="checkbox" name="gametobuy" value="MÚSECA">
          <input type="number" min="0" max="4" step="1" value="0">
        </label><br>
        <label>DanceDanceRevolution
          <input type="checkbox" name="gametobuy" value="DDR">
          <input type="number" min="0" max="4" step="1" value="0">
        </label>
        <label>Nostalgia
          <input type="checkbox" name="gametobuy" value="Nostalgia">
          <input type="number" min="0" max="4" step="1" value="0">
        </label>
      </p>
      <p><label>Comments: <span>Opinions you want to tell us</span><br><br><!--건의사항 등 하고 싶은 말을 적으면 된다-->
      <textarea name="comment" rows="5" cols="50"></textarea></label></p>
      <p>
        <input type="submit" value="Submit" /><!--제출할 때 필요한 버튼이다-->
        <input type="reset" value="Clear" /><!--쓴 값을 초기화할 때 필요한 버튼이다-->
      </p>
    </form>
    <footer>
    <p>Contact Number: 010-2338-4342</p>
    <p>Owner of copywrite of Page: &copy;Blueback Amusement Center</p>
    <p>Owner of copywrite of games: &copy;KONAMI Digital Entertainment</p>
    <p>Copywrite of background: freesource</p>
  </footer><!--첫번째 페이지로 돌아가기 위한 링크다-->
  </body>
</html>
