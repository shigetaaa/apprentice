<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>オブジェクト指向を使うことができる</title>
</head>

<body>

  <h1>オブジェクト指向を使うことができる</h1>
  <h2>クラスの定義・コンストラクタ</h2>
  <p>
    <?php
    class VendingMachine
    {
      public $maker;

      public function __construct($name)
      {
        $this->maker = $name; //変数$makerにインスタンスを作った際、引数に入れた値を代入する
      }

      public function pressButton()
      {
        echo "cider";
      }

      public function pressManufacturerName()
      {
        echo $this->maker; //コンストラクタで変数に代入したからといって、変数を表示せよ、だけでは出力されない。&this＝インスタンスと関連づける。
      }
    }

    $vendingMachine = new VendingMachine('サントリー');
    echo $vendingMachine->pressButton() . "</br>";
    echo $vendingMachine->pressManufacturerName();

    ?>
  </p>


</body>

</html>
