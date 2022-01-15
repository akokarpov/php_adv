<?php

include 'Good.php'; // abstract template
include 'DigitalGood.php';
include 'CommonGood.php';
include 'WeightGood.php';

$digitalCourse = new DigitalGood('PHP Сourse', 15000, 2);
$paperBook = new CommonGood('Pulp fiction', 1200, 1); 
$applesPack = new WeightGood('Apples', 125, 100);

echo $digitalCourse->getTitle() . "<br>";
echo $digitalCourse->getPrice() . "<br>"; // sets price / 2 as static
echo $digitalCourse->getCount() . "<br>";
echo $digitalCourse->getTotalSum() . "<br><br>";

echo $paperBook->getTitle() . "<br>";
echo $paperBook->getPrice() . "<br>";
echo $paperBook->getCount() . "<br>";
echo $paperBook->getTotalSum() . "<br><br>"; // returns normal price * count

echo $applesPack->getTitle() . "<br>";
echo $applesPack->getPrice() . "<br>";
echo $applesPack->getCount() . "<br>";
echo $applesPack->getTotalSum() . "<br><br>"; // returns sum based on purchased volume

echo $applesPack; // magic __toString method




























?>