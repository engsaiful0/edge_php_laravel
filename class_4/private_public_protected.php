<?php
class Person {
    // Public property
    public $name;

    // Protected property
    protected $age;

    // Private property
    private $ssn;

    // Constructor
    public function __construct($name, $age, $ssn) {
        $this->name = $name; // Public can be accessed anywhere
        $this->age = $age;   // Protected can be accessed here
        $this->ssn = $ssn;   // Private can be accessed here
    }

    // Public method
    public function getName() {
        return $this->name;
    }

    // Protected method
    protected function getAge() {
        return $this->age;
    }

    // Private method
    private function getSsn() {
        return $this->ssn;
    }

    // Public method to access protected and private methods
    public function displayInfo() {
        echo "Name: " . $this->getName() . "<br>"; // Public method
        echo "Age: " . $this->getAge() . "<br>";   // Protected method
        echo "SSN: " . $this->getSsn() . "<br>";   // Private method
    }
}

// Child class that extends Person
class Employee extends Person {
    public $employeeId;

    public function __construct($name, $age, $ssn, $employeeId) {
        parent::__construct($name, $age, $ssn);
        $this->employeeId = $employeeId;
    }

    // Method to display employee information
    public function displayEmployeeInfo() {
        // Accessing public property from parent class
        echo "Employee Name: " . $this->getName() . "<br>"; // Public method from parent
        echo "Employee ID: " . $this->employeeId . "<br>"; // Public property
        // Cannot access protected and private properties/methods directly
        // echo "Age: " . $this->getAge(); // Allowed (protected)
        // echo "SSN: " . $this->getSsn(); // Not allowed (private)
    }
}

// Creating an instance of Person
$person = new Person("John Doe", 30, "123-45-6789");
$person->displayInfo(); // Works fine
echo "<br>";

// Creating an instance of Employee
$employee = new Employee("Jane Smith", 25, "987-65-4321", "E12345");
$employee->displayEmployeeInfo(); // Works fine

// Accessing properties
echo "Name from Person: " . $person->name . "<br>"; // Public access
// echo $person->age; // Not allowed (protected)
// echo $person->ssn; // Not allowed (private)

?>
