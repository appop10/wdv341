<?php
    $yourName = "Abby";
    $number1 = 45;
    $number2 = 67;
    $total = $number1 + $number2;

    $codeLanguages = array("PHP", "HTML", "JavaScript");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Unit 3 PHP Basics assignment">
    <meta name="author" content="Abby Poplawski">
    <title>Unit 3 PHP Basics</title>
    <style>
        body {
            width: fit-content;
            margin: 50px;
            border: 1px solid black;
            padding: 50px;
        }
        p {
            font-size: 1.3em;
        }
    </style>
    <script>
        const codingLanguages = [<?php
            for($x=0; $x<count($codeLanguages); $x++) {
                echo "'$codeLanguages[$x]',";
            };
        ?>];
    </script>
</head>
<body>
    <?php echo "<h1>Welcome, $yourName!</h1>"; ?>

    <h2>The name entered is: <?php echo $yourName; ?></h2>

    <p>Number variable equation: </p>
    <p><?php echo "$number1 + $number2 = $total"; ?></p>
    
    <p>Values in the JavaScript Array: </p>
    <p><script>
        for(x=0; x<codingLanguages.length; x++) {
                document.write(codingLanguages[x] + "<br>");
            }
    </script></p>
</body>
</html>