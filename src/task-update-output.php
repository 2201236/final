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
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    margin: 20px; /* Add some margin for better readability */
}

h1 {
    color: #333;
}

.success-message, .error-message {
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
}

.success-message {
    color: green;
}

.error-message {
    color: red;
}

.jump-message {
    font-size: 16px;
    color: #888;
}

.button-container {
    margin-top: 20px;
}

.eee {
    width: 200px;
    height: 40px;
    background-color: #3498db;
    color: #fff;
    border: none;
    cursor: pointer;
}

.eee:hover {
    background-color: #2980b9;
}

hr {
    margin-top: 20px;
    border: 1px solid #ddd; /* Add a subtle border for separation */
}

    </style>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update todolist set detail=?, category=?, due_date=?, state=?, priority=? where id=?');
    // SQL発行準備 prepareメソッド　作成２
    if($sql->execute([htmlspecialchars($_POST['detail']),$_POST['category'],$_POST['due_date'], $_POST['state'],$_POST['priority'], $_POST['id']])){
        echo '<script>';
    echo '  function jump() {';
    echo '    location.href = "task.php";';
    echo '  }';
    echo '</script>';
      
        echo '<body onLoad="setTimeout(jump, 3000);">';
        echo '<div class="test">
    <img src="image/dl.gif" alt="Animated GIF" style="width: 800px;height: 400px;" align="center">
    </div> '; 
    } else{
        echo '更新に失敗しました';
    } 
?>
        <hr>
      
        <p><button onclick="location.href='task.php'" class="eee" style= "width: 200px; height: 40px;" >トップ画面へ戻る</button></p>
    </body>
</html>

