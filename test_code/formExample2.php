<?php 

    // when you send a form, the method determines which location on the server your information is sent - either to $_POST or $_GET 

    $partName = $_POST["partName"];

    if (isset($_POST["inputSpecial"])) {
        $inputSpecial = $_POST["inputSpecial"];
    } else {
        $inputSpecial = "No";
    }
    // if you don't click the checkbox, the browser doesn't send it to the server

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Response to the Input Part Name Process</h1>

    <p>Requested Part Name: <?php echo $partName; ?></p>
    <p>Special Handling: <?php echo $inputSpecial; ?></p>
</body>
</html>