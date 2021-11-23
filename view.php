<!DOCTYPE html>
<html>
<head>
<title>Анализатор успеваемости</title>
<meta charset="utf-8" />
</head>
<body>
<h3>Результат анализа:</h3>
<?php
    require "classes\\controller.php";
    require "classes\\global_variables.php";
    
    if(switch_date())
    echo "Проверка передачи данных на сервер: true</br>"; 
    else echo "Проверка передачи данных на сервер: false</br>";
?>
<table border="1">
    <tr>
        <td>
        Результат анализа по оценкам:
        </td>
        <td>
            <?php echo alg_grade(0); ?>
        </td>
    </tr>
    <tr>
        <td>
        Результат анализа по датам сдачи:
        </td>
        <td>
        <?php echo alg_dates(0); ?>
        </td>
    </tr>
    <tr>
        <td>
        Результат общего анализа:
        </td>
        <td>
        <?php echo algorithm(0); ?>
        </td>
    </tr>

</body>
</html>