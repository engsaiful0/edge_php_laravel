<?php

// Define a class named "Animal"
class Animal {
    // Properties
    protected $name;
    protected $species;

    // Constructor
    public function __construct($name, $species) {
        $this->name = $name;
        $this->species = $species;
    }

    // Method to get the animal's details
    public function getDetails() {
        return "Name: " . $this->name . ", Species: " . $this->species;
    }
}

// Define a subclass "Dog" that inherits from "Animal"
class Dog extends Animal {
    private $breed;

    // Constructor
    public function __construct($name, $species, $breed) {
        parent::__construct($name, $species);
        $this->breed = $breed;
    }

    // Method to override the parent method
    public function getDetails() {
        return parent::getDetails() . ", Breed: " . $this->breed."<br>";
    }

    // Additional method specific to Dog
    public function bark() {
        return "Woof! Woof!";
    }
}

// Create an object of the Dog class
$myDog = new Dog("Buddy", "Dog", "Golden Retriever");

// Use the object's methods
echo $myDog->getDetails(); // Outputs: Name: Buddy, Species: Dog, Breed: Golden Retriever
echo "<br>" . $myDog->bark(); // Outputs: Woof! Woof!

?>
