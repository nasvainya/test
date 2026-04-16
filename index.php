<?php
abstract class Figure{
    private $area;
    private $color;
    private $sidesCount;

abstract public function infoAbout();
}

interface Area{
    public function getArea();
}

class Rectangle extends Figure implements Area{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->sidesCount = 4;
    }

    public function getArea()
    {
        $this->area = $this->a * $this->b;
        return $this->area;
    }

    public function infoAbout(){
        return "Это класс прямоугольника. У него {$this->sidesCount} стороны.";
    }
}

class Square extends Figure implements Area{
    private $a;
    
    public function __construct($a)
    {
        $this->a = $a;

        $this->sidesCount = 4;
    }

    public function getArea()
    {
        $this->area = $this->a * $this->a;
        return $this->area;
    }

    public function infoAbout(){
        return "Это класс квадрата. У него {$this->sidesCount} стороны.";
    }
}

class Triangle extends Figure implements Area{
    private $a;
    private $b;
    private $c;
    
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;

        $this->sidesCount = 3;
    }

    public function getArea()
    {
        $p = ($this->a + $this->b + $this->c) / 2;
        $this->area = sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
        return $this->area;
    }

    public function infoAbout(){
        return "Это класс треугольника. У него {$this->sidesCount} стороны.";
    }
}

$rect1 = new Rectangle(5, 3);
$rect2 = new Rectangle(7, 4);

$square1 = new Square(4);
$square2 = new Square(6);

$triangle1 = new Triangle(3, 4, 5);
$triangle2 = new Triangle(5, 5, 6);

echo $rect1->infoAbout() . "<br>";
echo "Площадь прямоугольника (5×3): " . $rect1->getArea() . "<br><br>";

echo $rect2->infoAbout() . "<br>";
echo "Площадь прямоугольника (7×4): " . $rect2->getArea() . "<br><br>";

echo $square1->infoAbout() . "<br>";
echo "Площадь квадрата (сторона 4): " . $square1->getArea() . "<br><br>";

echo $square2->infoAbout() . "<br>";
echo "Площадь квадрата (сторона 6): " . $square2->getArea() . "<br><br>";

echo $triangle1->infoAbout() . "<br>";
echo "Площадь треугольника (3,4,5): " . $triangle1->getArea() . "<br><br>";

echo $triangle2->infoAbout() . "<br>";
echo "Площадь треугольника (5,5,6): " . $triangle2->getArea() . "<br>";
?>
