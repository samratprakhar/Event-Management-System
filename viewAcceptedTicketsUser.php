<?php
require_once 'utils/functions.php';
require_once 'classes/Bookings.php';
require_once 'classes/BookingsTableGateway.php';
require_once 'classes/Connection.php';


$connection = Connection::getInstance();
$gateway = new BookingsTableGateway($connection);

$statement = $gateway->getAcceptedbookings();

start_session();

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
                            <th>No. of persons</th>
                            <th>Event Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['no'] . '</td>';
                            echo '<td>' . $row['event'] . '</td>';
                            echo '<td>'.'<button type = "button" class = "btn btn-primary" data-toggle = "modal" data-target = "#cancel">Cancel</button>'.'</td>';
                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
                <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!--modal for login-->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"><!--modal header-->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Email</h4><!--modal title-->
                            </div>
                            <div class="row">
                                <div class="modal-body"><!--modal content-->
                                    <div class ="col-md-6 col-md-offset-3">
                                        <form action="cancel.php" method="POST">
                                            <div class = "form-group"><!--username-->
                                                <label for="mailid">Email:</label>
                                                <input type="text"
                                                       name="mailid"
                                                       class="form-control"
                                                       value="<?php if (isset($formdata['mailid'])) echo $formdata['mailid']; ?>"
                                                       />
                                                <span class="error"><!--error message on failed input-->
                                                    <?php if (isset($errors['mailid'])) echo $errors['mailid']; ?>
                                                </span>
                                            </div>
                                            <button type="submit" class = "btn btn-default loginbtn">Confirm</button><!--login button-->
                                        </form>
                                    </div>
                                </div><!--modal body div-->
                            </div><!--row div-->
                            <div class="modal-footer"><!--modal footer-->
                            <button type="button" class="btn btn-default closebtn" data-dismiss="modal">Close</button><p><!--close button-->
                            </div><!--modal footer div-->
                        </div><!--modal content div-->
                    </div><!--modal dialog div-->
                </div><!--modal div-->
            </div>
        </div>

        <?php require 'utils/footer.php'; ?>
    </body>
</html>
