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
		<title>更新output</title>
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update todolist set detail=?, category=?, due_date=?, state=?, priority=? where id=?');
    // SQL発行準備 prepareメソッド　作成２
    if($sql->execute([htmlspecialchars($_POST['detail']),$_POST['category'],$_POST['due_date'], $_POST['state'],$_POST['priority'], $_POST['id']])){
        echo '更新に成功しました';
    } else{
        echo '更新に失敗しました';
    } 
?>
        <hr>
      
        <p><button onclick="location.href='task.php'" class="eee" style= "width: 200px; height: 40px;" >トップ画面へ戻る</button></p>
    </body>
</html>

