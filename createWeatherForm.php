<?php
require_once 'functions.php';
require_once 'utils/functions.php';

start_session();

if (!user_logged_in()) {
    header("Location: login_form.php");
}

$user = $_SESSION['user'];

if (!isset($formdata)) {
    $formdata = array();
}

if (!isset($errors)) {
    $errors = array();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Weather Forecast Form</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content">
            <div class = "container">
                <h1>Create Weather Forecast Form</h1><!--form title-->
                <?php
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>
                <form action="createWeather.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="datetime" class="col-md-2 control-label">Date and Time</label><!--start date-->
                        <div class="col-md-5">
                            <input type="datetime-local" class="form-control" id="datetime" name="datetime" value="<?php echoValue($formdata, "datetime")?>" /><!--input-->
                        </div>
                        <div class="col-md-4">
                            <span id="datetimeError" class="error"><!--error message for invalid input-->
                                <?php echoValue($errors, 'datetime');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-md-2 control-label">Weather Forecast File</label><!--event description-->
                        <div class="col-md-5">
                        <input type="file" name="myfile" value="<?php echoValue($formdata, "datetime")?>" >
                        </div>
                        <div class="col-md-4">
                            <span id="fileError" class="error"><!--error message for invalid input-->
                                <?php echoValue($errors, 'file');?>
                            </span>
                        </div>
                    </div>
                
                    <button type="submit" name = "save" class = "btn btn-primary">Create Weather Forecast </button>
                    <a class="btn btn-primary navbar-btn" href = "viewWeatherAdmin.php">Back</a><!--register button-->
                </form>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
