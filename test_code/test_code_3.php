<!--
    File content:
        form handling 
            two part processor - html (display and gather information) & php (server side processing)
-->
<?php

    // model - data - the form data from the Request Object
    // controller - the business logic

    // $_POST[]     Post Super Global - an associative array of the form name value pairs
    // $_GET[]      Get  Super Global
    // depending on what the method is in the HTML will decide which one to use

    // associative array (index is a word/string instead of a number)

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Abby Poplawski"> 
    <title>Test Code 3 File</title>
</head>
<body>
    <h1>Your form has been processed on the server!</h1>
    <h2>Confirmation Page!</h2>

    <p>You entered the following information</p>
    <p><?php echo "First Name: $firstName"; ?></p>
    <p><?php echo "Last Name: $lastName"; ?></p>

    <a href="inputForm.html">Back to Form</a>
</body>
</html>