<?php

require_once('./lib/Loader.php');
require_once('./lib/Utility.php');

//オートロード(自動でクラスを読みに行く仕組み)
$loader = new Loader();

//classesフォルダの中身をロード対象ディレクトリとして登録
$loader->regDirectory(__DIR__.'/classes');
$loader->regDirectory(__DIR__.'/classes/constants');
$loader->register();

//インスタンス化(Humanクラス、Enemyクラスを使って人間、敵キャラを作る)
//Humanクラスのコピーが$tiidaに入るイメージ
//今までnameを直にアクセスしていた部分をコンストラクタ経由でセットする
//コンストラクタはインスタンス化する際に、一度だけ呼ばれる

//味方パーティーの作成
$members = array();
$members[] = new Brave(CharacterName::TIIDA);
$members[] = new WhiteMage(CharacterName::YUNA);
$members[] = new BlackMage(CharacterName::RULU);

//敵パーティーの作成
$enemies = array();
$enemies[] = new Enemy(EnemyName::GOBLINS, 20);
$enemies[] = new Enemy(EnemyName::BOMB, 25);
$enemies[] = new Enemy(EnemyName::MORBOL, 30);


$turn = 1;

$isFinishFlg = false;

$messageObj = new Message;

//どちらかのHPが0になるまで繰り返す
while (!$isFinishFlg) {
    echo "*** $turn ターン目 ***\n\n";
    
    //仲間の表示
    $messageObj->displayStatusMessage($members);
    
    //敵の表示
    $messageObj->displayStatusMessage($enemies);
    
    //現在のHPの表示
    //constで定義した物(オブジェクト定数)は->ではなく、::で参照する
    //例: $goblin::MAX_HITPOINT
    //  : $tiida ::MAX_HITPOINT
    
    // foreach ($members as $member){
    //     echo $member->getName() . " : ".$member->getHitPoint()."/".$member::MAX_HITPOINT."\n";
    // }
    // echo "\n";
    // foreach ($enemies as $enemy) {
    //     echo $enemy->getName()." : ".$enemy->getHitPoint()."/".$enemy::MAX_HITPOINT."\n";
    // }
    // echo "\n";
    
    //攻撃 doAttackメソッドを呼ぶ
    foreach ($members as $member) {
        
         // 白魔道士の場合、味方のオブジェクトも渡す
         if (get_class($member) == "WhiteMage") {
             $member->doAttackWhiteMage($enemies, $members);
         } else {
             $member->doAttack($enemies);
         }
        echo "\n";
     }
     echo "\n";
   
    foreach ($enemies as $enemy) {
         $enemy->doAttack($members);
         echo "\n";
     }
    
    echo "\n";
    
    //仲間の全滅チェック
    $deathCnt = 0;
    foreach ($members as $member) {
        if($member->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    
    if ($deathCnt === count($members)) {
        $isFinishFlg = true;
        echo "GAME OVER ....\n\n";
        break;
    }
    
    //敵の全滅チェック
    $deathCnt = 0;
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    
    if($deathCnt === count($enemies)){
        $isFinishFlg = true;
        echo "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }
    
    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";

//仲間の表示
$messageObj->displayStatusMessage($members);

//敵の表示
$messageObj->displayStatusMessage($enemies);

// foreach ($members as $member) {
//     echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
//  }
//  echo "\n";
// foreach ($enemies as $enemy) {
//     echo $enemy->getName() . "　：　" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
//  }