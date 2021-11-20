<?php
//расчет процента оценки
//возвращает процент
function algorithm_grade($grad, $max_grad){
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
?>