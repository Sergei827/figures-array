<?php

namespace Generators;

use Generators\DataGeneratorBase;


/**
 * класс генератор випадкових данних
 * для трапеції
 */
class TrapezeDataGenerator extends DataGeneratorBase
{
   protected $angle_1;
   protected $angle_2;
   protected $angle_3;
   protected $angle_4;

   protected $longBase;
   protected $shortBase;
   protected $leftSide;
   protected $rightSide;
   protected $height = 1;

   protected $smallerLeg_1;
   protected $smallerLeg_2;


   /**
    * метод генератор довшої основи
    * 
    */
   public function generateLongBase()
   {
       $this->longBase = mt_rand(30, 300);
       return $this->longBase;
   }

   /**
    * метод генератор коротшої основи
    * 
    */
   public function generateShortBase()
   {
       $this->shortBase = mt_rand(3, 200);
       
       while($this->shortBase >= ($this->longBase / 7 * 4))
       {
           $this->shortBase = mt_rand(3, 200);
       }

       return $this->shortBase;
   }

   /**
    * метод генератор лівої сторони
    * 
    */
   public function generateLeftSide()
   {
       $this->leftSide = mt_rand(3, 150);
       return $this->leftSide;
   }

   /**
    * метод генератор висоти
    * 
    */
   public function generateHeight()
   {
        $this->height =  mt_rand(3, 150);

        while($this->height >= $this->leftSide)
        {
            $this->height =  mt_rand(3, 100);
        } 

        return $this->height;
      
   }

   /**
    * метод генератор правої сторони
    * 
    */
   public function generateRightSide()
   {
       $smallerLeg_1 = pow($this->leftSide, 2) - pow($this->height, 2);
       $this->smallerLeg_1 = sqrt($smallerLeg_1);

       if($this->smallerLeg_1 > 0)
       {
           $this->smallerLeg_2 = $this->longBase - $this->shortBase - $this->smallerLeg_1;
       }
       else{
           $this->smallerLeg_2 = $this->longBase - $this->shortBase;
       }    

       $this->rightSide = pow($this->smallerLeg_2, 2) + pow($this->height, 2);
       $this->rightSide = sqrt($this->rightSide);

       return $this->rightSide;
   }

   /**
    * метод генератор кутів сторони
    * 
    */
   public function generateAngles()
   {

       $a = atan($this->smallerLeg_1 / $this->height);
       $this->angle_1 = $a + 90;
       $this->angle_2 = 180 - 90 -$a;

       $b = atan($this->smallerLeg_2 / $this->height);
       $this->angle_3 = $b + 90;
       $this->angle_4 = 180 - 90 -$b;

       $sum = $this->angle_1 + $this->angle_2 + $this->angle_3 + $this->angle_4;
       return [$this->angle_1, $this->angle_2, $this->angle_3, $this->angle_4];
   }
}
