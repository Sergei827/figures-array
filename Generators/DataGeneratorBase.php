<?php

namespace Generators;

use \Interfaces\Generators\DataGenerator;


/**
 * базовий класс генераторів випадкових данних
 * для обєктів-фігур
 */
class DataGeneratorBase implements DataGenerator
{ 
    protected $colors = [
        'червоний', 'синій', 'зелений', 'помаранчевий',
        'білий', 'чорний', 'фіолетовий', 'рожевий',
        'салатовий', 'сірий', 'коричневий', 'жовтий',
        'хакі'
    ];

    /**
    * метод генерації кольору фігури
    */
    public function getColor()
    {
        $index = mt_rand(0, (count($this->colors) - 1));

        return $this->colors[$index];
    }

    /**
    * метод генерації випадкового числа
    */
    public function generateNumber()
    {
        $num = mt_rand(1, 10);
        $num_2 = mt_rand(1, 999);

        return $num_2 / $num;
    }
}
