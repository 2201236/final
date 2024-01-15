<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517465-final';
    const USER ='LAA1517465';
    const PASS ='Pass0124';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>登録画面</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body> 
        <h1></h1>
     <?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into todolist(detail,category, due_date, state,priority) values (?, ?, ?, ?, ?)');
   
    if ($sql->execute([$_POST['detail'], $_POST['category'], $_POST['due_date'],$_POST['state'],$_POST['priority'] ]) ) {
        echo '<font color="red">追加に成功しました。</font>';
    }else{
        echo '<font color="red">追加に失敗しました。</font>';
    }
    ?>

    <form action="task.php" method="post">
    <p><input type="submit" style="width: 200px; height: 40px;" value="トップ画面へ" class="eee"></p>
    </form>
</body>
</html>