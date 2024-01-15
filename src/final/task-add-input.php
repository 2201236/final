
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>登録画面</title> 
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="task-add-output.php" method="post">
            <h1>タスク登録画面</h1>
            <a><table align="center" border="1">
            <tr><td align="center">ジャンル</td>
            <td><select id="taskType" name="category">
            <option value="1">仕事</option>
            <option value="2">買い物</option>
            <option value="3">学習</option>
            <option value="4">約束</option>
            <option value="5">その他</option>
            </select>
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
        <p><input type="submit" style="width: 200px; height: 40px;" value="商品登録" class="eee"></p>
        </form>
        <form action="task.php" method="post">
        <p><input type="submit" style="width: 200px; height: 40px;" value="戻る" class="modo"></p>
 </form>
 </body>
 </html>