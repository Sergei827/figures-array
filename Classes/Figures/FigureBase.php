<?php

namespace Classes\Figures;


/**
 * базовий класс для фігур
 */
abstract class FigureBase 
{ 
    protected $color;
    protected $figureName;

    protected function getFigureString()
    {
        $figureStr = "<br><h3>Фігура: {$this->figureName}</h3></br>";
        $figureStr .= "<br>Колір: {$this->color}</br>";

        return $figureStr;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getFigureName()
    {
        return $this->figureName;
    }
}
