<?php

namespace Generators;

use Generators\DataGeneratorBase;


/**
 * класс генератор випадкових данних
 * для кола
 */
class CircleDataGenerator extends DataGeneratorBase
{
   /**
    * метод генерації радіусу
    */
   public function getRadius()
   {
       return $this->generateNumber();
   }
}
