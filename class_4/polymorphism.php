<?php

//Base Class
class Animal {
    public function speak() {
        return "Some generic animal sound.";
    }
}

//Derived Class
class Dog extends Animal {
    public function speak() {
        return "Woof! Woof!";
    }
}

class Cat extends Animal {
    public function speak() {
        return "Meow!<br>";
    }
}

function animalSpeak(Animal $animal) {
    echo $animal->speak() . "<br>";
}


$dog = new Dog();
$cat = new Cat();

animalSpeak($dog); // Outputs: Woof! Woof!
animalSpeak($cat); // Outputs: Meow!
