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
        .add {
    text-align: center;
    margin-top: 20px;
}

.add input[type="submit"] {
    width: 200px;
    height: 40px;
    cursor: pointer;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
}

.add input[type="submit"]:hover {
    background-color: #2980b9;
}
        </style>
    </head>
    <body><?php
    $pdo=new PDO($connect, USER, PASS);
    ?>
        <form action="task-add-output.php" method="post">
            <h1>ToDoリスト新規登録</h1>
            <a><table align="center" border="1">
            <tr><td align="center">ジャンル</td>
            <td>
            <?php
            echo '<select id="taskType" name="category">';
            
            // データベースからカテゴリの一覧を取得
            $categories = $pdo->query('SELECT * FROM final_category')->fetchAll(PDO::FETCH_ASSOC);

            // オプションを生成
            foreach ($categories as $category) {
                $selected = ($row['category'] == $category['id']) ? 'selected' : '';
                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
            }

            echo '</select>';
            ?>
            </td>
            </tr>


           <tr><td align="center">詳細</td><td><input type="text" name="detail" style="width: 200px; height: 100px;"></td></tr>
           <tr><td align="center">締め切り日</td><td><input type="date" name="due_date" style="width: 200px; height: 40px;"></td></tr>
           
           <tr><td align="center">進捗状況</td>
           <td>
           <select id="state" name="state">
            <option value="0">0%</option>
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
            <option value="40">40%</option>
            <option value="50">50%</option>
            <option value="60">60%</option>
            <option value="70">70%</option>
            <option value="80">80%</option>
            <option value="90">90%</option>
            
            </select>
           </td>
           </tr>


           <tr><td align="center">優先度</td>
           <td>
           <input type="radio" id="low" name="priority" value="低">
    <label for="low">低</label>

    <input type="radio" id="medium" name="priority" value="中">
    <label for="medium">中</label>

    <input type="radio" id="high" name="priority" value="高">
    <label for="high">高</label>

           </td>
           </tr>   
        </table></a>
        <div class="add">
        <p><input type="submit" style="width: 200px; height: 40px;" value="登録" ></p>
        </form>
        </div>
 <a href="task.php">
    <img src="image/modoru.png" alt="" style="height: 40px;" class="modoru">
</a>
 </body>
 </html>