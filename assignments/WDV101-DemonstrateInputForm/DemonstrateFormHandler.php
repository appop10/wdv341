<?php

	if (isset($_POST['button'])) {
		if (empty($_POST['phone_number']) && empty($_POST['grad_year'])) {
			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$academicStanding = $_POST['academic_standing'];
			$selectedMajor = $_POST['major'];
			$emailAddress = $_POST['email'];
			$checkbox1;
			$checkbox2;
			$commentSection = $_POST['comments'];
		} else {
			exit("No information found");
		}
	} else {
		echo "Form not submitted <br>";
		exit("No confirmation can be sent");
	}

	// displays one or both of the checkbox values
	function confirmCheck() {
		global $checkbox1, $checkbox2;

		if (!empty($_POST['contact_me'])) {
			$checkbox1 = $_POST['contact_me'];
			echo "<li>".$checkbox1."</li>";
		}

		if (!empty($_POST['contact_advisor'])) {
			$checkbox2 =  $_POST['contact_advisor'];
			echo "<li>".$checkbox2."</li>";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Unit 5 Assignment HTML Form Processor PHP file">
	<meta name="author" content="Abby Poplawski">
	<title>WDV101 Basic Form Handler Example</title>
	<link href="stylesheet.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<h1>WDV 341 - Intro to PHP</h1>
		<h2>Unit 5 HTML Form Processor</h2>

		<div class="confirmation">
			<h3>Thank you <?php echo $firstName." ".$lastName ?></h3>

			<p>We have you listed as a <strong><?php echo $academicStanding ?></strong> starting this fall.</p>

			<p>You have declared <strong><?php echo $selectedMajor ?></strong> as you major.</p>

			<p>You selected the following option(s):</p>
			<ul><?php confirmCheck() ?></ul>

			<p>You have shared these comments:</p>
			<ul><?php echo "<li>".$commentSection."</li>" ?></ul>

			<p>A signup confirmation has been sent to  <strong><?php echo $emailAddress ?></strong>. Thank you for your support!</p>
		</div><!-- close confirmation div -->
	</div><!-- close container div -->
</body>
</html>
