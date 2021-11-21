<?php
    require "classes\\controller_grade.php";
    
    //вызов тестовых функций
    test_percent_grade_test1();
    test_percent_grade_test2();
    test_percent_grade_test3();
    test_percent_grade_test4();
    test_coef_grade_test1();
    test_coef_grade_test2();
    test_coef_grade_test3();
    test_coef_grade_test4();
    
    function test_true(){
        print "Тест 1: ";
        $p = true;
        ($p) ? print 'true</br>' : print 'false</br>';
    }
    
    /* проверка оценки - Test 2
    входные данные:
    - фактическая оценка - 0
    - максимальная оценка - 10
    предполагаемый резльтат:
    - функция вернет - 0
    */
    function test_percent_grade_test1()
    {
        print "Тест 2: ";
        $function_under_test = percent_grade(0, 10);
        if ($function_under_test == 0) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 3
    входные данные:
    - фактическая оценка - 10
    - максимальная оценка - 10
    предполагаемый резльтат:
    - функция вернет - 100
    */
    function test_percent_grade_test2()
    {
        print "Тест 3: ";
        $function_under_test = percent_grade(10, 10);
        if ($function_under_test == 100) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 4
    входные данные:
    - фактическая оценка - 5
    - максимальная оценка - 10
    предполагаемый резльтат:
    - функция вернет - 50
    */
    function test_percent_grade_test3()
    {
        print "Тест 4: ";
        $function_under_test = percent_grade(5, 10);
        if ($function_under_test == 50) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 5
    входные данные:
    - фактическая оценка - 3
    - максимальная оценка - 10
    предполагаемый резльтат:
    - функция вернет - 30
    */
    function test_percent_grade_test4()
    {
        print "Тест 5: ";
        $function_under_test = percent_grade(3, 10);
        if ($function_under_test == 30) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 6
    входные данные:
    - процент оценки - 100
    - пороговое значение - 50
    предполагаемый резльтат:
    - функция вернет - 4
    */
    function test_coef_grade_test1(){
        print "Тест 6: ";
        $function_under_test = coef_grade(100, 50);
        if ($function_under_test == 4) print "true</br>"; else print $function_under_test."</br>";
    }

    /* проверка оценки - Test 7
    входные данные:
    - процент оценки - 90
    - пороговое значение - 50
    предполагаемый резльтат:
    - функция вернет - 3
    */
    function test_coef_grade_test2(){
        print "Тест 7: ";
        $function_under_test = coef_grade(90, 50);
        if ($function_under_test == 3) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 8
    входные данные:
    - процент оценки - 30
    - пороговое значение - 50
    предполагаемый резльтат:
    - функция вернет - 2
    */
    function test_coef_grade_test3(){
        print "Тест 8: ";
        $function_under_test = coef_grade(30, 50);
        if ($function_under_test == 2) print "true</br>"; else print "false</br>";
    }

    /* проверка оценки - Test 9
    входные данные:
    - процент оценки - 0
    - пороговое значение - 50
    предполагаемый резльтат:
    - функция вернет - 1
    */
    function test_coef_grade_test4(){
        print "Тест 9: ";
        $function_under_test = coef_grade(0, 50);
        if ($function_under_test == 1) print "true</br>"; else print "false</br>";
    }
?>