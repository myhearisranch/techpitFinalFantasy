# 人間クラスの作成

## プロパティの宣言

人間クラスは変数として、名前, HP, 攻撃力を持つ
→これらをプロパティとして宣言する。

const MAX_HITPOINT = 100; // 最大HPの定義 定数
public $name; // 人間の名前
public $hitPoint = 100; // 現在のHP
public $attackPoint = 20; // 攻撃力

プロパティ: クラスやそのインスタンスが持つデータや状態を表す変数。
プロパティはクラスの「属性」とも言える。

## メソッドの宣言

人間クラスは関数として、攻撃をする, ダメージを受けるを持つ
→メソッドは「攻撃をする」「ダメージを受ける」

public function doAttack($enemy)
{
    echo "『" .$this->name . "』の攻撃！\n";
    echo "【" . $enemy->name . "】に " . $this->attackPoint . " のダメージ！\n";
    $enemy->tookDamage($this->attackPoint);
}

メソッドは、public function [関数名]と宣言。
$thisは自分自身のクラスを指すキーワードである。
$this->name: メソッドが定義されているクラスのnameプロパティを参照する
$enemy->name: Enemyクラスのnameプロパティを参照する
$this->attackPoint: メソッドが定義されているクラスのattackPointプロパティを参照する
$enemy->tookDamage: EnemyクラスのtookDamageメソッドを参照している

「ダメージを受ける」メソッドも定義する
public function tookDamage($damage)
{
    $this->hitPoint -= $damage;
    // HPが0未満にならないための処理
    if ($this->hitPoint < 0) {
        $this->hitPoint = 0;
    }
}

