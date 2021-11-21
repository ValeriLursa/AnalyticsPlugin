<?php
    require "classes\\controller.php";
    require "classes\\global_variables.php";
    echo "Проверка передачи данных на сервер</br>";

    //echo $_POST["test_course_start"][0];
    //echo switch_date();

    echo "Результат анализа по оценкам: ".alg_grade(0)."</br>";
    //echo "Результат анализа по датам сдачи: ".alg_dates(0)."</br>";
    //echo "Результат общего анализа: ".algorithm(0)."</br>";
?>