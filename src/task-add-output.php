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
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
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
    </style>
    <body> 
        <h1></h1>
     <?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into todolist(detail,category, due_date, state,priority) values (?, ?, ?, ?, ?)');
   
    if ($sql->execute([$_POST['detail'], $_POST['category'], $_POST['due_date'],$_POST['state'],$_POST['priority'] ]) ) {
        echo '<script>';
echo '  function jump() {';
echo '    location.href = "task.php";';
echo '  }';
echo '</script>';
echo '<div class="test">
<img src="image/dl.gif" alt="Animated GIF" style="width: 800px;height: 400px;" align="center">
</div> '; 
        echo '<body onLoad="setTimeout(jump, 3000);">';
        
    }else{
        echo '<font color="red">追加に失敗しました。</font>';
    }
    ?>

    <form action="task.php" method="post">
    <p><input type="submit" style="width: 200px; height: 40px;" value="トップ画面へ" class="eee"></p>
    </form>
</body>
</html>