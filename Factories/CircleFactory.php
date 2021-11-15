<?php

namespace Factories;

use \Factories\FactoryBase;
use \Interfaces\Factories\Factory;
//use \Classes\Figures\СircleFigure;


/**
 * класс фабрики обєкта-кола
 */
class CircleFactory extends FactoryBase implements Factory
{
    protected $color;
    protected $radius;

    /**
     * метод приймає генератор випадкових данних
     * і генерує дані для створення кола
     */
    public function setDataGenerator($generator)
    {
        $this->color = $generator->getColor();
        $this->radius = $generator->getRadius();
    }

    /**
     * генерує коло
     */
    public function getObject()
    {
        $circle = new \Classes\Figures\Сircle1($this->color, $this->radius);
        return $circle;
    }
}
