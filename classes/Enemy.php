<?php

class Enemy
{
    const MAX_HITPOINT = 50;
    private $name;
    private $hitPoint = 50;
    private $attackPoint = 10;
    
    public function __construct($name, $attackPoint)
    {
        $this->name = $name;
        $this->attackPoint = $attackPoint;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
    
    public function doAttack($human)
    {
        echo"『".$this->getName()."』の攻撃!\n";
        
        //自身のクラスには人間の情報が無い、人間は別クラス
        //->引数で持ってきて敵クラスの中の関数で使う
        echo"『".$human->getName()."』に".$this->attackPoint."のダメージ!\n";
        $human->tookDamage($this->attackPoint);
    }
    
    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        
        //HPが0未満にならないための処理
        if($this->hitPoint < 0){
            $this->hitPoint = 0;
        }
    }
}