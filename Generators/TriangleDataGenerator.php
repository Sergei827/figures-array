<?php

namespace Generators;

use Generators\DataGeneratorBase;


/**
 * класс генератор випадкових данних
 * для трикутника
 */
class TriangleDataGenerator extends DataGeneratorBase
{
   protected $angle_1;
   protected $angle_2;
   protected $angle_3;

   /**
    * метод генератор кутів
    * 
    */
   public function generateAngles()
   {
       $this->angle_1 = mt_rand(10, 150);
       $this->angle_2 = mt_rand(10, (180 - $this->angle_1));
       $this->angle_3 = 180 - ($this->angle_1 + $this->angle_2);

       return [$this->angle_1, $this->angle_2, $this->angle_3];
   }

   /**
    * метод генератор сторін
    * 
    */
   public function generateSidesLength()
   {
       $b = mt_rand(3, 300);
       $c = mt_rand(3, 300);

       if(!empty($this->angle_1) && ($this->angle_1 <= 90))
       {
           $angle = $this->angle_1;
       }
       elseif(!empty($this->angle_2) && ($this->angle_2 <= 90))
       {
           $angle = $this->angle_2;
       }
       else{
           return false;
       }

       $angleRad = ($angle * M_PI) / 180;
       $a = (pow($b, 2) + pow($c, 2)) - (2 * $b * $c * cos($angleRad));
       $a = sqrt($a);
       return [$a, $b, $c];
   }
}
