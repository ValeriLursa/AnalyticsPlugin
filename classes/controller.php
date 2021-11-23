<?php
//Контроллер конструкции MVC

require "model.php";
require "global_variables.php";
require "controller_dates.php";
require "controller_grade.php";

//Выбор входящих данных
function switch_date(){
    global $SELECT;
    $a = 0;
    switch ($SELECT){
        case 1: date_BD(); break; //не реализована
        case 2: date_prog() ? $a = TRUE : $a = FALSE; break;
        //case 2: return date_prog();
    }
    return $a;
}

//Ввод данных из программы
function date_prog(){
    
    global $STUDENT;
    global $COURSE;
    global $TEST_COURSE;
    global $PROGRESS;

    $STUDENT[0] = new Student(0, 'Студент1');
    $COURSE[0] = new Course(0, 'Курс1');
    $TEST_COURSE[0] = new Test_course(0, 'Тест1');
    $TEST_COURSE[1] = new Test_course(1, 'Тест2');
    $TEST_COURSE[2] = new Test_course(2, 'Тест3');
    $PROGRESS[0] = new Progress(0, 0, 0);
    $PROGRESS[1] = new Progress(0, 0, 1);
    $PROGRESS[2] = new Progress(0, 0, 2);

    //добавление даты начала курса по номеру курса
    //global $COURSE[0]->set_date_start(convert_string_mas($_POST["course"][0]));
    //добавление даты конца курса по номеру курса
    //global $COURSE[0]->set_date_end(convert_string_mas($_POST["course"][1]));
    
    for ($i = 0; $i < 3; $i++){
    //добавление даты начала теста по номеру теста
    $TEST_COURSE[$i]->set_date_start(convert_string_mas($_POST["test_course_start"][$i]));
    //добавление даты конца теста по номеру теста
    $TEST_COURSE[$i]->set_date_end(convert_string_mas($_POST["test_course_end"][$i]));
    //доавление оценки
    $PROGRESS[$i]->update_progress($_POST["grad_test"][$i]);
    //добавление фактической даты прохождения теста
    $PROGRESS[$i]->update_date_fact(convert_string_mas($_POST["test_course_fact"][$i]));
    }

    //return true;
    return $PROGRESS[0]->grade;
}


//Ввод данных с формы
/*if (data_checking()) {
    
    }

}*/

//проверка входных данных формы
function data_checking(){
    return true;
}

//конвертирование строки в массив, для дат
function convert_string_mas($string){
    $mas = ["day" => 1, "month" => 1, "year" => 1];
    $point = ".";
    $string = $string.$point;
    $start = 0;
    foreach ($mas as $type => $value){
        $position = mb_strpos($string, $point);
        $mas[$type] = mb_substr($string, $start, $position);
        $string = mb_substr($string, $position + 1);
    }
    return $mas;
}

//Алгоритм общей успеваемости
function algorithm($id_course){
    //расчет коэфициентов успеваемости
    GLOBAL $COEF_PROGRESS;
    global $COEF_GRADE;
    global $COEF_DATE;

    $COEF_PROGRESS = round(($COEF_GRADE + $COEF_DATE)/2, 0, PHP_ROUND_HALF_UP);
    switch($COEF_GRADE){
        case 4: return "Студент всегда сдает вовремя или сдает практически сразу после окончания время сдачи теста и сдает на балл, близкий к максимуму или равеный ему"; break;
        case 3: return "Студент иногда сдает тесты не вовремя и сдает на балл, между максимумом и порогом"; break;
        case 2: return "Студент не всегда сдает тесты вовремя и сдает на балл, близкикий к порогу"; break;
        case 1: return "Студент не сдает тесты вовремя и сдает на баллы, ниже проходного"; break;
    }
}

//Алгоритм оценок
function alg_grade($id_course){
    global $COEF_GRADE;
    global $PROGRESS;
    global $TEST_COURSE;
    $COEF_GRADE = coef_grade_course($PROGRESS, $TEST_COURSE, $id_course);
    switch($COEF_GRADE){
        case 4: return "Студент занимается и проходит тесты на балл выше порога"; break;
        case 3: return "Студент часто сдает тесты на балл, близкий к порогу, или на балл, ниже порога"; break;
        case 2: return "Студент часто не проходит порог теста"; break;
        case 1: return "Студент сдает тесты на балл, ниже порога теста"; break;
    }
}

//Алгоритм дат
function alg_dates($id_course){
    global $COEF_DATE;
    global $PROGRESS;
    global $TEST_COURSE;
    $COEF_DATE = coef_date_course($PROGRESS, $TEST_COURSE, $id_course);
    switch($COEF_DATE){
        case 4: return "Студент всегда сдает вовремя"; break;
        case 3: return "Студент не всегда сдает вовремя"; break;
        case 2: return "Студент часто не сдает вовремя"; break;
        case 1: return "Студент не сдает тесты вовремя"; break;
    }
}

//расчет коэфициентов успеваемости: коэффициент оценки + коэффициент резерва
//максимум 4, минимум 1
function algorithm_grade_reserve($date_end, $date_fact, $reserve, $grad, $max_grad){
    $dfm = $date_fact["month"];
    $dfd = $date_fact["day"];
    $dem = $date_end["month"];
    $ded = $date_end["day"];
    $result = 0;
    if ($dfm < $dem)
    {
        if ($dfd < $ded)
            //если студент успел до конца, коэффициент резерва равен 100%
            $result = algorithm_grade($grad, $max_grad) + 100;
        else 
        //если студент не успел, то коэффициент расчитывается
        $result = algorithm_grade($grad, $max_grad) + algorithm_reserve($date_end, $date_fact, $reserve);
    } else 
    //если фактический месяц больше датой конца, то студент точно не успел
    $result = algorithm_grade($grad, $max_grad) + algorithm_reserve($date_end, $date_fact, $reserve);
    
    return $result;
}

//вывод результата на форму

?>