<?php
//расчет процента оценки
//возвращает процент
function percent_grade($grad, $max_grad){
    $result = round($grad*100/$max_grad);
    return $result;
}

//расчет коэффициента оценки
//возвращает число коэффициента
function coef_grade(int $percent_grade, int $percent_threshold){
    $result = 0;
    if ($percent_grade == 100) $result = 4;
    if (($percent_grade < 100) and ($percent_grade >= $percent_threshold))
    $result = 3;
    if ($percent_grade == 0) $result = 1; else $result = 2;
}

//Расчет процента оценки за все тесты курса
function coef_grade_course($PROGRESS, $TEST_COURSE, $id_course){
    $mas_Progress = $PROGRESS;
    $mas_Test = $TEST_COURSE;
    //сумма всех коэффициентов оценок
    $coef_grade = 0;
    //количество тестов в курсе
    $count = 0;

    foreach ($mas_Progress as $prog){
        //проверка на курс
        if ($prog -> $id_course == $id_course){
            $coef = 0;
            //расчет процента оценки теста, округляется до целого значения в большую сторону
            $coef = round(algorithm_grade($prog -> $grad, $mas_Test[$prog -> $id_test] -> $max_grad), 0, PHP_ROUND_HALF_UP);
            //расчет коэффициента оценки
            $coef = coef_grade($coef, $mas_Test[$prog -> $id_test] -> $percent_threshold);
            $coef_grade += $coef;
            $count++;
        }
    }
    //расчет среднего арифметического
    $coef_grade /= $count;
    //результат выводится округленным в большую сторону
    return round($coef_grade, 0, PHP_ROUND_HALF_UP);
}
?>