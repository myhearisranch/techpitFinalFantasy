<?php

class Brave extends Human
{
    
    const MAX_HITPOINT = 120;
    //$nameには名前が一度設定されたら、その後変更できないような仕様にする
    //publicだと、どこからでもアクセスできてしまい、意図しないところで変更されてしまう
    //privateにして、アクセスの範囲を狭めて防ぐ
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;
    
    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }
    
    public function getHitPoint()
    {
        return $this->hitPoint;
    }
    
    //カプセル化のメリット:
    //publicによってカプセル化される。
    //カプセル化をすることで外部からのアクセスが可能になる。
    
    public function doAttack($enemies)
    {
        
        //チェック1: 自身のHPが0かどうか
        if ($this->getHitPoint()<=0) {
            return false;
        }
        
        $enemyIndex = rand(0, count($enemies) - 1); // 添字は0から始まるので、-1する
        $enemy = $enemies[$enemyIndex];
        
        //乱数の発生
        if (rand(1, 3) === 1){
            //スキルの発動
            echo "『".$this->getName(). "』のスキルが発動した!\n";
            echo "『ぜんりょくぎり』!!\n";
            echo $enemy->getName(). "に".$this->attackPoint*1.5."のダメージ!\n";
            $enemy->tookDamage($this->attackPoint*1.5);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }
}