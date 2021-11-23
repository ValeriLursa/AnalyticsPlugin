<?php
    require "classes\\controller.php";
    require "classes\\global_variables.php";
    
    if(switch_date())
    echo "Проверка передачи данных на сервер: true</br>"; 
    else echo "Проверка передачи данных на сервер: false</br>";

    echo "Результат анализа по оценкам: ".alg_grade(0)."</br>";
    echo "Результат анализа по датам сдачи: ".alg_dates(0)."</br>";
    //echo "Результат общего анализа: ".algorithm(0)."</br>";
?>