# アクセサーメソッド

プロパティにアクセスするためのメソッド
privateにすると、クラスの内部からアクセスできなくなる。
アクセサーメソッド: privateプロパティにアクセスするためのメソッド

class Human

 private $name;

 public function getName()
 {
   return $this->name;
 }

getName()メソッドは$thisを使って、現在のインスタンスのprivateプロパティ$nameにアクセスしている。

## 何故、getName()メソッドでnameプロパティを取得できるのか？

1. $thisは現在のインスタンスを指している

$this は、メソッドが呼び出された現在のオブジェクト（インスタンス）**を指す。
例えば、以下のようにインスタンスを作成したとする：

$human = new Human();
$human->setName("ティーダ");

$human->setName("ティーダ") の呼び出しにより、$this->name に "ティーダ" が代入される。
この $this は $human インスタンスを指す。
そのため、getName() が呼び出されたとき、$this->name は $human->name に対応し、その値 "ティーダ" を返す。

2. クラス内ではprivateプロパティにもアクセスできる
・プロパティがprivateに設定されていても、クラス内のメソッドであればアクセスが可能
・以下のコードでは setName() と getName() は同じクラス内にあるため、private プロパティ $name にアクセスできる

class Human
{
    private $name;

    public function setName($name)
    {
        $this->name = $name; // クラス内なのでアクセス可能
    }

    public function getName()
    {
        return $this->name; // クラス内なのでアクセス可能
    }
}

外部からは直接 $human->name としてアクセスできないが、getName() メソッドを使うことで間接的にその値を取得できる


## 実際の流れを具体例で説明

1. インスタンスを作成し、setName() で名前を設定

$human = new Human();
$human->setName("ティーダ");

この時、$this->name に "ティーダ" が代入される。

2. getName() を呼び出す

echo $human->getName(); // "ティーダ" を出力

この時、getName() の中で $this->name にアクセスし、その値を返す。

## プロパティに値をセットするためのアクセサーメソッド(セッター)

public function setName($name)
{
    $this->name = $name;
}

## 何故、メソッドの引数の$nameを自身のプロパティにセットできるのか？

理由; 引数 $name の値を self インスタンスのプロパティ $name に代入しているから

class Human
{
    private $name;
}
$human = new Human();
このとき、$this->name は $human インスタンスの中にあるプロパティ $name を指す


## 処理の流れ:

human->setName("ティーダ");
このとき、引数 $name に "ティーダ" が渡される。

$this->name = $name;
$this は $human を指す。
$this->name は $human インスタンスのプロパティ $name を指す。
結果として、$human->name に "ティーダ" が代入。

# コンストラクタ

1つのクラスに1つのみ存在し、クラスのインスタンスを生成するときのみ実行する
プロパティの初期値を与えるのによく使われる

public function __construct($name)
{
  $this->name = $name;
}

やっていることはsetNameと全く同じ, 引数の$nameを自身のプロパティにセットするだけ


public function __construct($name)
{
   parent::__construct($name, $this->hitPoint, $this->attackPoint);
}

プロパティを private にしたことで、Humanクラスのプロパティでもある、$hitPointや$attackPointプロパティをBraveクラスのプロパティで上書きできなくなる。

parent::__construct($name, $this->hitPoint, $this->attackPoint);

親クラスのコンストラクタ（またはメソッド）を通じて値を設定できる

親クラスHumanコンストラクタが$hitPoint, $attackPointを初期化する	
public function __construct($name, $hitPoint, $attackPoint)
{
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
}

### 処理の流れ

$brave = new Brave("勇者ティーダ");

1. 子クラスBraveのコンストラクタが呼ばれる
public function __construct($name)
{
  parent::__construct($name, $this->hitPoint, $this->attackPoint);
}

$this->hitPoint は Brave クラス内で 120 に設定されているため、その値が親クラスに渡される。
$this->attackPoint も同様に、30 が渡される。

public function __construct($name, $hitPoint, $attackPoint)
{
    $this->name = $name;             // 名前を設定
    $this->hitPoint = $hitPoint;     // Brave クラスから渡された 120 に設定
    $this->attackPoint = $attackPoint; // Brave クラスから渡された 30 に設定
}

クラス内の private プロパティが、子クラスから渡された値で初期化される。







