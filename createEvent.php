<?php
require_once 'classes/Event.php';
require_once 'classes/EventTableGateway.php';
require_once 'classes/Connection.php';
require_once 'validateEvents.php';

$formdata = array();
$errors = array();

validateEvents(INPUT_POST, $formdata, $errors);
if (isset($_POST['save'])) {
    if (empty($errors)) {
    $title = $formdata['Title'];
    $description = $formdata['Description'];    
    $sDate = $formdata['StartDate'];
    $eDate = $formdata['EndDate'];
    $cost = $formdata['Cost'];
    $locID = $formdata['LocID'];
    $filename = $_FILES['myfile']['name'];
    $destination = 'uploads/' . $filename;
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
        if (move_uploaded_file($file, $destination)) {
            
            $event = new Event(-1, $title, $description, $sDate, $eDate, $cost, $locID, $filename);

        } else {
            echo "Failed to upload file.";
            require 'createEventForm.php';
        }

    $connection = Connection::getInstance();

    $gateway = new EventTableGateway($connection);

    $id = $gateway->insert($event);

    header('Location: viewEvents.php');
    }
}
else {
    require 'createEventForm.php';
}