<?php
require_once 'classes/Event.php';
require_once 'classes/EventTableGateway.php';
require_once 'classes/Connection.php';


$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvents();
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
                <div class="col-md-12"><!--body content title holder with 12 grid columns-->
                    <h1>What's On</h1><!--body content title-->
                </div>
                
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '
                    <div class="container">
                    <div class="col-md-12">
                    <hr>
                    </div>
                    </div>

                    <div class="row">
                        <section>
                            <div class="container">
                                <div class="col-md-5">'.
                                    '<img src="uploads/'.$row['Filename'].'" width="450px" height="300px">'
                                .'</div>
                                <div class="subcontent col-md-6">
                                    <h1 class="title">';echo $row['Title'].'</h1>
                                    <p class="definition">';echo $row['Description'].'</p>
                                    <button type="button" class="btn btn-default btn-lg"><!--view details button (no function implemented)-->
                                    <a href = "viewdetails1.php">View Details </a>  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><!--arrow right glyphicon-->
                                    </button>
                                </div>
                            </div>
                        </section>
                    </div>';
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
