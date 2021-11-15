<?php

namespace Factories;

use \Factories\FactoryBase;
use \Classes\Figures\Square;
use \Interfaces\Factories\Factory;

/**
 * класс фабрики обєкта-квадрата
 */
class SquareFactory extends FactoryBase implements Factory
{
    protected $color;
    protected $side;

    /**
     * метод приймає генератор випадкових данних
     * і генеріє дані для створення квадрата
     */
    public function setDataGenerator($generator)
    {
        $this->color = $generator->getColor();
        $this->side = $generator->getSide();
    }

    /**
     * генерує обєкт-квадрат
     */
    public function getObject()
    {
        $square = new Square($this->color, $this->side);
        return $square;
    }
}
