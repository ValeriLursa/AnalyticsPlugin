<?php
    require "classes\\controller_dates.php";
    
    // проверка подключения файла
    function test_dates()
    {
       print "Тестирование дат:<br>";
    }
    test_dates();
    //вызов тестовых функций
    test_convert_month_day_test1();
    test_convert_month_day_test2();
    test_convert_month_day_test3();
    test_checking_dates_test1();
    test_checking_dates_test2();
    test_checking_dates_test3();
    test_checking_dates_test4();

    /* проверка оценки - Test 10
    входные данные:
    - номер месяца - 12
    предполагаемый резльтат:
    - функция вернет - 31
    */
    function test_convert_month_day_test1()
    {
        print "Тест 10: ";
        $function_under_test = convert_month_day(12);
        if ($function_under_test == 31) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 11
    входные данные:
    - номер месяца - 11
    предполагаемый резльтат:
    - функция вернет - 30
    */
    function test_convert_month_day_test2()
    {
        print "Тест 11: ";
        $function_under_test = convert_month_day(11);
        if ($function_under_test == 30) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 12
    входные данные:
    - номер месяца - 3
    предполагаемый резльтат:
    - функция вернет - 31
    */
    function test_convert_month_day_test3()
    {
        print "Тест 12: ";
        $function_under_test = convert_month_day(3);
        if ($function_under_test == 31) print "true</br>"; else print "false</br>";
    }

    /* расчет разницы между датами - Test 13
    входные данные:
    - дата окончания - "day"=>14, "month"=>11, "year"=>2021
    - фактическая дата - "day"=>8, "month"=>11, "year"=>2021
    предполагаемый резльтат:
    - функция вернет - -6
    */
    function test_checking_dates_test1()
    {
        print "Тест 13: ";
        $function_under_test = checking_dates(["day"=>14, "month"=>11, "year"=>2021], ["day"=>8, "month"=>11, "year"=>2021]);
        if ($function_under_test == -6) print "true</br>"; else print $function_under_test."</br>";
    }
    
     /* расчет разницы между датами - Test 14
    входные данные:
    - дата окончания - "day"=>14, "month"=>11, "year"=>2021
    - фактическая дата - "day"=>8, "month"=>12, "year"=>2021
    предполагаемый резльтат:
    - функция вернет - 24
    */
    function test_checking_dates_test2()
    {
        print "Тест 14: ";
        $function_under_test = checking_dates(["day"=>14, "month"=>11, "year"=>2021], ["day"=>8, "month"=>12, "year"=>2021]);
        if ($function_under_test == 24) print "true</br>"; else print "false</br>";
    }
     /* расчет разницы между датами - Test 15
    входные данные:
    - дата окончания - "day"=>20, "month"=>10, "year"=>2021
    - фактическая дата - "day"=>31, "month"=>12, "year"=>2021
    предполагаемый резльтат:
    - функция вернет - 72
    */
    function test_checking_dates_test3()
    {
        print "Тест 15: ";
        $function_under_test = checking_dates(["day"=>20, "month"=>10, "year"=>2021], ["day"=>31, "month"=>12, "year"=>2021]);
        if ($function_under_test == 72) print "true</br>"; else print $function_under_test."</br>";
    }

    /* расчет разницы между датами - Test 16
    входные данные:
    - дата окончания - "day"=>20, "month"=>8, "year"=>2021
    - фактическая дата - "day"=>31, "month"=>12, "year"=>2021
    предполагаемый резльтат:
    - функция вернет - 133
    */
    function test_checking_dates_test4()
    {
        print "Тест 16: ";
        $function_under_test = checking_dates(["day"=>20, "month"=>8, "year"=>2021], ["day"=>31, "month"=>12, "year"=>2021]);
        if ($function_under_test == 133) print "true</br>"; else print $function_under_test."</br>";
    }
?>