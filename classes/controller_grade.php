<?php
//расчет процента оценки
//возвращает процент
function percent_grade($grad, $max_grad){
    $result = round($grad*100/$max_grad, 0, PHP_ROUND_HALF_UP);
    return $result;
}

//расчет коэффициента оценки
//возвращает число коэффициента
function coef_grade(int $percent_grade, int $percent_threshold){
    $result = 0;
    $c = 0;
    if ($percent_grade == 100) 
    {
        $result = 4;
        $c = 1;
    }
    if (($percent_grade < 100) and ($percent_grade >= $percent_threshold))
    {
        $result = 3;
        $c = 1;
    }
    if ($c == 0)
    if ($percent_grade == 0) $result = 1; else $result = 2;
    return $result;
}

//Расчет коэффициента оценок за все тесты курса
function coef_grade_course($PROGRESS, $TEST_COURSE, $id_course){
    $mas_Progress = $PROGRESS;
    $mas_Test = $TEST_COURSE;
    //сумма всех коэффициентов оценок
    $coef_grade = 0;
    //количество тестов в курсе
    $count = 0;

    for ($i = 0; $i<count($mas_Progress); $i++)
    {
        //проверка на курс
        if ($mas_Progress[$i]->id_course == $id_course){
            $coef = 0;
            //расчет процента оценки теста, округляется до целого значения в большую сторону
            $coef = round(percent_grade($mas_Progress[$i]->grade, $mas_Test[$mas_Progress[$i]->id_test]->max_grad), 0, PHP_ROUND_HALF_UP);
            //расчет коэффициента оценки
            $coef = coef_grade($coef, $mas_Test[$mas_Progress[$i]->id_test]->percent_threshold);
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