# レコード削除課題

## 概要

- データベースのテーブルのレコードを、ブラウザから一件ずつ削除できるように PHP と JS を index.php にコーディングしてください。

## 備考

- データベースとテーブルとレコードは、Docker の初回起動時に自動で作成されます。

  - この課題で使うテーブルの定義(このテーブルとレコードは自動で作成されます)
    ```SQL
    CREATE TABLE `messages` (
      `id` int PRIMARY KEY AUTO_INCREMENT,
      `text` text NOT NULL
    );
    ```

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

- ブラウザからのアクセス

  - localhost

    - index.php が実行されます。

  - localhost:8888

    - phpMyAdmin に繋がります。

## 詳細

- テーブルの全てのレコードをブラウザに表示し、レコードの各列に削除ボタンを表示する。

  - ![image](https://user-images.githubusercontent.com/22877094/153440960-6a562899-518b-4b05-99a1-1fb54bfffd9c.png)

- 削除ボタンを押すと、当該レコードを削除してよいか確認画面を出す(JS の confirm 関数でよい)。

  - ![image](https://user-images.githubusercontent.com/22877094/153441202-75a3b0de-3cef-491b-9f5e-1e2e61123eda.png)

  - 削除確認画面には当該レコードの id と text を表示すること。

- 確認画面で OK を選択したらレコード削除の POST を実行する。

  - ![image](https://user-images.githubusercontent.com/22877094/153441681-76a30743-b206-4e15-b3cd-7f8c245ee91b.png)

  - 確認画面を OK せずに閉じたら何もしない。

## ヒント

- PHP でこの課題で有効な PDO オブジェクトを生成するコード

  ```PHP
  $pdo = new PDO('mysql:host=db;dbname=bbs', 'root', 'root');
  ```

- JS で localhost に POST するコード

  ```JS
  const form = document.createElement('form');
  form.method = 'POST';
  form.innerHTML = '<input name="inputタグの名前" value="inputタグの値">';
  document.body.append(form);
  form.submit();
  ```
