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

  <p>
    <?php
    function train_fare($age)
    {
      if ($age >= 12) {
        echo 200;
      } elseif ($age >= 6 && $age < 12) {
        echo 100;
      } elseif ($age < 12) {
        echo 0;
      } else {
        echo "";
      }
    }
    ?>

    <?php train_fare(12); ?></br><?php train_fare(6); ?></br><?php train_fare(5); ?>

  </p>

  <p>
    <?php

    function xoa($x, $y)
    {
      if ($x === true && $y === true xor $x === false && $y === false) {
        echo "false";
      } elseif ($x === true || $y === true) {
        echo "true";
      } else {
        echo "";
      }
    }
    ?>

    <?php xoa(true, true); ?></br><?php xoa(true, false); ?></br><?php xoa(false, true); ?></br><?php xoa(false, false); ?>



  </p>


</body>

</html>
