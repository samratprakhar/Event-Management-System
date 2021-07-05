<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';
require_once 'classes/Bookings.php';
require_once 'classes/BookingsTableGateway.php';
require_once 'classes/Connection.php';


$connection = Connection::getInstance();
$gateway = new WeatherTableGateway($connection);

$conn = mysqli_connect('localhost', 'root', '', 'trail5');


if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $datetime = $_POST['datetime'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            //$sql = "INSERT INTO weather (datetime, description) VALUES ('$datetime', '$filename')";
            //if (mysqli_query($conn, $sql)) {
              //  echo "File uploaded successfully";
                //header('Location: viewWeatherAdmin.php');
            //}
            
            $weather = new WeatherTable(-1, $datetime, $filename);
            $id = $gateway->insert($weather);
            header('Location: viewEvents.php');

        } else {
            echo "Failed to upload file.";
            require 'eventbooking.php';
        }
    }
}
?>
