# 敵クラスの作成

敵クラスは変数として、名前, HP, 攻撃力を持つ
→これらをプロパティとして宣言する。

class Enemy
{
    const MAX_HITPOINT = 50; 
    public $name; 
    public $hitPoint = 50; 
    public $attackPoint = 10; 
}

## メソッドの宣言

人間クラスは関数として、攻撃をする, ダメージを受けるを持つ
→メソッドは「攻撃をする」「ダメージを受ける」

public function doAttack($human)
{
    echo "『" .$this->name . "』の攻撃！\n";
    echo "【" . $human->name . "】に " . $this->attackPoint . " のダメージ！\n";
    $human->tookDamage($this->attackPoint);
}

$human->tookDamage($this->attackPoint);の処理の流れ:

1. $this->attackPointは、このクラス(Enemy)のattackPointを参照する(入る数字は10)
2. $human->tookDamage(10)となる。
3. HumanクラスのtookDamageを参照する。値は10を渡す

人間クラスのtookDamageメソッド

public function tookDamage($damage)
{
    $this->hitPoint -= $damage;
    // HPが0未満にならないための処理
    if ($this->hitPoint < 0) {
        $this->hitPoint = 0;
    }
}

$damageには10が入るので、

public function tookDamage(10)
{
    $this->hitPoint -= 10;
    // HPが0未満にならないための処理
    if ($this->hitPoint < 0) {
        $this->hitPoint = 0;
    }
}

となる。
