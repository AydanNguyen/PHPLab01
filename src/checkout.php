<?php
$quantity = (int) $rawQuantity;

$subtotal = $price * $quantity;

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