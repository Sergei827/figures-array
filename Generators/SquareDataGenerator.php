<?php

namespace Generators;

use Generators\DataGeneratorBase;

/**
 * класс генератор випадкових данних
 * для квадрата
 */
class SquareDataGenerator extends DataGeneratorBase
{
   /**
    * метод генерації сторони квадрата
    */
   public function getSide()
   {
       return $this->generateNumber();
   }
}
