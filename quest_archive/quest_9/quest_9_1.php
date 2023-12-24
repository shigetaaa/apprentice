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
      public $maker; //メーカー名
      public $amount = 0; //トータルのデポジット額

      public function pressButton($item) //ItemClassの変数$itemをセット
      {
        if ($this->amount >= $item::$price) {
          $this->amount -= $item::$price;
          return $item->item;
        } else {
          return null;
        }
      }

      public function depositCoin($coin)
      {
        if ($coin === 100) {
          $this->amount += 100;
        }
      }

      private function pressManufactureName()
      {
        echo $this->maker; //変数$makerをインスタンスに紐づけて画面に出力する
      }
    }

    class ItemClass
    {
      public static $item; //アイテム名
      public static $price; //価格

      public function __construct($item, $price)
      {
        $this::$item = $item;
        $this::$price = $price;
      }
    }




    $cola = new ItemClass('cola', 150);
    $vendingMachine = new VendingMachine('サントリー');
    $vendingMachine->depositCoin(100); //[.]はインスタンス参照という機能　->と同じ
    echo $vendingMachine->pressButton('cola');



    ?>
  </p>


</body>

</html>
