<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>繰り返し処理</title>
</head>

<body>

  <!-- 百回hello -->
  <p>
    <?php
    function hello()
    {
      for ($i = 1; $i <= 100; $i++) {
        echo "こんにちは！" . "</br>";
      }
    }
    echo hello();
    ?>
  </p>


  <!-- 羊 -->
  <p>
    <?php
    function sheep()
    {
      for ($i = 1; $i <= 100; $i++) {
        echo "羊が{$i}匹" . "</br>";
      }
    }
    echo sheep();
    ?>
  </p>

  <!-- 総和 -->
  <p>
    総和forパターン:
    <?php
    $start = 1;
    $end  = 100;
    $total = 0;
    for ($i = $start; $i <= $end; $i++) {
      $total += $i;
    }
    echo $total; //5050

    ?>
  </p>


  <p>
    総和functionパターン:
    <?php
    function sum_1_100()
    {
      $total = 0;
      for ($i = 1; $i <= 100; $i++) {
        $total += $i;
      }
    }
    var_dump($total);
    echo sum_1_100(); //5050

    ?>
  </p>

  <p>
    総和whileパターン:
    <?php
    $start = 0;
    $end = 100;
    $total = 0;

    while ($start <= 100) {
      $total += $start; //$total = $total + $start $totalには前回の処理の数値が引き継がれている、前回の数値に1ずつ足した$startを足していく
      $start++;
    }
    //1回目…$total=0, $start=0, 足して0。$startに1を足す、$start=1
    //２回目…$total=0, $start=1,足して$total=1, $startに1を足す$start=2
    //３回目…$total=1, $start=2,足して$total=3, $startに1を足す$start=3

    echo $total; //5050

    ?>
  </p>

  <p>
    総和rangeとarray_sumパターン:
    <?php
    $arr = range(1, 100); //$arrに1～100までの数字の配列を作る
    echo array_sum($arr); //配列内の値の合計を計算する
    ?>
  </p>


  <p>
    フィボナッチ数列:</br>
    <?php
    function fibonacci($n)
    {
      $num_list = [1, 1];

      if ($n > 2) {
        for ($i = 2; $i <= $n - 1; $i++) {
          $num_list[] = $num_list[$i - 1] + $num_list[$i - 2];
        }
      }
      return $num_list[$n - 1];
    }
    ?>

    <?php fibonacci(0); ?></br>
    <?php fibonacci(1); ?></br>
    <?php fibonacci(2); ?></br>
    <?php fibonacci(3); ?></br>
    <?php fibonacci(4); ?></br>
    <?php fibonacci(7); ?></br>
    <?php fibonacci(30) ?></br>

  </p>




</body>

</html>
