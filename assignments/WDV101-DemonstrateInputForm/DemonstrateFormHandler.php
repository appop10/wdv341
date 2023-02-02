<?php

	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$academicStanding = $_POST['academic_standing'];
	$selectedMajor = $_POST['major'];
	$emailAddress = $_POST['email'];
	$checkbox1;
	$checkbox2;
	$commentSection = $_POST['comments'];

	// displays one or both of the checkbox values
	function confirmCheck() {
		global $checkbox1, $checkbox2;

		if (!empty($_POST['contact_me'])) {
			$checkbox1 = $_POST['contact_me'];
			echo "<br>".$checkbox1;
		}

		if (!empty($_POST['contact_advisor'])) {
			$checkbox2 =  $_POST['contact_advisor'];
			echo "<br>".$checkbox2;
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
			<h3>Thank you for your submission!</h3>

			<p>Dear <strong><?php echo $firstName ?></strong>,</p>

			<p>Thank you for your interest in DMACC.</p>

			<p>We have you listed as a <strong><?php echo $academicStanding ?></strong> starting this fall.</p>

			<p>You have declared <strong><?php echo $selectedMajor ?></strong> as you major.</p>

			<p>Based upon your responses we will provide the following information in our confirmation email to you at <strong><?php echo $emailAddress ?></strong>.</p>

			<p><strong><?php confirmCheck() ?></strong></p><br>

			<p>You have shared the following comments, which we will review:</p>
			<p><?php echo $commentSection ?></p>
		</div><!-- close confirmation div -->
	</div><!-- close container div -->
</body>
</html>
