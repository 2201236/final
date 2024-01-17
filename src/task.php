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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // タスク新規登録ボタンの要素を取得
            var taskAddButton = document.querySelector(".eee");

            // ボタンがクリックされたときの処理
            taskAddButton.addEventListener("click", function() {
                // ボタンがクリックされたら、指定のページに遷移
                location.href = 'task-add-input.php';
            });
        });
    </script>
    <style>
        /* Common styles */
        body {
    margin: 200px; /* 余白のサイズを調整 */
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}
h1 {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #fff;
    padding: 10px;
    border-bottom: 1px solid #ccc;
    text-align: center; /* 修正されたスタイル */
    z-index: 1000;
}
        /* Media queries for responsiveness */
        @media screen and (min-width: 751px) {
            .box-container {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
            }

            .box {
                width: 48%;
            }
        }

        @media screen and (max-width: 750px) {
            .box {
                width: 100%;
            }
        }

        /* Box styles */
        .box {
            position: relative;
            min-width: 200px;
            width: 100%;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #fff;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
            margin-top: 20px;
            
        }

        /* Pie chart styles */
        .box .percent {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .box .percent svg {
            position: relative;
            width: 150px;
            height: 150px;
            transform: rotate(-90deg);
        }

        .box .percent svg circle {
            fill: none;
            stroke-width: 10;
            stroke: #f3f3f3;
            stroke-dasharray: 440;
            stroke-dashoffset: 440;
            stroke-linecap: round;
            animation: circleAnim 1s forwards;
        }

        @keyframes circleAnim {
            0% {
                stroke-dasharray: 0 440;
            }
            99.9%, to {
                stroke-dasharray: 440 440;
            }
        }

        .box .percent .number {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111;
        }

        .box .percent .number .title {
            font-size: 50px;
        }

        .box .percent .number .title span {
            font-size: 22px;
        }

        /* Task card styles */
        .box .text {
            padding: 10px 0 0;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }
        .box.blue .percent .line {
        stroke-dashoffset: calc(440 - (440 * 100) / 100);
        stroke: #ff00ff;
      }
        /* Button container styles */
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .update,
        .sa {
            width: 48%;
            height: 60px;
        }

        @media screen and (max-width: 750px) {
            .button-container {
                flex-direction: column;
            }
            .update,
            .sa {
                width: 100%;
                margin-top: 5px;
            }
        }.update, .sa {
        background-color: #2ecc71;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    .update:hover, .sa:hover {
        background-color: #27ae60;
    }

        /* Add button styles */
        
        .box.task-card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px 0;
    transition: transform 0.3s ease-in-out;
}

.box.task-card:hover {
    transform: scale(1.05);
}

.box.task-card .title {
    background-color: #d3d3d3;
    color: #000000;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 15px;
    font-size: 18px;
}

.box.task-card p {
    margin-bottom: 10px;
    font-size: 16px;
}

.box.task-card .button-container {
    display: flex;
    justify-content: space-around;
    margin-top: 15px;
}

.box.task-card .update,
.box.task-card .sa {
    width: 100px;
    height: 40px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.box.task-card .update {
    background-color: #2ecc71;
}

.box.task-card .sa {
    background-color: #e74c3c;
}

.box.task-card .update:hover,
.box.task-card .sa:hover {
    background-color: #27ae60;
}

.add {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 999;
        }
.add {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
}

.add p {
    margin: 0;
}

.add button {
    background-color: #ee82ee;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.add button:hover {
    background-color: #8b008b;
}

.cate {
    position: fixed;
    top: -20px;
    right: 200px; /* 適切な値に調整してください */
    z-index: 999;
}

.cate button {
    background-color: #ea5532;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
    width: auto; /* ボタンの幅を100%に変更 */
}

.cate button:hover {
    background-color: #dc143c;
}
.cate-info,
.add-info {
    text-align: center;
    margin-top: 20px;
}

.cate-info button,
.add-info button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.cate-info button:hover,
.add-info button:hover {
    background-color: #2980b9;
}
@-webkit-keyframes arrow-move08 {
	0% {
		top: 40%;/*スタート地点（サンプルは[class:cp_arrows]height300pxの35%）*/
		opacity: 0;
	}
	70% {
		opacity: 1;
	}
	100% {
		opacity: 0;
	}
}
@keyframes arrow-move08 {
	0% {
		top: 40%;/*スタート地点（サンプルは[class:cp_arrows]height300pxの35%）*/
		opacity: 0;
	}
	70% {
		opacity: 1;
	}
	100% {
		opacity: 0;
	}
}

.boxwrap{
  margin:40px auto;
  width:400px;
  padding:20px 60px;
  border:1px solid #ddd;
  background-color: #efefef;
}
.wrap{
     margin: auto;
    width: 300px;
    background-color: #ee82ee;
    color: #fff;
    border-radius: 5px;
}

.mgb-20{
  margin-bottom: 20px;
}

.mgb-80{
  margin-bottom: 80px;
}

/* ①text-alignとpaddingで中央配置 */
.wrap.pattern-1{
  text-align:center;
  padding:20px 0;
}

/* ②heightとline-heightで中央配置 */
.wrap.pattern-2{
  text-align:center;
  height:60px;
  line-height:60px;
}
/* 応用 */
.wrap.pattern-2-round{
  text-align:center;
  height:60px;
  line-height:60px;
  width:60px;
  border-radius:50%;
}

/* ③tableレイアウトとvertical-alignで中央配置 */
.wrap.pattern-3{
  height:60px;
  display:table;
  text-align:center;
}

.wrap.pattern-3 div{
  display:table-cell;
  vertical-align:middle;
}

/* ④positionとtranslateで中央配置 */
.wrap.pattern-4{
  height:60px;
  text-align:center;
  position:relative;
}

.wrap.pattern-4 div{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  width:100%;
}

/* ⑤flexboxで中央配置 */
.wrap.pattern-5{
  height:60px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

/* ⑥CSS Gridレイアウトで中央配置 */
.wrap.pattern-6{
  height:60px;
  display: grid;
  place-items: center;
}
.test{
    text-align: center;
}
    </style>
</head>
<body>
   <?php $count=0;?>
<h1>ToDoリスト
        <div class="cate">
            <p><button onclick="location.href='category-add.php'" class="ccc">カテゴリ新規登録</button></p>
        </div>
        <div class="add">
            <p><button onclick="location.href='task-add-input.php'" class="eee">タスク新規登録</button></p>
        </div>
    </h1>
<?php
$pdo = new PDO($connect, USER, PASS);
foreach ($pdo->query('SELECT * FROM todolist') as $row) {

    $iiiddd = $row['id'];

    echo '
    <div class="box-container">
        <div class="box blue">
            <div class="percent">
                <svg>
                    <circle class="base" cx="75" cy="75" r="70"></circle>
                    <circle class="line" cx="75" cy="75" r="70" data-id="' . $row['id'] . '"></circle>
                </svg>
                <div class="number">
                    <h3 class="title">' . $row['state'] . '<span>%</span></h3>
                </div>
                <p class="text">進捗状況</p>
            </div>
        </div>

        <div class="box task-card">';
        
        $sql = $pdo->prepare('SELECT * FROM final_category WHERE id = ?');
        $sql->execute([$row['category']]);
        $finalCategory = $sql->fetch();
        echo '<div class="title">';
        echo '<p>' . $finalCategory['title'] . '</p>
        </div>
            <p>' . $row['detail'] . '</p>
            <p>締め切り日: ' . $row['due_date'] . '</p>
            <p>優先度: ' . $row['priority'] . '</p>
            
            <div class="button-container">
                <form action="task-update-input.php" method="post">';
                    echo '<input type="hidden" name="id" value="', $row['id'] ,'">';
                    echo '<button type="submit" class="update">更新</button>';
                echo '</form>';
                echo '<form action="task-delete.php" method="post">';
                    echo '<input type="hidden" name="id" value="', $iiiddd.'">';
                    echo '<button type="submit" class="sa">削除</button>
                </form>
            </div>
        </div>
    </div>';
    
    }

?>
<div class="test">
    <img src="image/ya.gif" alt="Animated GIF" align="center">
    </div>  
    <div class="boxwrap">

  <div class="wrap pattern-1 mgb-20"> 
    
    <a href="task-add-input.php">ToDoリストの新規登録はこちら</a>
  </div>
</body>
</html>