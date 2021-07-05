<?php
require_once 'utils/functions.php';
require_once 'classes/Bookings.php';
require_once 'classes/BookingsTableGateway.php';
require_once 'classes/Connection.php';


$connection = Connection::getInstance();
$gateway = new BookingsTableGateway($connection);

$statement = $gateway->getAcceptedbookings();

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
                <h2>ConfirmedTicket</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>No. of persons</th>
                            <th>Event Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['mailid'] . '</td>';
                            echo '<td>' . $row['no'] . '</td>';
                            echo '<td>' . $row['event'] . '</td>';
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
