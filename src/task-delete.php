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
    <link rel="stylesheet" href="style.css">
    <style>
       body, h1, p, input {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4; /* Set a background color for the body */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Make sure the body takes up the full height of the viewport */
}

.container {
    text-align: center;
}

.success-message, .error-message, .jump-message {
    margin-bottom: 15px;
}

.success-message {
    color: green;
    font-size: 18px;
    font-weight: bold;
}

.error-message {
    color: red;
    font-size: 18px;
    font-weight: bold;
}

.jump-message {
    font-size: 16px;
    color: #888; /* Add a lighter color for the jump message */
}

.button-container {
    margin-top: 20px;
}

.eee {
    width: 200px;
    height: 40px;
    background-color: #3498db; /* Add a background color for the button */
    color: #fff; /* Set text color for better contrast */
    border: none;
    cursor: pointer;
}
    </style>
</head>
<body>
<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('delete from todolist where id=?');
if ($sql->execute([$_POST['id']])) {
    echo '<div class="success-message"></div>';
    echo '<script>';
    echo '  function jump() {';
    echo '    location.href = "task.php";';
    echo '  }';
    echo '</script>';

    echo '<div class="jump-message"></div>';
    echo '<body onLoad="setTimeout(jump, 3000);">';
    echo '<div class="test">
    <img src="image/dl.gif" alt="Animated GIF" style="width: 800px;height: 400px;" align="center">
    </div> '; 
} else {
    echo '<div class="error-message">削除に失敗しました。</div>';
}
?>

<div class="button-container">
    <p><input type="submit" value="トップ画面へ" class="eee"></p>
</div>
</body>
</html>
