<?php

namespace Classes;

class RandomFigureList
{
    protected $a;
    protected $b;

    /**
     * массив який містить:
     *     - class імя класу фігури;
     *     - factory імя фабрики для створення фігури;
     *     - generator випадкових данних для фігури;
     *     - counter кількість обїектів фігури в випадковому списку (массиву) фігур;
     */
    protected $figureTypes = [
        ['class' => '\Classes\Figures\Square', 'factory' => '\Factories\SquareFactory', 'generator' => '\Generators\SquareDataGenerator', 'counter' => 0],
        ['class' => '\Classes\Figures\Circle1', 'factory' => '\Factories\CircleFactory', 'generator' => '\Generators\CircleDataGenerator', 'counter' => 0],
        ['class' => '\Classes\Figures\Triangle', 'factory' => '\Factories\TriangleFactory', 'generator' => '\Generators\TriangleDataGenerator', 'counter' => 0],
        ['class' => '\Classes\Figures\Trapeze', 'factory' => '\Factories\TrapezeFactory', 'generator' => '\Generators\TrapezeDataGenerator', 'counter' => 0]
    ];

    // ініциалізація випадкового массиву
    protected $figureRandomList = [];

    
    public function __construct(int $a = 1, int $b = 10)
    {
        // діапазон кількості однієї фігури в массиві
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * метод створює массив фігур з випадковою
     * кількістью кожної з них 
     * 
     */
    public function creatFigureList()
    {
        $this->generateNumberOfFigures();

        for($i = 0; $i < count($this->figureTypes); $i++)
        {
            for($j = 0; $j < $this->figureTypes[$i]['counter']; $j++)
            {
                $factory = new $this->figureTypes[$i]['factory']();
                $factory->setDataGenerator(new $this->figureTypes[$i]['generator']());
                $this->figureRandomList[] =  $factory->getObject();
            }
        }

        shuffle($this->figureRandomList);

        return $this->figureRandomList;
    }


    /**
     * метод роздруковує випадковий массив фігур 
     * 
     */
    public function printFigureList()
    {

        $countFig = count($this->figureRandomList);
        echo "<p style='font-weight: bold'>Всього фігур: {$countFig}</p>";


        for($i = 0; $i < count($this->figureRandomList); $i++)
        {
            $figure = $this->figureRandomList[$i];
            echo "<div style='border: 1px solid #D2691E; margin: 20px; padding: 20px'>";
            echo $figure;
            echo "</div>";
        }
    }


     /**
     * метод генерує випадкову кількість для кожної
     * фігури
     * 
     */
    protected function generateNumberOfFigures()
    {
        
        for($i = 0; $i < count($this->figureTypes); $i++)
        {
            $this->figureTypes[$i]['counter'] = mt_rand($this->a, $this->b);
        } 
    }

    
}
