<?php

require_once 'utils/functions.php';
require_once 'classes/User.php';
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';
require_once 'classes/Bookings.php';
require_once 'classes/BookingsTableGateway.php';
require_once 'classes/Connection.php';

// try to register the user - if there are any error/
// exception, catch it and send the user back to the
// login form with an error message
try {
    $formdata = array();
    $errors = array();
    
    $input_method = INPUT_POST;

    $formdata['mailid'] = filter_input($input_method, "mailid", FILTER_SANITIZE_STRING);
    // throw an exception if any of the form fields 
    // are empty
    if (empty($formdata['mailid'])) {
        $errors['mailid'] = "E-mail ID required";
    }
    //$email = filter_var($formdata['username'], FILTER_VALIDATE_EMAIL);
    //if ($email != $formdata['username']) {
    //    $errors['username'] = "Valid email required required";
    //}
    if (empty($errors)) {
        // since none of the form fields were empty, 
        // store the form data in variables
        $mailid = $formdata['mailid'];
        
        $connection = Connection::getInstance();
        
        $gateway = new BookingsTableGateway($connection);
        
        $gateway->delete($mailid);
        
        header('Location:viewAcceptedTicketUser.php');

        // since password fields match, see if the username
        // has already been registered - if it is then throw
        // and exception
    
    }
    
    if (!empty($errors)) {
        throw new Exception("");
    }
    
    // since the username is not aleady registered, create
    // a new User object, add it to the database using the
    // UserTable object, and store it in the session array
    // using the key 'user'
    
    // now the user is registered and logged in so redirect
    // them the their home page
    // Note the user is redirected to home.php rather than
    // requiring the home.php script at this point - this 
    // ensures that if the user refreshes the home page they
    // will not be resubmitting the login form.
    // 
    // require 'home.php';
    header('Location:viewAcceptedTicketsUser.php');
    }
    catch (Exception $ex) {
        // if an exception occurs then extract the message
        // from the exception and send the user the
        // registration form
        $errorMessage = $ex->getMessage();
        require 'viewAcceptedTicketsUser.php';
    }
?>
