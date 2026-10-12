<?php
// SmartCafeBilling Lab01
const SERVICE_RATE = 0.10;
const CURRENCY = "VND";
const MEMBER_DISCOUNT_RATE = 0.05;
const MEMBER_MIN = 20000;
const PACKAGING_FEE_PER_ITEM = 15000;


$productName = "Salt Coffee";
$price = 45000;
$rawQuantity = "3";
$memberStatus = "MEMBER";
$productAvailable = true;
$isActiveCustomer = true;

echo "=== RAW DATA ===" . PHP_EOL;
#check datatype 
var_dump($productName);
var_dump($price);
var_dump($rawQuantity);
var_dump($memberStatus);

#cast string to int
$quantity = (int) $rawQuantity;

#print the correct type
echo "Raw quantity type: " . gettype($rawQuantity) . PHP_EOL;
echo "Clean quantity type: " . gettype($quantity) . PHP_EOL;

#subtotal
$subtotal = $price * $quantity;
echo "Subtotal: " . $subtotal . " " . CURRENCY . PHP_EOL;

$isMember = $memberStatus === "MEMBER";
$isDiscountEligible = $isMember && $subtotal >= MEMBER_MIN;

$discount = $isDiscountEligible
    ? $subtotal * MEMBER_DISCOUNT_RATE
    : 0;

$afterDiscount = $subtotal - $discount;
$packaging = $quantity * PACKAGING_FEE_PER_ITEM;
$serviceFee = $afterDiscount * SERVICE_RATE;
$total = $afterDiscount + $packaging + $serviceFee;

$hasValidQuantity = $quantity > 0 && $productAvailable == true;
$canCheckout = $hasValidQuantity && $isActiveCustomer;

var_dump($canCheckout);

$receipt = "=== RECEIPT ===" . PHP_EOL;
$receipt .= "Product: " . $productName . PHP_EOL;
$receipt .= "Price: " . $price . " " . CURRENCY . PHP_EOL;
$receipt .= "Quantity: " . $quantity . PHP_EOL;
$receipt .= "Subtotal: " . $subtotal . " " . CURRENCY . PHP_EOL;
$receipt .= "Discount: " . $discount . " " . CURRENCY . PHP_EOL;
$receipt .= "Packaging Fee: " . $packaging . " " . CURRENCY . PHP_EOL;
$receipt .= "Service Fee: " . $serviceFee . " " . CURRENCY . PHP_EOL;
$receipt .= "TOTAL: " . $total . " " . CURRENCY . PHP_EOL;

if ($canCheckout) {
    $receipt .= "Status: READY TO ORDER" . PHP_EOL;
} else {
    $receipt .= "Status: BLOCKED" . PHP_EOL;
}

echo $receipt;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QuickCheckout</title>
</head>
<body>
    <h1>QuickCheckout</h1>
    <p>Product: <?= $productName ?></p>
    <p>Quantity: <?= $quantity ?></p>
    <p>Total: <?= $total ?> <?= CURRENCY ?></p>
</body>
</html>
