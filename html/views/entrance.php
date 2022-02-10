<!DOCTYPE html>
<html lang="ja">

<?php require_once('htmlparts/head.php'); ?>

<body>
  <div class="container">
    <h1 class="my-5">新規登録</h1>
    <div class="card mb-3">
      <div class="card-body">
        <form method="POST">
          name
          <input class="form-control" type=text name="register_name" value=<?= ($register_name ?: '') ?>>
          <br>
          password
          <input class="form-control" type=password name="register_password" value=<?= ($register_password ?: '') ?>>
          <br>
          <input class="btn btn-primary" type=submit value="新規登録">
        </form>
      </div>
    </div>
    <h1 class="my-5">ログイン</h1>
    <div class="card mb-3">
      <div class="card-body">
        <form method="POST">
          name
          <input class="form-control" type=text name="login_name" value=<?= ($login_name ?: '') ?>>
          <br>
          password
          <input class="form-control" type=password name="login_password" value=<?= ($login_password ?: '') ?>>
          <br>
          <input class="btn btn-primary" type=submit value="ログイン">
        </form>
      </div>
    </div>
    <p><?= ($msg ?: '') ?> </p>
  </div>
</body>

</html>
