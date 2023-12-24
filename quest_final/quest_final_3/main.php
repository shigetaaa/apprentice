<?php

namespace QuestFinal;

require_once 'Game.php';

// ゲーム実施
use QuestFinal\Game; //Gameクラスの名前空間を追加
$game = new Game();
$game->play();
