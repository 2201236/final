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
		<title>削除完了画面</title>
        <form action="task.php" method="post">
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from todolist where id=?');
    if($sql->execute([$_POST['id']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }
?>
    
<p><input type="submit" style="width: 200px; height: 40px;" value="トップ画面へ" class="eee"></p>
    </body>
</html>

