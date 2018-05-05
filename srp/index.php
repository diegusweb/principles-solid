<?php

//Una clase sólo debe tener un motivo para cambiar, lo que significa que sólo debe tener una tarea.

class Circle
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
}

class Square
{
    public $length;

    public function __construct($length)
    {
        $this->length = $length;
    }
}

class AreaCalculator
{
    protected $shaper;

    public function __construct($shaper)
    {
        $this->shaper = $shaper;
    }

    public function sum()
    {
        foreach ($this->shaper as $shape){
            if(is_a($shape, 'Square')){
                $area[] = pow($shape->length, 2);
            }elseif (is_a($shape, 'Cicle')){
                $area[] = pi() * pow($shape->radius, 2);
            }
        }

        return array_sum($area);
    }

    public function output()
    {
        return implode('', array(
            "<h1>",
            "Suma de todas las áreas: ",
            $this->sum(),
            "</h1>"
        ));
    }
}

$shapes = array(
    new Circle(5),
    new Square(4)
);

$areas = new AreaCalculator($shapes);

echo $areas->output();

?>