<?php
// Get the values from the form, if they exist.
$investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

// Set default values for the form.
if ($investment === false || $investment === null) {
    $investment = '';
}
if ($interest_rate === false || $interest_rate === null) {
    $interest_rate = '';
}
if ($years === false || $years === null) {
    $years = '';
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

        <form action="display_results.php" method="post">
            <div>
                <label for="investment">Investment Amount:</label>
                <input type="text" id="investment" name="investment"
                       value="<?php echo htmlspecialchars((string)$investment); ?>">
            </div>

            <div>
                <label for="interest_rate">Yearly Interest Rate:</label>
                <input type="text" id="interest_rate" name="interest_rate"
                       value="<?php echo htmlspecialchars((string)$interest_rate); ?>">
            </div>

            <div>
                <label for="years">Number of Years:</label>
                <input type="text" id="years" name="years"
                       value="<?php echo htmlspecialchars((string)$years); ?>">
            </div>

            <div>
                <button type="submit">Calculate</button>
            </div>
        </form>
    </main>
</body>
</html>
