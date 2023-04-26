<?php
session_start();

if ($_SESSION['validUser']) {
} else {
    header("Location: loginPage.php");
}

if (isset($_POST['submit'])) {
    $eventID = $_GET['eventID'];
    $eventName = $_POST['eventName'];
    $eventDescription = $_POST['eventDescription'];
    $eventPresenter = $_POST['eventPresenter'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];

    try {
        require "../../databases/dbConnect.php";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE wdv341_events SET name=:eventName, description=:eventDescription, presenter=:eventPresenter, date=:eventDate, time=:eventTime WHERE id=:eventID";

        $stmt = $conn->prepare("$sql");
        $stmt->bindParam(':eventID', $eventID);
        $stmt->bindParam(':eventName', $eventName);
        $stmt->bindParam(':eventDescription', $eventDescription);
        $stmt->bindParam(':eventPresenter', $eventPresenter);
        $stmt->bindParam(':eventDate', $eventDate);
        $stmt->bindParam(':eventTime', $eventTime);

        $stmt->execute();

        header("Location: displayEvents.php");
    } catch (PDOException $e) {
        echo $e;
    }
} else {
    $eventID = $_GET['eventID'];

    try {
        require "../../databases/dbConnect.php";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT name, description, presenter, date, time FROM wdv341_events WHERE id=:eventID";

        $stmt = $conn->prepare("$sql");
        $stmt->bindParam(':eventID', $eventID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $row = $stmt->fetch();
    } catch (PDOException $e) {
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Event</title>

        <!-- stylesheets -->
        <link rel="stylesheet" href="stylesheets/enter-event-page.css">
    </head>

    <body>
        <nav>
            <p><a href="loginPage.php">Admin Area</a></p>

            <ul>
                <li><a href="unit_11_self_posting_form.php">New Event</a></li>
                <li><a href="displayEvents.php">Display Events</a></li>
                <li><a href="logoutPage.php">Sign out</a></li>
            </ul>
        </nav>

        <main>
            <header>
                <h1>WDV341 Intro to PHP</h1>
                <h2>Self Posting Form - Event Update</h2>
            </header>

            <form method="post" action="editEvent.php?eventID=<?php echo $eventID; ?>">
                <h3>Update Event</h3>

                <p>
                    <label for="eventName">Event Name:</label>
                    <input type="text" name="eventName" id="eventName" value="<?php echo $row['name']; ?>">
                </p>

                <div><!-- description and presenter -->
                    <p>
                        <label for="eventDescription">Event Description:</label>
                        <input type="text" name="eventDescription" id="eventDescription" value="<?php echo $row['description']; ?>">
                    </p>

                    <p>
                        <label for="eventPresenter">Event Presenter:</label>
                        <input type="text" name="eventPresenter" id="eventPresenter" value="<?php echo $row['presenter']; ?>">
                    </p>
                </div>

                <div><!-- date and time -->
                    <p>
                        <label for="eventDate">Event Date:</label>
                        <input type="date" name="eventDate" id="eventDate" value="<?php echo $row['date']; ?>">
                    </p>

                    <p>
                        <label for="eventTime">Event Time:</label>
                        <input type="time" name="eventTime" id="eventTime" value="<?php echo $row['time']; ?>">
                    </p>
                </div>

                <div>
                    <input type="submit" name="submit" value="Submit Changes">
                    <input type="reset" name="reset" value="Reset">
                </div>
            </form>
        </main>
    <?php
}
    ?>
    </body>

    </html>