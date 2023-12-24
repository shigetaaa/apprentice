<?php

require_once 'CardDeck.php';

use QuestFinal\CardDeck; //CardDeckクラスをインポート
class CommonPlay extends CardDeck
{
  // CommonPlayクラスのコード
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
