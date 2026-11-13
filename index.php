
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Calculator</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f9;
            margin: 40px;
        }

        .card {
            background: white;
            padding: 25px;
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            margin-top: 15px;
            cursor: pointer;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .result {
            background: #f1f1f1;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="card">

    <h1>PHP Calculator</h1>
    <h3>Basic Arithmetic Operations</h3>

    <?php
        

        $result = "";
        $message = "";

       

        $operations = [
            "+" => "Addition",
            "-" => "Subtraction",
            "*" => "Multiplication",
            "/" => "Division"
        ];

       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];

            

            $numbers = [$num1, $num2];

            if (is_numeric($numbers[0]) &&
                is_numeric($numbers[1]) &&
                array_key_exists($operation, $operations)) {

                $first = $numbers[0];
                $second = $numbers[1];

               

                if ($operation == "+") {
                    $result = $first + $second;
                }
                elseif ($operation == "-") {
                    $result = $first - $second;
                }
                elseif ($operation == "*") {
                    $result = $first * $second;
                }
                elseif ($operation == "/") {

                    if ($second != 0) {
                        $result = $first / $second;
                    } else {
                        $message = "Cannot divide by zero!";
                    }
                }

            } else {
                $message = "Invalid input!";
            }
        }
    ?>

    

    <form method="POST">

        <label>First Number:</label>
        <input type="number" name="num1"
               step="any" required>

        <label>Second Number:</label>
        <input type="number" name="num2"
               step="any" required>

        <label>Choose Operation:</label>

        <select name="operation">
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
        </select>

        <button type="submit">Calculate</button>

    </form>

   

    <?php if ($result !== "") { ?>

        <div class="result">
            <h3>Calculation Result</h3>

            <p>
                Operation:
                <?php echo $operations[$operation]; ?>
            </p>

            <h2>
                Answer: <?php echo $result; ?>
            </h2>
        </div>

    <?php } ?>

    <?php if ($message != "") { ?>

        <div class="result">
            <strong><?php echo $message; ?></strong>
        </div>

    <?php } ?>

</div>

</body>
</html>
