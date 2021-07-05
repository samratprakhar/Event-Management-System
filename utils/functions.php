<?php
require_once 'classes/User.php';

function user_logged_in() {
    return (isset($_SESSION['user']));
}

function admin_logged_in() {
    return (isset($_SESSION['admin']));
}

function start_session() {
    $id = session_id();
        session_start();
}
?>
