<?php

echo "Hello, World!";
echo '<br>';
echo 'Hello!';
echo '<br>';
echo 55;
echo '<br>';
echo '<button>Click!</button>';
echo '<br>';
echo date('d.m.Y H:i:s');

echo '<br>';
echo 2 + 1;
echo '<br>';
echo 5 - 1;
echo '<br>';
echo 2 * 3;
echo '<br>';
echo 10 / 5;
echo '<br>';
echo (5 + 2) * 2;
echo '<br>';
echo 2 ** 10;
echo '<br>';
echo 11 % 3;

require 'src/funcs.php';

echo '<br>';
test();

//require_once 'funcs.php';

//echo '<br>';
//test();

//include 'funcs.php';

//echo '<br>';
//test();

include_once 'src/funcs.php';

echo '<br>';
test();

echo '<br>';
echo "<select>";
for ($i = 0; $i < 5; $i++) {
    include "src/option.php";
}
echo "</select><hr>";

function plusOne ($a) {// функция может быть в любом месте файла
    $a = $a + 1;
    return $a;
}

$a = 10;
echo "$a<br>";
$a = plusOne($a);
echo "$a<br>";
wrongPlusOne();
echo "$a<br>";

function wrongPlusOne () {
    global $a;
    $a = $a + 1;
}

$GLOBALS['a'] = 999;// не стоит так делать