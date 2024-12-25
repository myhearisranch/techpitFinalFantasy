<?php

//HumanクラスとEnemyクラスを使う準備
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

//インスタンス化(Humanクラス、Enemyクラスを使って人間、敵キャラを作る)
//Humanクラスのコピーが$tiidaに入るイメージ
$tiida  = new Brave();
$goblin = new Enemy();

//名前を設定
$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

$turn = 1;

//どちらかのHPが0になるまで繰り返す
while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
    echo "*** $turn ターン目 ***\n\n";
    
    //現在のHPの表示
    //constで定義した物(オブジェクト定数)は->ではなく、::で参照する
    //例: $goblin::MAX_HITPOINT
    //  : $tiida ::MAX_HITPOINT
    echo $tiida->name." : ".$tiida->hitPoint. "/".$tiida::MAX_HITPOINT."\n";
    echo $goblin->name. " : ".$goblin->hitPoint."/".$goblin::MAX_HITPOINT."\n";
    echo "\n";
    
    //攻撃 doAttackメソッドを呼ぶ
    $tiida->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tiida);
    echo "\n";
    
    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->name. " : ".$tiida->hitPoint."/".$tiida::MAX_HITPOINT."\n";
echo $goblin->name. " : ".$goblin->hitPoint."/".$goblin::MAX_HITPOINT."\n\n";