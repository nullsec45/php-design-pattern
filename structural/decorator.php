<?php

class Shape{
    public function draw(string $color){
        // echo $color.PHP_EOL;
        return $color;
    }
}

class ColorDecorator{
    private $shape;
    private $color;

    public function __construct(Shape $shape, string $color){
        $this->shape=$shape;
        $this->color=$color;
    }

    public function draw(){
       return $this->shape->draw($this->color);
    }
}

$shape=new Shape();
$coloredShape=new ColorDecorator($shape, 'red');
echo $coloredShape->draw().PHP_EOL;