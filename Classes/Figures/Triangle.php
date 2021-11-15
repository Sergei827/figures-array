<?php

namespace Classes\Figures;

use \Classes\Figures\FigureBase;
use \Interfaces\Figures\Figure;

/**
 * класс фігури трикутника
 */
class Triangle extends FigureBase implements Figure 
{
    protected $angles = [];
    protected $sidesLength = [];

    protected $angleType;
    protected $sideType;
    protected $base;
    protected $sile_1;
    protected $side_2;

    protected $angleTypes = [
        1 => 'гострокутний',
        2 => 'тупокутний',
        3 => 'прямокутний'
    ];

    protected $sidesType = [
        1 => 'різносторонній',
        2 => 'рівностегновий',
        3 => 'рівносторонній (або правильний)'
    ];



    public function __construct(string $color)
    {
        $this->color = $color;
        $this->figureName = 'трикутник';
    }


    /** 
     * встновлює кути трикутника в градусах
     * 
    */
    public function setAngles(int $a, int $b, int $c)
    {
        $anglesSum = $a + $b + $c;

        if($anglesSum != 180)
        {
            return false;
        }

        // визначими тип трикутника за його кутами
        // перевірка на гострокутність
        if(($a < 90) && ($b < 90) && ($b < 90))
        {
            $this->angleType = 1;
        }

        // перевірка на тупокутність
        if(($a > 90) || ($b > 90) || ($b > 90))
        {
            $this->angleType = 2;
        }

        // перевірка на прямокутність
        if(($a === 90) || ($b === 90) || ($b === 90))
        {
            $this->angleType = 3;
        }


        $this->angles[] = ($a > 0) ? $a : 0;
        $this->angles[] = ($b > 0) ? $b : 0;
        $this->angles[] = ($c > 0) ? $c : 0;
        

    }


    /**
     * встановлює довжину сторін
     */
    public function setSidesLength(float $a, float $b, float $c)
    {  
        if(($a < 0) || ($b < 0) || ($c < 0))
        {
            return false;
        }

        // визначими тип трикутника за його сторонами
        // перевірка на різносторонність
        if(($a !== $b) && ($b !== $c))
        {
            $this->sideType = 1;
        }

        // перевірка на рівностегновість
        if(($a === $b) xor ($b === $c))
        {
            $this->sideType = 2;
        }

        // перевірка на прямокутність
        if(($a === $b) && ($b === $c))
        {
            $this->sideType = 3;
        }

        $this->base = ($a > 0) ? $a : 0;
        $this->side_1 = ($b > 0) ? $b : 0;
        $this->side_2 = ($c > 0) ? $c : 0;
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
     * метод виводить строкове 
     * представлення обєкту
     */
    public function __toString()
    {
        $figureStr = parent::getFigureString();

        $area = $this->calculateArea();
        $figureStr .= "<br>Площа: {$area}</br>";

        $height = $this->calculateHeight();
        $figureStr .= "<br>Висота: {$height}</br>";

        $perimetr = $this->calculatePerimetr();
        $figureStr .= "<br>Периметр: {$perimetr}</br>";

        $typeStr = " {$this->angleTypes[$this->angleType]} {$this->sidesType[$this->sideType]} ";
        $figureStr .= "<br>Різновид: {$typeStr}<br>";

        $anglesStr = " {$this->angles[0]} {$this->angles[1]} {$this->angles[2]} ";
        $figureStr .= "<br>Кути: {$anglesStr}<br>";

        $sidesStr = " {$this->base} {$this->side_1} {$this->side_2} ";
        $figureStr .= "<br>Сторони: {$sidesStr}<br>";

        return $figureStr;
    }    
    

    /**
     * метод повертає имя фігури
     */
    public function getFigureName()
    {
        return $this->figureName;
    }


    /**
     * метод повертає висоту трикутника
     */
    public function getHeight()
    {
        return $this->calculateHeight();
    }

    /**
     * метод повертає площу трикутника
     */  
    public function getArea()
    {
    

        return $this->calculateArea();
    }

    /**
     * метод повертає периметр трикутника
     * 
     */
    public function getPerimeter()
    {
        return $this->calculatePerimetr();
    }

    /**
     * метод повертає список кутів трикутника
     */
    public function getAngles()
    {
        return $this->angles;
    }

    /**
     * метод повертає список довжин сторін трикутника
     */
    public function getSidesLength()
    {
        $sides = [
            $this->base,
            $this->side_1,
            $this->side_2
        ]; 

        return $sides;
    }

    /**
     * метод повертає тип трикутника 
     * згідно його кутів
     */
    public function getAnglesType()
    {
        return $this->angleTypes[$this->angleType];
    }

    /**
     * метод повертає тип трикутника
     * згідно його сторін
     */
    public function getSidesType()
    {
        return $this->sidesType[$this->sideType];
    }


     /**
     * метод вираховує площу трикутника
     */
    protected function calculateArea()
    {
        $height = $this->calculateHeight();
        $area = $this->base * $height / 2;

        return $area;
    }


    /**
     * метод вираховує висоту трикутника
     */
    protected function calculateHeight()
    {
        $a = $this->base;
        $b = $this->side_1;
        $c = $this->side_2;

        $p = ($a + $b + $c) / 2;
        $numerator = 2 * (sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)));
        $height = $numerator / $a;

        return $height;
    }

    /**
     * метод вираховує периметр трикутника
     */
    protected function calculatePerimetr()
    {
        return $this->base + $this->side_1 + $this->side_2;
    }
}
