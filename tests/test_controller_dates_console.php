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
    test_algorithm_reserve_test1();
    test_algorithm_reserve_test2();
    test_algorithm_reserve_test3();
    test_algorithm_reserve_test4();
    test_coef_reserve_test1();
    test_coef_reserve_test2();
    test_coef_reserve_test3();
    test_coef_reserve_test4();

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

    /* расчет процента резерва - Test 17
    входные данные:
    - дата окончания - "day"=>14, "month"=>11, "year"=>2021
    - фактическая дата - "day"=>8, "month"=>11, "year"=>2021
    - резервное количество дней - 10
    предполагаемый резльтат:
    - функция вернет - 100
    */
    function test_algorithm_reserve_test1()
    {
        print "Тест 17: ";
        $function_under_test = algorithm_reserve(["day"=>14, "month"=>11, "year"=>2021], ["day"=>8, "month"=>11, "year"=>2021], 10);
        if ($function_under_test == 100) print "true</br>"; else print $function_under_test."</br>";
    }

    /* расчет процента резерва - Test 18
    входные данные:
    - дата окончания - "day"=>14, "month"=>11, "year"=>2021
    - фактическая дата - "day"=>19, "month"=>11, "year"=>2021
    - резервное количество дней - 10
    предполагаемый резльтат:
    - функция вернет - 50
    */
    function test_algorithm_reserve_test2()
    {
        print "Тест 18: ";
        $function_under_test = algorithm_reserve(["day"=>14, "month"=>11, "year"=>2021], ["day"=>19, "month"=>11, "year"=>2021], 10);
        if ($function_under_test == 55) print "true</br>"; else print $function_under_test."</br>";
    }

    /* расчет процента резерва - Test 19
    входные данные:
    - дата окончания - "day"=>14, "month"=>10, "year"=>2021
    - фактическая дата - "day"=>21, "month"=>10, "year"=>2021
    - резервное количество дней - 10
    предполагаемый резльтат:
    - функция вернет - 37
    */
    function test_algorithm_reserve_test3()
    {
        print "Тест 19: ";
        $function_under_test = algorithm_reserve(["day"=>14, "month"=>10, "year"=>2021], ["day"=>21, "month"=>10, "year"=>2021], 10);
        if ($function_under_test == 36) print "true</br>"; else print $function_under_test."</br>";
    }

    /* расчет процента резерва - Test 20
    входные данные:
    - дата окончания - "day"=>20, "month"=>8, "year"=>2021
    - фактическая дата - "day"=>31, "month"=>12, "year"=>2021
    - резервное количество дней - 10
    предполагаемый резльтат:
    - функция вернет - 0
    */
    function test_algorithm_reserve_test4()
    {
        print "Тест 20: ";
        $function_under_test = algorithm_reserve(["day"=>20, "month"=>8, "year"=>2021], ["day"=>31, "month"=>12, "year"=>2021], 10);
        if ($function_under_test == 0) print "true</br>"; else print $function_under_test."</br>";
    }
    
    /* расчет коэффициента резерва - Test 21
    входные данные:
    - процент резерва - 100
    предполагаемый резльтат:
    - функция вернет - 4
    */
    function test_coef_reserve_test1()
    {
        print "Тест 21: ";
        $function_under_test = coef_reserve(100);
        if ($function_under_test == 4) print "true</br>"; else print $function_under_test."</br>";
    }

    /* расчет коэффициента резерва - Test 22
    входные данные:
    - процент резерва - 57
    предполагаемый резльтат:
    - функция вернет - 3
    */
    function test_coef_reserve_test2()
    {
        print "Тест 22: ";
        $function_under_test = coef_reserve(57);
        if ($function_under_test == 3) print "true</br>"; else print $function_under_test."</br>";
    }

    /* расчет коэффициента резерва - Test 23
    входные данные:
    - процент резерва - 30
    предполагаемый резльтат:
    - функция вернет - 2
    */
    function test_coef_reserve_test3()
    {
        print "Тест 23: ";
        $function_under_test = coef_reserve(30);
        if ($function_under_test == 2) print "true</br>"; else print $function_under_test."</br>";
    }

    /* расчет коэффициента резерва - Test 24
    входные данные:
    - процент резерва - 0
    предполагаемый резльтат:
    - функция вернет - 1
    */
    function test_coef_reserve_test4()
    {
        print "Тест 24: ";
        $function_under_test = coef_reserve(0);
        if ($function_under_test == 1) print "true</br>"; else print $function_under_test."</br>";
    }
?>