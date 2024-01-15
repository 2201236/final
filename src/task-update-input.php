<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517465-final';
const USER = 'LAA1517465';
const PASS = 'Pass0124';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>更新画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>タスク更新画面</h1>
    <form action="task-update-output.php" method="post">
        <?php

        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('SELECT * FROM todolist WHERE id=?');
        $sql->execute([$_POST['id']]);

        foreach ($sql as $row) {
            echo '<table align="center" border="1">';
            echo '<tr>';
            echo '<form action="task-update-output.php" method="post">';
            echo '<input type="hidden" name="id" value="' , $row['id'] , '">';
            echo '<td>';
            echo 'ジャンル';
            echo '</td> ';
            echo '<td> ';
            echo '<select id="taskType" name="category">';
            
            // データベースからカテゴリの一覧を取得
            $categories = $pdo->query('SELECT * FROM final_category')->fetchAll(PDO::FETCH_ASSOC);

            // オプションを生成
            foreach ($categories as $category) {
                $selected = ($row['category'] == $category['id']) ? 'selected' : '';
                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
            }

            echo '</select>';
            echo '</td> ';
            echo '</tr>';

            echo '<tr>';
            echo '<td> ';
            echo '詳細';
            echo '</td> ';

            echo '<td>';
            echo '<input type="text" name="detail" style="width: 200px; height: 40px;" value="' , $row['detail'] , '">';
            echo '</td> ';
            echo '</tr>';

            echo '<tr>';
            echo '<td> ';
            echo '締め切り日';
            echo '</td> ';

            echo '<td>';
            echo ' <input type="date" name="due_date" style="width: 200px; height: 40px;" value="' , $row['due_date'] , '">';
            echo '</td> ';
            echo '</tr>';

            echo '<tr>';
            echo '<td> ';
            echo '進捗状況';
            echo '</td> ';

            echo '<td>';
            echo ' <select id="state" name="state">';
            for ($i = 0; $i <= 100; $i += 10) {
                $selected = ($row['state'] == $i) ? 'selected' : '';
                echo '<option value="' . $i . '" ' . $selected . '>' . $i . '%</option>';
            }
            echo '</select>';
            echo '</td> ';
            echo '</tr>';

            echo '<tr>';
            echo '<td> ';
            echo '優先度';
            echo '</td> ';

            echo '<td>';
            $priorities = ['低', '中', '高'];
            foreach ($priorities as $priority) {
                $checked = ($row['priority'] == $priority) ? 'checked' : '';
                echo '<input type="radio" id="' . strtolower($priority) . '" name="priority" value="' . $priority . '" ' . $checked . '>';
                echo '<label for="' . strtolower($priority) . '">' . $priority . '</label>';
            }
            echo '</td> ';
            echo '</tr>';
        }

        ?>
        </table>
        <p><input type="submit" value="更新" style="width: 200px; height: 40px;" class="eee"></p>
    </form>

    <p><button onclick="location.href='ichiran.php'" class="modo" style="width: 200px; height: 40px;">トップへ戻る</button></p>
</body>

</html>
