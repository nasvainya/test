<?php
class Pompom{
    public $name;
    private $age;
    public $salary;
    
    public function __construct($name, $age, $salary){
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }

    public function getSalary(){
        return $this->salary;
    }

    private function checkAge($newAge)
    {
        if ($newAge >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function setAge($newAge)
    {
        if ($this->checkAge($newAge)) {
            $this->age = $newAge;
            echo "Возраст успешно изменён на {$newAge}<br>";
        } else {
            echo "Вам работать в нашей компании еще рано<br>";
        }
    }
};
$worker1 = new Pompom("Роналдо", 25, 1000);
$worker2 = new Pompom("Усаги", 30, 2000);

$sumSalary = $worker1->getSalary() + $worker2->getSalary();
$sumAge = $worker1->getAge() + $worker2->getAge();

echo "Сумма зарплат работников: " . $sumSalary . "<br>";
echo "Сумма возрастов работников: " . $sumAge . "<br><br>";

echo "Работник 1: " . $worker1->getName() . ", возраст: " . $worker1->getAge() . ", зарплата: " . $worker1->getSalary() . "<br>";
echo "Работник 2: " . $worker2->getName() . ", возраст: " . $worker2->getAge() . ", зарплата: " . $worker2->getSalary() . "<br><br>";

echo "Попытка изменить возраст работника Роналдо на 16:<br>";
$worker1->setAge(16);
echo "Текущий возраст работника Роналдо: " . $worker1->getAge() . "<br><br>";

echo "Попытка изменить возраст работника Роналдо на 20:<br>";
$worker1->setAge(20);
echo "Текущий возраст работника Роналдо: " . $worker1->getAge() . "<br><br>";

echo "Проверка setAge:<br>";
$worker2->setAge(35);
$worker2->setAge(15);
?>
