<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>オブジェクト指向が何かを説明できる</title>
</head>

<body>
  <h1>オブジェクト指向とは何か</h1>
  <h2>オブジェクト指向の目的</h2>
  <p>
    オブジェクト指向は、ソフトウェア開発の考え方のひとつです。オブジェクトとは、データと処理をまとめた単位です。オブジェクト指向では、ソフトウェアをオブジェクトの集合として捉え、オブジェクト間の相互作用によってプログラムを設計します。
  </p>
  <h3>オブジェクト指向の利点</h3>
  <p>
    可読性・保守性の向上：オブジェクトの状態と処理を明確に定義するため、プログラムの可読性と保守性が向上します
  </p>
  <p>
    再利用性の向上：オブジェクトは再利用ができるため開発効率を上げることができます。
  </p>
  <p>
    拡張性の向上：オブジェクト指向では既存のオブジェクトを拡張または変更することで、プログラムを簡単に拡張することができます。
  </p>

  <h2>カプセル化</h2>
  <p>
    オブジェクトの内部状態を外部から隠微します。内部状態とは、オブジェクトが持つデータや処理のことを指します。カプセル化によってオブジェクトの内部状態を外部から変更できないようにします。
  </p>

  <h2>継承</h2>
  <p>
    既存のオブジェクトの機能を拡張または変更することができます。
  </p>

  <h2>ポリモーフィズム</h2>
  <p>
    同じ名前のメソッドが、異なるオブジェクトで異なる動作をするものです。
    オーバーロード：同じ名前のメソッドを異なる引数リストで定義することです。
    オーバーライド：親クラスのメソッドを子クラスで同じ名前で再定義することです。
  </p>
  <h3>ポリモーフィズムのメリット</h3>
  <ul>
    <li>コードの再利用性の向上：同じ名前のメソッドを、異なるクラスで再利用することができます。</li>
    <li>プログラムの保守性の向上：親クラスのメソッドを変更しても、子クラスのメソッドは変更する必要がありません。</li>
    <li>プログラムの拡張性の向上：新しいクラスを追加しても、プログラムを変更する必要がありません。</li>
  </ul>

  <h2>単一責任の原則</h2>
  <p>
    各クラスは１つの責任のみを持つべきであるという原則です。
  </p>
  <h3>単一責任の原則を採用するメリット</h3>
  <ul>
    <li>可読性・保守性の向上：クラスの責任が明確になるため、プログラムの可読性と保守性が向上します。</li>
    <li>テスト性の向上：クラスの責任が明確になるため、クラス単位でテストしやすくなります。</li>
    <li>拡張性の向上：クラスの責任が明確になるため、クラスを拡張しやすくなります。</li>
  </ul>

  <p>
    単一責任の原則の具体的な例としては、以下のようなものが挙げられます。
  </p>
  <ul>
    <li>クラスの責任を、データの管理、処理の実行、表示の制御などに分割する</li>
    <li>クラスの責任を、外部とのやり取り、内部処理などに分割する</li>
  </ul>
</body>

</html>