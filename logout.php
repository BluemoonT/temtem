<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
      setcookie('memid', '', time() - 3600, '/');
      setcookie('memnm', '', time() - 3600, '/');
      echo "<meta http-equiv='refresh' content='0;url=index.php'>";
     ?>
  </head>
  <body>
  </body>
</html>
