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
        <title>商品一覧画面</title> 
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <div class="table">
                <a>
        <table align="center" border="1">
            <thead>
                    <h1>my to do list</h1>
                    <tr>
                        <th>タイトル</th>
                        <th>カテゴリ</th>
                        <th>締め切り日</th>
                        <th>進捗状況</th>
                        <th>優先度</th>
                        <th></th>
                        <th></th>
                </tr>
            </thead>
        <tbody>
        <?php 
        $pdo=new PDO($connect, USER, PASS);
        foreach ($pdo->query('select * from todolist ') as $row) {
        echo '<tr>';
        echo '<td align="center" class="id">', $row['title'], '</td>';
        echo '<td align="center">', $row['category'], '</td>';
        echo '<td align="center">', $row['due_date'], '</td>';
        echo '<td align="center">', $row['state'], '</td>';
        echo '<td align="center">', $row['priority'], '</td>';
        echo '<td>';
        echo '<form action="task-uppdate-input.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<button type="submit" class="koshin" style="width:40px; hight:60p;">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="task-delete.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['id'], '">';
        echo '<button type="submit" class="sa" style="width:40px; hight:60p;">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
        }
        ?>
                </tbody>
                </div>
            </table>
        </a>
  <div id="todo-container">
    <div id="todo-header">My ToDo List</div>
    <ul id="todo-list">
    </ul>
    <div class="add-task">
      <input type="text" id="new-task" placeholder="Add a new task">
      <select id="category" aria-label="Category">
        <option value="work">仕事</option>
        <option value="personal">個人</option>
        <option value="shopping">買い物</option>
      </select>
      <input type="date" id="due-date">
      <select id="priority" aria-label="Priority">
        <option value="high">高</option>
        <option value="medium">中</option>
        <option value="low">低</option>
      </select>
      <select id="status" aria-label="Status">
        <option value="not-started">開始前</option>
        <option value="in-progress">進行中</option>
        <option value="completed">完了</option>
      </select>
      <button type="button" onclick="addTask()">Add Task</button>
    </div>
  </div>
</form>
</body>
</html>