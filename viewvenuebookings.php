<?php
require_once 'utils/functions.php';
require_once 'classes/VenueBookings.php';
require_once 'classes/VenueBookingsTableGateway.php';
require_once 'classes/Connection.php';


$connection = Connection::getInstance();
$gateway = new VenueBookingsTableGateway($connection);

$statement = $gateway->getvenuebookings();

start_session();

if (!user_logged_in()) {
    header("Location: login_form.php");
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class = "content">
            <div class = "container">
                <?php
                if (isset($message)) {
                    echo '<p>'.$message.'</p>';
                }
                ?>
                <h2>Venue Bookings Request</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>Venue</th>
                            <th>Event Description</th>
                            <th>Artists</th>
                            <th>Start Date & Time</th>
                            <th>End Date & Time</th>
                            <th>Event Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['mailid'] . '</td>';
                            echo '<td>' . $row['venue'] . '</td>';
                            echo '<td>' . $row['eventdescription'] . '</td>';
                            echo '<td>' . $row['artistinfo'] . '</td>';
                            echo '<td>' . $row['start'] . '</td>';
                            echo '<td>' . $row['end'] . '</td>';
                            echo '<td>' .'<a href="uploads/'.$row['Filename'].'" target="_blank">' .$row['Filename'] . '</td>';

                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php require 'utils/footer.php'; ?>
    </body>
</html>
