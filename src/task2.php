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
    <style>
        /* Common styles */
        body {
    margin: 200px; /* 余白のサイズを調整 */
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
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
        stroke: #03a9f4;
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
        }

        /* Add button styles */
        .add {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 999;
        }
    </style>
</head>
<body>

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

        echo '<p>' . $finalCategory['title'] . '</p>
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

<div class="add">
    <p><button onclick="location.href='task-add-input.php'" class="eee">タスク登録画面へ</button></p>
</div>

</body>
</html>
