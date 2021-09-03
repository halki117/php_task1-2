<?php 
  // リロードをした時に二重送信を防ぐためにトークンの発行をしている

  session_start();

  // リロードした際は、新しくトークンが発行されフォームから送られてきたトークンと異なる様になる。
  if ($_POST["token"] == $_SESSION["token"])
  {
    $fruits_array = ['apple', 'orange', 'strawbery'];

    $fruits = $_POST['word'];

  // in_arrayメソッドそ使って第二引数で指定した配列内に、第一引数で指定した要素が含まれるかをチェックする。
    $result = in_array($fruits, $fruits_array);
  }

  $_SESSION['token'] = mt_rand();

  $token = $_SESSION['token'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php1-2</title>
</head>
<body>
  
  <form method="post">
    <input type="text" name="word">
    <input type="submit" name="submit" value="検索">
  <!-- フォームから送信されるとトークンも一緒に送信される様にする。hidden属性とすることで画面に表示されない。 -->
    <input type="hidden" name="token" value="<?php echo $token; ?>">
  </form>

  <p>
    <?php
      if($result !== null){
        if($fruits === ''){
          echo "何かを入力してください";
          return;
        }
        if($result){
          echo "{$fruits}は、配列fruietsの中に含まれます";
        } else {  
          echo "{$fruits}は、配列fruietsの中に含まれません";
        }
      }
    ?>
  </p>
  
</body>
</html>