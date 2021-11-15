<?php

namespace Classes\Figures;

use \Classes\Figures\FigureBase;
use \Interfaces\Figures\Figure;

/**
 * класс фігури кола
 */
class Сircle1 extends FigureBase implements Figure 
{
    protected $radius;

    public function __construct(string $color, float $radius)
    {
        $this->color = $color;
        $this->figureName = 'коло';

        $this->radius = ($radius > 0) ? $radius : 0;
    }


    /**
     * метод виводить строкове 
     * представлення обєкту
     */
    public function __toString()
    {
        $figureStr = parent::getFigureString();

        $area = $this->calculateArea();
        $figureStr .= "<br>Площа: {$area}</br>";

        $figureStr .= "<br>Радіус: {$this->radius}</br>";

        $circumference = $this->calculateСircumference();
        $figureStr .= "<br>Довжина: {$circumference}</br>";

        return $figureStr;
    }    



    /**
     * метод малює фігуру
     *      
     */
    public function draw()
    {
        $upperName = mb_strtoupper($this->figureName);
        echo "<br>ФІГУРА {$upperName} НАМАЛЬОВАНА!<br>";
    }


    /**
     * метод повертає площу кола
     */
    public function getArea()
    {
        return $this->calculateArea(); 
    }


    /**
     * метод повертає довжину кола
     */
    public function getСircumference()
    {
        return $this->calculateСircumference();
    }

    /**
     * метод повертає радіус кола
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * метод повертає діаметр кола
     */
    public function getDiameter()
    {
        return 2 * $this->radius;
    }

    /**
     * розрахунок площі кола
     */
    protected function calculateArea()
    {
        
        return M_PI * ($this->radius * $this->radius);
    }


    /**
     * розрахунок довжини кола
     */
    protected function calculateСircumference()
    {
        
        return 2 * M_PI * $this->radius;
    }
}
