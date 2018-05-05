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

}

class SumCalculatorOutputter
{
    private $areaCalculator;

    public function __construct(AreaCalculator $areaCalculator)
    {
        $this->areaCalculator = $areaCalculator;
    }

    public function toJson()
    {
        $data = array (
            'sum' => $this->areaCalculator->sum()
        );

        return json_encode($data);
    }

    public function toHtml()
    {
        return implode('', array('/n <h1>','suma de todas las areas: ', $this->areaCalculator->sum(),'</h1>'));
    }
}

$shapes = array(
    new Circle(5),
    new Square(4)
);

$areas = new AreaCalculator($shapes);
$output = new SumCalculatorOutputter($areas);

echo $output->toJson();
echo $output->toHtml()

?>