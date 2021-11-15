<?php

namespace Classes\Figures;

use \Classes\Figures\FigureBase;
use \Interfaces\Figures\Figure;

/**
 * класс фігури трапеції
 */
class Trapeze extends FigureBase implements Figure 
{
    protected $angles = [];
    protected $shortBase;
    protected $longBase;
    protected $leftSide;
    protected $rightSide;
    protected $height;


    public function __construct(string $color)
    {
        $this->color = $color;
        $this->figureName = 'трапеція';
    } 

    /**
     * метод встановлює кути трапеції
     */
    public function setAngles(int $a, int $b, int $c, int $d)
    {
        $anglesSum = $a + $b + $c + $d;

        $this->angles[0] = $a;
        $this->angles[1] = $b;
        $this->angles[2] = $c;
        $this->angles[3] = $d;

    }

    /**
     * метод встановлює коротшої основи трапеції
     */
    public function setShortBase(float $shortBase)
    {
        $this->shortBase = ($shortBase > 0) ? $shortBase : 0;
    }
    
    /**
     * метод встановлює довжину довшої основи трапеції
     */
    public function setLongBase(float $longBase)
    {
        $this->longBase = ($longBase > 0) ? $longBase : 0;
    }

    /**
     * метод встановлює довжину лівої сторони трапеції
     */
    public function setLeftSide(float $leftSide)
    {
        $this->leftSide = ($leftSide > 0) ? $leftSide : 0;
    }

    /**
     * метод встановлює довжину правої сторони трапеції
     */
    public function setRightSide(float $rightSide)
    {
        $this->rightSide = ($rightSide > 0) ? $rightSide : 0;
    }

    /**
     * метод встановлює висоту трапеції
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
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

        $figureStr .= "<br>Висота: {$this->height}</br>";

        $perimeter = $this->calculatePerimeter();
        $figureStr .= "<br>Периметр: {$perimeter}</br>";


        $angle_1 = $this->angles[0];
        $angle_2 = $this->angles[1];
        $angle_3 = $this->angles[2];
        $angle_4 = $this->angles[3];
        $anglesStr = " {$angle_1} {$angle_2} {$angle_3} {$angle_4} ";
        $figureStr .= "<br>Кути: {$anglesStr}<br>";

        $figureStr .= "<br>Левая сторона: {$this->leftSide}<br>";
        $figureStr .= "<br>Правая сторона: {$this->rightSide}<br>";

        $figureStr .= "<br>Короткая основа: {$this->shortBase}<br>";
        $figureStr .= "<br>Довга основа: {$this->longBase}<br>";
        
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
     * метод повертає висоту трапеції
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * метод повертає площу трапеції
     */
    public function getArea()
    {
        return $this->calculateArea();
    }


    /**
     * метод повертає список кутів трапеції 
     */
    public function getAngles()
    {
        return $this->angles;
    }

    /**
     * метод повертає список 
     * з двох сторін трапеції
     */
    public function getSidesLength()
    {
        $sides = [];
        $sides[] = $this->leftSide;
        $sides[] = $this->rigthSide;

        return $sides;
    }

    /**
     * метод повертає список 
     * з двох онов трапеції 
     */
    public function getBasesLength()
    {
        $bases = [];
        $bases[] = $this->shortBase;
        $bases[] = $this->longBase;

        return $bases;
    }

    /**
     * метод повертає периметр трапеції
     */
    public function getPerimeter()
    {
        return $this->calculatePerimeter();
    }

    /**
     * метод вираховує площу трапеції 
     */
    protected function calculateArea()
    {
        $a = $this->shortBase;
        $b = $this->longBase;
        $height = $this->height;
        $area = (($a + $b) / 2) * $height;
        
    }

    /**
     * метод вираховує периметр 
     */
    protected function calculatePerimeter()
    {
        $a = $this->leftSide;
        $b = $this->shortBase;
        $c = $this->rightSide;
        $d = $this->longBase;

        return $a + $b + $c + $d;

    }
}
