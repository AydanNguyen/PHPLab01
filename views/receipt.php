<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OrderReceipt</title>
</head>
<body>
    <h1>OrderReceipt</h1>
    <p>Product: <?= $productName ?></p>
    <p>Price: <?= $price ?></p>
    <p>Quantity: <?= $quantity ?></p>
    <p>Subtotal: <?= $subtotal ?> <?= CURRENCY ?></p>
    <p>Discount: <?= $discount ?> <?= CURRENCY ?></p>
    <p>Packaging Fee: <?= $packaging ?> <?= CURRENCY ?></p>
    <p>Service Fee: <?= $serviceFee ?> <?= CURRENCY ?></p>
    <p><strong>Total: <?= $total ?> <?= CURRENCY ?></strong></p>
    <p>Status: <?= $canCheckout ? "READY TO ORDER" : "BLOCKED" ?></p>
</body>
</html>