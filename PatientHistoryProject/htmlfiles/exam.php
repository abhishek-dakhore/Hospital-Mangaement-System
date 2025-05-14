<?php
// Example array for demonstration
$array = ["apple" => 3, "orange" => 2, "banana" => 5, "grape" => 4];

// sort() - Sort array values in ascending order, reindexing keys
sort($array);
echo "After sort():\n";
print_r($array);

// Resetting the array for demonstration
$array = ["apple" => 3, "orange" => 2, "banana" => 5, "grape" => 4];

// rsort() - Sort array values in descending order, reindexing keys
rsort($array);
echo "After rsort():\n";
print_r($array);

// Resetting the array for demonstration
$array = ["apple" => 3, "orange" => 2, "banana" => 5, "grape" => 4];

// asort() - Sort array by values in ascending order, maintaining key association
asort($array);
echo "After asort():\n";
print_r($array);

// Resetting the array for demonstration
$array = ["apple" => 3, "orange" => 2, "banana" => 5, "grape" => 4];

// arsort() - Sort array by values in descending order, maintaining key association
arsort($array);
echo "After arsort():\n";
print_r($array);

// Resetting the array for demonstration
$array = ["apple" => 3, "orange" => 2, "banana" => 5, "grape" => 4];

// ksort() - Sort array by keys in ascending order
ksort($array);
echo "After ksort():\n";
print_r($array);

// Resetting the array for demonstration
$array = ["apple" => 3, "orange" => 2, "banana" => 5, "grape" => 4];

// krsort() - Sort array by keys in descending order
krsort($array);
echo "After krsort():\n";
print_r($array);
?>
