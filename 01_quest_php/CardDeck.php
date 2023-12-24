<?php

namespace QuestFinal;

$suits = ["スペード", "ハート", "ダイヤ", "クラブ"]; //トランプマーク
$ranks = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]; //トランプ番号

class CardDeck
{
    // CardDeckクラスのコード
    private $deck; //トランプ山札用変数

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
    public function takeDeck()
    {
        // カードを1枚取り出す
        $card = array_shift($this->deck);
        return $card; // 引いたカードの情報を返す
    }
}
