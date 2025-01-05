# メイン処理の実装

## ファイルの読み込み
PHP では、別の PHP ファイルを使うときは、require_onceを使う

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

これでHumanクラスとEnemyクラスを使う準備ができる。

## インスタンス化
クラスは設計図でインスタンスは実際に作られた具体的なもの
例えば、車というクラスがあれば車の形や動作が決まっている。
インスタンスは設計図を元に作られた実際の車


スマートフォンを例に例えると、、、
・クラス：「スマートフォン」という設計図
・プロパティ：「ブランド」や「色」などの特徴
・メソッド：「電話をかける」や「写真を撮る」といった機能
・インスタンス：「赤いiPhone」と「黒いSamsung Galaxy」

インスタンス化をするときはnew[クラス名]
$tiida = new Human();
$goblin = new Enemy();

$tiidaには、Humanクラスにあるプロパティとメソッドを参照できるようになる。
$goblinには、Enemyクラスにあるプロパティとメソッドを参照できるようになる。

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

作成したインスタンスのnameプロパティに値を入れている。(名前を設定している)

## 戦闘処理の実装

### ステータスの表示を実装する
echo $tiida->name . "　：　" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . "　：　" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
echo "\n";


$tiida->hitPoint , $goblin->hitPoint , $tiida::MAX_HITPOINT , $goblin::MAX_HITPOINT
これらは、値を上書きしてないのでインスタンスが作成されたクラスのプロパティの値を参照している。

### 攻撃
$tiida->doAttack($goblin);
echo "\n";
$goblin->doAttack($tiida);
echo "\n";


$tiida->doAttack($goblin);

$tiidaが作成されたクラス(Humanクラス)のdoAttackメソッドを参照する。
引数として、$goblinというインスタンスを渡している。

class Human
{
    public function doAttack($enemy)
    {
        echo "『" .$this->name . "』の攻撃！\n";
        echo "【" . $enemy->name . "】に " . $this->attackPoint . " のダメージ！\n";
        $enemy->tookDamage($this->attackPoint);
    }
}

$enemyには$goblinが入る

class Human
{
    public function doAttack($goblin)
    {
        echo "『" .$this->name . "』の攻撃！\n";
        echo "【" . $goblin->name . "】に " . $this->attackPoint . " のダメージ！\n";
        $enemy->tookDamage($this->attackPoint);
    }
}

$goblin->name = ゴブリン
$thisはそのクラスから作られたオブジェクト自身を指す
$tiida = new Human();で作られたオブジェクト内で$thisは$tiidaを指す





