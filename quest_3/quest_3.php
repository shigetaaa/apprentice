<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>好きな数値は何？</title>
</head>

<body>

  <!-- 数字を1から100まで順番に出力する -->
  <p>
    <?php for ($i = 1; $i <= 100; $i++) {
      echo $i;
    } ?>
  </p>


  <p><?php
      //数字を1から100まで順番に出力する
      for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 === 0 && $i % 5 === 0) { //3かつ5の倍数の時「FizzBuzz」と出力する
          echo "{$i}.FizzBuzz" . "</br>";
        } elseif ($i % 3 === 0) { //3の倍数の時「Fizz」と出力する
          echo "{$i}.Fizz" . "</br>";
        } elseif ($i % 5 === 0) { //5の倍数の時「Buzz」と出力する
          echo "{$i}.Buzz" . "</br>";
        } else {
          echo $i . "</br>";
        }
      }
      ?>
  </p>











</body>

</html>
