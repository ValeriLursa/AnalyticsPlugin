<?php
/*Веб-интерфейс просмотра всех доступных экземпляров данного элемента курса
*/
require('../../config.php');
//require (__DIR__.'/../../../config.php'); Выдает ошибку JS
echo 'Веб-интерфейс просмотра всех доступных экземпляров данного элемента';
/*$viewDb = $DB -> get_recordset ( 'mdl_user' ,  array  $conditions = null ,  $sort = '' ,  $fields = '*' ,  $limitfrom = 0 ,  $limitnum = 0 );
if ($viewDb->valid()){
foreach ($viewDb as $record){
        echo $record;
}
} else echo 'Ошибка';
$viewDb->close();
*/