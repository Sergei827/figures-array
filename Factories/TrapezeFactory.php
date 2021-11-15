<?php

namespace Factories;

use \Factories\FactoryBase;
use \Classes\Figures\Trapeze;
use \Interfaces\Factories\Factory;

/**
 * класс фабрики обєктів-трапецій
 */
class TrapezeFactory extends FactoryBase implements Factory
{
    protected $longBase;
    protected $shortBase;
    protected $leftSide;
    protected $height;
    protected $rightSide;
    protected $angle_1;
    protected $angle_2;
    protected $angle_3;
    protected $angle_4;

    /**
     * метод приймає генератор випадкових данних
     * і генеріє дані для створення трапеції
     */
    public function setDataGenerator($generator)
    {
        $this->longBase = $generator->generateLongBase();
        $this->shortBase = $generator->generateShortBase();
        $this->leftSide = $generator->generateLeftSide();
        $this->height = $generator->generateHeight();
        $this->rightSide = $generator->generateRightSide();
        $this->color = $generator->getColor();

        $angles = $generator->generateAngles();

        $this->angle_1 = $angles[0];
        $this->angle_2 = $angles[1];
        $this->angle_3 = $angles[2];
        $this->angle_4 = $angles[3];
    }

    /**
     * генерує обєкт-трапецію
     */
    public function getObject()
    {
        $trapeze = new Trapeze($this->color);
        $trapeze->setAngles($this->angle_1, $this->angle_2, $this->angle_3, $this->angle_4);
        $trapeze->setShortBase($this->shortBase);
        $trapeze->setLongBase($this->longBase);
        $trapeze->setLeftSide($this->leftSide);
        $trapeze->setRightSide($this->rightSide);
        $trapeze->setHeight($this->height);
        
        return $trapeze;
    }
}
