<?php

namespace Interfaces\Figures;

interface Figure  
{
    public function draw();

    public function getFigureName();
    public function getColor();
    public function getArea();
}
