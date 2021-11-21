<?php
    $c = false; //0 - тест, 1 - форма
    if (!$c)
    {
        //require "tests\\test_controller_grade_console.php";   
        print "<br>";
       // require "tests\\test_controller_dates_console.php";
        print "<br>";
        require "tests\\test_controller_console.php";    
    }
    else require "index_form.php";
?>