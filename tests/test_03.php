<?php

class A {
    public $age = 60;
    public static $count = 0;

    public function __construct() {
        echo "A created\n";
        self::$count++;
    }

    public function method1() {
        echo "It is method1 from class A\n";
    }

    public function __destruct() {
        self::$count--;
    }
}

class B extends A {
    public function method1() {
        echo "It is method1 from class B\n";
    }

    public function method2() {
        return self::$count;
    }
}

class C extends B {
    public $age = 16;

    public function method2() {
        return parent::method2() + 1;
    }

    public static function echoCount() {
        echo self::$count . "\n";
    }

    public function __get($name) {
        if ($name == 'parent_age') {
            return "Don't know!";
        }
        return null;
    }
}

$a = new A;

echo "A count: " . A::$count . "\n";

$a->method1();

$a->age = 167;

echo "A Age: {$a->age}\n";

$b = new B;

$b->method1();
echo "A and B count: {$b->method2()}\n";

$c = new C;

echo "C Age: {$c->age}\n";
//echo "C parent age: {$c->parent_age}\n";

C::echoCount();

