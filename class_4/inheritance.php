<?php
// Base class
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        return "Some sound";
    }
}

// Derived class
class Dog extends Animal {
    public function speak() {
        return "Woof! My name is " . $this->name;
    }
}

// Another derived class
class Cat extends Animal {
    public function speak() {
        return "Meow! My name is " . $this->name;
    }
}

// Creating objects
$dog = new Dog("Buddy");
$cat = new Cat("Whiskers");

echo $dog->speak(); // Outputs: Woof! My name is Buddy
echo $cat->speak(); // Outputs: Meow! My name is Whiskers
