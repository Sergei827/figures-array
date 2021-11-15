<?php

namespace Classes\Figures;

use \Classes\Figures\FigureBase;
use \Interfaces\Figures\Figure;

/**
 * клас фігури квадрата
 */
class Square extends FigureBase implements Figure 
{ 
    protected $side;

    public function __construct(string $color, float $side)
    {
        $this->color = $color;
        $this->side = ($side > 0) ? $side : 0;
        $this->figureName = 'квадрат';
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

        $figureStr .= "<br>Довжина сторони: {$this->side}</br>";

        $perimeter = $this->calculatePerimeter();
        $figureStr .= "<br>Периметр: {$this->side}</br>";

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
     * метод повертає имя фігури
     */
    public function getFigureName()
    {
        return $this->figureName;
    }


    /**
     * метод повертає площу квадрата
     */
    public function getArea()
    {
        return $this->calculateArea();
    }

    /**
     * метод повертає довжину квадрату
     */
    public function getSideLength()
    {
        return $this->side;
    }


    /**
     * повертає периметр квадрату
     */
    public function getPerimeter()
    {
        return $this->calculatePerimeter();
    }

    /**
     * розрахунок периметру квадрата
     */
    protected function calculatePerimeter()
    {
        return ($this->side * 4);
    }


    /**
     * розрахунок площі квадрата
     */
    protected function calculateArea()
    {
        return ($this->side * $this->side);
    }

}
