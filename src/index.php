<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My ToDo List</title>
  
</head>
<?php require 'db-connect.php'; ?>
<body>

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

  
  <script>
    function addTask() {
      var newTaskInput = document.getElementById("new-task");
      var categorySelect = document.getElementById("category");
      var dueDateInput = document.getElementById("due-date");
      var prioritySelect = document.getElementById("priority");
      var statusSelect = document.getElementById("status");
  
      var taskText = newTaskInput.value.trim();
      var category = categorySelect.value;
      var dueDate = dueDateInput.value;
      var priority = prioritySelect.value;
      var status = statusSelect.value;
  
      if (taskText !== "") {
        var todoList = document.getElementById("todo-list");
  
        var li = document.createElement("li");
        li.className = "todo-item";
        li.setAttribute("data-category", category);
  
        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
  
        var span = document.createElement("span");
  

        span.innerText = taskText + " (カテゴリ: " + category + ", 締め切り日: " + dueDate + ", 優先度: " + priority + ", 進捗状況: " + status + ")";
  
        li.appendChild(checkbox);
        li.appendChild(span);
        todoList.appendChild(li);
  
        newTaskInput.value = "";
        dueDateInput.value = "";
      }
    }
  </script>
  
</body>

</html>