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
        <style>
            body {
    margin: 20px;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

td {
    padding: 10px;
}

select,
input[type="text"],
input[type="date"] {
    width: 100%;
    height: 40px;
    margin-bottom: 10px;
}

input[type="submit"],
.modo {
    width: 200px;
    height: 40px;
    cursor: pointer;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
}

.modo {
    background-color: #2ecc71;
}

.eee:hover,
.modo:hover {
    background-color: #2980b9;
}

label {
    margin-right: 10px;
}
.modoru-link {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
        }

        .modoru-link img {
            height: 40px;
        }

        </style>
    </head>
    <body><?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
        <form action="category-add-output.php" method="post">
            <h1>カテゴリ新規登録</h1>
            <a><table align="center" border="1">
            
<?php
           echo '<tr><td align="center">カテゴリ</td><td><input type="text" name="title" style="width: 200px; height: 100px;"></td></tr>
   
        </table></a>

        <p><input type="submit" style="width: 200px; height: 40px;" value="カテゴリ登録" class="eee"></p>
        </form>'
        ?>
        
 <a href="task.php">
    <img src="image/modoru.png" alt="" style="height: 40px;" class="modoru">
</a>
 </body>
 </html>