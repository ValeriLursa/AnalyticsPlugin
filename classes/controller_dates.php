<?php
//расчет коэффициента резерва
//возвращает число
function coef_reserve(int $percent_reserve){
    $result = 0;
    if ($percent_reserve == 100) $result = 4;
    if (($percent_reserve < 100) and ($percent_reserve >= 50)) $result = 3;
    if ($percent_reserve == 0 ) $result = 1; else $result = 2;
    return $result;
}

//расчет процента резерва
//принимает дату окончания теста, фактическую дату сдачи теста, кол-во резервных дней
//возвращает процент
function algorithm_reserve($date_end, $date_fact, $reserve){
    $result = 0;
    $dif = checking_dates($date_end, $date_fact);
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
        for ($i = $date_fact["month"] - 1; $i < $date_end["month"]; $i--){
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
        case 10: case 12: return 31; break;
        case 11: return 20;
    }
}
?>