<?php
    require "classes\\controller.php";
    
    // проверка подключения файла
    function test_dates()
    {
       print "Тестирование принятия данных с формы:<br>";
    }
    test_dates();

    //test_convert_string_mas_test1();
    //test_convert_string_mas_test2();

    /* проверка оценки - Test 25
    входные данные:
    - дата в формате "d.m.y" - "14.11.2021"
    предполагаемый резльтат:
    - функция вернет - ["day" => 14, "month" => 11, "year" => 2021]
    */
    function test_convert_string_mas_test1(){
        print "Тест 25: ";
        $function_under_test = convert_string_mas("14.11.2021");
        if ($function_under_test === ["day" => 14, "month" => 11, "year" => 2021]) print "true</br>"; else print $function_under_test."</br>";
    }

    /* проверка оценки - Test 26
    входные данные:
    - дата в формате "d.m.y" - "4.1.2021"
    предполагаемый резльтат:
    - функция вернет - ["day" => 4, "month" => 1, "year" => 2021]
    */
    function test_convert_string_mas_test2(){
        print "Тест 26: ";
        $function_under_test = convert_string_mas("4.1.2021");
        if ($function_under_test === ["day" => 4, "month" => 1, "year" => 2021]) print "true</br>"; else print $function_under_test."</br>";
    }
?>