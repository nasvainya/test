<?php
//1
echo "Задание 1. <br>";
try {
    $file = @fopen("pupu.txt", "r");
    if ($file === false) {
        throw new Exception("Не удалось открыть файл 'pupu.txt'. Такого файла не существует" . "<br>");
    }
} catch (Exception $ex) {
    echo "Исключение: " . $ex->getMessage() . "<br>";
}
 
//2
echo "Задание 2. <br>";
$num1 = 19;
$num2 = 0;
try {
    $del = $num1 / $num2;
    echo $del . "<br>";
} catch (Error $e) {
    echo "Ошибка: " . $e->getMessage();
}
//3
echo "Задание 3. <br>";
 $countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
try {
    echo $countries['Germany'] . "<br>";
} catch (Error $e) {
    echo "Ошибка: " . $e->getMessage();
}

//2.1
echo "Задание 2.1. <br>";
echo mktime(10, 25, 00, 3, 15, 2025) . "<br>";

//2.2
echo "Задание 2.2. <br>";
echo time() - mktime(8, 5, 59, 10, 2, 1990) . "<br>";

//2.3
echo "Задание 2.3. <br>";
echo date('Y.m.d H:i:s') . "<br>";

//2.4
echo "Задание 2.4. <br>";
echo date('Y.m.d', mktime(0, 0, 0, 9, 1, 2026)) . "<br>";

//2.5
echo "Задание 2.5. <br>";
$weekDays = [
    0 => 'воскресенье',
    1 => 'понедельник',
    2 => 'вторник',
    3 => 'среда',
    4 => 'четверг',
    5 => 'пятница',
    6 => 'суббота'
];
$dayNum = date('w', mktime(0, 0, 0, 2, 2, 2000));
echo "2 февраля 2000 года было: " . $weekDays[$dayNum] . "<br>";

//2.6
echo "Задание 2.6. <br>";
$week = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];

echo "Сегодня: " . $week[date('w')] . "<br>";

$date = mktime(0, 0, 0, 6, 12, 2016);
echo "   12.06.2016 было: " . $week[date('w', $date)] . "<br>";

$birthday = mktime(0, 0, 0, 6, 12, 2016);
echo "   09.11.2007 было: " . $week[date('w', $birthday)] . "<br>";

//2.7
echo "Задание 2.7. <br>";
echo '<form method="post">
        Дата 1 (2025-12-31): <input type="text" name="date1"><br>
        Дата 2 (2025-12-31): <input type="text" name="date2"><br>
        <input type="submit" value="Сравнить">
      </form>';

if (isset($_POST['date1']) && isset($_POST['date2'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $ts1 = strtotime($date1);
    $ts2 = strtotime($date2);
    
    if ($ts1 > $ts2) {
        echo "Больше дата: " . $date1 . "<br>";
    } elseif ($ts2 > $ts1) {
        echo "Больше дата: " . $date2 . "<br>";
    } else {
        echo "Даты равны<br>";
    }
}

//2.8
echo "Задание 2.8. <br>";
$inputDate = '2025-03-15';
$converted = date('d-m-Y', strtotime($inputDate));
echo "$inputDate -> $converted <br>";

//2.9
echo "Задание 2.9. <br>";
$dateStr = '2000.02.03';

$dateFormatted = str_replace('.', '-', $dateStr);
$dateObj = date_create($dateFormatted);

echo "Исходная дата: $dateStr <br>";
date_modify($dateObj, '+2 days +1 month +3 days +1 year -3 days');
echo "   После +2д +1м +3д +1г -3д: " . date_format($dateObj, 'd.m.Y') . "<br>";

//2.10
echo "Задание 2.10. <br>";
$nowDate = date_create(date('Y-m-d'));
$nextYear = date('Y') + 1;
$newYear = date_create("$nextYear-01-01");
$interval = date_diff($nowDate, $newYear);
echo "До Нового Года осталось: " . $interval->days . " дней<br>";
?>
