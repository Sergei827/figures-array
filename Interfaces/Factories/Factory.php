<?php

namespace Interfaces\Factories;

use \Interfaces\Generators\DataGenerator;

/**
 * базовий інтерфейс 
 */
interface Factory
{
    public function setDataGenerator(DataGenerator $generator);
    public function getObject();
}
