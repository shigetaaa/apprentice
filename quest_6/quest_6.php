<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>変数を宣言し代入することができる</title>
</head>

<body>
  <p>
    <?php

    function greater($x, $y)
    {
      if ($x < $y) {
        echo "x < y";
      } elseif ($x > $y) {
        echo "x > y";
      } elseif ($x === $y) {
        echo "x == y";
      } else {
        echo "";
      }
    }
    ?>

    <?php greater(5, 4); ?></br><?php greater(-50, -40); ?></br><?php greater(10, 10); ?>





  </p>



</body>

</html>
