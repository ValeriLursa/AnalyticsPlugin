<?php
//Модели уонструкции MVC
namespace analytics;

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
    private $id = 1;
    private $name = 'name';

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
    private $id = 1;
    private $name = 'name';
    private $date_start = ["day" => 1,"month" => 1,"year" => 2021];
    private $date_end = ["day" => 1,"month" => 1,"year" => 2021];
    private $date_rezerv = 1;

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
        $this->sate_end[$type] = $value;
    }

    function set_date_rezerv(int $date){
        $this->date_rezerv = $date;
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
}

/*Модель успеваемости
id_stud - индентификатор пользователя
id_course - идентификатор курса
id_test - идентификатор теста
grade - общая оценка теста

- идентификатор пользователя типа int
- идентификатор курса типа int
- идентификатор теста типа int

- оценка типа float
*/
class Progress
{
    private $id_stud = 1;
    private $id_course = 1;
    private $id_test = 1;
    private $grade = 0.00;

    function __construct(int $id_stud, int $id_course, int $id_test){
        $this->id_stud = $id_stud;
        $this->id_course = $id_course;
        $this->id_test = $id_test;
    }

    function update_progress(int $grade){
        $this->grade = $grade;
    }
}
?>