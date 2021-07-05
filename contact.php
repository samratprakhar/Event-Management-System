<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EVENT MANAGEMENT SYSTEM</title>
        <?php require_once 'classes/Connection.php';
        require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php';
        //check for submit
        if(filter_has_var(INPUT_POST,'submit')){
          $name = $_POST['name'];
          $mailid = $_POST['mailid'];
          $message = $_POST['message'];
          //check required fields
          if(!empty($name) && !empty($mailid) && !empty($message)){
              $qry = "insert into contact(name,mailid,message) values('$name','$mailid','$message')";
              mysqli_query($conn,$qry);
              echo "<script>window.alert('Thank you for reviewing !');</script>";
          }else{
            echo "<script>window.alert('Please fill all the fields!');</script>";
          }
        }
        ?><!--js links. file found in utils folder-->
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->
            <div class="container">
                <div class="col-md-6 contacts">
                    <h1><span class="glyphicon glyphicon-user"></span> CONTACT US</h1>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span> Email: samratprakhar752@gmail.com<br>
                        <span class="glyphicon glyphicon-link"></span> Facebook: www.facebook.com/eventmanagement<br>
                        <span class="glyphicon glyphicon-phone"></span> Mobile: 8839686644
                    </p>
                </div>
                <div class="col-md-6">
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mailid">Email ID:</label>
                            <input type="text" name="mailid" id="mailid" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Review:</label>
                            <textarea id="message" rows="5" name="message" class="form-control"></textarea>
                        </div>
                        <button type="submit"  name="submit" class="btn btn-default pull-right">Send</button>
                    </form>
                </div>
            </div>


        </div><!--body content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
