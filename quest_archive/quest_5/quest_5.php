<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>変数を宣言し代入することができる</title>
</head>

<body>
  <p>
    <?php
    function timer($sec)
    {
      $hours = floor($sec / 3600); //時間
      $minutes = floor(($sec / 60) % 60); //分
      $seconds = floor($sec % 60); //秒
      echo "{$hours}:{$minutes}:{$seconds}";
    }

    timer(2000);





    ?>




  </p>



</body>

</html>
