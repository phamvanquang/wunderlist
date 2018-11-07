<?php
trait database {
    public function sayHello(){
        echo "hello";
    }
}
trait world {
    public function sayWorld(){
        echo "World";
    }
}
class MyHelloWorld{
    use database, world;
    public function sayHelloWorld(){
        echo "!";
    }
}
$a = new MyHelloWorld();
$a->sayHello();
$a->sayWorld();
$a->sayHelloWorld();
?>