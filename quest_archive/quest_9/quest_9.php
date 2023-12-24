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
    //自販機に関して決定するクラス
    class VendingMachine
    {
      public $maker; //メーカー名
      public static $total_payment; //入金した合計額


      public function __construct($name)
      {
        $this->maker = $name; //インスタンスを作った際、引数に入れた値を変数$makerに代入する
      }



      public function pressManufacturerName()
      {
        echo $this->maker; //変数$makerをインスタンスに紐づけて画面に出力する
      }

      //コインを入れられるメソッド
      public function depositCoin($payment)
      {
        if ($payment == 100) {
          $sum = $this->total_payment + $payment;
          echo $sum . "<br>";
        }
      }

      //ボタンを押すと飲み物が出てくるメソッド
      public function pressButton()
      {
        $total = $this->total_payment;
        if ($total >= 100)
          echo "cider" . "<br>";
      }
    }

    //1.クラスの定義 OK
    //2.コンストラクタ OK
    //3.メソッドの可読性
    $vendingMachine = new VendingMachine('サントリー');
    echo $vendingMachine->pressButton(); //ここまでOK

    $vendingMachine->depositCoin(150); //ここまでOK
    //困っていることメソッド間で変数を引き継げない




    ?>
  </p>


</body>

</html>
