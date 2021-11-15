<?php

namespace Factories;

use \Factories\FactoryBase;
use \Classes\Figures\Triangle;
use \Interfaces\Factories\Factory;

/**
 * класс базової фабрики обєктів-трикутників
 */
class TriangleFactory extends FactoryBase implements Factory
{
    protected $color;

    protected $angle_1;
    protected $angle_2;
    protected $angle_3;

    protected $side_1;
    protected $side_2;
    protected $side_3;

    /**
     * метод приймає генератор випадкових данних
     * і генерує дані для створення трикутника
     */
    public function setDataGenerator($generator)
    {
        $this->color = $generator->getColor();
        $angles = $generator->generateAngles();
        $sides = $generator->generateSidesLength();

        $this->angle_1 = $angles[0];
        $this->angle_2 = $angles[1];
        $this->angle_3 = $angles[2];

        $this->side_1 = $sides[0];
        $this->side_2 = $sides[1];
        $this->side_3 = $sides[2];
    }

    /**
     * генерує обєкт-трикутник
     */
    public function getObject()
    {
        $triangle = new Triangle($this->color);
        $triangle->setAngles($this->angle_1, $this->angle_2, $this->angle_3);
        $triangle->setSidesLength($this->side_1, $this->side_2, $this->side_3);

        return $triangle;
    }
}
