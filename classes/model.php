<?php
//Модели уонструкции MVC

/*Модель пользователя, частный случай - студент (Student)
Поля:
id - идентификатор пользователя
name - имя пользователя

Конструктор
- идентификатор типа int 
- имя типа string
*/
class User
{
    public $id = 1;
    public $name = 'name';

    function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

class Student extends User
{

}

/*Модель элемента, частные случаи Курс (Course) и Тест (Test_course)
Поля: 
id - идентификатор элемента
name - название элемента
date_start - дата начала элемента, массив формата ["day" => int,"month" => int,"year" => int]
date_end - дата окончания элемента, массив формата ["day" => int,"month" => int,"year" => int]
date_rezerv - дата резервного окончания элемента, количество дней

- идентификатор типа int
- имя типа string

- дата типа array

- дата типа array

- дата типа int
*/

class Element
{
    public $id = 1;
    public $name = 'name';
    public $date_start = ["day" => 1,"month" => 1,"year" => 2021];
    public $date_end = ["day" => 1,"month" => 1,"year" => 2021];
    public $date_reserve = 10;

    function __construct(int $id, string $name){
        $this->id = $id;
        $this->name = $name;
    }

    function set_date_start(array $mas){
        foreach ($mas as $type => $value)
        $this->sate_start[$type] = $value;
    }

    function set_date_end(array $mas){
        foreach ($mas as $type => $value)
        $this->date_end[$type] = $value;
    }

    function set_date_reserve(int $date){
        $this->date_reserve = $date;
    }
}

/*Модель курса
наследование от Element
*/
class Course extends Element
{
    
}

/*Модель теста
наследование от Element
*/
class Test_course extends Element
{
    //процент порогового значения, в процентах, по дефолту 50№
    public $percent_threshold = 50;
    //максимальное значение оценки за тест, по дефолту 10
    public $max_grad = 10;
}

/*Модель успеваемости
id_stud - индентификатор пользователя
id_course - идентификатор курса
id_test - идентификатор теста
grade - общая оценка теста

- идентификатор пользователя типа int
- идентификатор курса типа int
- идентификатор теста типа int

- оценка типа int
*/
class Progress
{
    public $id_stud = 1;
    public $id_course = 1;
    public $id_test = 1;
    public $grade = 0;
    public $date_fact = ["day" => 1,"month" => 1,"year" => 2021];

    function __construct(int $id_stud, int $id_course, int $id_test){
        $this->id_stud = $id_stud;
        $this->id_course = $id_course;
        $this->id_test = $id_test;
    }

    function update_progress(int $grade){
        $this->grade = $grade;
    }

    function update_date_fact(array $mas){
        foreach ($mas as $type => $value)
        $this->date_fact[$type] = $value;
    }
}
?>