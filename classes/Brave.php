<?php

class Brave extends Human
{
    
    const MAX_HITPOINT = 120;
    //$nameには名前が一度設定されたら、その後変更できないような仕様にする
    //publicだと、どこからでもアクセスできてしまい、意図しないところで変更されてしまう
    //privateにして、アクセスの範囲を狭めて防ぐ
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;
    
    //カプセル化のメリット:
    //publicによってカプセル化される。
    //カプセル化をすることで外部からのアクセスが可能になる。
    
    public function doAttack($enemy)
    {
        //乱数の発生
        if (rand(1, 3) === 1){
            //スキルの発動
            echo "『".$this->name. "』のスキルが発動した!\n";
            echo "『ぜんりょくぎり』!!\n";
            echo $enemy->name. "に".$this->attackPoint*1.5."のダメージ!\n";
            $enemy->tookDamage($this->attackPoint*1.5);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }
}