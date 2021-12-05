<?php

$name = "Arsen";
$age = 32; 
// Комментарий
$Age = 46;

/**
 *  многострочный
 *  комментарий
 */

echo $name;
echo "<br>";
echo $age;
echo "<br>";
echo $Age;

$name2 = 'Ivan';

echo "<br>";
echo $name2;


$lastName = 'Gayazov';
$last_name = 'Gayazov';

$fullName = $name . ' ' . $last_name;
echo '<br>';
echo $fullName;

$word = 'lower_case';
$word = strtoupper($word);
echo "<br>";
echo $word;

$upperCase = 'UPPER_CASE';
$upperCase = strtolower($upperCase);
echo "<br>";
echo $upperCase;

echo "<br>";
$password = '  qwerty ';
echo '!' . $password . '!';
echo "<br>";
echo trim($password) . '!';

$number = 5 * 5;
echo "<br>";
echo $number * 2;


