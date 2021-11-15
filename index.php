<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// автозавантаження классів
spl_autoload_register(function($class){
    $path = $class;
    $path = str_replace('\\', '/', $path);

    include_once $path.'.php';
});


// створєм обєкт генератор массиву фігур
$figureList = new \Classes\RandomFigureList();

// генеруємо випадковий массив
$figureList->creatFigureList();

// роздруковуємо випадковий массив фігур
$figureList->printFigureList();
