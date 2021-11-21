<?php
//Контроллер конструкции MVC
namespace analytics;
include "model.php";
include "global_variables.php";
include "controller_dates.php";
include "controller_grade.php";

//Выбор входящих данных
function switch_date(){
    global $SELECT;
    switch ($SELECT){
        case 1: date_BD(); break; //не реализована
        case 2: date_prog(); break;
    }
}

//Ввод данных из программы
function date_prog(){
    global $STUDENT[0] = new Student(0, 'Студент1');
    global $COURSE[0] = new Course(0, 'Курс1');
    global $TEST_COURSE[0] = new Test_course(0, 'Тест1');
    global $TEST_COURSE[1] = new Test_course(1, 'Тест2');
    global $TEST_COURSE[2] = new Test_course(2, 'Тест3');
    global $PROGRESS[0] = new Progress(0, 0, 0);
    global $PROGRESS[1] = new Progress(0, 0, 1);
    global $PROGRESS[2] = new Progress(0, 0, 2);
}

//Ввод данных с формы
if (data_checking()) {
    //добавление даты начала курса по номеру курса
    //global $COURSE[0]->set_date_start(convert_string_mas($_POST["course"][0]));
    //добавление даты конца курса по номеру курса
    //global $COURSE[0]->set_date_end(convert_string_mas($_POST["course"][1]));

    for ($i = 0; $i < 3; $i++){
    //добавление даты начала теста по номеру теста
    global $TEST_COURSE[$i]->set_date_end(convert_string_mas($_POST["test_course_start"][$i]));
    //добавление даты конца теста по номеру теста
    global $TEST_COURSE[$i]->set_date_end(convert_string_mas($_POST["test_course_end"][$i]));
    //доавление оценки
    global $PROGRESS[$i]->update_progress($_POST["grad_test"][$i]);
    //добавление фактической даты прохождения теста
    global $PROGRESS[$i]->update_date_fact($_POST["test_course_fact"][$i]);
    }

}

//проверка входных данных формы
function data checking(){
    return true;
}

//конвертирование строки в массив, для дат
function convert_string_mas($string){
    $mas = ["day" => 1, "month" => 1, "year" => 1];
    $point = ".";
    $string[] = $point;
    $start = 0;
    foreach ($mas as $type => $value){
        $position = mb_strpos($string, $point);
        $value = mb_substr($string, $start, $position);
        $string = mb_substr($string, $position + 1);
    }
}

//Алгоритм успеваемости
function algorithm($id_course){
    //расчет коэфициентов успеваемости
    $coef_grade = 0;
    $coef_reserve = 0;
    $coef_progress = 0;
    
    coef_grade_course($PROGRESS, $TEST_COURSE, $id_course);
    //расчет процента даты сдачи
    //расчет коэффициента даты сдачи
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
?>