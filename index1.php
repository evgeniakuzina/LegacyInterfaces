<?php

/*
1. Наследование - это копирование свойств родительского класса дочерними. Как если бы люди одного рода были все одинаковыми: внешне, внутренне и работали бы на одной и той же работе. Полиморфизм - немного похож на наследование, так как представители каждого класса берут параметры, но модифицируют их. Если уж совсем нафантазировать, то наследование - это однояйцевые близнецы, а полиморфизм - разнояйцевые))
2. Главное отличие интерфейсов от абстрактного класса, как мне кажется, в том что, интерфейсы содержат только методы, а абстрактный класс может содержать и переменные, при этом методы в интерфейса никак не устанавливаются, как могут в абстрактном классе. Также если реализуется интерфейс в каком-то классе, то нужно обязательно использовать методы, которые в нем описываются, если наследуется абстрактный класс, то это необязательно. Думаю, что интерфейс лучше всего использовать там, где нам нужно гарантированно реализовать какие-то методы, а если в класса метод возможно и не понадобится, лучше использовать абстрактный класс.   
*/

class SuperClass {
    public $title;
    public function getTitle () {
        echo $this->title;
        echo "<br>";
    }
}

interface HowMuch {
    public function getPrice();
}

interface Noises {
    public function makeNoise($noise);
}

class Car extends SuperClass implements HowMuch {
    private $price;
    public $model;
    public $color;
    const WHEELS = 4;
    public static $carCounter = 0;
	
    public function __construct($title, $price, $model, $color) {
        self::$carCounter++;
        $this->title = $title;
        $this->price = $price;
        $this->model = $model;
        $this->color = $color;
	}

    public function getPrice() {
        echo $this->price;
        echo "<br>";
    }
}

$bmw = new Car('BMW', 5000, 'X5', 'Белый');
$bmw->getTitle();
$toyota = new Car('Toyota', 2000, 'Camry', 'Черный');
$toyota->getPrice();

class TV extends SuperClass implements HowMuch {
    private $price;
    public $diagonal;
    public $remoteControl;
    public static $tvCounter = 0;

    public function __construct($title, $price, $diagonal, $remoteControl) {
        self::$tvCounter++;
        $this->title = $title;
        $this->price = $price;
        $this->diagonal = $diagonal;
        $this->remoteControl = $remoteControl;
    }
	
    public function getPrice() {
        echo $this->price;
        echo "<br>";
    }
}

$samsung = new TV('Samsung', 500, 48, 'Да');
$toshiba = new TV('Toshiba', 100, 17, 'Нет');

class Pen extends SuperClass implements HowMuch {
    private $price;
    public $refillColor;
    public $penLid;
    public static $penCounter = 0;
	
    public function __construct($title, $price, $refillColor, $penLid) {
        self::$penCounter++;
        $this->title = $title;
        $this->price = $price;
        $this->refillColor = $refillColor;
        $this->penLid = $penLid;
    }
    public function getPrice() {
        echo $this->price;
        echo "<br>";
    }
}

$firstPen = new Pen('Parker', 2, 'Голубой', 'Прозрачный', 'Да');
$secondPen = new Pen('Обычная ручка', 1, 'Красный', 'Белый', 'Нет');

class Duck extends SuperClass implements Noises {
    public $color;
    public $age;
    public $placeOfLiving;
    public static $duckCounter = 0;
    public function __construct($title, $color, $age, $placeOfLiving) {
        self::$duckCounter++;
        $this->title = $title;
        $this->color = $color;
        $this->age = $age;
        $this->placeOfLiving = $placeOfLiving;
    }
    public function makeNoise($noise) {
        echo $noise;
        echo "<br>";
    }
}

$firstDuck = new Duck('Роджер', 'Коричневый', 1, 'Парк Горького');
$firstDuck->makeNoise('Кря');
$secondDuck = new Duck('Василиса', 'Сизый', 2, 'Венесуэла');

final class Product extends SuperClass implements HowMuch {
    private $price;
    public $category;
    public $weight;
    public static $productCounter = 0;
	
    public function __construct($title, $category, $price, $weight) {
        self::$productCounter++;
        $this->title = $title;
        $this->category = $category;
        $this->price = $price;
        $this->weight = $weight;
    }
	
    public function getPrice() {
        echo $this->price;
        echo "<br>";
    }
}

$firstProduct = new Product('Тетрадь', 'Канцтовары', 20, 100);
$secondProduct = new Product('Л.Н.Толстой "Война и Мир"', 'Книги', 100, 600);

class OtherProduct {
        public $category;
        public $title;
        public $weight;
        protected $price;
        public $delivery = 300;
        public $discount = 10;
        public $total;

    public function __construct($category, $title, $weight, $price) {
        $this->category = $category;
        $this->title = $title;
        $this->weight = $weight;
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDiscription() {
        $this->total = ($this->price - (($this->price * $this->discount) / 100)) + $this->delivery;
        echo $this->title . ' стоит ' . $this->price . '. Доставка: ' . $this->delivery . '. Скидка: ' 
            . $this->discount . '%. Итого: ' . $this->total;
        echo "<br>";
    }

}

class Cat extends OtherProduct {
    public $gender;
    public $age;

    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    public function setAge($age) {
        $this->age = $age;
        return $this;
    }
}

class Bed extends OtherProduct {
    public $size;
    public $material;

    public function setSize($size) {
        $this->size = $size;
        return $this;
    }

    public function setMaterial($material) {
        $this->material = $material;
        return $this;
    }
}

interface DiscountDown {
    public function isDiscount();
    
}

class Laptop extends OtherProduct implements DiscountDown {
    public $ram;
    public $processer;

    public function setRam($ram) {
        $this->ram = $ram;
        return $this;
    }

    public function setProcesser($processer) {
        $this->processer = $processer;
        return $this;
    }

    public function isDiscount() {
        if ($this->weight < 10) {
            $this->discount = 0;
            $this->delivery = 250;
        } 
    }

    public function getDiscription() {
        $this->isDiscount();
        parent::getDiscription();
    }   
}

$cat = new Cat('Домашние животные', 'Сфинкс', 1, 3000);
$cat->setGender('девочка')->setAge(1);
$cat->getDiscription();

$asus = new Laptop('Техника', 'Asus', 2, 20000);
$asus->getDiscription();

$mac = new Laptop('Техника', 'Apple', 11, 100000);
$mac->getDiscription();

$newBed = new Bed('Мебель', 'Кровать', 20, 100000);
$newBed->getDiscription();

?>
