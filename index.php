
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My PHP Calculator</title>

    <style>
        body {
            font-family: Arial, sans-serif;
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

        h1 {
            text-align: center;
            color: #007bff;
        }

        

        .window-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 6px;
            margin-bottom: 10px;
        }

        .window-buttons button {
            width: 28px;
            height: 28px;
            padding: 0;
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            line-height: 28px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .window-buttons button:hover {
            background-color: #0056b3;
        }

        button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            margin-top: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .result {
            background: #e8f5e9;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }

    </style>
</head>

<body>

<div class="card">

    

    <div class="window-buttons">

        <button type="button"
                onclick="minimizeCalculator()"
                title="Minimize">
            −
        </button>

        <button type="button"
                onclick="maximizeCalculator()"
                title="Maximize">
            +
        </button>

    </div>

    

    <div id="calculatorContent">

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

                

                if (
                    is_numeric($numbers[0]) &&
                    is_numeric($numbers[1]) &&
                    array_key_exists($operation, $operations)
                ) {

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

            <input
                type="number"
                name="num1"
                step="any"
                required
            >

            <label>Second Number:</label>

            <input
                type="number"
                name="num2"
                step="any"
                required
            >

            <label>Choose Operation:</label>

            <select name="operation">

                <option value="+">Addition (+)</option>
                <option value="-">Subtraction (-)</option>
                <option value="*">Multiplication (*)</option>
                <option value="/">Division (/)</option>

            </select>

            <button type="submit">
                Calculate
            </button>

        </form>

        

        <?php if ($result !== "") { ?>

            <div class="result">

                <h3>Calculation Result</h3>

                <p>
                    Operation:
                    <?php echo $operations[$operation]; ?>
                </p>

                <p>
                    First Number:
                    <?php echo $numbers[0]; ?>
                </p>

                <p>
                    Second Number:
                    <?php echo $numbers[1]; ?>
                </p>

                <h2>
                    Answer: <?php echo $result; ?>
                </h2>

            </div>

        <?php } ?>

       

        <?php if ($message != "") { ?>

            <div class="result">
                <strong>
                    <?php echo $message; ?>
                </strong>
            </div>

        <?php } ?>

    </div>

</div>



<script>

    function minimizeCalculator() {
        document.getElementById("calculatorContent").style.display = "none";
    }

    function maximizeCalculator() {
        document.getElementById("calculatorContent").style.display = "block";
    }

</script>

</body>
</html>

