<?php

class Enemy
{
    const MAX_HITPOINT = 50;
    public $name;
    public $hitPoint = 50;
    public $attackPoint = 10;
    
    public function doAttack($human)
    {
        echo"『".$this->name."』の攻撃!\n";
        
        //自身のクラスには人間の情報が無い、人間は別クラス
        //->引数で持ってきて敵クラスの中の関数で使う
        echo"『".$human->name."』に".$this->attackPoint."のダメージ!\n";
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