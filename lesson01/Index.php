<?php

include 'GoodClass.php';
include 'SpecialGoodClass.php';
include 'CartClass.php';

$specialGood = new SpecialGood($title='lenovo', $price=100000, $image='lenovo.jpg', $status=0, $count=1, $discount=0.8);
echo $specialGood->getTitle()."<br>";
echo $specialGood->getPrice()."<br>";
echo $specialGood->getDiscountedPrice()."<br><br>";

$cart = new Cart;
$cart->addGoodToCart($specialGood);

$titles = ['laptop', 'phone', 'headphones', 'monitor', 'mouse', 'gamepad', 'lamp'];
for($i=0; $i<10; $i++){
    $nextGood = new Good($titles[rand(0,count($titles)-1)], rand(500,50000), 'test.jpg', 0, rand(1,5), 1);
    $cart->addGoodToCart($nextGood);
}

echo $cart->getGoodsInfo();
echo $cart->getTotalGoodsPrice();





// 5. Дан код:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();
// $a2->foo();
// $a1->foo();
// $a2->foo();
// Что он выведет на каждом шаге? Почему?
// Выведет 1234, так как в данном случае определено статическое свойство класса, а не объекта.

// Немного изменим п.5:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo();
// Выведет 1122, все так же, как и ранее: определено статическое свойство класса, а не объекта. При этом есть наследование, поэтому класс другой.

// 6. Объясните результаты в этом случае.
// 7. *Дан код:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A;
// $b1 = new B;
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo(); 
// Что он выведет на каждом шаге? Почему?
// Выведет 1122, все так же, как и ранее: определено статическое свойство класса, а не объекта. При этом есть наследование, поэтому класс другой.
?>