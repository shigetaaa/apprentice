<?php

$suits = ["スペード", "ハート", "ダイヤ", "クラブ"]; //トランプマーク
$ranks = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]; //トランプ番号

//山札デッキクラス
class CardDeck
{
  private $deck;

  public function __construct()
  {
    global $suits; //グローバル変数にする
    global $ranks; //グローバル変数にする
    // トランプ山札用配列を作成
    $this->deck = []; //トランプ山札用配列
    for ($suit = 0; $suit < count($suits); $suit++) {
      for ($rank = 0; $rank < count($ranks); $rank++) {
        $this->deck[] = [$suits[$suit], $ranks[$rank]];
      }
    }

    // シャッフル
    shuffle($this->deck);
  }

  //山札からカードを1枚取り出す関数
  public function Deck()
  {
    // カードを1枚取り出す
    $card = array_shift($this->deck);
    return $card; // 引いたカードの情報を返す
  }
}

//テストコード関数Deckあとで消す
//$yyy = new CardDeck;
//$yyy->Deck();

//ディーラープレイヤーの共通処理クラス CardDeckクラスを継承　子
class CommonPlay extends CardDeck
{
  public $card_list; //手持ちのカードリストを配列にする
  public $sum; //現在の点数合計 ※手札$card_listから計算して返却
  public function drawCard($card)
  {
    $this->card_list[] = $card;
    $this->sum += $this->calculateScore($card);
  }

  private function calculateScore($card)
  {
    $rank = $card[1];
    if ($rank >= 10) { //10より大きい場合は10として計算
      return 10;
    } elseif ($rank == 1) { //エースが出た場合
      if ($this->sum <= 9) { //合計得点が9以下の場合は11として計算
        return 11;
      } else { //合計得点が10以上の場合は1として計算
        return $rank;
      }
    } else {
      return $rank;
    }
  }
}


//ディーラーの処理クラス　継承　孫
class Dealer extends CommonPlay
{
}

//プレイヤーの処理クラス　継承　孫
class Player extends CommonPlay
{
}


//ゲーム処理クラス
class Game extends CardDeck
{
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
    $card = $this->Deck(); //新しいカードを引く
    $this->dealer->drawCard($card); // ディーラーがカードを引く
    $lastCardDealer = count($this->dealer->card_list) - 1;
    echo "ディーラーの引いたカードは{$this->dealer->card_list[$lastCardDealer][0]}の{$this->dealer->card_list[$lastCardDealer][1]}です。\n";

    $card = $this->Deck(); //新しいカードを引く
    $this->dealer->drawCard($card); // ディーラーがカードを引く
    echo "ディーラーの引いた2枚目のカードはわかりません。\n";
  }

  //プレイヤーの最初のカード引き
  public function playerInitialCards()
  {
    $card = $this->Deck(); //１枚カードを引く
    $this->player->drawCard($card); // プレイヤーがカードを引く
    $lastCardPlayer = count($this->player->card_list) - 1;
    echo "あなたの引いたカードは{$this->player->card_list[$lastCardPlayer][0]}の{$this->player->card_list[$lastCardPlayer][1]}です。\n";

    $card = $this->Deck(); //新しいカードを引く
    $this->player->drawCard($card); // プレイヤーがカードを引く
    $lastCardPlayer = count($this->player->card_list) - 1;
    echo "あなたの引いたカードは{$this->player->card_list[$lastCardPlayer][0]}の{$this->player->card_list[$lastCardPlayer][1]}です。\n";
  }

  //ディーラーのカード引き 17以上になるまで引き続ける
  public function dealerTurn()
  {
    while ($this->dealer->sum < 17) {
      $card = $this->Deck(); //新しいカードを引く
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
        $card = $this->Deck(); //新しいカードを引く
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


//ゲーム実施
$game = new Game;
$game->play();
