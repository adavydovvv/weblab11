<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Давыдов Артём Сергеевич 221-362 - Лабораторная работа №11</title>
</head>

<body>
    <?php
    $default_layout = 'table';
    $default_selectedNum = 'all';
    $layout = isset($_GET['layout']) ? $_GET['layout'] : '$default_layout';
    $selectedNumber = isset($_GET['number']) ? $_GET['number'] : '$default_selectedNum';

    function generateMultiplicationTable($layout, $number)
    {
        if ($layout === 'block') {
            echo "<div style='display: flex; flex-wrap: wrap;'>";
            for ($i = 1; $i <= 9; $i++) {
                echo "<div style='width: 100px; border: 1px solid #000; padding: 5px;'>";
                echo "<h2><a href='?layout=table&number=$number'>$number </a>";
                echo "<a>x </a>";
                echo "<a href='?layout=table&number=$i'>$i </a>";
                echo "<a>= </a>";
                $product = $number * $i;
                if ($product >= 1 && $product <= 9) {
                    echo "<a href='?layout=table&number=$product'>$product</a>";
                } else {
                    echo "<a>$product</a>";
                }
                echo "</h2>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<table border='1'>";
            for ($i = 1; $i <= 9; $i++) {
                echo "<tr>";
                echo "<td><a href='?layout=table&number=$number'>$number </a></td>";
                echo "<td>x</td>";
                echo "<td><a href='?layout=table&number=$i'>$i </a> </td>";
                echo "<td>=</td>";
                $product = $number * $i;
                if ($product >= 1 && $product <= 9) {
                    echo "<td><a href='?layout=table&number=$product'>$product</a></td>";
                } else {
                    echo "<td>$product</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    

    ?>

    <header>
        <img src="mospolytech_logo_white.png" alt="Логотип">
        <nav>
        <a href="?layout=table<?= '&number=' . $selectedNumber?>" class="<?= ($layout === 'table') ? 'selected' : '' ?>">Табличная верстка</a>
        <a href="?layout=block<?= '&number=' . $selectedNumber?>" class="<?= ($layout === 'block') ? 'selected' : '' ?>">Блочная верстка</a>
        </nav>
    </header>

    <div class="container">
    <aside>
        <?php
           $allSelected = ($selectedNumber === 'all' || $selectedNumber === '$default_selectedNum') ? 'selected' : '';
           echo "<a href='?number=all&layout=$layout' class='$allSelected'>Всё</a><br>";
           $default_selectedNum = $selectedNumber;
            for ($i = 1; $i <= 9; $i++) {
                $selected = ($selectedNumber === (string)$i) ? 'selected' : '';
                $default_selectedNum == $selectedNumber;
                echo "<a href='?number=$i&layout=$layout' class='$selected'>$i</a><br>";
            }
        ?>
    </aside>

    <main>
        <?php
        if ($selectedNumber === 'all' || $selectedNumber === '$default_selectedNum') {
            for ($i = 1; $i <= 9; $i++) {
                generateMultiplicationTable($layout, $i);
            }
        } else {
            generateMultiplicationTable($layout, intval($selectedNumber));
        }
        ?>
    </main>
    </div>
    <footer>
        <?php
        echo "Тип верстки: $layout";
        echo " | Название таблицы умножения: " . ($selectedNumber === 'all' ? 'полная' : 'одна колонка');
        echo " | Дата и время: " . date("Y-m-d H:i:s");
        ?>
    </footer>

</body>
</html>