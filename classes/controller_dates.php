<?php
//расчет коэффициента резерва
//возвращает число
function coef_reserve(int $percent_reserve){
    $result = 0;
    $c = 0;
    if ($percent_reserve == 100) 
    {
        $result = 4;
        $c++;
    }
    if (($percent_reserve < 100) and ($percent_reserve >= 50))
    {
        $result = 3;
        $c++;
    }
    if ($c == 0)
    if ($percent_reserve == 0 ) $result = 1; else $result = 2;
    return $result;
}

//расчет процента резерва
//принимает дату окончания теста, фактическую дату сдачи теста, кол-во резервных дней
//возвращает процент
function algorithm_reserve($date_end, $date_fact, $reserve){
    $result = 0;
    $dif = checking_dates($date_end, $date_fact);
    if ($dif < 0) $result = 100; else 
    if ($dif < $reserve){
        $result = 100 - round(100/($reserve + 1)*$dif);
    }
    return $result;
}

//проверка дат
//подсчет сколько дней прошло между окончанием даты сдачи и между фактической датой сдачи
//Принимает дату окончания теста, фактическую дату сдачи теста
//возвращает разницу 
function checking_dates(array $date_end, array $date_fact){
    $result = 0;
    if ($date_fact["month"]!= $date_end["month"]){
        $result = convert_month_day($date_end["month"]) - $date_end["day"];
        for ($i = $date_fact["month"] - 1; $i > $date_end["month"]; $i--){
            $result += convert_month_day($i);
        } 
        $result += $date_fact["day"];
    }
    else $result = $date_fact["day"] - $date_end["day"];
    return $result;
}

//конвертирование месяца в дни
//принимает число месяца
//возвращает количество дней в месяце
function convert_month_day($month){
    switch($month){
        case 1: case 3: case 5: case 7: case 8: case 10: case 12: return 31; break;
        case 4: case 6: case 9: case 11: return 30;
        case 2: return 28;
        default: return 0;
    }
}

//Расчет коэффициента дат всех тестов за курс
function coef_date_course($PROGRESS, $TEST_COURSE, $id_course)
{
    $mas_Progress = $PROGRESS;
    $mas_Test = $TEST_COURSE;
    //сумма всех коэффициентов оценок
    $coef_date = 0;
    //количество тестов в курсе
    $count = 0;

    for ($i = 0;$i< count($mas_Progress); $i++)
    {
        //проверка на курс
        if ($mas_Progress[$i]->id_course == $id_course){
            $coef = 0;
            //расчет процента дней теста, округляется до целого значения в большую сторону
            $coef = round(algorithm_reserve($mas_Test[$mas_Progress[$i]->id_test]->date_end, $mas_Progress[$i]->date_fact, $mas_Test[$mas_Progress[$i]->id_test]->date_reserve), 0, PHP_ROUND_HALF_UP);
            //расчет коэффициента оценки
            $coef = coef_reserve($coef);
            $coef_date += $coef;
            $count++;
        }
    }
    //расчет среднего арифметического
    $coef_date /= $count;
    //результат выводится округленным в большую сторону
    return round($coef_date, 0, PHP_ROUND_HALF_UP);
}
?>