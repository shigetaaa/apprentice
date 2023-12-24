<?php

require_once 'CardDeck.php';
require_once 'Dealer.php';
require_once 'Player.php';

use QuestFinal\CardDeck; //CardDeckクラスをインポート名前空間で宣言しているため
class Game extends CardDeck
{
    // Gameクラスのコード
  public $player;
  public $dealer;

  public function __construct()
  {
    parent::__construct(); // 親クラスのコンストラクタを呼び出す
    $this->player = new Player();
    $this->dealer = new Dealer();
  }

  // 勝敗を決定して分岐させる関数
  public function WinLose()
  {
    if ($this->player->sum >= 21) {
      echo "あなたの得点は{$this->player->sum}です。\n";
      echo "ディーラーの得点は{$this->dealer->sum}です。\n";
      echo "あなたの負けです。\n";
      echo "ブラックジャックを終了します\n";
    } elseif ($this->dealer->sum >= 21) {
      echo "あなたの得点は{$this->player->sum}です。\n";
      echo "ディーラーの得点は{$this->dealer->sum}です。\n";
      echo "あなたの勝ちです。\n";
      echo "ブラックジャックを終了します\n";
    } elseif ($this->player->sum > $this->dealer->sum) {
      echo "あなたの得点は{$this->player->sum}です。\n";
      echo "ディーラーの得点は{$this->dealer->sum}です。\n";
      echo "あなたの勝ちです。\n";
      echo "ブラックジャックを終了します\n";
    } elseif ($this->player->sum < $this->dealer->sum) {
      echo "あなたの得点は{$this->player->sum}です。\n";
      echo "ディーラーの得点は{$this->dealer->sum}です。\n";
      echo "あなたの負けです。\n";
      echo "ブラックジャックを終了します\n";
    } else {
      echo "あなたの得点は{$this->player->sum}です。\n";
      echo "ディーラーの得点は{$this->dealer->sum}です。\n";
      echo "引き分けです。\n";
      echo "ブラックジャックを終了します\n";
    }
  }

  //ディーラーの最初のカード引き
  public function dealerInitialCards()
  {
    $card = $this->takeDeck(); //新しいカードを引く
    $this->dealer->drawCard($card); // ディーラーがカードを引く
    $lastCardDealer = count($this->dealer->card_list) - 1;
    echo "ディーラーの引いたカードは{$this->dealer->card_list[$lastCardDealer][0]}の{$this->dealer->card_list[$lastCardDealer][1]}です。\n";

    $card = $this->takeDeck(); //新しいカードを引く
    $this->dealer->drawCard($card); // ディーラーがカードを引く
    echo "ディーラーの引いた2枚目のカードはわかりません。\n";
  }

  //プレイヤーの最初のカード引き
  public function playerInitialCards()
  {
    $card = $this->takeDeck(); //１枚カードを引く
    $this->player->drawCard($card); // プレイヤーがカードを引く
    $lastCardPlayer = count($this->player->card_list) - 1;
    echo "あなたの引いたカードは{$this->player->card_list[$lastCardPlayer][0]}の{$this->player->card_list[$lastCardPlayer][1]}です。\n";

    $card = $this->takeDeck(); //新しいカードを引く
    $this->player->drawCard($card); // プレイヤーがカードを引く
    $lastCardPlayer = count($this->player->card_list) - 1;
    echo "あなたの引いたカードは{$this->player->card_list[$lastCardPlayer][0]}の{$this->player->card_list[$lastCardPlayer][1]}です。\n";
  }

  //ディーラーのカード引き 17以上になるまで引き続ける
  public function dealerTurn()
  {
    while ($this->dealer->sum < 17) {
      $card = $this->takeDeck(); //新しいカードを引く
      $this->dealer->drawCard($card); // ディーラーがカードを引く
      $lastCardDealer = count($this->dealer->card_list) - 1;
      echo "ディーラーの引いたカードは{$this->dealer->card_list[$lastCardDealer][0]}の{$this->dealer->card_list[$lastCardDealer][1]}です。\n";
      echo "ディーラーの得点は{$this->dealer->sum}です。\n";
    }
  }

  //プレイヤーのカード引き
  public function playerTurn()
  {
    while (true) {
      echo "あなたの現在の得点は{$this->player->sum}です。カードを引きますか？(Y\N)\n";
      $yes_no = trim(fgets(STDIN));
      if ($yes_no == "N") {
        return false;
      } elseif ($yes_no == "Y") {
        $card = $this->takeDeck(); //新しいカードを引く
        $this->player->drawCard($card); // プレイヤーがカードを引く
        $lastCardPlayer = count($this->player->card_list) - 1;
        echo "あなたの引いたカードは{$this->player->card_list[$lastCardPlayer][0]}の{$this->player->card_list[$lastCardPlayer][1]}です。\n";

        if ($this->player->sum > 21) { //合計が21を超えたのでループ終了
          return true;
        }
      } else {
        echo "YかNで入力してください。\n"; //入力値がYでもNでもないのでループ継続
      }
    }
  }

  //ゲームの進行をする関数
  public function play()
  {
    echo "ブラックジャックを開始します\n";
    $this->dealerInitialCards(); //ディーラー１回目のプレイ
    $this->playerInitialCards(); //プレイヤー１回目のプレイ
    $playerLost = $this->playerTurn(); //プレイヤーのプレイ
    if (!$playerLost) {
      $this->dealerTurn(); //ディーラーのプレイ
    }
    $this->WinLose(); //勝敗の判定
  }
}
