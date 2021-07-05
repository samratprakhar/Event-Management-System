<?php
require_once 'classes/Bookings.php';
require_once 'classes/BookingsTableGateway.php';
require_once 'classes/Connection.php';


if (!isset($_GET['name'])) {
    die("Illegal request");
}
$name = $_GET['name'];

$connection = Connection::getInstance();

$gateway = new BookingsTableGateway($connection);

$gateway->delete($name);

header('Location: viewticketrequest.php');