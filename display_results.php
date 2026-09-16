<?php
// Get the data from the form.
$investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

// Validate the investment amount.
if ($investment === false || $investment === null || $investment <= 0) {
    $error_message = 'Investment amount must be greater than 0.';
}

// Exercise 2-2: validate the interest rate.
elseif ($interest_rate === false || $interest_rate === null ||
        $interest_rate <= 0 || $interest_rate > 15) {
    $error_message = 'Interest rate must be greater than 0 and less than or equal to 15.';
}

// Validate the number of years.
elseif ($years === false || $years === null || $years <= 0) {
    $error_message = 'Number of years must be greater than 0.';
}

else {
    // Calculate the future value.
    $future_value = $investment;

    for ($i = 1; $i <= $years; $i++) {
        $future_value += $future_value * $interest_rate / 100;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Future Value Calculator</title>
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <?php if (isset($error_message)) : ?>
            <p><?php echo htmlspecialchars($error_message); ?></p>
            <p><a href="index.php">Back</a></p>
        <?php else : ?>
            <p><strong>Investment Amount:</strong>
                <?php echo '$' . number_format($investment, 2); ?></p>

            <p><strong>Yearly Interest Rate:</strong>
                <?php echo number_format($interest_rate, 2) . '%'; ?></p>

            <p><strong>Number of Years:</strong>
                <?php echo $years; ?></p>

            <p><strong>Future Value:</strong>
                <?php echo '$' . number_format($future_value, 2); ?></p>

            <p>This calculation was done on
                <?php echo date('n/j/Y'); ?>.</p>

            <p><a href="index.php">Back</a></p>
        <?php endif; ?>
    </main>
</body>
</html>
