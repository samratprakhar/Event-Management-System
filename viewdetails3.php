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
          $no = $_POST['no'];
          $event = 'IN BETWEEN';
          //check required fields
          if(!empty($mailid) && !empty($name) && !empty($no)){
              $qry = "insert into bookings(name,mailid,no,event) values('$name','$mailid','$no','$event')";
              mysqli_query($conn,$qry);
              echo "<script>window.alert('Your booking has been sent.!');</script>";
          }else{
            echo "<script>window.alert('Please fill all the fields!');</script>";
          }
        }
        ?><!--js links. file found in utils folder-->
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12"><!--body content title holder with 12 grid columns-->
                    <h1>Theatre Play - IN BETWEEN</h1><!--body content title-->
                </div>
            

            <div class="row">
            <div class="col-md-12">
            <hr>
            </div>
            </div>
            </div>
            

            <div class="container">
                <div class="col-md-6 contacts">
                    <p>
                    Description: <?php 
                                    $timeq="select Description from Events where Title = 'IN BETWEEN';";
                                    $result = $conn->query($timeq);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo  $row["Description"]. "<br>";
                                        }
                                      } else {
                                        echo "0 results";
                                      }
                                ?>
            <br>
                        Time: <?php 
                                    $timeq="select StartTime,EndTime from Events where Title = 'IN BETWEEN';";
                                    $result = $conn->query($timeq);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo  $row["StartTime"]."  ---  ".$row["EndTime"]. "<br>";
                                        }
                                      } else {
                                        echo "0 results";
                                      }
                                ?>
            <br>
                        Venue: <?php 
                                    $venue="select Name,Address from locations where LocationID = (select LocationID from Events where Title = 'IN BETWEEN');";
                                    $result1 = $conn->query($venue);
                                    if ($result1->num_rows > 0) {
                                        while($row1 = $result1->fetch_assoc()) {
                                          echo  $row1["Name"]."<br>".$row1["Address"]. "<br>";
                                        }
                                      } else {
                                        echo "0 results";
                                      }
                                ?>
                        <br>
                        Ticket Cost:  <?php 
                                    $cost="select Cost from Events where Title = 'IN BETWEEN';";
                                    $result2 = $conn->query($cost);
                                    if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                          echo  "Rs. ".$row2["Cost"]. "<br>";
                                        }
                                      } else {
                                        echo "0 results";
                                      }
                                ?>
                        <br>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class ="row text-center"><h2>BOOK NOW HERE</h2></div>

                    <form method="post">
                        <div class="form-group">
                            <label for="Title">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID:</label>
                            <input type="email" name="mailid" id="mailid"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="No. of persons">No. of persons:</label>
                            <input type="number" name="no" id="no" class="form-control">
                        </div>
                        <button type="submit"  name="submit" class="btn btn-default pull-right">Send Details</button>
                    </form>
                </div>
            </div>


        </div><!--body content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
