<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<h3>Форма ввода данных</h3>
<form action="controller.php" method="POST">
    <p>Дата начала курса: <input type="number" name="course[]" /></p>
    <p></p>
    <p>Дата начала теста 1: <input type="number" name="test_course_start[]" /></p>
    <p>Дата фактического прохождения теста 1: <input type="number" name="test_course_fact[]" /></p>
    <p>Результат теста 1: <input type="number" name="grad_test[]" /></p>
    <p>Дата конца теста 1: <input type="number" name="test_course_end[]" /></p>
    <p></p>
    <p>Дата начала теста 2: <input type="number" name="test_course_start[]" /></p>
    <p>Дата фактического прохождения теста 2: <input type="number" name="test_course_fact[]" /></p>
    <p>Результат теста 2: <input type="number" name="grad_test[]" /></p>
    <p>Дата конца теста 2: <input type="number" name="test_course_end[]" /></p>
    <p></p>
    <p>Дата начала теста 3: <input type="number" name="test_course_start[]" /></p>
    <p>Дата фактического прохождения теста 3: <input type="number" name="test_course_fact[]" /></p>
    <p>Результат теста 3: <input type="number" name="grad_test[]" /></p>
    <p>Дата конца теста 3: <input type="number" name="test_course_end[]" /></p>
    <p>Дата конца курса: <input type="number" name="course[]" /></p>
    <input type="submit" value="Результат по одному курсу">
</form>
</body>
</html>