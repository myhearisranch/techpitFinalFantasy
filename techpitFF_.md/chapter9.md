# カプセル化

## pubic protected private

これらのキーワードの違いはアクセスできる範囲にある

private : 宣言されたクラスの中でのみ使用可能
protected : 宣言されたクラスまたは、継承先クラスでのみ使用可能
public : クラスの中・外関係なく使用可能

class Brave extends Human
{

    public $hitPoint = self::MAX_HITPOINT; // publicで宣言

}

Braveクラスの$hitPointはmain.php, Brave.phpで使用されている

Braveクラスで$nameをpublicで宣言している場合、、、
$nameには名前が一度設定されたら、その後変更できないような仕様にしたい
publicのように何処からでもアクセスできてしまうと、意図しない箇所で変更されたりする。

基本原則として、プロパティはprivateにすることを目指す
しかし、privateで設定したプロパティはクラスの内部からしかアクセスできず、main.phpで使うことができない。
=>プロパティにアクセスするためのメソッドを用意する




