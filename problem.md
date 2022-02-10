# レコード削除課題

## 概要

- データベースのテーブルのレコードを、ブラウザから一件ずつ削除できるように PHP と JS をコーディングしてください。

## 備考

- データベースとテーブルとレコードは、Docker の初回起動時に自動で作成されます。

- Docker コンテナを初回起動するコマンド※

  ```
  make init
  ```

- Docker コンテナを起動するコマンド※

  ```
  make up
  ```

- Docker コンテナを終了するコマンド※

  ```
  make down
  ```

- ※make コマンドは Makefile があるディレクトリで実行してください。make コマンドで行っている処理の中身は Makefile の中身を確認してください。

## 詳細

- テーブルの全てのレコードをブラウザに表示し、レコードの各列に削除ボタンを表示する。

- 削除ボタンを押すと、当該レコードを削除してよいか確認画面を出す(JS の confirm 関数でよい)。

- 確認画面で OK を選択したらレコード削除の POST を実行する。

- 確認画面を OK せずに閉じたら何もしない。

## ヒント

- PHP でこの課題で有効な PDO オブジェクトを生成するコード

  ```PHP
  $pdo = new PDO('mysql:host=db;dbname=bbs', 'root', 'root');
  ```

- JS で Submit を行うコード

  ```JS
  const form = document.createElement('form');
  form.method = 'POST';
  form.innerHTML = '<input name="inputタグの名前" value="inputタグの値">';
  document.body.append(form);
  form.submit();
  ```
