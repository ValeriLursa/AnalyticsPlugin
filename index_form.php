<!DOCTYPE html>
<html>
<head>
<title>Анализатор успеваемости</title>
<meta charset="utf-8" />
</head>
<body>
<h3>Форма ввода данных</h3>
<form action="view.php" method="POST">
    <p>Дата начала теста 1: <input type="text" name="test_course_start[]" value="8.11.2021" /></p>
    <p>Дата фактического прохождения теста 1: <input type="text" name="test_course_fact[]" value="11.11.2021" /></p>
    <p>Результат теста 1: <input type="number" name="grad_test[]" value=10 /></p>
    <p>Дата конца теста 1: <input type="text" name="test_course_end[]"  value = "14.11.2021"/></p>
    <p></p>
    <p>Дата начала теста 2: <input type="text" name="test_course_start[]" value="15.11.2021" /></p>
    <p>Дата фактического прохождения теста 2: <input type="text" name="test_course_fact[]"  value="17.11.2021"/></p>
    <p>Результат теста 2: <input type="number" name="grad_test[]" value = 7 /></p>
    <p>Дата конца теста 2: <input type="text" name="test_course_end[]" value = "21.11.2021" /></p>
    <p></p>
    <p>Дата начала теста 3: <input type="text" name="test_course_start[]" value = "22.11.2021"/></p>
    <p>Дата фактического прохождения теста 3: <input type="text" name="test_course_fact[]" value="24.11.2021"/></p>
    <p>Результат теста 3: <input type="number" name="grad_test[]" value = 10 /></p>
    <p>Дата конца теста 3: <input type="text" name="test_course_end[]" value ="28.11.2021" /></p>
    <input type="submit" value="Результат по одному курсу">
</form>
</body>
</html>