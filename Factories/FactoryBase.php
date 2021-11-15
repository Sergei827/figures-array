<?php

namespace Factories;

use \Interfaces\Generators\DataGenerator;

/**
 * класс базової фабрики обєктів-фігур
 */
abstract class FactoryBase 
{ 
    /**
     * метод приймає генератор випадкових данних
     * і генеріє дані для створення фігури
     */
    public function setDataGenerator(DataGenerator $generator){}

    /**
     * генерує обєкт-фігуру
     */
    public function getObject(){}
}

