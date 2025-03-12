
//creator: Matthias van der Meer
//Functie: Calculator

<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Error: Cannot divide by zero.";
            }
            break;
        default:
            $result = "Invalid operation.";
            break;
    }
}
?>

<h1>Simple PHP Calculator</h1>
    <form method="POST" action="">
        <label for="num1">First Number:</label>
        <input type="text" id="num1" name="num1" required>
        <br><br>

        <label for="num2">Second Number:</label>
        <input type="text" id="num2" name="num2" required>
        <br><br>

        <label>Operation:</label>
        <button type="submit" name="operation" value="add">Add</button>
        <button type="submit" name="operation" value="subtract">Subtract</button>
        <button type="submit" name="operation" value="multiply">Multiply</button>
        <button type="submit" name="operation" value="divide">Divide</button>
    </form>

    <h2>Result:</h2>
    <p><?php echo $result; ?></p>