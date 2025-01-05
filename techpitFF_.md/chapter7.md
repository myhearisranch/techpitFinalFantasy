# オーバーライド　プロパティ・メソッドを上書きする

public function doAttack($enemy)
    {
        // 乱数の発生
        if (rand(1, 3) === 1) {
            // スキルの発動
            echo "『" .$this->name . "』のスキルが発動した！\n";
            echo "『ぜんりょくぎり』！！\n";
            echo $enemy->name . " に " . $this->attackPoint * 1.5 . " のダメージ！\n";
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }

オーバーライドするときは必ず同じメソッド名にする

Braveクラス:

const MAX_HITPOINT = 120;
public $hitPoint = self::MAX_HITPOINT;
public $attackPoint = 30;


Humanクラス;

const MAX_HITPOINT = 100;
public $name;
public $hitPoint = 100;
public $attackPoint = 20;

Humanクラスで定義した、MAX_HITPOINTや$hitPointなどを上書きする	



